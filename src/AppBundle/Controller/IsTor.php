<?php

namespace AppBundle\Controller;

class IsTor
{
    function IsTorExitPoint($serAddr, $serRemAddr, $serPort)
    {
        function reverseIPOctets($inputip)
        {
            $ipoc = explode(".",$inputip);
            return $ipoc[3].".".$ipoc[2].".".$ipoc[1].".".$ipoc[0];
        }
        if (isset($serAddr))
        {
            if (gethostbyname(reverseIPOctets($serRemAddr) . "." . $serPort . "." . reverseIPOctets($serAddr) . ".ip-port.exitlist.torproject.org") == "127.0.0.2") {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}