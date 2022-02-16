<?php

namespace App\Form;

use App\Entity\Memo;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MemoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        
        $builder
            ->add('contenu',TextType::class, [
                'required'=>true,
                'label'=>false,
                'attr'=>[
                    'placeholder'=>'Contenu',
                    'class'=>'formClassText',
                ]
            ])
            ->add('expiration_date',IntegerType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Memo::class,
        ]);
    }
}
