<?php
// src/AppBundle/Form/InvoiceRowsType.php
namespace AppBundle\Form;

use AppBundle\Entity\InvoiceRows;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class InvoiceRowsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('invoice_id', null)
            ->add('description', TextareaType::class)
            ->add('quantity', IntegerType::class)
            ->add('amount', NumberType::class)
            ->add('vat_amount', NumberType::class)
            ->add('total_withvat', NumberType::class)
            ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => InvoiceRows::class,
        ]);
    }
}
