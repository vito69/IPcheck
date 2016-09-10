<?php

namespace AppBundle\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ProxyController extends Controller
{
    /**
     * @Route("/proxy/")
     */
    public function prox(){
        ob_start();
        include __DIR__.'/../../../web/poxy/index.php';
        $proxyContent = ob_clean();
        return $this->render('IPcheck/proxy.html.twig', array(
            'proxyContent' => $proxyContent
        ));
    }
}