<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use AppBundle\Utils\IspData;

class IPformController extends Controller
{
    /**
     * @Route("/{ipaddress}")
     */
    public function showAction($ipaddress)
    {

        $ispD = new IspData();
        $isp = $ispD -> daneISP($ipaddress);

        return $this->render('IPcheck/ipForm.html.twig', array(
            'ipaddress' => $ipaddress, 'isp' => $isp
        ));
        //$number = rand(0, 100);
    }

}
?>