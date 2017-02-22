<?php

namespace FantasticBooksBundle\Controller;

use FantasticBooksBundle\Entity\BookCharacter;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

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
        if($request->isMethod(Request::METHOD_POST)){
            echo '<pre>';
            print_r($_POST);
            die;
        }


        return $this->render('bookcharacter/new.html.twig');
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
    public function editAction(Request $request, BookCharacter $bookCharacter)
    {
        $deleteForm = $this->createDeleteForm($bookCharacter);
        $editForm = $this->createForm('FantasticBooksBundle\Form\BookCharacterType', $bookCharacter);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('editor_bookcharacter_edit', array('id' => $bookCharacter->getId()));
        }

        return $this->render('bookcharacter/edit.html.twig', array(
            'bookCharacter' => $bookCharacter,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
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
            ->getForm()
        ;
    }
}
