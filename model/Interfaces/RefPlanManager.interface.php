<?php
/**
 * Created by Notepad++.
 * User: Alban Truc
 * Date: 31/01/14
 * Time: 12:52
 */

interface RefPlanManagerInterface
{
    /**
     * - Retrouver un refPlan par son ID.
     * - Gestion des erreurs.
     * @author Alban Truc
     * @param string|MongoId $id Identifiant unique du refPlan à trouver
     * @since 02/2014
     * @return RefPlan|array contenant le message d'erreur
     */

    function findById($id);

    /**
     * - Retrouver le(s) refPlan gratuit(s), soit par son nom (free) soit par son prix de 0
     * - Gestion des erreurs
     * @author Alban Truc
     * @since 11/03/2014
     * @return RefPlan[] tableau d'objets RefPlan
     */

    function findFreePlans();

    /**
     * - Retrouver le(s) refPlan payants, à savoir ceux dont le prix est > à 0
     * - Gestion des erreurs
     * @author Alban Truc
     * @since 11/03/2014
     * @return RefPlan[] tableau d'objets RefPlan
     */

    function findPremiumPlans();

    /**
     * - Retrouver l'ensemble des refPlan
     * - Gestion des erreurs
     * @author Alban Truc
     * @since 11/03/2014
     * @return RefPlan[] tableau d'objets RefPlan
     */

    function findAll();

    /**
     * Inspiré de la méthode findAndModify: http://www.php.net/manual/en/mongocollection.findandmodify.php
     * - Retrouver un RefPlan selon certains critères et le modifier/supprimer
     * - Récupérer ce RefPlan ou sa version modifiée
     * - Gestion des exceptions MongoResultException: http://www.php.net/manual/en/class.mongoresultexception.php
     * @author Alban Truc
     * @param array $searchQuery critères de recherche
     * @param array $updateCriteria les modifications à réaliser
     * @param array|NULL $fields pour ne récupérer que certains champs
     * @param array $options voir le lien php.net pour la liste des options
     * @since 11/03/2014
     * @return RefPlan
     */

    function findAndModify($searchQuery, $updateCriteria, $fields = NULL, $options);

    /**
     * - Ajoute un refPlan en base de données
     * - Gestion des exceptions MongoCursor: http://www.php.net/manual/en/class.mongocursorexception.php
     * - Gestion des erreurs
     * @author Alban Truc
     * @param array|RefPlan $refPlan
     * @since 12/03/2014
     * @return TRUE|array contenant le message d'erreur dans un indexe 'error'
     */

    function create($refPlan);

    /**
     * - Fonction d'update inspirée de http://www.php.net/manual/en/mongocollection.update.php
     * - Gestion des erreurs
     * - Gestion des exceptions MongoCursor: http://www.php.net/manual/en/class.mongocursorexception.php
     * @author Alban Truc
     * @param array $criteria description des entrées à modifier
     * @param array $update
     * @param array|NULL $options
     * @since 11/03/2014
     * @return TRUE|array contenant le message d'erreur dans un indexe 'error'
     */

    function update($criteria, $update, $options = array('w' => 1));

    /**
     * - Supprime un plan à partir de son ID
     * - Gestion des erreurs
     * - Gestion des exceptions MongoCursor: http://www.php.net/manual/en/class.mongocursorexception.php
     * @author Alban Truc
     * @param string|MongoId $id
     * @since 11/03/2014
     * @return TRUE|array contenant le message d'erreur dans un indexe 'error'
     */

    function removeById($id);
}
?>