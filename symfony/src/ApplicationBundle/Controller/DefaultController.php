<?php

namespace ApplicationBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use ApplicationBundle\Form\ApplicationType;

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
}
