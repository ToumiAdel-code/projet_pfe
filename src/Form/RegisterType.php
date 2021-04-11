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
use Symfony\Component\Validator\Constraints\Length;

class RegisterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstname', TextType::class , [
                'label'=>'Prénom',
                'constraints'=> new Length([
                    'min'=> 2,
                    'max'=> 45
                ]),
                'attr' =>[
                    'placeholder' =>'Prénom '
                ]
            ])
            ->add('lastname' , TextType::class, [
                'label'=>'Nom',
                'constraints'=> new Length([
                    'min'=> 2,
                    'max'=> 45
                ]),
                'attr' =>[
                    'placeholder'=>'Nom'
                ]
            ])
            ->add('email' , EmailType::class, [
                'label'=>'Email',
                'constraints'=> new Length([
                    'min'=> 2,
                    'max'=> 60
                ]),
                'attr'=>[
                    'placeholder'=>'Email'
                ]
            ])
            ->add('password' , RepeatedType::class,[
                'type'=>PasswordType::class,
                'invalid_message'=>'Le mot de passe et la confirmation doivent étre identque',
                'label'=>'Votre mot de passe',
                'required'=>true,
                'first_options'=>[
                    'label'=>'Mot de passe ',
                    'attr'=> [
                        'placeholder'=>'Mot de passe'
                    ]
                ],
                'second_options'=>[
                    'label'=>'Confirmez le Mot de passe ',
                    'attr'=> [
                    'placeholder'=>'Mot de passe'
                    ]
                ]
            ])
            ->add('submit' , SubmitType::class,[
                'label'=>"S'inscrire",
                'attr'=>[
                    'class'=>'btn-block btn-light mb-5 mt-3'
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
