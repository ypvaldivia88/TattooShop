<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\Artista;
use AppBundle\Form\ArtistaType;

/**
 * Artista controller.
 *
 * @Route("/artista")
 */
class ArtistaController extends Controller
{
    /**
     * Lists all Artista entities.
     *
     * @Route("/", name="artista_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $artistas = $em->getRepository('AppBundle:Artista')->findAll();

        return $this->render('artista/index.html.twig', array(
            'artistas' => $artistas,
        ));
    }

    /**
     * Creates a new Artista entity.
     *
     * @Route("/new", name="artista_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $artistum = new Artista();
        $form = $this->createForm('AppBundle\Form\ArtistaType', $artistum);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($artistum);
            $em->flush();

            return $this->redirectToRoute('artista_show', array('id' => $artistum->getId()));
        }

        return $this->render('artista/new.html.twig', array(
            'artistum' => $artistum,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Artista entity.
     *
     * @Route("/{id}", name="artista_show")
     * @Method("GET")
     */
    public function showAction(Artista $artistum)
    {
        $deleteForm = $this->createDeleteForm($artistum);

        return $this->render('artista/show.html.twig', array(
            'artistum' => $artistum,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Artista entity.
     *
     * @Route("/{id}/edit", name="artista_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Artista $artistum)
    {
        $deleteForm = $this->createDeleteForm($artistum);
        $editForm = $this->createForm('AppBundle\Form\ArtistaType', $artistum);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($artistum);
            $em->flush();

            return $this->redirectToRoute('artista_edit', array('id' => $artistum->getId()));
        }

        return $this->render('artista/edit.html.twig', array(
            'artistum' => $artistum,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Artista entity.
     *
     * @Route("/{id}", name="artista_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Artista $artistum)
    {
        $form = $this->createDeleteForm($artistum);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($artistum);
            $em->flush();
        }

        return $this->redirectToRoute('artista_index');
    }

    /**
     * Creates a form to delete a Artista entity.
     *
     * @param Artista $artistum The Artista entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Artista $artistum)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('artista_delete', array('id' => $artistum->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
