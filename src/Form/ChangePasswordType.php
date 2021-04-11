<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ChangePasswordType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email' , EmailType::class , [
                'disabled'=>true ,
                 'label'=>'Email'
            ])
            ->add('firstname',TextType::class , [
                'disabled'=>true,
                'label'=>'Prénom'
            ])
            ->add('lastname', TextType::class ,[
                'disabled'=>true,
                'label'=>'Nom'
            ])
            ->add('old_password' , PasswordType::class,[
                'label'=>'Mot de passe actuel',
                'mapped'=>false,
                'attr'=>[
                    'placeholder'=>'Mot de passe '
                ]
            ])
            ->add('new_password' , RepeatedType::class,[
                'type'=>PasswordType::class,
                'mapped'=>false,
                'invalid_message'=>'Le mot de passe et la confirmation doivent étre identque',
                'label'=>'Nouveau mot de passe',
                'required'=>true,
                'first_options'=>[
                    'label'=>'Nouveau mot de passe ',
                    'attr'=> [
                        'placeholder'=>'mot de passe'
                    ]
                ],
                'second_options'=>[
                    'label'=>'Confirmez mot de passe ',
                    'attr'=> [
                        'placeholder'=>'Mot de passe'
                    ]
                ]
            ])
            ->add('submit' , SubmitType::class,[
                'label'=>"Mettre à jour",
                'attr'=> [
                    'class'=>"btn btn-light btn-block mb-5"
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
