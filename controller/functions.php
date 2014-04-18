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

function getGravatar($email, $size = 50, $default = 'mm', $rating = 'g', $img = false, $atts = array())
{
    $url = 'http://www.gravatar.com/avatar/';
    $url.= md5( strtolower( trim( $email ) ) );//http://www.php.net/manual/en/function.strtolower.php
    $url.= "?s=$size&d=$default&r=$rating";

    if ( $img )
    {
        $url = '<img src="' . $url . '"';
        foreach ( $atts as $key => $val )
            $url .= ' ' . $key . '="' . $val . '"';
        $url .= ' />';
    }

    return $url;
}

function setMailHeader($boundary, $fromName = 'Cubbyhole', $fromMail = 'no-reply@cubbyhole.com', $contentType = 'multipart/alternative')
{
    $header = "From: \"$fromName\"<".$fromMail.">\n";
    $header.= "Reply-to: \"$fromName\"<".$fromMail.">\n";
    $header.= "MIME-Version: 1.0\n";
    $header.= "Content-Type: ".$contentType.";\n boundary=\"$boundary\"\n";

    return $header;
}

function setMailContent($boundary, $html, $text = NULL, $htmlCharset = 'UTF-8', $textCharset = 'UTF-8', $htmlEncoding = '8bit', $textEncoding = '8bit')
{
    $message = "\n--".$boundary."\n";

    //Ajout du message au format texte.
    if($text !== NULL)
    {
        $message.= "Content-Type: text/plain; charset=\"$textCharset\"\n";
        $message.= "Content-Transfer-Encoding: ".$textEncoding."\n";
        $message.= "\n".$text."\n";

        $message.= "\n--".$boundary."\n";
    }

    //Ajout du message au format HTML
    $message.= "Content-Type: text/html; charset=\"$htmlCharset\"\n";
    $message.= "Content-Transfer-Encoding: ".$htmlEncoding."\n";
    $message.= "\n".$html."\n";

    $message.= "\n--".$boundary."--\n";
    $message.= "\n--".$boundary."--\n";

    return $message;
}

function sendMail($recipient, $subject, $message, $header)
{
    // On filtre les serveurs qui rencontrent des bogues.
    if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $recipient))
    {
        str_replace("\n", "\r\n", $header);
        str_replace("\n", "\r\n", $message);
    }

    return mail($recipient, $subject, $message, $header);
}
