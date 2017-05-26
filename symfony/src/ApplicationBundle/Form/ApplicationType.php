<?php

namespace ApplicationBundle\Form;

use ApplicationBundle\Entity\Application;
use ApplicationBundle\Entity\ValueObject\Applicant;
use ApplicationBundle\Entity\ValueObject\File;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\DataMapperInterface;

/**
 * Class ApplicationType
 * @package ApplicationBundle\Form
 */
class ApplicationType extends AbstractType implements DataMapperInterface
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name', TextType::class);
        $builder->add('email', EmailType::class);
        $builder->add('file', FileType::class);
        $builder->add('apply', SubmitType::class, array(
            'attr' => array('class' => 'save'),
        ));
        $builder->setDataMapper($this);
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Application::class,
            'empty_data' => null,
        ));
    }

    public function mapDataToForms($data, $form)
    {
        $form = iterator_to_array($form);
        $form['name']->setData($data ? $data->getApplicant()->getName() : null);
        $form['email']->setData($data ? $data->getApplicant()->getEmail() : null);
        $form['file']->setData($data ? $$data->getFile()->getName() :null);
    }

    public function mapFormsToData($form, &$data)
    {
        $form = iterator_to_array($form);
        $data = new Application(
            new Applicant(
                $form['email']->getData(),
                $form['name']->getData()
            ),
            new File($form['file']->getData()->getClientOriginalName())
        );
    }

    /**
     * @return string
     */
    public function getBlockPrefix() : string
    {
        return 'apply';
    }
}
