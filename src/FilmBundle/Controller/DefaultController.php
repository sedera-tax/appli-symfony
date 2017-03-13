<?php

namespace FilmBundle\Controller;

//use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\DependencyInjection\ContainerAware,
    Symfony\Component\HttpFoundation\RedirectResponse;
use FilmBundle\Entity\Categorie;

class DefaultController extends ContainerAware
{
    public function indexAction()
    {
        //return $this->render('FilmBundle:Default:index.html.twig');
        $em = $this->container->get('doctrine')->getEntityManager();

        /*$categorie1 = new Categorie();
        $categorie1->setNom('Comédie');
        $em->persist($categorie1);

        $categorie2 = new Categorie();
        $categorie2->setNom('Science-fiction');
        $em->persist($categorie2);

        $em->flush();*/

        $message = 'Catégories créées avec succès';

        return $this->container->get('templating')->renderResponse('FilmBundle:Default:index.html.twig',
            array(
                'message' => $message,
                'madate' => date('Y-m-d H:i:s')
            )
        );
    }
    
    public function listAction()
    {
        $em = $this->container->get('doctrine')->getEntityManager();
        $categories = $em->getRepository('FilmBundle:Categorie')->findAll();

        return $this->container->get('templating')->renderResponse('FilmBundle:Default:list.html.twig',array(
            'categories' => $categories)
        );
    }
}
