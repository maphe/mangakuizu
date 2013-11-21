<?php

namespace Kuizu\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Kuizu\GameBundle\Entity\Manga;
use Kuizu\AdminBundle\Form\Type\MangaType;

class MangaController extends Controller
{
    /**
     * Lists all Manga entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('KuizuGameBundle:Manga')->findAll();

        return $this->render('KuizuAdminBundle:Manga:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Manga entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Manga();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $entity->upload();

            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('kuizu_admin_manga_show', array('id' => $entity->getId())));
        }

        return $this->render('KuizuAdminBundle:Manga:new.html.twig', array(
                'entity' => $entity,
                'form'   => $form->createView(),
            ));
    }

    /**
     * Creates a form to create a Manga entity.
     *
     * @param Manga $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Manga $entity)
    {
        $form = $this->createForm(new MangaType(), $entity, array(
                'action' => $this->generateUrl('kuizu_admin_manga_create'),
                'method' => 'POST',
            ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Manga entity.
     *
     */
    public function newAction()
    {
        $entity = new Manga();
        $form   = $this->createCreateForm($entity);

        return $this->render('KuizuAdminBundle:Manga:new.html.twig', array(
                'entity' => $entity,
                'form'   => $form->createView(),
            ));
    }

    /**
     * Finds and displays a Manga entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('KuizuGameBundle:Manga')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Manga entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('KuizuAdminBundle:Manga:show.html.twig', array(
                'entity'      => $entity,
                'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Manga entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('KuizuGameBundle:Manga')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Manga entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('KuizuAdminBundle:Manga:edit.html.twig', array(
                'entity'      => $entity,
                'edit_form'   => $editForm->createView(),
                'delete_form' => $deleteForm->createView(),
            ));
    }

    /**
     * Creates a form to edit a Manga entity.
     *
     * @param Manga $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createEditForm(Manga $entity)
    {
        $form = $this->createForm(new MangaType(), $entity, array(
                'action' => $this->generateUrl('kuizu_admin_manga_update', array('id' => $entity->getId())),
                'method' => 'PUT',
            ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Manga entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('KuizuGameBundle:Manga')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Manga entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            if ($entity->getImage()) {
                $entity->upload();
            }
            $em->flush();

            return $this->redirect($this->generateUrl('kuizu_admin_manga_edit', array('id' => $id)));
        }

        return $this->render('KuizuAdminBundle:Manga:edit.html.twig', array(
                'entity'      => $entity,
                'edit_form'   => $editForm->createView(),
                'delete_form' => $deleteForm->createView(),
            ));
    }
    /**
     * Deletes a Manga entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('KuizuGameBundle:Manga')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Manga entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('kuizu_admin_manga'));
    }

    /**
     * Creates a form to delete a Manga entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('kuizu_admin_manga_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
            ;
    }
}