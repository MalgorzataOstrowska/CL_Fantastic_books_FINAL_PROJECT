<?php

namespace FantasticBooksBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class SearchController extends Controller
{
    /**
     * @Route("/searchCharacter")
     */
    public function searchCharacterAction()
    {
        return $this->render('FantasticBooksBundle:Search:search_character.html.twig', array(
            // ...
        ));
    }

}
