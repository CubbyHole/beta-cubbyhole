<?php
/**
 * Récupère le gravatar correspondant
 * @author Kentucky Sato
 * @param $email
 * @param int $size
 * @param string $default
 * @param string $rating
 * @param bool $img
 * @param array $atts
 * @return string
 */

function get_gravatar($email, $size = 50, $default = 'mm', $rating = 'g', $img = false, $atts = array()) {
    //Pour la doc
    //https://fr.gravatar.com/site/implement/images/
    $url = 'http://www.gravatar.com/avatar/';
    $url .= md5( strtolower( trim( $email ) ) ); //http://www.php.net/manual/fr/function.strtolower.php
    $url .= "?s=$size&d=$default&r=$rating";
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

 
