<?php

namespace AppBundle\Utils;


class IspData
{
    function daneISP($serRemAddr)
    {
        @$fp = file_get_contents("http://rest.db.ripe.net/search.xml?query-string=" . $serRemAddr . "&flags=no-filtering");
        if ($fp) {
            $xml = simplexml_load_string($fp);
            $isp = "";
            foreach ($xml->objects->object as $object) {
                $isp .= "<div class='well'>";
                foreach ($object->attributes->attribute as $attribute) {
                    $isp .= $attribute->attributes()->name . ' - ' . $attribute->attributes()->value . "<br/>";
                }
                $isp .= "</div>";
            }
        }
        return $isp;
    }
}