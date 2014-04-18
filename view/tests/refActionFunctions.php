<?php
/**
 * Created by PhpStorm.
 * User: Crocell
 * Date: 15/04/14
 * Time: 14:41
 *
 * Fichier de tests de fonctions.
 */

$projectRoot = $_SERVER['DOCUMENT_ROOT'].'/Cubbyhole';

require $projectRoot.'/required.php';

$refActionPdoManager = new RefActionPdoManager();

echo 'Utilisation du find<br />';
echo '____Retourne uniquement le champ state';
    $refActionFind = $refActionPdoManager->find(array('state' => 1), array('state'));
    var_dump($refActionFind);

echo '____Retourne en objet';
    $refActionFind = $refActionPdoManager->find(array('state' => 1));
    var_dump($refActionFind);
echo '----------------------------------------<br />';

echo 'Utilisation du findOne';
    $refActionFindOne = $refActionPdoManager->findOne($refActionFind[0], array('_id'));
    var_dump($refActionFindOne);

    echo '____equivalent du findById';
    $refActionFindOne = $refActionPdoManager->findOne(array('_id' => new MongoId('534d2e2909413aa02a000034')));
    var_dump($refActionFindOne);
echo '----------------------------------------<br />';



echo 'Utilisation du findById avec un MongoId en parametre';
    $refActionFoundById = $refActionPdoManager->findById(new MongoId('534d2e2909413aa02a000034'));
    var_dump($refActionFoundById);

echo 'Utilisation du findById avec une string en parametre';
    $refActionFoundById = $refActionPdoManager->findById('534d2e2909413aa02a000034');
    var_dump($refActionFoundById);
echo '----------------------------------------<br />';

echo 'Recuperer tous les refActions';
    $allActions = $refActionPdoManager->findAll();
    var_dump($allActions);
echo '----------------------------------------<br />';

echo 'Utilisation du findAndModify puis create<br />';
    $searchQuery = array('code' => (int)2111);
    $updateCriteria = array(
        '$set' => array('state' => (int)0)
    );
    $fields = array('state' => 1, 'code' => 1);
    $options = array('new' => true); //pour récupérer le refAction après modification

    echo '____recupere le refAction AVANT modification';
    $refAction = $refActionPdoManager->findAndModify($searchQuery, $updateCriteria);
    var_dump($refAction);
    echo '____------<br />';

    echo '____recupere uniquement les champs state et code (et id qui est obligatoire) APRES modification';
    $updatedAction = $refActionPdoManager->findAndModify($searchQuery, $updateCriteria, $fields, $options);
    var_dump($updatedAction);
    echo '____------<br />';

    $fields = NULL;
    $options = array('remove' => true); //supprimera au lieu de faire un update

    echo '____refAction que l\'on supprime';
    $result = $refActionPdoManager->findAndModify($searchQuery, $updateCriteria, $fields, $options);

    var_dump($result);
    echo '____---------------------<br />';

    echo '____Reinsertion de l\'objet precedemment supprime';
    $add = $refActionPdoManager->create($refAction);
    var_dump($add);

echo '----------------------------------------<br />';

echo 'Utilisation du create, affiche true en cas de succes';
    $newInsert = array('test' => TRUE);

    $createResult = $refActionPdoManager->create($newInsert);
    var_dump($createResult);
echo '----------------------------------------<br />';

echo 'Utilisation de l\'update, affiche true en cas de succes';
    $criteria = array('test' => TRUE);
    $update = array('$set' => array('someNumber' => (int)500));

    $updateResult = $refActionPdoManager->update($criteria, $update);
    var_dump($updateResult); // true si l'update a réussi
echo '----------------------------------------<br />';

echo 'Utilisation du remove, affiche true en cas de succes';
    $criteria = array('test' => TRUE);

    $removeResult = $refActionPdoManager->remove($criteria);
    var_dump($removeResult);
echo '----------------------------------------<br />';