<?php


namespace App\Form\Type;



use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class IjsreceptType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('naam', TextType::class)
            ->add('ingredientenlijst', TextType::class)
            ->add('recept', TextType::class)
            ->add('kosten', TextType::class)
            ->add('save', SubmitType::class)
        ;
    }
}