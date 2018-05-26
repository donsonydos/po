<?php

namespace paOnde\backendBundle\Controller;

use paOnde\backendBundle\Entity\Place_type;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Place_type controller.
 *
 * @Route("place_type")
 */
class Place_typeController extends Controller
{
    /**
     * Lists all place_type entities.
     *
     * @Route("/", name="place_type_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $place_types = $em->getRepository('paOndebackendBundle:Place_type')->findAll();

        return $this->render('place_type/index.html.twig', array(
            'menuCategories' => 1,
            'categoryList' => 1,
            'place_types' => $place_types,
        ));
    }

    /**
     * Creates a new place_type entity.
     *
     * @Route("/new", name="place_type_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $place_type = new Place_type();
        $form = $this->createForm('paOnde\backendBundle\Form\Place_typeType', $place_type);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($place_type);
            $em->flush();

            return $this->redirectToRoute('place_type_show', array('id' => $place_type->getId()));
        }

        return $this->render('place_type/new.html.twig', array(
            'menuCategories' => 1,
            'categoryNew' => 1,
            'nameItem' => 'Categoría',
            'listItem' => 'lista de Categorías',
            'newItem' => 'Nueva Categoría',
            'place_type' => $place_type,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a place_type entity.
     *
     * @Route("/{id}", name="place_type_show")
     * @Method("GET")
     */
    public function showAction(Place_type $place_type)
    {
        $deleteForm = $this->createDeleteForm($place_type);

        return $this->render('place_type/show.html.twig', array(
            'place_type' => $place_type,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing place_type entity.
     *
     * @Route("/{id}/edit", name="place_type_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Place_type $place_type)
    {
        $deleteForm = $this->createDeleteForm($place_type);
        $editForm = $this->createForm('paOnde\backendBundle\Form\Place_typeType', $place_type);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('place_type_edit', array('id' => $place_type->getId()));
        }

        return $this->render('place_type/edit.html.twig', array(
            'menuCategories' => 1,
            'categoryNew' => 1,
            'nameItem' => 'Categoría',
            'listItem' => 'lista de Categorías',
            'editItem' => 'Editar Categoría',
            'place_type' => $place_type,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a place_type entity.
     *
     * @Route("/{id}", name="place_type_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Place_type $place_type)
    {
        $form = $this->createDeleteForm($place_type);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($place_type);
            $em->flush();
        }

        return $this->redirectToRoute('place_type_index');
    }

    /**
     * Creates a form to delete a place_type entity.
     *
     * @param Place_type $place_type The place_type entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Place_type $place_type)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('place_type_delete', array('id' => $place_type->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
