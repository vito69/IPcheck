<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

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

        $fp = file_get_contents("http://rest.db.ripe.net/search.xml?query-string=".$_SERVER['REMOTE_ADDR']."&flags=no-filtering");
        if($fp) {
            $xml = simplexml_load_string($fp);
            $isp = "";
            foreach($xml->objects->object as $object){
                $isp .= "<div class='well'>";
                foreach($object->attributes->attribute as $attribute){
                    $isp .= $attribute->attributes()->name.' - '.$attribute->attributes()->value."<br/>";
                }
                $isp .= "</div>";
            }
        }
        if (isset($_SERVER['HTTP_X_FORWARDED_FOR']) && ($_SERVER['HTTP_X_FORWARDED_FOR']!= $_SERVER['REMOTE_ADDR'])) {
            $proxy = $_SERVER['HTTP_X_FORWARDED_FOR'];
        }
        function IsTorExitPoint()
        {
            function reverseIPOctets($inputip)
            {
                $ipoc = explode(".",$inputip);
                return $ipoc[3].".".$ipoc[2].".".$ipoc[1].".".$ipoc[0];
            }
            if (isset($_SERVER['SERVER_ADDR']))
            {
                if (gethostbyname(reverseIPOctets($_SERVER['REMOTE_ADDR']) . "." . $_SERVER['SERVER_PORT'] . "." . reverseIPOctets($_SERVER['SERVER_ADDR']) . ".ip-port.exitlist.torproject.org") == "127.0.0.2") {
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        }

        (IsTorExitPoint()==true) ? $tor = 'yes' : $tor = 'no';

        return $this->render('IPcheck/show.html.twig', array(
            'ipaddress' => $ipaddress, 'przegladarka' => $przegladarka, 'isp' => $isp, 'tor' => $tor,
            'dokumenty' => $dokumenty, 'jezyki' => $jezyki, 'kodowanie' => $kodowanie, 'ciastka' => $ciastka
        ));
        //$number = rand(0, 100);
    }

}
?>