<?php
require_once 'AbstractPdoManager.class.php';
require_once'../model/classes/RefPlan.class.php';
require_once'../model/interfaces/RefPlanManager.interface.php';


class RefPlanPdoManager extends AbstractPdoManager implements RefPlanManager{

	protected $refPlanCollection;
	
	public function __construct()
	{
		parent::__construct();
		$this->refPlanCollection = $this->getCollection('refplan');
	}
	
	public function findById($id, $source)
	{
		$result = $this->refPlanCollection->findOne(array('_id' => new MongoId($id)));
		
		if($result)
		{
			$result['_id'] = (string) $result['_id'];
			switch($source)
			{
				//retourne sous forme d'objet php
				case 'web':
					$refPlan = new RefPlan($result);
					return $refPlan;
					
				//retourne sous forme json
				case 'sunbeam':
				case 'windove':
				default:
					return $result;
			}
			
		}
		else return FALSE;
	}
}

?>