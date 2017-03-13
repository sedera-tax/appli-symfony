<?php

namespace FilmBundle\Controller;

//use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\DependencyInjection\ContainerAware,
    Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use FilmBundle\Entity\Acteur;
use FilmBundle\Form\ActeurForm;

class ActeurController extends ContainerAware
{
    public function indexAction()
    {
        return $this->container->get('templating')->renderResponse(
            'FilmBundle:Acteur:index.html.twig');
    }
    
    public function ajouterAction()
    {
        
        $message = '';
        $acteur = new Acteur();
        $form = $this->container->get('form.factory')->create(new ActeurForm(), $acteur);

        $request = $this->container->get('request');

        if ($request->getMethod() == 'POST') 
        {
            $form->bind($request);

            if ($form->isValid()) 
            {
                $em = $this->container->get('doctrine')->getEntityManager();
                $em->persist($acteur);
                $em->flush();
                $message='Acteur ajouté avec succès !';
            }
        }

        return $this->container->get('templating')->renderResponse(
            'FilmBundle:Acteur:ajouter.html.twig',
            array(
                'form' => $form->createView(),
                'message' => $message
            )
        );
    }

    public function modifierAction($id)
    {
	return $this->container->get('templating')->renderResponse(
            'FilmBundle:Acteur:modifier.html.twig');
    }

    public function supprimerAction($id)
    {
	return $this->container->get('templating')->renderResponse(
            'FilmBundle:Acteur:supprimer.html.twig');
    }
}
