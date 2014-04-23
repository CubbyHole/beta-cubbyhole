<?php
/**
 * Created by PhpStorm.
 * User: Crocell
 * Date: 23/04/14
 * Time: 16:02
 */

/** @var string $projectRoot chemin du projet dans le système de fichier */
$projectRoot = $_SERVER['DOCUMENT_ROOT'].'/Cubbyhole';

require_once $projectRoot.'/required.php';

/**
 * Class PaymentPdoManager
 * @author Alban Truc
 */
class PaymentPdoManager extends AbstractPdoManager implements PaymentManagerInterface{

    /** @var MongoCollection $paymentCollection collection paiement */
    protected $paymentCollection;

    /** @var  UserPdoManager $userPdoManager instance de cette classe */
    protected $userPdoManager;

    /**
     * Constructeur:
     * - Appelle le constructeur de {@see AbstractPdoManager::__construct} (gestion des accès de la BDD).
     * - Initialise la collection paiement.
     * @author Alban Truc
     * @since 01/2014
     */

    public function __construct()
    {
        parent::__construct();
        $this->paymentCollection = $this->getCollection('payment');

        $this->userPdoManager = new UserPdoManager();
    }

    /**
     * Retrouver un paiement selon des critères donnés
     * @author Alban Truc
     * @param array|Payment $criteria critères de recherche
     * @param array $fieldsToReturn champs à récupérer
     * @since 29/03/2014
     * @return array|Payment[]
     */
    function find($criteria, $fieldsToReturn = array())
    {
        //Transforme $criteria en array s'il contient un objet
        if($criteria instanceof Payment)
            $criteria = $this->dismount($criteria);

        if(isset($criteria['idUser']))
        {
            if($criteria['idUser'] instanceof User)
                $criteria['idUser'] = new MongoId($criteria['idUser']->getId());
            else if(is_array($criteria['idUser']) && isset($criteria['idUser']['_id']))
                $criteria['idUser'] = $criteria['idUser']['_id'];
        }

        $cursor = parent::__find('payment', $criteria, $fieldsToReturn);

        if(!(is_array($cursor)) && !(array_key_exists('error', $cursor)))
        {
            $payments = array();

            foreach($cursor as $payment)
            {
                if(empty($fieldsToReturn))
                    $payment = new Payment($payment);

                $payments[] = $payment;
            }

            if(empty($payments))
                return array('error' => 'No match found.');
            else
                return $payments;
        }
        else return $cursor; //message d'erreur
    }

    /**
     * Retourne le premier paiement correspondant au(x) critère(s) donné(s)
     * @author Alban Truc
     * @param array|Payment $criteria critère(s) de recherche
     * @param array $fieldsToReturn champs à retourner
     * @since 29/03/2014
     * @return array|Payment
     */
    function findOne($criteria, $fieldsToReturn = array())
    {
        //Transforme $criteria en array s'il contient un objet
        if($criteria instanceof Payment)
            $criteria = $this->dismount($criteria);

        if(isset($criteria['idUser']))
        {
            if($criteria['idUser'] instanceof User)
                $criteria['idUser'] = new MongoId($criteria['idUser']->getId());
            else if(is_array($criteria['idUser']) && isset($criteria['idUser']['_id']))
                $criteria['idUser'] = $criteria['idUser']['_id'];
        }

        $result = parent::__findOne('payment', $criteria, $fieldsToReturn);

        if(!(is_array($result)) && !(array_key_exists('error', $result)))
        {
            if(empty($fieldsToReturn))
                $result = new Payment($result);
        }

        return $result;
    }

    /**
     * - Retrouver un paiement par son ID.
     * - Gestion des exceptions et des erreurs
     * @author Alban Truc
     * @param string|MongoId $id Identifiant unique du paiement à trouver
     * @param array $fieldsToReturn champs à retourner
     * @since 02/2014
     * @return Payment|array contenant le message d'erreur
     */
    function findById($id, $fieldsToReturn = array())
    {
        $result = parent::__findOne('payment', array('_id' => new MongoId($id)));

        //Si un compte est trouvé
        if (!(array_key_exists('error', $result)))
        {
            if(empty($fieldsToReturn))
                $result = new Payment($result);
        }

        return $result;
    }

