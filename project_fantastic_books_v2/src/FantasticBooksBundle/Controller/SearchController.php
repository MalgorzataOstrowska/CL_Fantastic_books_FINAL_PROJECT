<?php

namespace FantasticBooksBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class SearchController extends Controller
{

    /**
     * @Route("/searchCharacter")
     */
    public function searchCharacterAction(Request $request)
    {
        if ($request->isMethod(Request::METHOD_POST)) {

            $name = $request->get('name');

            $gender = $request->get('gender');
            if(is_null($gender)){
                $gender = '%';
            }

            $species = $request->get('species');
            if(is_null($species)){
                $species = '%';
            }

            $age = $request->get('age');
            if(is_null($age)){
                $age = '%';
            }

            $ability = $request->get('ability');
            if(is_null($ability)){
                $ability = '.*';
                $emptyAbility = true;
            } else if (is_array($ability)) {
                $ability = implode(".*", $ability);
                $emptyAbility = false;
            }

            $occupation = $request->get('occupation');
            if(is_null($occupation)){
                $occupation = '.*';
                $emptyOccupation = true;
            } else if (is_array($occupation)) {
                $occupation = implode(".*", $occupation);
                $emptyOccupation = false;
            }

            $notHuman = $request->get('notHuman');
            if(is_null($notHuman)){
                $notHuman = '.*';
                $emptyNotHuman = true;
            } else if (is_array($notHuman)) {
                $notHuman = implode(".*", $notHuman);
                $emptyNotHuman = false;
            }

            $mythology = $request->get('mythology');
            if(is_null($mythology)){
                $mythology = '.*';
                $emptyMythology = true;
            } else if (is_array($mythology)) {
                $mythology = implode(".*", $mythology);
                $emptyMythology = false;
            }

            $biblicalCharacter = $request->get('biblicalCharacter');
            if(is_null($biblicalCharacter)){
                $biblicalCharacter = '.*';
                $emptyBiblicalCharacter = true;
            } else if (is_array($biblicalCharacter)) {
                $biblicalCharacter = implode(".*", $biblicalCharacter);
                $emptyBiblicalCharacter = false;
            }

            $mythologicalCreature = $request->get('mythologicalCreature');
            if(is_null($mythologicalCreature)){
                $mythologicalCreature = '.*';
                $emptyMythologicalCreature = true;
            } else if (is_array($mythologicalCreature)) {
                $mythologicalCreature = implode(".*", $mythologicalCreature);
                $emptyMythologicalCreature = false;
            }

            $animalBeast = $request->get('animalBeast');
            if(is_null($animalBeast)){
                $animalBeast = '.*';
                $emptyAnimalBeast = true;
            } else if (is_array($animalBeast)) {
                $animalBeast = implode(".*", $animalBeast);
                $emptyAnimalBeast = false;
            }

            $otherCreature = $request->get('otherCreature');
            if(is_null($otherCreature)){
                $otherCreature = '.*';
                $emptyOtherCreature = true;
            } else if (is_array($otherCreature)) {
                $otherCreature = implode(".*", $otherCreature);
                $emptyOtherCreature = false;
            }

            $otherInformation = $request->get('otherInformation');


            $em = $this->getDoctrine()->getManager();

            $query = $em->createQuery(
                'SELECT p
                FROM FantasticBooksBundle:CharacterFromBook p WHERE
                p.name LIKE :name
                AND 
                p.gender LIKE :gender
                AND 
                p.species LIKE :species
                AND 
                p.age LIKE :age
                AND
                (
                    REGEXP(p.ability, :ability) = true
                    OR 
                    :emptyAbility = true
                )
                AND
                (
                    REGEXP(p.occupation, :occupation) = true
                    OR 
                    :emptyOccupation = true
                )
                AND
                (
                    REGEXP(p.notHuman, :notHuman) = true
                    OR 
                    :emptyNotHuman = true
                )
                AND
                (
                    REGEXP(p.mythology, :mythology) = true
                    OR 
                    :emptyMythology = true
                )
                AND
                (
                    REGEXP(p.biblicalCharacter, :biblicalCharacter) = true
                    OR 
                    :emptyBiblicalCharacter = true
                )
                AND
                (
                    REGEXP(p.mythologicalCreature, :mythologicalCreature) = true
                    OR 
                    :emptyMythologicalCreature = true
                )
                AND
                (
                    REGEXP(p.animalBeast, :animalBeast) = true
                    OR 
                    :emptyAnimalBeast = true
                )
                AND
                (
                    REGEXP(p.otherCreature, :otherCreature) = true
                    OR 
                    :emptyOtherCreature = true
                )
                ORDER BY p.name ASC'
            )->setParameter('name', '%'.$name.'%')
            ->setParameter('gender', $gender)
            ->setParameter('species', $species)
            ->setParameter('age', $age)
            ->setParameter('ability', $ability)
            ->setParameter('emptyAbility', $emptyAbility)
            ->setParameter('occupation', $occupation)
            ->setParameter('emptyOccupation', $emptyOccupation)
            ->setParameter('notHuman', $notHuman)
            ->setParameter('emptyNotHuman', $emptyNotHuman)
            ->setParameter('mythology', $mythology)
            ->setParameter('emptyMythology', $emptyMythology)
            ->setParameter('biblicalCharacter', $biblicalCharacter)
            ->setParameter('emptyBiblicalCharacter', $emptyBiblicalCharacter)
            ->setParameter('mythologicalCreature', $mythologicalCreature)
            ->setParameter('emptyMythologicalCreature', $emptyMythologicalCreature)
            ->setParameter('animalBeast', $animalBeast)
            ->setParameter('emptyAnimalBeast', $emptyAnimalBeast)
            ->setParameter('otherCreature', $otherCreature)
            ->setParameter('emptyOtherCreature', $emptyOtherCreature);

            $characterFromBooks = $query->getResult();

            return $this->render('FantasticBooksBundle:Search:show_character.html.twig', array(
                'characterFromBooks' => $characterFromBooks,
            ));

        }

        return $this->render('FantasticBooksBundle:Search:search_character.html.twig',  [
            'form_address' => $this->generateUrl('fantasticbooks_search_searchcharacter')
        ]);
    }

    /**
     * @Route("/showCharacter")
     */
    public function showCharacterAction($name)
    {

        return $this->render('FantasticBooksBundle:Search:show_character.html.twig', array(
            // ...
        ));
    }

}
