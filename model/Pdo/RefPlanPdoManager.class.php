<?php
/**
 * Created by Notepad++.
 * User: Alban Truc
 * Date: 31/01/14
 * Time: 12:53
 */
$projectRoot = $_SERVER['DOCUMENT_ROOT'].'/Cubbyhole';
require_once 'AbstractPdoManager.class.php';
require_once $projectRoot.'/model/Classes/RefPlan.class.php';
require_once $projectRoot.'/model/Interfaces/RefPlanManager.interface.php';

class RefPlanPdoManager extends AbstractPdoManager implements RefPlanManagerInterface{

	protected $refPlanCollection;

    /**
     * Constructeur:
     * - Appelle le constructeur de AbstractManager (gestion des accès de la BDD).
     * - Initialise la collection refplan.
     * @author Alban Truc
     * @since 01/2014
     */

	public function __construct()
	{
		parent::__construct();
		$this->refPlanCollection = $this->getCollection('refplan');
	}

    /**
     * - Retrouver un refPlan par son ID.
     * - Gestion des erreurs.
     * @author Alban Truc
     * @param string|MongoId $id Identifiant unique du refPlan à trouver
     * @since 02/2014
     * @return RefPlan|array contenant le message d'erreur
     */
    /**
     * @param MongoId|String $id
     * @return array|RefPlan
     */
    public function findById($id)
	{
        /**
         * Doc du findOne: http://www.php.net/manual/en/mongo.tutorial.findone.php
         * Utilisé lorsqu'on attend un résultat unique (notre cas) ou si l'on ne veut que le 1er résultat.
         * Les ID dans Mongo sont des objets MongoId: http://www.php.net/manual/en/class.mongoid.php
         */
		$result = $this->refPlanCollection->findOne(array('_id' => new MongoId($id)));

        //Si un refPlan est trouvé
		if($result !== NULL)
		{
            //Cast le MongoId en string
			$result['_id'] = (string) $result['_id'];

            //retourne sous forme d'objet php
            $refPlan = new RefPlan($result);
            return $refPlan;
		}
		else return array('error' => 'RefPlan with ID '.$id.' not found');
	}


    /**
     * - Retrouver le(s) refPlan gratuit(s), soit par son nom (free) soit par son prix de 0
     * - Gestion des erreurs
     * @author Alban Truc
     * @since 11/03/2014
     * @return RefPlan[] tableau d'objets RefPlan
     */

    function findFreePlans()
    {
        // Doc du find: http://www.php.net/manual/en/mongocollection.find.php

        $criteria = array(
            '$or' => array(
                array('name' => 'freee'),
                array('price' => (int)0)
            )
        );

        $cursor = $this->refPlanCollection->find($criteria);

        $freePlans = array();

        foreach($cursor as $refPlan)
        {
            /**
             * D'après les commentaires sur la page https://php.net/manual/en/function.array-push.php
             * la méthode utilisée ici est plus rapide d'exécution qu'utiliser un array_push.
             * Par ailleurs nous n'avons pas besoin de la valeur que retourne array_push
             * (à savoir le nombre d'éléments dans le tableau)
             */
            $freePlans[] = new RefPlan($refPlan);
        }

        if(empty($freePlans))
            return array('error' => 'No free plan found.');
        else
            return $freePlans;
    }

    /**
     * - Retrouver le(s) refPlan payants, à savoir ceux dont le prix est > à 0
     * - Gestion des erreurs
     * @author Alban Truc
     * @since 11/03/2014
     * @return RefPlan[] tableau d'objets RefPlan
     */

    function findPremiumPlans()
    {
        // Doc du find: http://www.php.net/manual/en/mongocollection.find.php

        $criteria = array(
            'price' => array('$gt' => (int)0)
        );

        $cursor = $this->refPlanCollection->find($criteria);

        $premiumPlans = array();

        foreach($cursor as $refPlan)
        {
            $premiumPlans[] = new RefPlan($refPlan);
        }

        if(empty($premiumPlans))
            return array('error' => 'No premium plan found.');
        else
            return $premiumPlans;
    }

    /**
     * - Retrouver l'ensemble des refPlan
     * - Gestion des erreurs
     * @author Alban Truc
     * @since 11/03/2014
     * @return RefPlan[] tableau d'objets RefPlan
     */

    function findAll()
    {
        // Doc du find: http://www.php.net/manual/en/mongocollection.find.php

        $cursor = $this->refPlanCollection->find();

        $plans = array();

        foreach($cursor as $refPlan)
        {
            $plans[] = new RefPlan($refPlan);
        }

        if(empty($plans))
            return array('error' => 'No premium plan found.');
        else
            return $plans;
    }

    /**
     * Inspiré de la méthode findAndModify: http://www.php.net/manual/en/mongocollection.findandmodify.php
     * - Retrouver un RefPlan selon certains critères et le modifier/supprimer
     * - Récupérer ce RefPlan ou sa version modifiée
     * - Gestion des exceptions MongoResultException: http://www.php.net/manual/en/class.mongoresultexception.php
     * @author Alban Truc
     * @param array $searchQuery critères de recherche
     * @param array $updateCriteria les modifications à réaliser
     * @param array|NULL $fields pour ne récupérer que certains champs
     * @param array|NULL $options voir le lien php.net pour la liste des options
     * @since 11/03/2014
     * @return RefPlan
     */

