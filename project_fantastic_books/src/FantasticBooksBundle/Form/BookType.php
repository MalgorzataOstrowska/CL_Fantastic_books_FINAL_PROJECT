<?php

namespace FantasticBooksBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
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
            ->add('authors', EntityType::class,
                ['class' => 'FantasticBooksBundle:Author'])
            ->add('setOfSeries', EntityType::class,
                ['class' => 'FantasticBooksBundle:Series'])
            ->add('bookCharacters', EntityType::class,
                ['class' => 'FantasticBooksBundle:BookCharacter'])
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
