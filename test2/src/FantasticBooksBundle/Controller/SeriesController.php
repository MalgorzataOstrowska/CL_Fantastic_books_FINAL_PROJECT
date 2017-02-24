<?php

namespace FantasticBooksBundle\Controller;

use FantasticBooksBundle\Entity\Series;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Series controller.
 *
 * @Route("editor/series")
 */
class SeriesController extends Controller
{
    /**
     * Lists all series entities.
     *
     * @Route("/", name="editor_series_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $series = $em->getRepository('FantasticBooksBundle:Series')->findAll();

        return $this->render('series/index.html.twig', array(
            'series' => $series,
        ));
    }

    /**
     * Creates a new series entity.
     *
     * @Route("/new", name="editor_series_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $series = new Series();
        $form = $this->createForm('FantasticBooksBundle\Form\SeriesType', $series);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($series);
            $em->flush($series);

            return $this->redirectToRoute('editor_series_show', array('id' => $series->getId()));
        }

        return $this->render('series/new.html.twig', array(
            'series' => $series,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a series entity.
     *
     * @Route("/{id}", name="editor_series_show")
     * @Method("GET")
     */
    public function showAction(Series $series)
    {
        $deleteForm = $this->createDeleteForm($series);

        return $this->render('series/show.html.twig', array(
            'series' => $series,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing series entity.
     *
     * @Route("/{id}/edit", name="editor_series_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Series $series)
    {
        $deleteForm = $this->createDeleteForm($series);
        $editForm = $this->createForm('FantasticBooksBundle\Form\SeriesType', $series);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('editor_series_edit', array('id' => $series->getId()));
        }

        return $this->render('series/edit.html.twig', array(
            'series' => $series,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a series entity.
     *
     * @Route("/{id}", name="editor_series_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Series $series)
    {
        $form = $this->createDeleteForm($series);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($series);
            $em->flush($series);
        }

        return $this->redirectToRoute('editor_series_index');
    }

    /**
     * Creates a form to delete a series entity.
     *
     * @param Series $series The series entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Series $series)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('editor_series_delete', array('id' => $series->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
