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


            $em = $this->getDoctrine()->getManager();


            $query = $em->createQuery(
                'SELECT p
                FROM FantasticBooksBundle:CharacterFromBook p WHERE
                p.name LIKE :name
                ORDER BY p.name DESC'
            )->setParameter('name', '%'.$name.'%');

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