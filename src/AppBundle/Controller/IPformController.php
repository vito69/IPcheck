<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use AppBundle\Utils\IspData;

class IPformController extends Controller
{
    /**
     * @Route("/checking/{ipad}")
     */
    public function showAction($ipad)
    {
        if (isset($_POST['ipad']))
        {
            $ipad = $_POST['ipad'];
            unset($_POST['ipad']);
            return $this->redirectToRoute('app_ipform_show', array('ipad'=> $ipad));
        }

        if(filter_var($ipad, FILTER_VALIDATE_IP))
        {
            $ispD = new IspData();
            $isp = $ispD->daneISP($ipad);
            return $this->render('IPcheck/ipForm.html.twig', array(
                'ipaddress' => $ipad, 'isp' => $isp
            ));
        }
        elseif(filter_var($ipad, FILTER_VALIDATE_URL))
        {
            $ipad = gethostbyname($ipad);
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