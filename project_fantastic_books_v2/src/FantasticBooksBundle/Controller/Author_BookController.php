<?php

namespace FantasticBooksBundle\Controller;

use FantasticBooksBundle\Entity\Author_Book;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Author_book controller.
 *
 * @Route("editor/author_book")
 */
class Author_BookController extends Controller
{
    /**
     * Lists all author_Book entities.
     *
     * @Route("/", name="editor_author_book_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $author_Books = $em->getRepository('FantasticBooksBundle:Author_Book')->findAll();

        return $this->render('author_book/index.html.twig', array(
            'author_Books' => $author_Books,
        ));
    }

    /**
     * Creates a new author_Book entity.
     *
     * @Route("/new", name="editor_author_book_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $author_Book = new Author_book();
        $form = $this->createForm('FantasticBooksBundle\Form\Author_BookType', $author_Book);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($author_Book);
            $em->flush($author_Book);

            return $this->redirectToRoute('editor_author_book_show', array('id' => $author_Book->getId()));
        }

        return $this->render('author_book/new.html.twig', array(
            'author_Book' => $author_Book,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a author_Book entity.
     *
     * @Route("/{id}", name="editor_author_book_show")
     * @Method("GET")
     */
    public function showAction(Author_Book $author_Book)
    {
        $deleteForm = $this->createDeleteForm($author_Book);

        return $this->render('author_book/show.html.twig', array(
            'author_Book' => $author_Book,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing author_Book entity.
     *
     * @Route("/{id}/edit", name="editor_author_book_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Author_Book $author_Book)
    {
        $deleteForm = $this->createDeleteForm($author_Book);
        $editForm = $this->createForm('FantasticBooksBundle\Form\Author_BookType', $author_Book);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('editor_author_book_edit', array('id' => $author_Book->getId()));
        }

        return $this->render('author_book/edit.html.twig', array(
            'author_Book' => $author_Book,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a author_Book entity.
     *
     * @Route("/{id}", name="editor_author_book_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Author_Book $author_Book)
    {
        $form = $this->createDeleteForm($author_Book);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($author_Book);
            $em->flush();
        }

        return $this->redirectToRoute('editor_author_book_index');
    }

    /**
     * Creates a form to delete a author_Book entity.
     *
     * @param Author_Book $author_Book The author_Book entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Author_Book $author_Book)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('editor_author_book_delete', array('id' => $author_Book->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
