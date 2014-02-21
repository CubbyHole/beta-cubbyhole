<?php
class User {
	
	private $id;
	private $state;
	private $isAdmin;
	private $account;
	private $name;
	private $firstName;
	private $password;
	private $email;
	private $geolocation;
	private $apiKey;
	
	public function __construct() {
		
		$num = func_num_args();
		
		switch($num)
		{
			case 1:
					$this->id = func_get_arg(0)['_id'];
					$this->state = func_get_arg(0)['state'];
					$this->isAdmin = func_get_arg(0)['isAdmin'];
					$this->account = func_get_arg(0)['idAccount'];
					$this->name = func_get_arg(0)['name'];
					$this->firstName = func_get_arg(0)['firstName'];
					$this->password = func_get_arg(0)['password'];
					$this->email = func_get_arg(0)['email'];
					$this->geolocation = func_get_arg(0)['geolocation'];
					$this->apiKey = func_get_arg(0)['apiKey'];
					break;
			case 9:
					$this->state = func_get_arg(0);
					$this->isAdmin = func_get_arg(1);
					$this->idAccount = func_get_arg(2);
					$this->name = func_get_arg(3);
					$this->firstName = func_get_arg(4);
					$this->password = func_get_arg(5);
					$this->email = func_get_arg(6);
					$this->geolocation = func_get_arg(7);
					$this->apiKey = func_get_arg(8);
					break;
		}
	}
	
	public function getId() { return $this->id; }
	public function getState() { return $this->state; } 
	public function getIsAdmin() { return $this->isAdmin; } 
	public function getAccount() { return $this->account; } 
	public function getName() { return $this->name; }
	public function getFirstName() { return $this->firstName; }
	public function getPassword() { return $this->password; }
	public function getEmail() { return $this->email; }
	public function getGeolocation() { return $this->geolocation; }
	public function getApiKey() { return $this->apiKey;}
	
	public function setId($id) { $this->id = $id; }
	public function setState($state) { $this->state = $state; } 
	public function setIsAdmin($isAdmin) { $this->isAdmin = $isAdmin; } 
	public function setAccount($account) { $this->account = $account; } 
	public function setName($name) { $this->name = $name; }
	public function setFirstName($firstName) { $this->firstName = $firstName; }	
	public function setPassword($password) { $this->password = $password; }
	public function setEmail($email) { $this->email = $email; }
	public function setGeolocation($geolocation) { $this->geolocation = $geolocation; }
	public function setApiKey($apiKey) { $this->apiKey = $apiKey; }
	
}

?>