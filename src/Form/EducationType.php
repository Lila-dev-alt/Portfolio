<?php

namespace App\Form;

use App\Entity\Education;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EducationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('school', TextType::class, [
                'label'=> 'Ecole'
            ])
            ->add('degree', TextType::class, [
                'label'=> 'Diplôme'
            ])
            ->add('description',TextType::class, [
                'label'=> 'Description de la formation'
            ])
            ->add('fieldOfStudy', TextType::class, [
                'label'=> "Domaine d'études "
            ])
            ->add('numberOfyear', IntegerType::class, [
                'label'=> "Nombre d'années",
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Education::class,
        ]);
    }
}
