<?php
/**
 * Récupère le gravatar !
 * @author Kentucky Sato
 * @param $email
 * @since 03/2014
 * @return $url
 */

function get_gravatar($email, $s = 80, $d = 'mm', $r = 'g', $img = false, $atts = array()) {
    $url = 'http://www.gravatar.com/avatar/';
    $url .= md5( strtolower( trim( $email ) ) );
    $url .= "?s=$s&d=$d&r=$r";
    if ( $img ) {
        $url = '<img src="' . $url . '"';
        foreach ( $atts as $key => $val )
            $url .= ' ' . $key . '="' . $val . '"';
        $url .= ' />';
    }
    return $url;
}

/**
 * Chiffre une chaîne de caractères
 * @author Alban Truc
 * @param $string
 * @since 02/2014
 * @return string
 */

function encrypt($string)
{
    return sha1(md5($string));
}

 
