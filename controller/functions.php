<?php
/**
 * Get either a Gravatar URL or complete image tag for a specified email address.
 *
 * @author Kentucky Sato
 * @param string $email The email address
 * @param string $size Size in pixels, defaults to 80px [ 1 - 2048 ]
 * @param string $default Default imageset to use [ 404 | mm | identicon | monsterid | wavatar ]
 * @param string $rating Maximum rating (inclusive) [ g | pg | r | x ]
 * @param boole $img True to return a complete IMG tag False for just the URL
 * @param array $atts Optional, additional key/value attributes to include in the IMG tag
 * @return String containing either just a URL or a complete image tag
 * @source http://gravatar.com/site/implement/images/php/
 */

function getGravatar($email, $size = 50, $default = 'mm', $rating = 'g', $img = false, $atts = array()) {


    $url = 'http://www.gravatar.com/avatar/';
    $url .= md5( strtolower( trim( $email ) ) ); //http://www.php.net/manual/en/function.strtolower.php
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

 
