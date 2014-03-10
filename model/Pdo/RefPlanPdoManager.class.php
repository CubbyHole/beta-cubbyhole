<?php
/**
 * Created by Notepad++.
 * User: Alban Truc
 * Date: 31/01/14
 * Time: 12:53
 */

require_once 'AbstractPdoManager.class.php';
require_once '../model/Classes/RefPlan.class.php';
require_once'../model/Interfaces/RefPlanManager.interface.php';

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
     * @param $id String|MongoId Identifiant unique du refPlan à trouver
     * @since 02/2014
     * @return RefPlan|array contenant le message d'erreur
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
}

?>