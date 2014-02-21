<?php
interface UserManager {
	
	
	//function findAllUsers();
	//function findUserById($id);
	//function findUserByNames($name, $firstName);
	//function findUserByIdAccount($id);
	//function findUserByEmail($email);
	//function findAdmins();
	//function findUserByGeolocation($geolocation);
	function authenticate($email, $password, $source);
	function register($name, $firstName, $email, $password, $passwordConfirmation);
	
}


?>