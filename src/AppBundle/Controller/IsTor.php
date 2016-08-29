<?php

namespace AppBundle\Controller;



class IsTor
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
}