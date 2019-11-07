<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\Trabajo;
use AppBundle\Form\TrabajoType;

/**
 * Trabajo controller.
 *
 * @Route("/trabajos")
 */
class TrabajoController extends Controller
{
    /**
     * Lists all Trabajo entities.
     *
     * @Route("/", name="trabajos_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $trabajos = $em->getRepository('AppBundle:Trabajo')->findAll();

        return $this->render('trabajo/index.html.twig', array(
            'trabajos' => $trabajos,
        ));
    }

    /**
     * Creates a new Trabajo entity.
     *
     * @Route("/new", name="trabajos_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $trabajo = new Trabajo();
        $form = $this->createForm('AppBundle\Form\TrabajoType', $trabajo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($trabajo);
            $em->flush();

            return $this->redirectToRoute('trabajos_show', array('id' => $trabajo->getId()));
        }

        return $this->render('trabajo/new.html.twig', array(
            'trabajo' => $trabajo,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Trabajo entity.
     *
     * @Route("/{id}", name="trabajos_show")
     * @Method("GET")
     */
    public function showAction(Trabajo $trabajo)
    {
        $deleteForm = $this->createDeleteForm($trabajo);

        return $this->render('trabajo/show.html.twig', array(
            'trabajo' => $trabajo,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Trabajo entity.
     *
     * @Route("/{id}/edit", name="trabajos_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Trabajo $trabajo)
    {
        $deleteForm = $this->createDeleteForm($trabajo);
        $editForm = $this->createForm('AppBundle\Form\TrabajoType', $trabajo);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($trabajo);
            $em->flush();

            return $this->redirectToRoute('trabajos_edit', array('id' => $trabajo->getId()));
        }

        return $this->render('trabajo/edit.html.twig', array(
            'trabajo' => $trabajo,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Trabajo entity.
     *
     * @Route("/{id}", name="trabajos_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Trabajo $trabajo)
    {
        $form = $this->createDeleteForm($trabajo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($trabajo);
            $em->flush();
        }

        return $this->redirectToRoute('trabajos_index');
    }

    /**
     * Creates a form to delete a Trabajo entity.
     *
     * @param Trabajo $trabajo The Trabajo entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Trabajo $trabajo)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('trabajos_delete', array('id' => $trabajo->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
