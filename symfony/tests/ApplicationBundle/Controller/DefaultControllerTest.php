<?php

namespace ApplicationBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use ApplicationBundle\Entity\Application;
use ApplicationBundle\Form\ApplicationType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\File\UploadedFile;

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
                'apply[name]' => 'name_' . time(),
                'apply[email]' => time() . '',
                'apply[file]'  => $file,
            ]
        );

        $crawler = $client->submit($form);
        $this->assertEquals(Response::HTTP_PRECONDITION_FAILED, $client->getResponse()->getStatusCode());
    }
}
