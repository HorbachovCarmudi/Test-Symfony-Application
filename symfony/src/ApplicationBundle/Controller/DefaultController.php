<?php

namespace ApplicationBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use ApplicationBundle\Form\ApplicationType;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $form = $this->createForm(ApplicationType::class);
        return $this->render(
            'ApplicationBundle:Default:index.html.twig',
            [
                'form' => $form->createView(),
            ]
        );
    }

    public function createAction(Request $request)
    {
        $form = $this->createForm(ApplicationType::class, null);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $application = $form->getData();
            $doctrineManager = $this->getDoctrine()->getManager();
            $doctrineManager->persist($application);
            $doctrineManager->flush();

            $this->get('application.application_uploader')->upload($form['file']->getData(), $application->getId());
        }

        return $this->render(
            'ApplicationBundle:Default:index.html.twig',
            [
                'form' => $form->createView(),
            ]
        );
    }
}
