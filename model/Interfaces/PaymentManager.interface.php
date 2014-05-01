<?php
/**
 * Created by PhpStorm.
 * User: Crocell
 * Date: 23/04/14
 * Time: 15:46
 */

/**
 * Interface PaymentManagerInterface
 * @interface
 * @author Alban Truc
 */
interface PaymentManagerInterface
{
    /**
     * Retrouver un paiement selon des critères donnés
     * @author Alban Truc
     * @param array|Payment $criteria critères de recherche
     * @param array $fieldsToReturn champs à récupérer
     * @since 23/04/2014
     * @return array|Payment[]
     */

    function find($criteria, $fieldsToReturn = array());

    /**
     * Retourne le premier paiement correspondant au(x) critère(s) donné(s)
     * @author Alban Truc
     * @param array|Payment $criteria critère(s) de recherche
     * @param array $fieldsToReturn champs à retourner
     * @since 29/03/2014
     * @return array|Payment
     */

    function findOne($criteria, $fieldsToReturn = array());

    /**
     * - Retrouver un paiement par son ID.
     * - Gestion des exceptions et des erreurs
     * @author Alban Truc
     * @param string|MongoId $id Identifiant unique du paiement à trouver
     * @param array $fieldsToReturn champs à retourner
     * @since 02/2014
     * @return Payment|array contenant le message d'erreur
     */

    function findById($id, $fieldsToReturn = array());

    /**
     * - Retrouver l'ensemble des paiements
     * - Gestion des exceptions et des erreurs
     * @author Alban Truc
     * @param array $fieldsToReturn champs à retourner
     * @since 11/03/2014
     * @return array|Payment[]
     */

    function findAll($fieldsToReturn = array());

    /**
     * - Retrouver un paiement selon certains critères et le modifier/supprimer
     * - Récupérer ce paiement ou sa version modifiée
     * - Gestion des exceptions et des erreurs
     * @author Alban Truc
     * @param array|Payment $searchQuery critères de recherche
     * @param array|Payment $updateCriteria les modifications à réaliser
     * @param array|NULL $fieldsToReturn pour ne récupérer que certains champs
     * @param array|NULL $options
     * @since 11/03/2014
     * @return array|Payment
     */

    function findAndModify($searchQuery, $updateCriteria, $fieldsToReturn = NULL, $options = NULL);

    /**
     * - Ajoute un paiement en base de données
     * - Gestion des exceptions et des erreurs
     * @author Alban Truc
     * @param array|Payment $document
     * @param array $options
     * @since 12/03/2014
     * @return TRUE|array contenant le message d'erreur dans un indexe 'error'
     */

    function create($document, $options = array('w' => 1));

    /**
     * Fonction d'update utilisant celle de {@see AbstractPdoManager}
     * @author Alban Truc
     * @param array|Payment $criteria description des entrées à modifier
     * @param array|Payment $update nouvelles valeurs
     * @param array|NULL $options
     * @since 11/03/2014
     * @return TRUE|array contenant le message d'erreur dans un indexe 'error'
     */

    function update($criteria, $update, $options = array('w' => 1));

    /**
     * - Supprime un/des paiement(s) correspondant à des critères données
     * - Gestion des exceptions et des erreurs
     * @author Alban Truc
     * @param array|Payment $criteria ce qu'il faut supprimer
     * @param array $options
     * @since 11/03/2014
     * @return TRUE|array contenant le message d'erreur dans un indexe 'error'
     */

    function remove($criteria, $options = array('w' => 1));
}