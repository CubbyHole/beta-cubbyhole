<?php
require_once 'AbstractPdoManager.class.php';
require_once 'RefPlanPdoManager.class.php';
require_once '../model/classes/Account.class.php';
require_once '../model/interfaces/AccountManager.interface.php';


class AccountPdoManager extends AbstractPdoManager implements AccountManager{


	protected $accountCollection;
	protected $refPlanPdoManager;
	
	public function __construct()
	{
		parent::__construct();
		$this->accountCollection = $this->getCollection('account');
		$this->refPlanPdoManager = new RefPlanPdoManager();
	}
	
	public function findById($id, $source)
	{
		$result = $this->accountCollection->findOne(array('_id' => new MongoId($id)));
		
		if($result)
		{	
			$result['_id'] = (string) $result['_id'];
			//on récupère le refplan correspondant au compte
			$refPlan = $this->refPlanPdoManager->findById($result['idRefPlan'], $source);
			if($refPlan)
			{
				switch($source)
				{
					//retourne sous forme d'objet php
					case 'web':
						$account = new Account($result);
						$account->setRefPlan($refPlan);
						return $account;
					//retourne sous forme json
					case 'sunbeam':
					case 'windove':
					default:
						unset($result['idRefPlan']);
						$result['refPlan'] = $refPlan;
						return $result;
				}
			}
			else return FALSE;
		}
		else return FALSE;
	}
	
	public function addFreeAccount($account)
	{
		//Pas besoin de créer de nouveau refplan, ils existent déjà tous
		try 
		{
			$info = $this->accountCollection->insert($account, array('w' => 1, 'fsync' => \TRUE));
		}
		catch(MongoCursorException $e) {
			echo $e;
		}
		
		if(!(empty($info)) && $info['ok'] == '1' && $info['err'] === NULL)
		{
			return TRUE;
		}
		else return FAlSE;
	}
	
}

?>