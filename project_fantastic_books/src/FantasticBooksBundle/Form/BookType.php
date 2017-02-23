<?php

namespace FantasticBooksBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BookType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titlePolish')
            ->add('titleEnglish')
            ->add('titleOriginal')
            ->add('titleOriginal')
            ->add('bookCharacters')
            ->add('setOfSeries');
//
//
//            ->add('setOfSeries', EntityType::class,
//                ['class' => 'FantasticBooksBundle:Series'])
//            ->add('bookCharacters', EntityType::class,
//                ['class' => 'FantasticBooksBundle:BookCharacter'])
        ;
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'FantasticBooksBundle\Entity\Book'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'fantasticbooksbundle_book';
    }


}