    /**
     * - Retrouver l'ensemble des paiements
     * - Gestion des exceptions et des erreurs
     * @author Alban Truc
     * @param array $fieldsToReturn champs à retourner
     * @since 11/03/2014
     * @return array|Payment[]
     */
    function findAll($fieldsToReturn = array())
    {
        $cursor = parent::__find('payment', array());

        if(!(is_array($cursor)) && !(array_key_exists('error', $cursor)))
        {
            $payments = array();

            foreach($cursor as $payment)
            {
                if(empty($fieldsToReturn))
                    $payment = new Payment($payment);

                $payments[] = $payment;
            }
        }

        if(empty($payments))
            return array('error' => 'No payment found.');
        else
            return $payments;
    }

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
    function findAndModify($searchQuery, $updateCriteria, $fieldsToReturn = NULL, $options = NULL)
    {
        //Transforme $criteria en array s'il contient un objet
        if($searchQuery instanceof Payment)
            $searchQuery = $this->dismount($searchQuery);

        //Transforme $criteria en array s'il contient un objet
        if($updateCriteria instanceof Payment)
            $updateCriteria = $this->dismount($updateCriteria);

        if(isset($searchQuery['idUser']))
        {
            if($searchQuery['idUser'] instanceof User)
                $searchQuery['idUser'] = new MongoId($searchQuery['idUser']->getId());
            else if(is_array($searchQuery['idUser']) && isset($searchQuery['idUser']['_id']))
                $searchQuery['idUser'] = $searchQuery['idUser']['_id'];
        }

        if(isset($updateCriteria['idUser']))
        {
            if($updateCriteria['idUser'] instanceof User)
                $updateCriteria['idUser'] = new MongoId($updateCriteria['idUser']->getId());
            else if(is_array($updateCriteria['idUser']) && isset($updateCriteria['idUser']['_id']))
                $updateCriteria['idUser'] = $updateCriteria['idUser']['_id'];
        }

        $result = parent::__findAndModify('payment', $searchQuery, $updateCriteria, $fieldsToReturn, $options);

        if($fieldsToReturn === NULL)
            $result = new Payment($result);

        return $result;
    }

    /**
     * - Ajoute un paiement en base de données
     * - Gestion des exceptions et des erreurs
     * @author Alban Truc
     * @param array|Payment $document
     * @param array $options
     * @since 12/03/2014
     * @return TRUE|array contenant le message d'erreur dans un indexe 'error'
     */
    function create($document, $options = array('w' => 1))
    {
        //Transforme $criteria en array s'il contient un objet
        if($document instanceof Payment)
            $document = $this->dismount($document);

        if(isset($document['idUser']))
        {
            if($document['idUser'] instanceof User)
                $document['idUser'] = new MongoId($document['idUser']->getId());
            else if(is_array($document['idUser']) && isset($document['idUser']['_id']))
                $document['idUser'] = $document['idUser']['_id'];
        }

        $document['calledFrom'] = "commercial website";

        $result = parent::__create('payment', $document, $options);

        return $result;
    }

    /**
     * Fonction d'update utilisant celle de {@see AbstractPdoManager}
     * @author Alban Truc
     * @param array|Payment $criteria description des entrées à modifier
     * @param array|Payment $update nouvelles valeurs
     * @param array|NULL $options
     * @since 11/03/2014
     * @return TRUE|array contenant le message d'erreur dans un indexe 'error'
     */
    function update($criteria, $update, $options = array('w' => 1))
    {
        //Transforme $criteria en array s'il contient un objet
        if($criteria instanceof Payment)
            $criteria = $this->dismount($criteria);

        if(isset($criteria['idUser']))
        {
            if($criteria['idUser'] instanceof User)
                $criteria['idUser'] = new MongoId($criteria['idUser']->getId());
            else if(is_array($criteria['idUser']) && isset($criteria['idUser']['_id']))
                $criteria['idUser'] = $criteria['idUser']['_id'];
        }

        if(isset($update['idUser']))
        {
            if($update['idUser'] instanceof User)
                $update['idUser'] = new MongoId($update['idUser']->getId());
            else if(is_array($update['idUser']) && isset($update['idUser']['_id']))
                $update['idUser'] = $update['idUser']['_id'];
        }

        $result = parent::__update('payment', $criteria, $update, $options);

        return $result;
    }

    /**
     * - Supprime un/des paiement(s) correspondant à des critères données
     * - Gestion des exceptions et des erreurs
     * @author Alban Truc
     * @param array|Payment $criteria ce qu'il faut supprimer
     * @param array $options
     * @since 11/03/2014
     * @return TRUE|array contenant le message d'erreur dans un indexe 'error'
     */
    function remove($criteria, $options = array('w' => 1))
    {
        //Transforme $criteria en array s'il contient un objet
        if($criteria instanceof Payment)
            $criteria = $this->dismount($criteria);

        if(isset($criteria['idUser']))
        {
            if($criteria['idUser'] instanceof User)
                $criteria['idUser'] = new MongoId($criteria['idUser']->getId());
            else if(is_array($criteria['idUser']) && isset($criteria['idUser']['_id']))
                $criteria['idUser'] = $criteria['idUser']['_id'];
        }

        $result = parent::__remove('payment', $criteria, $options);

        return $result;
    }
}