<?php
/**
 * Created by PhpStorm.
 * User: ghost
 * Date: 15.08.16
 * Time: 13:58
 */

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class IsTor extends Controller
{
    /**
     * @Route("/")
     */
    public function showTor()
    {
        function isTorExitPoint()
        {
            if (isset($_SERVER['SERVER_ADDR'])) {
                if (gethostbyname(reverseIPOctets($_SERVER['REMOTE_ADDR']) . "." . $_SERVER['SERVER_PORT'] . "." . reverseIPOctets($_SERVER['SERVER_ADDR']) . ".ip-port.exitlist.torproject.org") == "127.0.0.2") {
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        }
        function reverseIPOctets($inputip)
        {
            $ipoc = explode(".", $inputip);
            return $ipoc[3] . "." . $ipoc[2] . "." . $ipoc[1] . "." . $ipoc[0];
        }

        if (isTorExitPoint())
        {
            $tor = 'yes';
        }
        else
        {
            $tor = 'no';
        }
        return $tor;
    }
}