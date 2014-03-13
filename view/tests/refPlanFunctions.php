<?php
/**
 * Created by PhpStorm.
 * User: Crocell
 * Date: 12/03/14
 * Time: 09:50
 *
 * Fichier de tests de fonctions.
 */
$projectRoot = $_SERVER['DOCUMENT_ROOT'].'/Cubbyhole';

require $projectRoot.'/required.php';

$refPlanPdoManager = new RefPlanPdoManager();

/*
$freePlans = $refPlanPdoManager->findFreePlans();
var_dump($freePlans);

$premiumPlans = $refPlanPdoManager->findPremiumPlans();
var_dump($premiumPlans);

$allPlans = $refPlanPdoManager->findAll();
var_dump($allPlans);

*/

/*
//Utilisations du findAndModify
    $searchQuery = array('name' => 'premium');
    $updateCriteria = array(
        '$inc' => array('price' => (int)1),
        '$set' => array('maxRatio' => (int)51)
    );
    $fields = array('price' => 1, 'maxRatio' => 1);
    $options = array('new' => true); //pour récupérer le refPlan après modification

    //récupèrera le plan avant modification
    $plan = $refPlanPdoManager->findAndModify($searchQuery, $updateCriteria);
    var_dump($plan);

    //récupèrera uniquement les champs price et maxRatio (et id qui est obligatoire) après modification
    $updatedPlan = $refPlanPdoManager->findAndModify($searchQuery, $updateCriteria, $fields, $options);
    var_dump($updatedPlan);

    $fields = NULL;
    $options = array('remove' => true); //supprimera au lieu de faire un update

    $result = $refPlanPdoManager->findAndModify($searchQuery, $updateCriteria, $fields, $options);

    var_dump($result);

    $plan->setBandwidth('test');

    $add = $refPlanPdoManager->create($plan);

    var_dump($add);
*/

/*
//Utilisation de l'update
    $update = array('$set' => array('maxRatio' => (int)500));

    $updateResult = $refPlanPdoManager->update($criteria, $update);

    var_dump($updateResult); // true si l'update a réussi
*/