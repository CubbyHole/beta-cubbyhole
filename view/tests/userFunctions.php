<?php
/**
 * Created by PhpStorm.
 * User: Crocell
 * Date: 31/03/14
 * Time: 15:17
 */

$projectRoot = $_SERVER['DOCUMENT_ROOT'].'/Cubbyhole';

require $projectRoot.'/required.php';

$userPdoManager = new UserPdoManager();

echo 'Utilisation du find<br />';
echo '____Retourne uniquement le champ state';
$userFind = $userPdoManager->find(array('state' => 1), array('state' => 0));
var_dump($userFind);

echo '____Retourne en objet';
$userFind = $userPdoManager->find(array('state' => 1));
var_dump($userFind);
echo '----------------------------------------<br />';

echo 'Utilisation du findOne';
$userFindOne = $userPdoManager->findOne($userFind[0], array('_id'));
var_dump($userFindOne);

echo '____equivalent du findById';
$userFindOne = $userPdoManager->findOne(array('_id' => $userFind[0]->getId()));
var_dump($userFindOne);
echo '----------------------------------------<br />';

echo 'Utilisation du findById avec un MongoId en parametre';
$userFoundById = $userPdoManager->findById(new MongoId('53388c1d09413a282e00002a'));
var_dump($userFoundById);

echo 'Utilisation du findById avec une string en parametre';
$userFoundById = $userPdoManager->findById('53388c1d09413a282e00002a');
var_dump($userFoundById);
echo '----------------------------------------<br />';

echo 'Recuperer tous les utilisateurs';
$allUsers = $userPdoManager->findAll();
var_dump($allUsers);
echo '----------------------------------------<br />';

echo 'Utilisation du findAndModify puis create<br />';
$searchQuery = array('lastName' => 'Truc', 'firstName' => 'Alban');
$updateCriteria = array(
    '$set' => array('isAdmin' => true)
);
$fields = array('state' => 1);
$options = array('new' => true); //pour récupérer l'user après modification

echo '____recupere l\'user AVANT modification';
$user = $userPdoManager->findAndModify($searchQuery, $updateCriteria);
var_dump($user);
echo '____------<br />';

echo '____recupere uniquement le champ state (et id qui est obligatoire) APRES modification';
$updatedUser = $userPdoManager->findAndModify($searchQuery, $updateCriteria, $fields, $options);
var_dump($updatedUser);
echo '____------<br />';

$fields = NULL;
$options = array('remove' => true); //supprimera au lieu de faire un update

echo '____user que l\'on supprime';
$result = $userPdoManager->findAndModify($searchQuery, $updateCriteria, $fields, $options);

var_dump($result);
echo '____---------------------<br />';

$user->setState(0);

echo '____Reinsertion de l\'objet precedemment supprime';
$add = $userPdoManager->create($user);
var_dump($add);

echo '----------------------------------------<br />';

echo 'Utilisation du create, affiche true en cas de succes';
$newInsert = array('test' => TRUE);

$createResult = $userPdoManager->create($newInsert);
var_dump($createResult);
echo '----------------------------------------<br />';

echo 'Utilisation de l\'update, affiche true en cas de succes';
$criteria = array('test' => TRUE);
$update = array('$set' => array('number' => (int)500));

$updateResult = $userPdoManager->update($criteria, $update);
var_dump($updateResult); // true si l'update a réussi
echo '----------------------------------------<br />';

echo 'Utilisation du remove, affiche true en cas de succes';
$criteria = array('test' => TRUE);

$removeResult = $userPdoManager->remove($criteria);
var_dump($removeResult);
echo '----------------------------------------<br />';