<?php
require_once 'AbstractPdoManager.class.php';
require_once 'AccountPdoManager.class.php';
require_once '../model/classes/User.class.php';
require_once '../model/interfaces/UserManager.interface.php';


class UserPdoManager extends AbstractPdoManager implements UserManager{

	//function findAllUsers();
	//function findUserById($id);
	//function findUserByNames($name, $firstName);
	//function findUserByIdAccount($id);
	//function findUserByEmail($email);
	//function findAdmins();
	//function findUserByGeolocation($geolocation);

	protected $userCollection;
	protected $accountPdoManager;
	
	public function __construct()
	{
		parent::__construct();
		$this->userCollection = $this->getCollection('user');
		$this->accountPdoManager = new AccountPdoManager();
	}
	
	public function addFreeUser($name, $firstName, $email, $password)
	{
		
		//le compte à insérer
		$account = array(
							'_id' => new MongoId(),
							'state' => 'ok',
							'idRefPlan' => '52eb5e743263d8b6a4395df0',
							'storage' => '5',
							'ratio' => '4',
							'startDate' => '11/02/2014',
							'endDate' => '11/03/2014'
						);
													
		$isAccountAdded = $this->accountPdoManager->addFreeAccount($account);
			
		if($isAccountAdded == TRUE)
		{
			//l'utilisateur à insérer
			$user = array(
							'_id' => new MongoId(),
							'state' => 'ok',
							'isAdmin' => 'false',
							'idAccount' => $account['_id'],
							'name' => $name,
							'firstName' => $firstName,
							'password' => self::encrypt($password),
							'email' => $email,
							'geolocation' => 'somewhere',
							'apiKey' => '3456f1fdsq',
						);
			try
			{
				$info = $this->userCollection->insert($user, array('w' => 1, 'fsync' => \TRUE));
			}
			catch(MongoCursorException $e) {
				echo $e;
			}
			if(!(empty($info)) && $info['ok'] == '1' && $info['err'] === NULL)
			{
				return TRUE;
			}
			else
			{
				//annuler l'insertion de l'account
				return FALSE;
			}
		}
		else return FALSE;
			
	}
	
	public function authenticate($email, $password, $source = 'web')
	{	
		$query = array(
						'email' => $email,
						'password' => self::encrypt($password)//fait appel a la fonction encrypt afin de crypter le mdp
					);
		$result = $this->userCollection->findOne($query);
		
		if($result)
		{
			$result['_id'] = (string) $result['_id'];
			//var_dump($result); exit();
			//on récupère le compte correspondant à l'utilisateur
			$account = $this->accountPdoManager->findById($result['idAccount'], $source);
			
			if($account)
			{
				switch($source)
				{
					//retourne sous forme d'objet php
					case 'web':
						$user = new User($result);
						$user->setAccount($account);
						return $user;
						
					//retourne sous forme json
					case 'sunbeam':
					case 'windove':
					default:
						unset($result['idAccount']);
						$result['account'] = $account;
						return json_encode($result);
				}
			}
			else return FALSE;			
		}
		else return FALSE;
	}
	
	public function encrypt($password)
	{
		return sha1(md5($password));		
	}
	
	public function isEmailAlreadyUsed($email)
	{
		$query = array('email' => $email);
		$result = $this->userCollection->findOne($query);
		
		if($result)
			return TRUE;
		else return FALSE;
	}
	
	public function register($name, $firstName, $email, $password, $passwordConfirmation, $source = 'web')
	{
		/*
		**Entre 8 et 26 caractères, mini un chiffre, mini une lettre minuscule, mini une lettre majuscule,
		**minimum un caractère spécial (@*#).
		**Exemples de caractères non acceptés: ‘ , \ &amp; $ &lt; &gt; et l'espace (\s).
		*/
		$regex = '/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[@*#]).([a-zA-Z0-9@*#]{8,26})$/';
		
		if( 
			!(empty($name)) &&
			!(empty($firstName)) &&
			!(empty($email)) &&
			!(empty($password)) &&
			!(empty($passwordConfirmation))
		   )
		{
			if(
				$password == $passwordConfirmation &&
				$password != $name &&
				$password != $firstName &&
				$password != $email &&
				preg_match($regex, $password) &&
				strlen($email) <= 26 &&
				filter_var($email, FILTER_VALIDATE_EMAIL) &&
				(2 <= strlen($name) && strlen($name) <= 15) &&
				(2 <= strlen($firstName) && strlen($firstName) <= 15)
			   )
			{
				if(!(self::isEmailAlreadyUsed($email)))
				{
					$isRegisterValid = self::addFreeUser($name, $firstName, $email, $password, $source);
					
					if($isRegisterValid == TRUE)
					{
						return self::authenticate($email, $password, $source);
					}
				}
			}
		}
	
	}
	
}

?>