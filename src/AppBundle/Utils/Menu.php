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
    function myMenu()
    {
        $url1 = "<?php echo $view['router']->generate('app_ipcheck_show') ?>";
        $url2 = "<?php echo $view['router']->generate('app_ipcheck_show', array('ipad' => ipaddress)) ?>";
        $menu = "<nav>";
        $menu .= "<input type='checkbox' id='mobile-menu-toggle' class='mobile-menu-toggle mobile-menu-toggle-button'>";
        $menu .= "<ul id='plain-menu' class='mobile-toggleable-menu mobile-left'>";
        $menu .= "<li><a href=" .$url1. ">Home</a></li>";
        $menu .= "<li><a href=" .$url2. ">Check other IP</a></li>";
        $menu .= "</ul>";
        $menu .= "<label class='mobile-left mobmenu-toggle' for='mobile-menu-toggle'>+</label>";
        $menu .= "</nav>";
        return $menu;
    }
}