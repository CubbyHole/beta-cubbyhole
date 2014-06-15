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


echo 'Utilisation du find<br />';
echo '____Retourne uniquement le champ state';
    $refPlanFind = $refPlanPdoManager->find(array('state' => 1), array('state'));
    var_dump($refPlanFind);

echo '____Retourne en objet';
    $refPlanFind = $refPlanPdoManager->find(array('state' => 1));
    var_dump($refPlanFind);
echo '----------------------------------------<br />';

echo 'Utilisation du findOne';
    $refPlanFindOne = $refPlanPdoManager->findOne($refPlanFind[0], array('_id'));
    var_dump($refPlanFindOne);

    echo '____equivalent du findById';
    $refPlanFindOne = $refPlanPdoManager->findOne(array('_id' => new MongoId('52eb5e743263d8b6a4395df0')));
    var_dump($refPlanFindOne);
echo '----------------------------------------<br />';



echo 'Utilisation du findById avec un MongoId en parametre';
    $refPlanFoundById = $refPlanPdoManager->findById(new MongoId('52eb5e743263d8b6a4395df0'));
    var_dump($refPlanFoundById);

echo 'Utilisation du findById avec une string en parametre';
    $refPlanFoundById = $refPlanPdoManager->findById('52eb5e743263d8b6a4395df0');
    var_dump($refPlanFoundById);
echo '----------------------------------------<br />';



echo 'Retrouver les plans gratuits';
    $freePlans = $refPlanPdoManager->findFreePlans();
    var_dump($freePlans);
echo '----------------------------------------<br />';



echo 'Retrouver les plans premium';
    $premiumPlans = $refPlanPdoManager->findPremiumPlans();
    var_dump($premiumPlans);
echo '----------------------------------------<br />';



echo 'Recuperer tous les plans';
    $allPlans = $refPlanPdoManager->findAll();
    var_dump($allPlans);
echo '----------------------------------------<br />';



echo 'Utilisation du findAndModify puis create<br />';
    $searchQuery = array('name' => 'Pro');
    $updateCriteria = array(
        '$inc' => array('price' => (int)1),
        '$set' => array('maxRatio' => (int)51)
    );
    $fields = array('price' => 1, 'maxRatio' => 1);
    $options = array('new' => true); //pour récupérer le refPlan après modification

    echo '____recupere le plan AVANT modification';
    $plan = $refPlanPdoManager->findAndModify($searchQuery, $updateCriteria);
    var_dump($plan);
    echo '____------<br />';

    echo '____recupere uniquement les champs price et maxRatio (et id qui est obligatoire) APRES modification';
    $updatedPlan = $refPlanPdoManager->findAndModify($searchQuery, $updateCriteria, $fields, $options);
    var_dump($updatedPlan);
    echo '____------<br />';

    $fields = NULL;
    $options = array('remove' => true); //supprimera au lieu de faire un update

    echo '____plan que l\'on supprime';
    $result = $refPlanPdoManager->findAndModify($searchQuery, $updateCriteria, $fields, $options);

    var_dump($result);
    echo '____---------------------<br />';

    $plan->setDownloadSpeed(5000);

    echo '____Reinsertion de l\'objet precedemment supprime';
    $add = $refPlanPdoManager->create($plan);
    var_dump($add);

echo '----------------------------------------<br />';

echo 'Utilisation du create, affiche true en cas de succes';
    $newInsert = array('test' => TRUE);

    $createResult = $refPlanPdoManager->create($newInsert);
    var_dump($createResult);
echo '----------------------------------------<br />';

echo 'Utilisation de l\'update, affiche true en cas de succes';
    $criteria = array('test' => TRUE);
    $update = array('$set' => array('maxRatio' => (int)500));

    $updateResult = $refPlanPdoManager->update($criteria, $update);
    var_dump($updateResult); // true si l'update a réussi
echo '----------------------------------------<br />';

echo 'Utilisation du remove, affiche true en cas de succes';
    $criteria = array('test' => TRUE);

    $removeResult = $refPlanPdoManager->remove($criteria);
    var_dump($removeResult);
echo '----------------------------------------<br />';