<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\TipoTrabajo;
use AppBundle\Form\TipoTrabajoType;

/**
 * TipoTrabajo controller.
 *
 * @Route("/tipos-trabajo")
 */
class TipoTrabajoController extends Controller
{
    /**
     * Lists all TipoTrabajo entities.
     *
     * @Route("/", name="tipos-trabajo_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $tipoTrabajos = $em->getRepository('AppBundle:TipoTrabajo')->findAll();

        return $this->render('tipotrabajo/index.html.twig', array(
            'tipoTrabajos' => $tipoTrabajos,
        ));
    }

    /**
     * Creates a new TipoTrabajo entity.
     *
     * @Route("/new", name="tipos-trabajo_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $tipoTrabajo = new TipoTrabajo();
        $form = $this->createForm('AppBundle\Form\TipoTrabajoType', $tipoTrabajo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($tipoTrabajo);
            $em->flush();

            return $this->redirectToRoute('tipos-trabajo_show', array('id' => $tipoTrabajo->getId()));
        }

        return $this->render('tipotrabajo/new.html.twig', array(
            'tipoTrabajo' => $tipoTrabajo,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a TipoTrabajo entity.
     *
     * @Route("/{id}", name="tipos-trabajo_show")
     * @Method("GET")
     */
    public function showAction(TipoTrabajo $tipoTrabajo)
    {
        $deleteForm = $this->createDeleteForm($tipoTrabajo);

        return $this->render('tipotrabajo/show.html.twig', array(
            'tipoTrabajo' => $tipoTrabajo,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing TipoTrabajo entity.
     *
     * @Route("/{id}/edit", name="tipos-trabajo_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, TipoTrabajo $tipoTrabajo)
    {
        $deleteForm = $this->createDeleteForm($tipoTrabajo);
        $editForm = $this->createForm('AppBundle\Form\TipoTrabajoType', $tipoTrabajo);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($tipoTrabajo);
            $em->flush();

            return $this->redirectToRoute('tipos-trabajo_edit', array('id' => $tipoTrabajo->getId()));
        }

        return $this->render('tipotrabajo/edit.html.twig', array(
            'tipoTrabajo' => $tipoTrabajo,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a TipoTrabajo entity.
     *
     * @Route("/{id}", name="tipos-trabajo_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, TipoTrabajo $tipoTrabajo)
    {
        $form = $this->createDeleteForm($tipoTrabajo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($tipoTrabajo);
            $em->flush();
        }

        return $this->redirectToRoute('tipos-trabajo_index');
    }

    /**
     * Creates a form to delete a TipoTrabajo entity.
     *
     * @param TipoTrabajo $tipoTrabajo The TipoTrabajo entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(TipoTrabajo $tipoTrabajo)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('tipos-trabajo_delete', array('id' => $tipoTrabajo->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
