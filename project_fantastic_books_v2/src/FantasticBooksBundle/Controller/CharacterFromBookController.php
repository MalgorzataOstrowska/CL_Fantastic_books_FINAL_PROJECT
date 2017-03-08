<?php

namespace FantasticBooksBundle\Controller;

use FantasticBooksBundle\Entity\CharacterFromBook;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Characterfrombook controller.
 *
 * @Route("editor/characterfrombook")
 */
class CharacterFromBookController extends Controller
{
    /**
     * Lists all characterFromBook entities.
     *
     * @Route("/", name="editor_characterfrombook_index")
     * @Method("GET")
     */
    public function indexAction(Request $request)
    {
        $dql = "SELECT a FROM FantasticBooksBundle:CharacterFromBook a";

        $characterFromBooks = $this->setCharacterFromBooks($dql, $request);

        // parameters to template
        return $this->render('characterfrombook/index.html.twig', array(
            'characterFromBooks' => $characterFromBooks
        ));
    }

    /**
     * Creates a new characterFromBook entity.
     *
     * @Route("/new", name="editor_characterfrombook_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        if ($request->isMethod(Request::METHOD_POST)) {

            $bookCharacter = new CharacterFromBook();

            $newId = $this->saveBookCharacter($request, $bookCharacter);

            return $this->redirectToRoute('editor_characterfrombook_show',
                [
                    'id' => $newId
                ]
            );
        }

        return $this->render('characterfrombook/new.html.twig', [
            'form_address' => $this->generateUrl('editor_characterfrombook_new')
        ]);
    }

    /**
     * Finds and displays a characterFromBook entity.
     *
     * @Route("/{id}", name="editor_characterfrombook_show")
     * @Method("GET")
     */
    public function showAction(CharacterFromBook $characterFromBook)
    {
        $deleteForm = $this->createDeleteForm($characterFromBook);

        $characterFromBook = $this->setCharacterFromBook($characterFromBook);

        return $this->render('characterfrombook/show.html.twig', array(
            'characterFromBook' => $characterFromBook,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing characterFromBook entity.
     *
     * @Route("/{id}/edit", name="editor_characterfrombook_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, CharacterFromBook $characterFromBook, $id)
    {
        if ($request->isMethod(Request::METHOD_POST)) {

            $newId = $this->saveBookCharacter($request, $characterFromBook);

            return $this->redirectToRoute('editor_characterfrombook_show',
                [
                    'id' => $newId
                ]
            );
        }

        $deleteForm = $this->createDeleteForm($characterFromBook);


        $ability = $characterFromBook->getAbility();
        $ability = (explode(",", $ability));

        $occupation = $characterFromBook->getOccupation();
        $occupation = (explode(",", $occupation));

        $notHuman = $characterFromBook->getNotHuman();
        $notHuman = (explode(",", $notHuman));

        $mythology = $characterFromBook->getMythology();
        $mythology = (explode(",", $mythology));

        $biblicalCharacter = $characterFromBook->getBiblicalCharacter();
        $biblicalCharacter = (explode(",", $biblicalCharacter));

        $mythologicalCreature = $characterFromBook->getMythologicalCreature();
        $mythologicalCreature = (explode(",", $mythologicalCreature));

        $animalBeast = $characterFromBook->getAnimalBeast();
        $animalBeast = (explode(",", $animalBeast));

        $otherCreature = $characterFromBook->getOtherCreature();
        $otherCreature = (explode(",", $otherCreature));


        $this->getDoctrine()->getManager()->flush();

        return $this->render('characterfrombook/edit.html.twig', array(
            'delete_form' => $deleteForm->createView(),
            'form_address' => $this->generateUrl('editor_characterfrombook_edit', [
                'id' => $id
            ]),
            'name' => $characterFromBook->getName(),
            'gender' => $characterFromBook->getGender(),
            'species' => $characterFromBook->getSpecies(),
            'age' => $characterFromBook->getAge(),
            'ability' => $ability,
            'occupation' => $occupation,
            'notHuman' => $notHuman,
            'mythology' => $mythology,
            'biblicalCharacter' => $biblicalCharacter,
            'mythologicalCreature' => $mythologicalCreature,
            'animalBeast' => $animalBeast,
            'otherCreature' => $otherCreature,
        ));

    }

    /**
     * Deletes a characterFromBook entity.
     *
     * @Route("/{id}", name="editor_characterfrombook_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, CharacterFromBook $characterFromBook)
    {
        $form = $this->createDeleteForm($characterFromBook);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($characterFromBook);
            $em->flush($characterFromBook);
        }

        return $this->redirectToRoute('editor_characterfrombook_index');
    }

    /**
     * Creates a form to delete a characterFromBook entity.
     *
     * @param CharacterFromBook $characterFromBook The characterFromBook entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(CharacterFromBook $characterFromBook)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('editor_characterfrombook_delete', array('id' => $characterFromBook->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }

    private function saveBookCharacter(Request $request, CharacterFromBook $bookCharacter){
        $name = $request->get('name');
        $bookCharacter->setName($name);

        $gender = $request->get('gender');
        $bookCharacter->setGender($gender);

        $species = $request->get('species');
        $bookCharacter->setSpecies($species);

        $age = $request->get('age');
        $bookCharacter->setAge($age);

        $ability = $request->get('ability');
        if (is_array($ability)) {
            $ability = implode(",", $ability);
        }
        $bookCharacter->setAbility($ability);

        $occupation = $request->get('occupation');
        if (is_array($occupation)) {
            $occupation = implode(",", $occupation);
        }
        $bookCharacter->setOccupation($occupation);

        $notHuman = $request->get('notHuman');
        if (is_array($notHuman)) {
            $notHuman = implode(",", $notHuman);
        }
        $bookCharacter->setNotHuman($notHuman);

        $mythology = $request->get('mythology');
        if (is_array($mythology)) {
            $mythology = implode(",", $mythology);
        }
        $bookCharacter->setMythology($mythology);

        $biblicalCharacter = $request->get('biblicalCharacter');
        if (is_array($biblicalCharacter)) {
            $biblicalCharacter = implode(",", $biblicalCharacter);
        }
        $bookCharacter->setBiblicalCharacter($biblicalCharacter);

        $mythologicalCreature = $request->get('mythologicalCreature');
        if (is_array($mythologicalCreature)) {
            $mythologicalCreature = implode(",", $mythologicalCreature);
        }
        $bookCharacter->setMythologicalCreature($mythologicalCreature);

        $animalBeast = $request->get('animalBeast');
        if (is_array($animalBeast)) {
            $animalBeast = implode(",", $animalBeast);
        }
        $bookCharacter->setAnimalBeast($animalBeast);

        $otherCreature = $request->get('otherCreature');
        if (is_array($otherCreature)) {
            $otherCreature = implode(",", $otherCreature);
        }
        $bookCharacter->setOtherCreature($otherCreature);

        $otherInformation = $request->get('otherInformation');
        $bookCharacter->setOtherInformation($otherInformation);

        $em = $this->getDoctrine()->getManager();
        $em->persist($bookCharacter);
        $em->flush($bookCharacter);

        return $bookCharacter->getId();
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

        $this->setItems($characterFromBooks);

        return $characterFromBooks;
    }

    protected function setItems($characterFromBooks){
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
    }

    protected function setCharacterFromBook($characterFromBook){
        $ability= explode(",", $characterFromBook->getAbility());
        $characterFromBook->setAbility($ability);

        $occupation= explode(",", $characterFromBook->getOccupation());
        $characterFromBook->setOccupation($occupation);

        $notHuman= explode(",", $characterFromBook->getNotHuman());
        $characterFromBook->setNotHuman($notHuman);

        $mythology= explode(",", $characterFromBook->getMythology());
        $characterFromBook->setMythology($mythology);

        $biblicalCharacter= explode(",", $characterFromBook->getBiblicalCharacter());
        $characterFromBook->setBiblicalCharacter($biblicalCharacter);

        $mythologicalCreature= explode(",", $characterFromBook->getMythologicalCreature());
        $characterFromBook->setMythologicalCreature($mythologicalCreature);

        $animalBeast= explode(",", $characterFromBook->getAnimalBeast());
        $characterFromBook->setAnimalBeast($animalBeast);

        $otherCreature= explode(",", $characterFromBook->getOtherCreature());
        $characterFromBook->setOtherCreature($otherCreature);

        return $characterFromBook;
    }
}