    function findAndModify($searchQuery, $updateCriteria, $fields = NULL, $options = NULL)
    {
        $refPlan = NULL;

        try
        {
            $refPlan = $this->refPlanCollection->findAndModify(
                $searchQuery,
                $updateCriteria,
                $fields,
                $options
            );
        }
        catch(MongoResultException $e)
        {
            return array('error' => $e->getMessage());
        }

        if($refPlan !== NULL)
        {
            if($fields !== NULL)
                return $refPlan;
            else
                return new RefPlan($refPlan);
        }
        else
            return array(
                'error' => 'Unknown error when trying to find and modify.'
            );
    }

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

    function update($criteria, $update, $options = array('w' => 1))
    {
        try
        {
            /**
             * Informations sur toutes les options au chapitre "Parameters":
             * http://www.php.net/manual/en/mongocollection.insert.php
             */
            $info = $this->refPlanCollection->update($criteria, $update, $options);
        }
        catch(MongoCursorException $e)
        {
            return array('error' => $e->getMessage());
        }

        /**
         * Gestion de ce qui est retourné grâce à l'option w.
         * Si on essaye de supprimer un document qui n'existe pas, remove() ne renvoie pas d'exception.
         * Dans ce cas, $info['n'] contiendra 0. Nous devons donc vérifer que ce n est différent de 0.
         * Plus d'informations sur les retours, voir chapitre "Return Values":
         * http://www.php.net/manual/en/mongocollection.insert.php
         */

        if(!(empty($info)) && $info['ok'] == '1' && $info['err'] === NULL)
        {
            if($info['n'] != '0') return TRUE;

            else return array(
                'error' => 'Unknown error when trying to update.'
            );
        }
        else return array('error' => $info);
    }

    /**
     * - Supprime un plan à partir de son ID
     * - Gestion des erreurs
     * - Gestion des exceptions MongoCursor: http://www.php.net/manual/en/class.mongocursorexception.php
     * @author Alban Truc
     * @param string|MongoId $id
     * @since 11/03/2014
     * @return TRUE|array contenant le message d'erreur dans un indexe 'error'
     */

    function removeById($id)
    {
        //On cherche le refPlan à supprimer à partir de son MongoId.
        $criteria = array('_id' => new MongoId($id));

        try
        {
            /**
             * w = 1 est optionnel, il est déjà à 1 par défaut.
             * Cela permet d'avoir un retour du status de la suppression.
             * justOne = TRUE est également optionnel.
             * Cela permet de ne supprimer qu'un enregistrement correspondant aux critères.
             * Les IDs étant uniques, on pourrait se passer de cette option.
             * Documentation du remove: http://www.php.net/manual/en/mongocollection.remove.php
             */

            $info = $this->refPlanCollection->remove($criteria, array('w' => 1, 'justOne' => TRUE));

        }
        catch(MongoCursorException $e)
        {
            return array('error' => $e->getMessage());
        }

        /**
         * Gestion de ce qui est retourné grâce à l'option w.
         * Si on essaye de supprimer un document qui n'existe pas, remove() ne renvoie pas d'exception.
         * Dans ce cas, $info['n'] contiendra 0. Nous devons donc vérifer que ce n est différent de 0.
         * Plus d'informations sur les retours, voir chapitre "Return Values":
         * http://www.php.net/manual/en/mongocollection.insert.php
         */

        if(!(empty($info)) && $info['ok'] == '1' && $info['err'] === NULL)
        {
            if($info['n'] != '0') return TRUE;

            else return array('error' => 'Cannot remove refPlan with ID '.$id.', no refPlan found for this ID.');
        }
        else return array('error' => $info['err']);
    }

    /**
     * - Ajoute un refPlan en base de données
     * - Gestion des exceptions MongoCursor: http://www.php.net/manual/en/class.mongocursorexception.php
     * - Gestion des erreurs
     * @author Alban Truc
     * @param array|RefPlan $refPlan
     * @since 12/03/2014
     * @return TRUE|array contenant le message d'erreur dans un indexe 'error'
     */
    function create($refPlan)
    {
        //Transforme $refPlan en array s'il contient un objet
        if(!(is_array($refPlan)))
            $refPlan = $this->dismount($refPlan);

        try
        {
            /**
             * w = 1 est optionnel, il est déjà à 1 par défaut. Cela permet d'avoir un retour du status de l'insertion.
             * Plus d'informations sur toutes les options, voir chapitre "Parameters":
             * http://www.php.net/manual/en/mongocollection.insert.php
             */
            $info = $this->refPlanCollection->insert($refPlan, array('w' => 1));

        }
        catch(MongoCursorException $e)
        {
            return array('error' => $e->getMessage());
        }

        /**
         * Gestion de ce qui est retourné grâce à l'option w.
         * Plus d'informations sur les retours, voir chapitre "Return Values":
         * http://www.php.net/manual/en/mongocollection.insert.php
         */
        if(!(empty($info)) && $info['ok'] == '1' && $info['err'] === NULL) return TRUE;

        else return array('error' => $info['err']);
    }
}

?>