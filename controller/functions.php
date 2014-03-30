<?php
/**
 * Récupère le gravatar correspondant en fonction de l'adresse mail.
 *
 * @author Kentucky Sato
 * @param string $email l'adresse mail
 * @param string $size Taille en pixel, valeur par defaut à 80px [ 1 - 2048 ]
 * @param string $default Image par defaut [ 404 | mm | identicon | monsterid | wavatar ]
 * @param string $rating Maximum rating (inclusive) [ g | pg | r | x ]
 * @param boole $img True => retourne l'image complete, False=> retourne l'URL
 * @param array $atts Optional, additional key/value attributes to include in the IMG tag
 * @return String containing either just a URL or a complete image tag
 * @source http://gravatar.com/site/implement/images/php/
 */

function getGravatar($email, $size = 50, $default = 'mm', $rating = 'g', $img = false, $atts = array()) {


    $url = 'http://www.gravatar.com/avatar/';
    $url .= md5( strtolower( trim( $email ) ) );//http://www.php.net/manual/en/function.strtolower.php
    $url .= "?s=$size&d=$default&r=$rating";

    if ( $img )
    {
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

 
