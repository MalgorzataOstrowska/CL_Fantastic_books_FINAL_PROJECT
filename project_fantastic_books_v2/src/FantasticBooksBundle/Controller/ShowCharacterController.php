<?php

namespace FantasticBooksBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class ShowCharacterController extends Controller
{
    /**
     * @Route("character/index")
     */
    public function indexAction(Request $request)
    {
        $dql   = "SELECT a 
                  FROM FantasticBooksBundle:CharacterFromBook a
                  ORDER BY a.name ASC
                  ";

        $characterFromBooks = $this->setCharacterFromBooks($dql, $request);

        // parameters to template
        return $this->render('FantasticBooksBundle:ShowCharacter:index.html.twig', array(
            'characterFromBooks' => $characterFromBooks
        ));
    }

    /**
     * @Route("character/show/{id}", name="fantasticbooks_showcharacter_show")
     */
    public function showCharacterAction($id)
    {
        return $this->render('FantasticBooksBundle:ShowCharacter:show.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("character/showChosen/{chosen}")
     */
    public function showChosenAction($chosen)
    {
        return $this->render('FantasticBooksBundle:ShowCharacter:show_chosen.html.twig', array(
            // ...
        ));
    }

    protected function setCharacterFromBooks($dql, Request $request){
        $em    = $this->get('doctrine.orm.entity_manager');

        $query = $em->createQuery($dql);

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
        return $characterFromBooks;
    }
}
