<?php

namespace App\Form;

use App\Entity\Contact;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'Nom',
                'attr' => array(
                    'class' => 'form-control',
                    'placdeholder' => 'Name',

                )
            ])
            ->add('email', TextType::class, [
                'label' => 'Email',
                'attr' => array(
                    'placdeholder' => 'Name',

                )
            ])
            ->add('message', TextareaType::class, [
                'label'  => 'Message',
                'attr' => array(
                    'rows' => '5',
                    'placdeholder' => 'Name',

                )
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
        ]);
    }
}
