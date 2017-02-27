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
        return $this->render('FantasticBooksBundle:Search:search_character.html.twig',  [
            'form_address' => $this->generateUrl('fantasticbooks_search_searchcharacter')
        ]);
    }

    /**
     * @Route("/showCharacter")
     */
    public function showCharacterAction()
    {
        return $this->render('FantasticBooksBundle:Search:show_character.html.twig', array(
            // ...
        ));
    }

}
