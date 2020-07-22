<?php

namespace App\Form;

use App\Entity\Project;
use App\Entity\Skill;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProjectType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, [
                'label'=> 'Nom de projet'
            ])
            ->add('description', TextType::class, [
                'label'=> 'Description'
            ])
            ->add('image', TextType::class, [
                'label'=> 'Image'
            ])
            ->add('link', TextType::class, [
                'label'=> 'Lien du projet'
            ])
            ->add('skills', EntityType::class, [
                'class' => Skill::class,
                'choice_label' => 'Skills',
                'label' => 'Compétences',
                'multiple' => true,
                'expanded' => true,
                'by_reference' => false,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Project::class,
        ]);
    }
}
