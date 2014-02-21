<?php

class Account {
	
	private $id;
	private $state;
	private $refPlan;
	private $storage;
	private $ratio;
	private $startDate;
	private $endDate;
	
	public function __construct() {
		
		$num = func_num_args();
		
		switch($num)
		{
			case 1:
					$this->id = func_get_arg(0)['_id'];
					$this->state = func_get_arg(0)['state'];
					$this->refPlan = func_get_arg(0)['idRefPlan'];
					$this->storage = func_get_arg(0)['storage'];
					$this->ratio = func_get_arg(0)['ratio'];
					$this->startDate = func_get_arg(0)['startDate'];
					$this->endDate = func_get_arg(0)['endDate'];
					break;
			case 7:
					$this->id = func_get_arg(0);
					$this->state = func_get_arg(1);
					$this->refPlan = func_get_arg(2);
					$this->storage = func_get_arg(3);
					$this->ratio = func_get_arg(4);
					$this->startDate = func_get_arg(5);
					$this->endDate = func_get_arg(6);
					break;
		}
	}
	
	public function getId() { return $this->id; }
	public function getState() { return $this->state; } 
	public function getRefPlan() { return $this->refPlan; } 
	public function getStorage() { return $this->storage; }
	public function getRatio() { return $this->ratio; }
	public function getStartDate() { return $this->startDate; }
	public function getEndDate() { return $this->endDate; }
	
	public function setId($id) { $this->id = $id; }
	public function setState($state) { $this->state = $state; } 
	public function setRefPlan($refPlan) { $this->refPlan = $refPlan; } 
	public function setStorage($storage) { $this->storage = $storage; }
	public function setRatio($ratio) { $this->ratio = $ratio; }	
	public function setStartDate($startDate) { $this->startDate = $startDate; }
	public function setEndDate($endDate) { $this->endDate = $endDate; }
	
}

?>