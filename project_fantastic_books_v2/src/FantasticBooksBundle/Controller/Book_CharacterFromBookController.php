<?php

namespace FantasticBooksBundle\Controller;

use FantasticBooksBundle\Entity\Book_CharacterFromBook;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Book_characterfrombook controller.
 *
 * @Route("editor/book_characterfrombook")
 */
class Book_CharacterFromBookController extends Controller
{
    /**
     * Lists all book_CharacterFromBook entities.
     *
     * @Route("/", name="editor_book_characterfrombook_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $book_CharacterFromBooks = $em->getRepository('FantasticBooksBundle:Book_CharacterFromBook')->findAll();

        return $this->render('book_characterfrombook/index.html.twig', array(
            'book_CharacterFromBooks' => $book_CharacterFromBooks,
        ));
    }

    /**
     * Creates a new book_CharacterFromBook entity.
     *
     * @Route("/new", name="editor_book_characterfrombook_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $book_CharacterFromBook = new Book_characterfrombook();
        $form = $this->createForm('FantasticBooksBundle\Form\Book_CharacterFromBookType', $book_CharacterFromBook);
        $form->handleRequest($request);

        $characterType = $request->get('characterType');
        $book_CharacterFromBook->setCharacterType($characterType);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            $query = $em->createQuery(
                'SELECT bc
                 FROM FantasticBooksBundle:Book_CharacterFromBook bc
                 WHERE 
                 bc.characterFromBook = :characterFromBook
                 AND
                 bc.book = :book'
            )->setParameter('characterFromBook', $book_CharacterFromBook->getCharacterFromBook())
            ->setParameter('book', $book_CharacterFromBook->getBook());

            $result = $query->getOneOrNullResult();

            if(is_null($result) &&
                !is_null($book_CharacterFromBook->getCharacterFromBook()) &&
                !is_null($book_CharacterFromBook->getBook())
            ){
                $em->persist($book_CharacterFromBook);
                $em->flush($book_CharacterFromBook);

                return $this->redirectToRoute('editor_book_characterfrombook_show',
                    array('id' => $book_CharacterFromBook->getId()));
            }

        }

        return $this->render('book_characterfrombook/new.html.twig', array(
            'book_CharacterFromBook' => $book_CharacterFromBook,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a book_CharacterFromBook entity.
     *
     * @Route("/{id}", name="editor_book_characterfrombook_show")
     * @Method("GET")
     */
    public function showAction(Book_CharacterFromBook $book_CharacterFromBook)
    {
        $deleteForm = $this->createDeleteForm($book_CharacterFromBook);

        return $this->render('book_characterfrombook/show.html.twig', array(
            'book_CharacterFromBook' => $book_CharacterFromBook,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing book_CharacterFromBook entity.
     *
     * @Route("/{id}/edit", name="editor_book_characterfrombook_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Book_CharacterFromBook $book_CharacterFromBook)
    {
        $deleteForm = $this->createDeleteForm($book_CharacterFromBook);
        $editForm = $this->createForm('FantasticBooksBundle\Form\Book_CharacterFromBookType', $book_CharacterFromBook);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('editor_book_characterfrombook_edit', array('id' => $book_CharacterFromBook->getId()));
        }

        return $this->render('book_characterfrombook/edit.html.twig', array(
            'book_CharacterFromBook' => $book_CharacterFromBook,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a book_CharacterFromBook entity.
     *
     * @Route("/{id}", name="editor_book_characterfrombook_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Book_CharacterFromBook $book_CharacterFromBook)
    {
        $form = $this->createDeleteForm($book_CharacterFromBook);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($book_CharacterFromBook);
            $em->flush();
        }

        return $this->redirectToRoute('editor_book_characterfrombook_index');
    }

    /**
     * Creates a form to delete a book_CharacterFromBook entity.
     *
     * @param Book_CharacterFromBook $book_CharacterFromBook The book_CharacterFromBook entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Book_CharacterFromBook $book_CharacterFromBook)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('editor_book_characterfrombook_delete', array('id' => $book_CharacterFromBook->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
