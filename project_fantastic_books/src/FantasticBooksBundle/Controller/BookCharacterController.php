<?php

namespace FantasticBooksBundle\Controller;

use FantasticBooksBundle\Entity\BookCharacter;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Bookcharacter controller.
 *
 * @Route("editor/bookcharacter")
 */
class BookCharacterController extends Controller
{
    /**
     * Lists all bookCharacter entities.
     *
     * @Route("/", name="editor_bookcharacter_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $bookCharacters = $em->getRepository('FantasticBooksBundle:BookCharacter')->findAll();

        return $this->render('bookcharacter/index.html.twig', array(
            'bookCharacters' => $bookCharacters,
        ));
    }

    /**
     * Creates a new bookCharacter entity.
     *
     * @Route("/new", name="editor_bookcharacter_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        if ($request->isMethod(Request::METHOD_POST)) {
            $bookCharacter = new Bookcharacter();

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
            $bookCharacter->setOtherInformations($otherInformation);

            $em = $this->getDoctrine()->getManager();
            $em->persist($bookCharacter);
            $em->flush($bookCharacter);

            return $this->redirectToRoute('editor_bookcharacter_show',
                [
                    'id' => $bookCharacter->getId()
                ]
            );
        }

        return $this->render('bookcharacter/new.html.twig', [
            'form_address' => $this->generateUrl('editor_bookcharacter_new')
        ]);
    }

    /**
     * Finds and displays a bookCharacter entity.
     *
     * @Route("/{id}", name="editor_bookcharacter_show")
     * @Method("GET")
     */
    public function showAction(BookCharacter $bookCharacter)
    {
        $deleteForm = $this->createDeleteForm($bookCharacter);

        return $this->render('bookcharacter/show.html.twig', array(
            'bookCharacter' => $bookCharacter,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing bookCharacter entity.
     *
     * @Route("/{id}/edit", name="editor_bookcharacter_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, BookCharacter $bookCharacter, $id)
    {
        if ($request->isMethod(Request::METHOD_POST)) {

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
            $bookCharacter->setOtherInformations($otherInformation);

            $em = $this->getDoctrine()->getManager();
            $em->persist($bookCharacter);
            $em->flush($bookCharacter);

            return $this->redirectToRoute('editor_bookcharacter_show',
                ['id' => $bookCharacter->getId()]
            );
        }


        $deleteForm = $this->createDeleteForm($bookCharacter);
//        echo '<br><br><br><br>';

        $ability = $bookCharacter->getAbility();
        $ability = (explode(",", $ability));

        $occupation = $bookCharacter->getOccupation();
        $occupation = (explode(",", $occupation));

        $notHuman = $bookCharacter->getNotHuman();
        $notHuman = (explode(",", $notHuman));

        $mythology = $bookCharacter->getMythology();
        $mythology = (explode(",", $mythology));

        $biblicalCharacter = $bookCharacter->getBiblicalCharacter();
        $biblicalCharacter = (explode(",", $biblicalCharacter));

        $mythologicalCreature = $bookCharacter->getMythologicalCreature();
        $mythologicalCreature = (explode(",", $mythologicalCreature));

        $animalBeast = $bookCharacter->getAnimalBeast();
        $animalBeast = (explode(",", $animalBeast));

        $otherCreature = $bookCharacter->getOtherCreature();
        $otherCreature = (explode(",", $otherCreature));

//        var_dump($ability);
//        $editForm = $this->createForm('FantasticBooksBundle\Form\BookCharacterType', $bookCharacter);
//        $editForm->handleRequest($request);
//
//        if ($editForm->isSubmitted() && $editForm->isValid()) {

//        echo $_POST['submit'];
        print_r($_POST);
//        echo $_POST['submit'];
//        die;

//        if ( isset( $_POST['edit'] ) ) {
//            echo $_POST['edit'];
//            die;
//        }
        $this->getDoctrine()->getManager()->flush();
//die;
//            return $this->redirectToRoute('editor_bookcharacter_edit', array('id' => $bookCharacter->getId()));
//        }
//
        return $this->render('bookcharacter/edit.html.twig', array(
//            'bookCharacter' => $bookCharacter,
//            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
            'form_address' => $this->generateUrl('editor_bookcharacter_edit', [
                'id' => $id
            ]),
            'name' => $bookCharacter->getName(),
            'gender' => $bookCharacter->getGender(),
            'species' => $bookCharacter->getSpecies(),
            'age' => $bookCharacter->getAge(),
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
     * Deletes a bookCharacter entity.
     *
     * @Route("/{id}", name="editor_bookcharacter_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, BookCharacter $bookCharacter)
    {
        $form = $this->createDeleteForm($bookCharacter);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($bookCharacter);
            $em->flush($bookCharacter);
        }

        return $this->redirectToRoute('editor_bookcharacter_index');
    }

    /**
     * Creates a form to delete a bookCharacter entity.
     *
     * @param BookCharacter $bookCharacter The bookCharacter entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(BookCharacter $bookCharacter)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('editor_bookcharacter_delete', array('id' => $bookCharacter->getId())))
            ->setMethod('DELETE')
            ->getForm();
    }
}
