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
        $ipad  = isset($_POST['ipad']) ? $_POST['ipad'] : $ipad;
        if(filter_var($ipad, FILTER_VALIDATE_IP))
        {
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
    }
}
?>