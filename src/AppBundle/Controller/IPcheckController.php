<?php
/**
 * Created by PhpStorm.
 * User: ghost
 * Date: 14.07.16
 * Time: 18:27
 */

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class IPcheckController extends Controller
{
    /**
     * @Route("/IPcheck/{zmienna}")
     */
    public function showAction($zmienna)
    {
        return $this->render('IPcheck/show.html.twig', array(
            'zmienna' => $zmienna
        ));
        //$number = rand(0, 100);
    }

}
?>