<?php

namespace App\Form;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use App\Entity\FactureLivInt;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BordereauRegType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('numBorReg',TextType::class)
            ->add('date',DateType::class, [
                // renders it as a single text box
                'widget' => 'single_text',
            ])
            ->add('mntReg',NumberType::class)
            ->add('modPaie',TextType::class)
        ;
    }
    public function addElements(FormInterface $form, FactureLivInt $factureLivInts = null) {
        // 4. Add the province element
        $form ->add('factureLivInts', EntityType::class, array(
            'required' => true,
            'data' => $factureLivInts,
            'placeholder' => 'Select a factureLivInts...',
            'class' => 'AppBundle:factureLivInts'
        ));
    }

 
}
