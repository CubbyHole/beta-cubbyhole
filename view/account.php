<?php 
include '../header/account.header.php'; 


//On veut pouvoir afficher les infos de l'user en cours
$users_collection = $mongo->get_collection('USER');
$account_collection = $mongo->get_collection('ACCOUNT');
//Recherche par id  
$users = $user_collection->findOne(array('_id' => $id));
?>
<div id="showcase">

    <div class="container">
        <?php
        $passage_ligne = '\r\n';

        if($_SESSION == true)
        {
            echo 'Bienvenue :' . $_SESSION['mail'];
            $passage_ligne;
            echo 'Nom :' . $users['nom'];
        }
        ?>

    </div>
            

<?php include '../footer/footer.php'; ?>