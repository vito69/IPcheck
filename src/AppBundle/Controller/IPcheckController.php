<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use AppBundle\Utils\IsTor;
use AppBundle\Utils\IspData;

class IPcheckController extends Controller
{
    /**
     * @Route("/")
     */
    public function showAction()
    {
        $ipaddress = $_SERVER['REMOTE_ADDR'];
        if (isset($_SERVER['HTTP_USER_AGENT'])){
            $przegladarka = $_SERVER['HTTP_USER_AGENT'];
        }
        if (isset($_SERVER['HTTP_ACCEPT'])){
            $dokumenty = $_SERVER['HTTP_ACCEPT'];
        }
        if (isset($_SERVER['HTTP_ACCEPT_LANGUAGE'])){
            $jezyki = $_SERVER['HTTP_ACCEPT_LANGUAGE'];
        }
        if (isset($_SERVER['HTTP_ACCEPT_ENCODING'])){
            $kodowanie = $_SERVER['HTTP_ACCEPT_ENCODING'];
        }
        if (isset($_SERVER['HTTP_COOKIE'])){
            $ciastka = str_replace(";", "</li><li>", $_SERVER['HTTP_COOKIE']);
        }
        if (isset($_SERVER['HTTP_X_FORWARDED_FOR']) && ($_SERVER['HTTP_X_FORWARDED_FOR']!= $_SERVER['REMOTE_ADDR'])) {
            $proxy = $_SERVER['HTTP_X_FORWARDED_FOR'];
        }

        $ispD = new IspData();
        $isp = $ispD -> daneISP($ipaddress);

        $torr = new IsTor();
        ($torr -> isTorExitPoint($_SERVER['SERVER_ADDR'], $_SERVER['REMOTE_ADDR'], $_SERVER['SERVER_PORT'])==true) ? $tor = 'yes' : $tor = 'no';

        return $this->render('IPcheck/show.html.twig', array(
            'ipaddress' => $ipaddress, 'przegladarka' => $przegladarka, 'isp' => $isp, 'tor' => $tor,
            'dokumenty' => $dokumenty, 'jezyki' => $jezyki, 'kodowanie' => $kodowanie, 'ciastka' => $ciastka
        ));
        //$number = rand(0, 100);
    }

}
?>