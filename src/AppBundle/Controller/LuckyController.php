<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class LuckyController extends Controller
{
    /**
     * @Route("/lucky/number")
     */
    public function numberAction()
    {
        $number = mt_rand(0, 100);

        /*return new Response(
            '<html><body>Lucky number: '.$number.'</body></html>'
        );*/
        
        return $this->render('lucky/number.html.twig', array(
            'number' => $number,
        ));
    }
    
    /**
     * @Route("/lucky/testerror")
     */
    public function testerrorAction()
    {
        // retrieve the object from database
        $product = false;
        if (!$product) {
            throw $this->createNotFoundException('The product does not exist');
        }
    }
}
