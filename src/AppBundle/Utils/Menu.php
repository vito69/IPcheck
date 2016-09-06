<?php
/**
 * Created by PhpStorm.
 * User: ghost
 * Date: 06.09.16
 * Time: 12:42
 */

namespace AppBundle\Utils;


class Menu
{
    public function myMenu()
    {
        //$url[1] = ('app_ipform_show', array('ipad' => ipaddress));
        $url[0] = "{{ path('app_ipform_show') }}";
        $url[1] = "{{ path('app_ipform_show', {'ipad': ipaddress}) }}";
        $menu = "<nav><input type='checkbox' id='mobile-menu-toggle' class='mobile-menu-toggle mobile-menu-toggle-button'><ul id='plain-menu' class='mobile-toggleable-menu mobile-left'>";
        $menu .= "<li><a href=\"" .$url[0]. "\">Home</a></li>";
        $menu .= "<li><a href=\"" .$url[1]. "\">Check other IP</a></li>";
        $menu .= "</ul><label class='mobile-left mobmenu-toggle' for='mobile-menu-toggle'>+</label></nav>";
        return $menu;
    }
}