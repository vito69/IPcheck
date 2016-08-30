<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use AppBundle\Utils\IspData;

class IPformController extends Controller
{
    /**
     * @Route("/ipform/{ipad}")
     */
    public function showAction($ipad)
    {
        $ispD = new IspData();
        $isp = $ispD -> daneISP($ipad);

        return $this->render('IPcheck/ipForm.html.twig', array(
            'ipaddress' => $ipad, 'isp' => $isp
        ));
        //$number = rand(0, 100);
    }

}
?>