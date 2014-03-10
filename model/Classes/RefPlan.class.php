<?php

class RefPlan
{
	
	private $id;
	private $state;
	private $name;
	private $price;
	private $maxStorage;
	private $bandwidth;
	private $maxRatio;
	
    public function __construct()
    {
		
		$num = func_num_args();
		
		//il faudra rajouter le default (erreur)
		switch($num)
		{
			case 1:
					$this->id = func_get_arg(0)['_id'];
					$this->state = func_get_arg(0)['state'];
					$this->name = func_get_arg(0)['name'];
					$this->price = func_get_arg(0)['price'];
					$this->maxStorage = func_get_arg(0)['maxStorage'];
					$this->bandwidth = func_get_arg(0)['bandwidth'];
					$this->maxRatio = func_get_arg(0)['maxRatio'];
					break;
			case 7:
					$this->id = func_get_arg(0);
					$this->state = func_get_arg(1);
					$this->name = func_get_arg(2);
					$this->price = func_get_arg(3);
					$this->maxStorage = func_get_arg(4);
					$this->bandwidth = func_get_arg(5);
					$this->maxRatio = func_get_arg(6);
					break;
		}
	}
	
	public function getId() { return $this->id; }
	public function getState() { return $this->state; } 
	public function getName() { return $this->name; } 
	public function getPrice() { return $this->price; } 
	public function getMaxStorage() { return $this->maxStorage; }
	public function getBandwidth() { return $this->bandwidth; }
	public function getMaxRatio() { return $this->maxRatio; }
	
	public function setId($id) { $this->id = $id; }
	public function setState($state) { $this->state = $state; } 
	public function setName($name) { $this->name = $name; } 
	public function setPrice($price) { $this->price = $price; } 
	public function setMaxStorage($maxStorage) { $this->maxStorage = $maxStorage; }
	public function setBandwidth($bandwidth) { $this->bandwidth = $bandwidth; }	
	public function setMaxRatio($maxRatio) { $this->maxRatio = $maxRatio; }
}

?>