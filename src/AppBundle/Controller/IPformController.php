<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use AppBundle\Utils\IspData;

class IPformController extends Controller
{
    /**
     * @Route("/{ipad}")
     */
    public function showAction($ipad)
    {
        if(filter_var($ipad, FILTER_VALIDATE_IP))
        {
            $ipad = $ipad;
            $ispD = new IspData();
            $isp = $ispD->daneISP($ipad);
            return $this->render('IPcheck/ipForm.html.twig', array(
                'ipaddress' => $ipad, 'isp' => $isp
            ));
        }
        else
        {
            $ipad = "Niepoprawny adres IP";
            return $this->render('IPcheck/ipForm.html.twig', array(
                'ipaddress' => $ipad
            ));
        }

        //$number = rand(0, 100);
    }

}
?>