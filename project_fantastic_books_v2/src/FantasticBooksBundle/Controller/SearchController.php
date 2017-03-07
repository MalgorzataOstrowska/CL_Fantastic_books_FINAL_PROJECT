<?php

namespace FantasticBooksBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
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

            echo $gender = $request->get('gender');
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
            $emptyAbility = false;
            if(is_null($ability)){
                $ability = '.*';
                $emptyAbility = true;
            } else if (is_array($ability)) {
                $ability = implode(".*", $ability);
            }

            $occupation = $request->get('occupation');
            $emptyOccupation = false;
            if(is_null($occupation)){
                $occupation = '.*';
                $emptyOccupation = true;
            } else if (is_array($occupation)) {
                $occupation = implode(".*", $occupation);
            }

            $notHuman = $request->get('notHuman');
            $emptyNotHuman = false;
            if(is_null($notHuman)){
                $notHuman = '.*';
                $emptyNotHuman = true;
            } else if (is_array($notHuman)) {
                $notHuman = implode(".*", $notHuman);
            }

            $mythology = $request->get('mythology');
            $emptyMythology = false;
            if(is_null($mythology)){
                $mythology = '.*';
                $emptyMythology = true;
            } else if (is_array($mythology)) {
                $mythology = implode(".*", $mythology);
            }

            $biblicalCharacter = $request->get('biblicalCharacter');
            $emptyBiblicalCharacter = false;
            if(is_null($biblicalCharacter)){
                $biblicalCharacter = '.*';
                $emptyBiblicalCharacter = true;
            } else if (is_array($biblicalCharacter)) {
                $biblicalCharacter = implode(".*", $biblicalCharacter);
            }

            $mythologicalCreature = $request->get('mythologicalCreature');
            $emptyMythologicalCreature = false;
            if(is_null($mythologicalCreature)){
                $mythologicalCreature = '.*';
                $emptyMythologicalCreature = true;
            } else if (is_array($mythologicalCreature)) {
                $mythologicalCreature = implode(".*", $mythologicalCreature);
            }

            $animalBeast = $request->get('animalBeast');
            $emptyAnimalBeast = false;
            if(is_null($animalBeast)){
                $animalBeast = '.*';
                $emptyAnimalBeast = true;
            } else if (is_array($animalBeast)) {
                $animalBeast = implode(".*", $animalBeast);
            }

            $otherCreature = $request->get('otherCreature');
            $emptyOtherCreature = false;
            if(is_null($otherCreature)){
                $otherCreature = '.*';
                $emptyOtherCreature = true;
            } else if (is_array($otherCreature)) {
                $otherCreature = implode(".*", $otherCreature);
            }

            $otherInformation = $request->get('otherInformation');

            $em = $this->get('doctrine.orm.entity_manager');

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
                AND
                p.otherInformation LIKE :otherInformation
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
                ->setParameter('emptyOtherCreature', $emptyOtherCreature)
                ->setParameter('otherInformation', '%'.$otherInformation.'%');
            $paginator  = $this->get('knp_paginator');
            $characterFromBooks = $paginator->paginate(
                $query, /* query NOT result */
                $request->query->getInt('page', 1)/*page number*/,
                10/*limit per page*/
            );

            $items = $characterFromBooks->getItems();
            foreach ($items as $key => $value){
                $ability= explode(",", $items[$key]->getAbility());
                $items[$key]->setAbility($ability);

                $occupation= explode(",", $items[$key]->getOccupation());
                $items[$key]->setOccupation($occupation);

                $notHuman= explode(",", $items[$key]->getNotHuman());
                $items[$key]->setNotHuman($notHuman);

                $mythology= explode(",", $items[$key]->getMythology());
                $items[$key]->setMythology($mythology);

                $biblicalCharacter= explode(",", $items[$key]->getBiblicalCharacter());
                $items[$key]->setBiblicalCharacter($biblicalCharacter);

                $mythologicalCreature= explode(",", $items[$key]->getMythologicalCreature());
                $items[$key]->setMythologicalCreature($mythologicalCreature);

                $animalBeast= explode(",", $items[$key]->getAnimalBeast());
                $items[$key]->setAnimalBeast($animalBeast);

                $otherCreature= explode(",", $items[$key]->getOtherCreature());
                $items[$key]->setOtherCreature($otherCreature);
            }

//            return $this->redirectToRoute('fantasticbooks_search_showcharacter',
//                ['characterFromBooks' => $characterFromBooks]
//            );
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
     * @Method("GET")
     */
    public function showCharacterAction(Request $request)
    {


        return $this->render('FantasticBooksBundle:Search:show_character.html.twig', array(

        ));
    }


}
