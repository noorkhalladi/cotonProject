<?php

namespace App\Form;

use App\Entity\Besoin;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

use Symfony\Component\OptionsResolver\OptionsResolver;

class BordereauLivType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('numBord',TextType::class)
            ->add('date',DateType::class, [
                // renders it as a single text box
                'widget' => 'single_text',
            ])
            ->add('modPaie',TextType::class)
            ->add('modLiv',TextType::class)
            ->add('datePaie',DateType::class, [
                // renders it as a single text box
                'widget' => 'single_text',
            ])
            ->add('delLiv',DateType::class, [
                // renders it as a single text box
                'widget' => 'single_text',
            ])
            ->add('tauxRem',NumberType::class)
        ;
    }
    public function addElements(FormInterface $form, Besoin $besoin = null) {
        // 4. Add the province element
        $form ->add('besoins', EntityType::class, array(
            'required' => true,
            'data' => $besoin,
            'placeholder' => 'Select besoin...',
            'class' => 'AppBundle:Besoin'
        ));
    }

}
