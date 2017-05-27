<?php

namespace ApplicationBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * Class DefaultControllerTest
 * @package ApplicationBundle\Tests\Controller
 */
class DefaultControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/');
        $this->assertEquals(Response::HTTP_OK, $client->getResponse()->getStatusCode());
    }

    public function testCreateSuccess()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/');

        $file = new UploadedFile(
            dirname(dirname(__FILE__)) . '/Fixtures/FileUploadTest.txt',
            'FileUploadTest.txt',
            'text/plain',
            24
        );

        $form = $crawler->selectButton('Apply')->form();
        $form->setValues(
            [
                'apply[name]' => 'name_' . time(),
                'apply[email]' => time() . '@gmail.com',
                'apply[file]'  => $file,
            ]
        );

        $crawler = $client->submit($form);
        $this->assertEquals(1, $crawler->filter('div.success')->count());
        $this->assertEquals(Response::HTTP_OK, $client->getResponse()->getStatusCode());
    }

    public function testCreateFail()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/');

        $file = new UploadedFile(
            dirname(dirname(__FILE__)) . '/Fixtures/FileUploadTest.txt',
            'FileUploadTest.txt',
            'text/plain',
            24
        );

        $form = $crawler->selectButton('Apply')->form();
        $form->setValues(
            [
                'apply[name]' => '',
                'apply[email]' => time() . '',
                'apply[file]'  => $file,
            ]
        );

        $crawler = $client->submit($form);
        $this->assertEquals(1, $crawler->filter('div.error')->count());
        $this->assertEquals(Response::HTTP_OK, $client->getResponse()->getStatusCode());
    }

    public function testSecuredAreaFail()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/admin/');
        $this->assertEquals(Response::HTTP_FOUND, $client->getResponse()->getStatusCode());

        $crawler = $client->followRedirect();
        $this->assertRegExp('/\/login/', $crawler->getUri());
    }

    public function testLoginFail()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/login/');

        $this->assertEquals(1, $crawler->filter('form[action="/login/"]')->count());
        $form = $crawler->selectButton('Login')->form();
        $form->setValues(
            [
                '_username' => 'name_' . time(),
                '_password' => time(),
            ]
        );

        $crawler = $client->submit($form);
        $this->assertEquals(Response::HTTP_FOUND, $client->getResponse()->getStatusCode());

        $crawler = $client->followRedirect();
        $this->assertRegExp('/\/login/', $crawler->getUri());
        $this->assertEquals(1, $crawler->filter('div.error')->count());
    }

    public function testLoginSuccess()
    {
        $client = static::createClient();
        $crawler = $client->getCrawler();
        $this->login($client, $crawler);

        $crawler = $client->request('GET', '/admin/');
        $this->assertRegExp('/\/admin/', $crawler->getUri());
        $this->assertEquals(Response::HTTP_OK, $client->getResponse()->getStatusCode());
        $this->assertLessThan($crawler->filter('th')->count(),0);
    }

    public function testDownloadSuccess()
    {
        $client = static::createClient();
        $crawler = $client->getCrawler();
        $this->login($client, $crawler);

        $crawler = $client->request('GET', '/admin/');
        $downloadUrl = $crawler->filter('td a')->getNode(0)->getAttribute('href');

        $crawler = $client->request('GET', $downloadUrl);

        $this->assertEquals(Response::HTTP_OK, $client->getResponse()->getStatusCode());
        $this->assertEquals('application/octet-stream', $client->getResponse()->headers->get('content-type'));
    }

    public function testLogout()
    {
        $client = static::createClient();
        $crawler = $client->getCrawler();
        $this->login($client, $crawler);

        $crawler = $client->request('GET', '/logout/');
        $crawler = $client->request('GET', '/admin/');
        $crawler = $client->followRedirect();

        $this->assertRegExp('/\/login/', $crawler->getUri());
    }

    /**
     * @param $client
     * @param $crawler
     */
    private function login(&$client, &$crawler)
    {
        $crawler = $client->request('GET', '/login/');
        $this->assertEquals(1, $crawler->filter('form[action="/login/"]')->count());
        $form = $crawler->selectButton('Login')->form();
        $form->setValues(
            [
                '_username' => 'lengoo_test',
                '_password' => 'lengoo_test',
            ]
        );

        $crawler = $client->submit($form);
        $this->assertEquals(Response::HTTP_FOUND, $client->getResponse()->getStatusCode());

        $crawler = $client->followRedirect();
    }

}
