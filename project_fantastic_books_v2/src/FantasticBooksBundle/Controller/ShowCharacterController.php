<?php

namespace FantasticBooksBundle\Controller;

use FantasticBooksBundle\Entity\CharacterFromBook;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class ShowCharacterController extends CharacterFromBookController
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
     * Finds and displays a characterFromBook entity.
     *
     * @Route("character/show/{id}", name="fantasticbooks_showcharacter_show")
     * @Method("GET")
     */
    public function showAction(CharacterFromBook $characterFromBook)
    {
        $characterFromBook = $this->setCharacterFromBook($characterFromBook);


        return $this->render('FantasticBooksBundle:ShowCharacter:show.html.twig', array(
            'characterFromBook' => $characterFromBook,
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
