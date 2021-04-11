<?php

namespace App\Form;

use App\Entity\Address;
use EasyCorp\Bundle\EasyAdminBundle\Field\CountryField;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AddressType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, [
                'label'=>'Quel nom souhaitez donner a votre adresse ?',
                'attr'=>[
                    'placeholder'=>'Adresse'
                ]
            ])
            ->add('address', TextType::class, [
                'label'=>'Addresse',
                'attr'=>[
                    'placeholder'=>'11 rue borj bourguiba..'
                ]
            ])
            ->add('postal', TextType::class, [
                'label'=>'Code postal ?',
                'attr'=>[
                    'placeholder'=>'Code postal'
                ]
            ])
            ->add('ville', TextType::class, [
                'label'=>'Ville',
                'attr'=>[
                    'placeholder'=>'Ariana'
                ]
            ])
            ->add('phone', TelType::class, [
                'label'=>'Téléphone',
                'attr'=>[
                    'placeholder'=>'Téléphone'
                ]
            ])
            ->add('submit' , SubmitType::class, [
                'label'=>'Votre adresses',
                'attr'=>[
                    'class'=>'btn-block btn-light mb-4'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Address::class,
        ]);
    }
}
