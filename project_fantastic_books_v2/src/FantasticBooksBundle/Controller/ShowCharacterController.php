<?php

namespace FantasticBooksBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class ShowCharacterController extends Controller
{
    /**
     * @Route("character/index")
     */
    public function indexAction()
    {
        return $this->render('FantasticBooksBundle:ShowCharacter:index.html.twig', array(
            // ...
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
