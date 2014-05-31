<?php
/**
 * Created by PhpStorm.
 * User: Ken
 * Date: 27/05/14
 * Time: 00:55
 */
session_start();
$projectRoot = $_SERVER['DOCUMENT_ROOT'].'/Cubbyhole';
include $projectRoot.'/required.php';


//permet de traiter le retour ipn de paypal
//Compte pour recevoir le paiement

$emailAccount = "naindrag@orange.fr";
$req = 'cmd=_notify-validate';

foreach ($_POST as $key => $value)
{
    $value = urlencode(stripslashes($value));
    $req .= "&$key=$value";
}

//Renvoie au systeme Paypal pour validation
$header = "POST /cgi-bin/webscr HTTP/1.0\r\n";
$header .= "Host: www.sandbox.paypal.com\r\n";
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
$custom = explode('|',$_POST['custom']);//parse du champ custom, pour l'instant idUser | idRefPlan

if (!$fp)
{

} else
{
    fputs ($fp, $header . $req);
    while (!feof($fp))
    {
        $res = fgets ($fp, 1024);
        if (strcmp ($res, "VERIFIED") == 0)
        {
            // vérifier que payment_status a la valeur Completed
            if ( $payment_status == "Completed")
            {
                if ( $emailAccount == $receiver_email)
                {
                    /**
                     * C'EST LA QUE TOUT SE PASSE
                     * PS : tjrs penser à vérifier la somme !!
                     */
                    $paymentPdoManager = new PaymentPdoManager();
                    $payment = array(
                        'state' => (int)1,
                        'idUser' => new MongoId($custom[0]),//idUser de l'user qui vient d'acheter l'offre
                        'amount' => $payment_amount,
                        'date' => new MongoDate(),
                        'paypalReturn' => $_POST
                    );
                    $paymentPdoManager->create($payment);

                    /*
                    * Récupère le compte actuel
                    */
                    $accountPdoManager = new AccountPdoManager();
                    $criteria = array(
                        'state' => (int)1,
                        'idUser' => new MongoId($custom[0])//idUser de l'user qui vient d'acheter l'offre
                    );
                    $account = $accountPdoManager->findAndModify($criteria, array('state' => (int)0), NULL, array('new' => TRUE));

                    /*Si le compte existe*/
                    if($account instanceof Account)
                    {
                        $time = time();
                        $end = $time + (30 * 24 * 60 * 60); // + 30 jours

                        //$newAccount['_id'];

                        $newAccount = array(
                            '_id' => new MongoId(),
                            'state' => (int)1,
                            'idUser' => new MongoId($custom[0]), //id de l'user qui vien d'acheter l'offre
                            'idRefPlan' => new MongoId($custom[1]), //id du plan acheté
                            'storage' => $account->getStorage(),
                            'ratio' => $account->getRatio(),
                            'startDate' => new MongoDate($time),
                            'endDate' => new MongoDate($end)
                        );
                        $accountPdoManager->create($newAccount);

                        $userPdoManager = new UserPdoManager();

                        //critères de recherche
                        $searchQuery = array(
                            //'state' => (int)1,
                            '_id' => new MongoId($custom[0]) //idUser de l'user qui vient d'acheter l'offre
                        );

                        //les modifications à réaliser
                        //en mettant un $set, on change uniquement le champ voulu
                        // sans le $set, on ferais un delte puis un insert
                        $updateCriteria = array(
                            '$set' => array('idCurrentAccount' => $newAccount['_id'])
                        );

                        //mise a jour de l'idCurrentAccount de l'user qui vient d'acheter
                        //$updateUser = $userPdoManager->findAndModify($searchQuery, $updateCriteria,array('idCurrentAccount' => $newAccount['_id'] ),array('new' => TRUE));
                        $updateUser = $userPdoManager->findAndModify($searchQuery, $updateCriteria, NULL, array('new' => TRUE));

                    }

                    // 1 FindAndModify pour récup le compte actuel: state à 0 + option récup la version modifiée
                    // 2 Insére un nouveau compte avec storage et ratio de l'ancien compte et Id du nouveau refPlan
                    // 3 Update de l'idCurrentAccount du user
                    // SI marche, affiche de message, sinon contacter le service technique

                    //$filename = 'log.php';
                    //file_put_contents($filename, print_r($_POST, true));

                    //var_dump($_POST);
                    //$result = AbstractPdoManager::__create('validation', array('item' => $item_name));
                }
            }
            else
            {
                // Statut de paiement: Echec
            }
            exit();
        }
        else if (strcmp ($res, "INVALID") == 0)
        {
            // Transaction invalide
        }
    }
    fclose ($fp);
}