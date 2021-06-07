<?php

namespace App\Form;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\CallbackTransformer;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('code',TextType::class)
            ->add('roles', ChoiceType ::class, [
                'required' => true,
                'multiple' => false,
                'expanded' => false,
                'choices'  => [
                  'User' => 'ROLE_USER',
                  'Cgi' => 'ROLE_CGI',
                  'Res Financier' => 'ROLE_RESF',
                  'Gestionnaire de pont bascule' => 'ROLE_GPB',
                  'Cozoc' => 'ROLE_COZOC',
                ],
            ])
            ->add('username',TextType::class)
            ->add('password',TextType::class)
        ;

        $builder->get('roles')
        ->addModelTransformer(new CallbackTransformer(
            function ($rolesArray) {
                 // transform the array to a string
                 return count($rolesArray)? $rolesArray[0]: null;
            },
            function ($rolesString) {
                 // transform the string back to an array
                 return [$rolesString];
            }
    ));

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
