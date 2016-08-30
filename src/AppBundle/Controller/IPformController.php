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
        if(preg_match('^0*(25[0-5]|2[0-4]\d|1?\d\d?)(\.0*(25[0-5]|2[0-4]\d|1?\d\d?)){3}$', $ipad))
        {
            $ispD = new IspData();
            $isp = $ispD->daneISP($ipad);
            return $this->render('IPcheck/ipForm.html.twig', array(
                'ipaddress' => $ipad, 'isp' => $isp
            ));
        }
        //$number = rand(0, 100);
    }

}
?>