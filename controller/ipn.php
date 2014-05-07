<?php
/**
 * Created by PhpStorm.
 * User: Ken
 * Date: 07/05/14
 * Time: 21:16
 */
include_once '../required.php';


//permet de traiter le retour ipn de paypal
//Compte pour recevoir le paiement
session_start();
$email_account = "naindrag@orange.fr";
$req = 'cmd=_notify-validate';

foreach ($_POST as $key => $value) {
    $value = urlencode(stripslashes($value));
    $req .= "&$key=$value";
}

//Renvoie au systeme Paypal pour validation
$header = "POST /cgi-bin/webscr HTTP/1.0\r\n";
$header .= "Content-Type: application/x-www-form-urlencoded\r\n";
$header .= "Content-Length: " . strlen($req) . "\r\n\r\n";

//$hostname, port, errno, errstr, timeout
$fp = fsockopen ('ssl://www.sandbox.paypal.com', 443, $errno, $errstr, 30);


$item_name = $_POST['item_name'];
$item_number = $_POST['item_number'];
$payment_status = $_POST['payment_status'];
$payment_amount = $_POST['mc_gross'];
$payment_currency = $_POST['mc_currency'];
$payment_date = $_POST['payment_date'];
$txn_id = $_POST['txn_id'];
$receiver_email = $_POST['receiver_email'];
$payer_email = $_POST['payer_email'];
parse_str($_POST['custom'],$custom);

$allPost = array('item_name' => $item_name,
                 'item_number' => $item_number,
                 'payment_status' => $payment_status,
                 'payment_amount' => $payment_amount,
                 'payment_currency' => $payment_currency,
                 'txn_id' => $txn_id,
                 'receiver_email' => $receiver_email,
                 'payer_email' => $payer_email);

if ( $payment_status == "Completed") {
    if ( $email_account == $receiver_email )
    {
        /**
         * C'EST LA QUE TOUT SE PASSE
         * PS : tjrs penser à vérifier la somme !!
         */
        $filename = 'log.php';
        file_put_contents($filename, print_r($_POST, true));
        $_SESSION['paypal'] = $allPost;
        //var_dump($_POST);
        //$result = AbstractPdoManager::__create('validation', array('item' => $item_name));


    }
}
