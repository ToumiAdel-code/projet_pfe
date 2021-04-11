<?php

namespace App\Form;



use App\Entity\Contact;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('prenom',TextType::class,[
                'label'=>'Votre prénom',
                'attr'=>[
                   'placeholder'=>'Prénom'
                ]
            ])
            ->add('nom',TextType::class,[
                'label'=>'Votre nom',
                'attr'=>[
                    'placeholder'=>'Nom'
                ]
            ])
            ->add('email',EmailType::class,[
                'label'=>'Votre email',
                'attr'=>[
                    'placeholder'=>'Email'
                ]
            ])
            ->add('content',TextareaType::class,[
                'label'=>'Votre message',
                'attr'=>[
                    'placeholder'=>'tapez votre message ...'
                ]
            ])
            ->add('submit',SubmitType::class,[
                'label'=>'Envoyez',
                'attr'=>[
                    'class'=>'btn-block btn-info'
                ]
            ])

        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class'=>Contact::class,
        ]);
    }
}
