<?php

namespace App\Form;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use App\Entity\Article;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BesoinType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('code',TextType::class)
            ->add('libelle',TextType::class)
            ->add('date',DateType::class, [
                // renders it as a single text box
                'widget' => 'single_text',
            ]);
            
    }
    public function addElements(FormInterface $form, Article $article = null) {
        // 4. Add the province element
        $form ->add('articles', EntityType::class, array(
            'required' => true,
            'data' => $article,
            'placeholder' => 'Select aarticle...',
            'class' => 'AppBundle:Article'
        ));
    }
  
}
