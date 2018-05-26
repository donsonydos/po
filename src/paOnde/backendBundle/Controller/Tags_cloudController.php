<?php

namespace paOnde\backendBundle\Controller;

use paOnde\backendBundle\Entity\Tags_cloud;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Tags_cloud controller.
 *
 * @Route("tags_cloud")
 */
class Tags_cloudController extends Controller
{
    /**
     * Lists all tags_cloud entities.
     *
     * @Route("/", name="tags_cloud_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $tags_clouds = $em->getRepository('paOndebackendBundle:Tags_cloud')->findAll();

        return $this->render('tags_cloud/index.html.twig', array(
            'tags_clouds' => $tags_clouds,
        ));
    }

    /**
     * Creates a new tags_cloud entity.
     *
     * @Route("/new", name="tags_cloud_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $tags_cloud = new Tags_cloud();
        $form = $this->createForm('paOnde\backendBundle\Form\Tags_cloudType', $tags_cloud);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($tags_cloud);
            $em->flush();

            return $this->redirectToRoute('tags_cloud_show', array('id' => $tags_cloud->getId()));
        }

        return $this->render('tags_cloud/new.html.twig', array(
            'nameItem' => 'Características',
            'newItem' => "Nueva Característica",
            'tags_cloud' => $tags_cloud,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a tags_cloud entity.
     *
     * @Route("/{id}", name="tags_cloud_show")
     * @Method("GET")
     */
    public function showAction(Tags_cloud $tags_cloud)
    {
        $deleteForm = $this->createDeleteForm($tags_cloud);

        return $this->render('tags_cloud/show.html.twig', array(
            'tags_cloud' => $tags_cloud,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing tags_cloud entity.
     *
     * @Route("/{id}/edit", name="tags_cloud_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Tags_cloud $tags_cloud)
    {
        $deleteForm = $this->createDeleteForm($tags_cloud);
        $editForm = $this->createForm('paOnde\backendBundle\Form\Tags_cloudType', $tags_cloud);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('tags_cloud_edit', array('id' => $tags_cloud->getId()));
        }

        return $this->render('tags_cloud/edit.html.twig', array(
            'tags_cloud' => $tags_cloud,
            'nameItem' => 'Características',
            'editItem' => "Editar Característica",
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a tags_cloud entity.
     *
     * @Route("/{id}", name="tags_cloud_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Tags_cloud $tags_cloud)
    {
        $form = $this->createDeleteForm($tags_cloud);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($tags_cloud);
            $em->flush();
        }

        return $this->redirectToRoute('tags_cloud_index');
    }

    /**
     * Creates a form to delete a tags_cloud entity.
     *
     * @param Tags_cloud $tags_cloud The tags_cloud entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Tags_cloud $tags_cloud)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('tags_cloud_delete', array('id' => $tags_cloud->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
