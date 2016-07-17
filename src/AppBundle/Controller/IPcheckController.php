<?php
/**
 * Created by PhpStorm.
 * User: ghost
 * Date: 14.07.16
 * Time: 18:27
 */

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
            return $this->render('IPcheck/show.html.twig', array(
                'ipaddress' => $ipaddress, 'proxy' => $proxy, 'przegladarka' => $przegladarka, 'ips' => $isp
            ));
        }
        return $this->render('IPcheck/show.html.twig', array(
            'ipaddress' => $ipaddress, 'przegladarka' => $przegladarka, 'isp' => $isp
        ));
        //$number = rand(0, 100);
    }

}
?>