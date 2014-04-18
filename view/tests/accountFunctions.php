<?php
/**
 * Created by PhpStorm.
 * User: Crocell
 * Date: 31/03/14
 * Time: 11:48
 *
 * Fichier de tests de fonctions.
 */

$projectRoot = $_SERVER['DOCUMENT_ROOT'].'/Cubbyhole';

require $projectRoot.'/required.php';

$accountPdoManager = new AccountPdoManager();

echo 'Utilisation du find<br />';
echo '____Retourne tous les champs sauf le champ state';
$accountFind = $accountPdoManager->find(array('state' => 1), array('state' => 0));
var_dump($accountFind);

echo '____Retourne en objet';
$accountFind = $accountPdoManager->find(array('state' => 1));
var_dump($accountFind);
echo '----------------------------------------<br />';

echo 'Utilisation du findOne';
$array = array(
    '_id' => new MongoId('52eb602d3263d8b6a4395df3'),
    'state' => 1,
    'idUser' => null,
    'idRefPlan' => new MongoId('52eb5e783263d8b6a4395df1'),
    'storage' => 2,
    'ratio' => 1,
    'startDate' => '01-31-2014',
    'endDate' => 'none'
);
$manualAccount = new Account($array);
$accountFindOne = $accountPdoManager->findOne($manualAccount, array('_id'));
var_dump($accountFindOne);

echo '____equivalent du findById';
$accountFindOne = $accountPdoManager->findOne(array('_id' => $accountFind[0]->getId()));
var_dump($accountFindOne);
echo '----------------------------------------<br />';

echo 'Utilisation du findById avec un MongoId en parametre';
$accountFoundById = $accountPdoManager->findById($accountFind[0]->getId());
var_dump($accountFoundById);

echo 'Utilisation du findById avec une string en parametre';
$accountFoundById = $accountPdoManager->findById((string)$accountFind[0]->getId());
var_dump($accountFoundById);
echo '----------------------------------------<br />';

echo 'Recuperer tous les comptes';
$allAccounts = $accountPdoManager->findAll();
var_dump($allAccounts);
echo '----------------------------------------<br />';

echo 'Utilisation du findAndModify puis create<br />';
$searchQuery = array('state' => 1);
$updateCriteria = array(
    '$set' => array('storage' => (int)2)
);
$fields = array('state' => 1);
$options = array('new' => true); //pour récupérer l'account après modification

echo '____recupere l\'account AVANT modification';
$account = $accountPdoManager->findAndModify($searchQuery, $updateCriteria);
var_dump($account);
echo '____------<br />';

echo '____recupere uniquement le champ state (et id qui est obligatoire) APRES modification';
$updatedAccount = $accountPdoManager->findAndModify($searchQuery, $updateCriteria, $fields, $options);
var_dump($updatedAccount);
echo '____------<br />';

$fields = NULL;
$options = array('remove' => true); //supprimera au lieu de faire un update

echo '____account que l\'on supprime';
$result = $accountPdoManager->findAndModify($searchQuery, $updateCriteria, $fields, $options);

var_dump($result);
echo '____---------------------<br />';

$account->setState(0);

echo '____Reinsertion de l\'objet precedemment supprime';
$add = $accountPdoManager->create($account);
var_dump($add);

echo '----------------------------------------<br />';

echo 'Utilisation du create, affiche true en cas de succes';
$newInsert = array('test' => TRUE);

$createResult = $accountPdoManager->create($newInsert);
var_dump($createResult);
echo '----------------------------------------<br />';

echo 'Utilisation de l\'update, affiche true en cas de succes';
$criteria = array('test' => TRUE);
$update = array('$set' => array('number' => (int)500));

$updateResult = $accountPdoManager->update($criteria, $update);
var_dump($updateResult); // true si l'update a réussi
echo '----------------------------------------<br />';

echo 'Utilisation du remove, affiche true en cas de succes';
$criteria = array('test' => TRUE);

$removeResult = $accountPdoManager->remove($criteria);
var_dump($removeResult);
echo '----------------------------------------<br />';