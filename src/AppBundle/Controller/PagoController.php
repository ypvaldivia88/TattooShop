<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\Pago;
use AppBundle\Form\PagoType;

/**
 * Pago controller.
 *
 * @Route("/pago")
 */
class PagoController extends Controller
{
    /**
     * Lists all Pago entities.
     *
     * @Route("/", name="pago_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $pagos = $em->getRepository('AppBundle:Pago')->findAll();

        return $this->render('pago/index.html.twig', array(
            'pagos' => $pagos,
        ));
    }

    /**
     * Creates a new Pago entity.
     *
     * @Route("/new", name="pago_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $pago = new Pago();
        $form = $this->createForm('AppBundle\Form\PagoType', $pago);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($pago);
            $em->flush();

            return $this->redirectToRoute('pago_show', array('id' => $pago->getId()));
        }

        return $this->render('pago/new.html.twig', array(
            'pago' => $pago,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Pago entity.
     *
     * @Route("/{id}", name="pago_show")
     * @Method("GET")
     */
    public function showAction(Pago $pago)
    {
        $deleteForm = $this->createDeleteForm($pago);

        return $this->render('pago/show.html.twig', array(
            'pago' => $pago,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Pago entity.
     *
     * @Route("/{id}/edit", name="pago_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Pago $pago)
    {
        $deleteForm = $this->createDeleteForm($pago);
        $editForm = $this->createForm('AppBundle\Form\PagoType', $pago);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($pago);
            $em->flush();

            return $this->redirectToRoute('pago_edit', array('id' => $pago->getId()));
        }

        return $this->render('pago/edit.html.twig', array(
            'pago' => $pago,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Pago entity.
     *
     * @Route("/{id}", name="pago_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Pago $pago)
    {
        $form = $this->createDeleteForm($pago);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($pago);
            $em->flush();
        }

        return $this->redirectToRoute('pago_index');
    }

    /**
     * Creates a form to delete a Pago entity.
     *
     * @param Pago $pago The Pago entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Pago $pago)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('pago_delete', array('id' => $pago->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
