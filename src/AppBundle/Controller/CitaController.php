<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\Cita;
use AppBundle\Form\CitaType;

/**
 * Cita controller.
 *
 * @Route("/citas")
 */
class CitaController extends Controller
{
    /**
     * Lists all Cita entities.
     *
     * @Route("/", name="citas_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $citas = $em->getRepository('AppBundle:Cita')->findAll();

        return $this->render('cita/index.html.twig', array(
            'citas' => $citas,
        ));
    }

    /**
     * Creates a new Cita entity.
     *
     * @Route("/new", name="citas_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $citum = new Cita();
        $form = $this->createForm('AppBundle\Form\CitaType', $citum);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($citum);
            $em->flush();

            return $this->redirectToRoute('citas_show', array('id' => $citum->getId()));
        }

        return $this->render('cita/new.html.twig', array(
            'citum' => $citum,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Cita entity.
     *
     * @Route("/{id}", name="citas_show")
     * @Method("GET")
     */
    public function showAction(Cita $citum)
    {
        $deleteForm = $this->createDeleteForm($citum);

        return $this->render('cita/show.html.twig', array(
            'citum' => $citum,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Cita entity.
     *
     * @Route("/{id}/edit", name="citas_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Cita $citum)
    {
        $deleteForm = $this->createDeleteForm($citum);
        $editForm = $this->createForm('AppBundle\Form\CitaType', $citum);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($citum);
            $em->flush();

            return $this->redirectToRoute('citas_edit', array('id' => $citum->getId()));
        }

        return $this->render('cita/edit.html.twig', array(
            'citum' => $citum,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Cita entity.
     *
     * @Route("/{id}", name="citas_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Cita $citum)
    {
        $form = $this->createDeleteForm($citum);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($citum);
            $em->flush();
        }

        return $this->redirectToRoute('citas_index');
    }

    /**
     * Creates a form to delete a Cita entity.
     *
     * @param Cita $citum The Cita entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Cita $citum)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('citas_delete', array('id' => $citum->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
