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

$paymentOK = '';
//récupère le prix du plan en bdd pour une vérification avec Paypal
$refPlan = new RefPlanPdoManager();
$refPrice = $refPlan->findById($custom[1])->getPrice();

if (!$fp)
{

}
else
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
                //Vérifie si le mail du marchant est == au mail du receveur
                if ( $emailAccount == $receiver_email)
                {
                    //Vérifie la somme en bdd et celle enregistré sur Paypal
                    if($refPrice == $payment_amount)
                    {
                        /*
                         * Insertion en bdd du plan acheté (state(1), idUser, prix , date, retour paypal
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

                            //Récupère l'id de l'user qui vient d'acheter, le plan qu'il vient d'acheter, son espace
                            //de stockage, son ratio. Met à jour sa date d'achat et de fin d'abonnement
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
                            // sans le $set, on ferais un delete puis un insert
                            $updateCriteria = array(
                                '$set' => array('idCurrentAccount' => $newAccount['_id'])
                            );

                            //mise a jour de l'idCurrentAccount de l'user qui vient d'acheter
                            $updateUser = $userPdoManager->findAndModify($searchQuery, $updateCriteria, NULL, array('new' => TRUE));

                        }
                        // 1 FindAndModify pour récup le compte actuel: state à 0 + option récup la version modifiée    OK
                        // 2 Insére un nouveau compte avec storage et ratio de l'ancien compte et Id du nouveau refPlan OK
                        // 3 Update de l'idCurrentAccount du user                                                       OK
                        // SI marche, affiche de message, sinon contacter le service technique
                        $paymentOK = 'OK'; //variable paiement à true
                        $_SESSION['paypalOK'] = serialize($paymentOK);


                    }
                }

            }
            else
            {
                // Statut de paiement: Echec
                $paymentPdoManager = new PaymentPdoManager();
                $payment = array(
                    'state' => (int)2,//Code pour un echec du paiement
                    'idUser' => new MongoId($custom[0]),//idUser de l'user qui vient d'acheter l'offre
                    'amount' => $payment_amount,
                    'date' => new MongoDate(),
                    'paypalReturn' => $_POST
                );
                $paymentPdoManager->create($payment);
            }
            exit();
        }
        else if (strcmp ($res, "INVALID") == 0)//INVALID
        {
            // Statut de paiement: Echec
            $paymentPdoManager = new PaymentPdoManager();
            $payment = array(
                'state' => (int)2,//Code pour un echec du paiement
                'idUser' => new MongoId($custom[0]),//idUser de l'user qui vient d'acheter l'offre
                'amount' => $payment_amount,
                'date' => new MongoDate(),
                'paypalReturn' => $_POST
            );
            $paymentPdoManager->create($payment);
        }
    }
    fclose ($fp);
}
?>
<script>
    /*$(document).ready(function(){
        $.ajax({
            url: http://localhost:8081/Cubbyhole/view/pricing.php
            success:function(){
                <?php
                /*$paymentOK = TRUE;
                $_SESSION['paypalOK'] = $paymentOK;*/
                ?>
            },
            error:function(XMLHttpRequest,textStatus, errorThrown){
               alert('error');
            }
        })
    });*/
</script>