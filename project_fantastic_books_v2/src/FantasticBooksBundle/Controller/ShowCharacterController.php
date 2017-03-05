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
        $em    = $this->get('doctrine.orm.entity_manager');
        $dql   = "SELECT a 
                  FROM FantasticBooksBundle:CharacterFromBook a
                  ORDER BY a.name ASC
                  ";
        $query = $em->createQuery($dql);

        $paginator  = $this->get('knp_paginator');
        $characterFromBooks = $paginator->paginate(
            $query, /* query NOT result */
            $request->query->getInt('page', 1)/*page number*/,
            10/*limit per page*/
        );

        // parameters to template
        return $this->render('FantasticBooksBundle:ShowCharacter:index.html.twig', array(
            'characterFromBooks' => $characterFromBooks
        ));
    }

    /**
     * @Route("character/show/{id}")
     */
    public function showAction($id)
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

}
