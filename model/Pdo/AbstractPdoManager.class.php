<?php

abstract class AbstractPdoManager 
{

    const DBHOST = 'localhost';
    //const DBUSER = '';
    //const DBPWD = '';
    const DBPORT = 27017;
    const DBNAME = 'cubbyhole';
 
    private static $instance;
    protected $connection;
    protected $database;

    public function __construct() 
    {
        $connection_string = sprintf('mongodb://%s:%d/%s', AbstractPdoManager::DBHOST, AbstractPdoManager::DBPORT, AbstractPdoManager::DBNAME);       
        try 
        {
            $this->connection = new Mongo($connection_string);
            $this->database = $this->connection->selectDB(AbstractPdoManager::DBNAME);
        } 
        catch (MongoConnectionException $e) 
        {
            throw $e;
        }
    }
    
    static public function instantiate()
    {
        if(!isset(self::$instance))
        {
            $class = __CLASS__;
            self::$instance = new $class;
        }
        return self::$instance;
    }
    
    public function getCollection($name)
    {
        return $this->database->selectCollection($name);
    }
   
}