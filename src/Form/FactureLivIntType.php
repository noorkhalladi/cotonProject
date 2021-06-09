<?php

namespace App\Form;

use App\Entity\BordereauLiv;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use App\Entity\FactureLivInt;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FactureLivIntType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('numFacLiv',TextType::class)
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
            ->add('obs',TextType::class)
        ;
    }

    public function addElements(FormInterface $form, BordereauLiv $bordereauLiv = null) {
        // 4. Add the province element
        $form ->add('bordereauLiv', EntityType::class, array(
            'required' => true,
            'data' => $bordereauLiv,
            'placeholder' => 'Select bordereauLiv...',
            'class' => 'AppBundle:bordereauLiv'
        ));
    }
    
}
