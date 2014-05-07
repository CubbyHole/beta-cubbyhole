<?php
/**
 * Récupère le gravatar correspondant en fonction de l'adresse mail.
 *
 * @author Kentucky Sato
 * @param string $email=> l'adresse mail
 * @param string $size=> Taille en pixel, valeur par defaut à 80px [ 1 - 2048 ]
 * @param string $default=> Image par defaut [ 404 | mm | identicon | monsterid | wavatar ]
 * @param string $rating=> Note Maximum [ g | pg | r | x ]
 * @param boole $img=> True => retourne l'image complete, False=> retourne l'URL
 * @param array $atts=> Optionnel, Attribut pour l'inclusion d' tag img
 * @return Chaîne contenant seulement une URL ou un tag d'image complète
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

function _cleanInput($data)
{

    $search = array(
        '@<script[^>]*?>.*?</script>@si',   // Retire code Javascript
        '@<[\/\!]*?[^<>]*?>@si',            // Retire code HTML
        '@<style[^>]*?>.*?</style>@siU',    // Retire code CSS
        '@<![\s\S]*?--[ \t\n\r]*>@'         // Retire les lignes de commentaires multiples
    );

    $output = preg_replace($search, '', $data);

    return $output;
}

/**
 * Pour protéger la base de données. Fait appel à cleanInput($data) si $data n'est pas un tableau.
 * @author Alban Truc
 * @param array|string $data Données envoyées
 * @since 19/02/2014
 * @return array|mixed Données nettoyées
 */

function _sanitize($data)
{
    $clean_input = Array();

    if (is_array($data))
    {
        foreach ($data as $key => $value)
            $clean_input[$key] = _sanitize($value);
    }
    else
    {
        if(get_magic_quotes_gpc())
            $data = trim(stripslashes($data));

        $data = trim(strip_tags($data));
        $clean_input = _cleanInput($data);
    }

    return $clean_input;
}