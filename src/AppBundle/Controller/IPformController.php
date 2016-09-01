<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use AppBundle\Utils\IspData;

class IPformController extends Controller
{
    /**
     * @Route("/sprawdzanieIP")
     */
    public function showAction()
    {
        $ipad  = isset($_POST['ipad']) ? $_POST['ipad'] : "Wpisz poprawny adres IP.";
        if(filter_var($ipad, FILTER_VALIDATE_IP) || filter_var($ipad, FILTER_VALIDATE_URL))
        {
            $ispD = new IspData();
            $isp = $ispD->daneISP($ipad);
            return $this->render('IPcheck/ipForm.html.twig', array(
                'ipaddress' => $ipad, 'isp' => $isp
            ));
        }
        else
        {
            $ipad = "Wpisz poprawny adres IP.";
            return $this->render('IPcheck/ipForm.html.twig', array(
                'ipaddress' => $ipad
            ));
        }
    }
}
?>