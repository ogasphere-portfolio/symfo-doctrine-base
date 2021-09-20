<?php

namespace App\Form;

use App\Entity\Post;
use Symfony\Component\Form\AbstractType;

use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\FormBuilderInterface;
use KMS\FroalaEditorBundle\Form\Type\FroalaEditorType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\DomCrawler\Field\TextareaFormField;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;


class PostFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title')
            ->add('body',  CKEditorType::class,)
            ->add('nbLikes')
            
            ->add('submit', SubmitType::class, array('label' => 'Envoyer'))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Post::class,
        ]);
    }
}
