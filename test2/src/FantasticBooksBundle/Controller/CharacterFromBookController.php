<?php

namespace FantasticBooksBundle\Controller;

use FantasticBooksBundle\Entity\CharacterFromBook;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

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
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $characterFromBooks = $em->getRepository('FantasticBooksBundle:CharacterFromBook')->findAll();

        return $this->render('characterfrombook/index.html.twig', array(
            'characterFromBooks' => $characterFromBooks,
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
        $characterFromBook = new Characterfrombook();
        $form = $this->createForm('FantasticBooksBundle\Form\CharacterFromBookType', $characterFromBook);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($characterFromBook);
            $em->flush($characterFromBook);

            return $this->redirectToRoute('editor_characterfrombook_show', array('id' => $characterFromBook->getId()));
        }

        return $this->render('characterfrombook/new.html.twig', array(
            'characterFromBook' => $characterFromBook,
            'form' => $form->createView(),
        ));
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
    public function editAction(Request $request, CharacterFromBook $characterFromBook)
    {
        $deleteForm = $this->createDeleteForm($characterFromBook);
        $editForm = $this->createForm('FantasticBooksBundle\Form\CharacterFromBookType', $characterFromBook);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('editor_characterfrombook_edit', array('id' => $characterFromBook->getId()));
        }

        return $this->render('characterfrombook/edit.html.twig', array(
            'characterFromBook' => $characterFromBook,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
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
}
