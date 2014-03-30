<?php
/**
 * Created by Notepad++.
 * User: Alban Truc
 * Date: 30/01/14
 * Time: 14:51
 */

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

    /**
     * Constructeur: génère la connexion à la base de données Mongo.
     * @author Alban Truc
     * @since 30/01/14
     */

    public function __construct() 
    {
        $connection_string = sprintf('mongodb://%s:%d/%s', AbstractPdoManager::DBHOST, AbstractPdoManager::DBPORT, AbstractPdoManager::DBNAME);
        if($this->connection === NULL){
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
    }

    /**
     * @author Alban Truc
     * @since 30/01/14
     * @return mixed instance de la classe
     */

    static public function instantiate()
    {
        if(!isset(self::$instance))
        {
            $class = __CLASS__;
            self::$instance = new $class;
        }
        return self::$instance;
    }

    /**
     * @author Alban Truc
     * @param $name
     * @since 30/01/14
     * @return MongoCollection Renvoie la collection voulue
     */
    public function getCollection($name)
    {
        return $this->database->selectCollection($name);
    }

    /**
     * Convertir un objet avec des propriétés protected ou private en tableau associatif
     * @author Alban Truc
     * @param Object $object
     * @since 12/03/2014
     * @return array
     * Discussions sur le sujet: http://stackoverflow.com/questions/4345554/convert-php-object-to-associative-array
     */
    public function dismount($object)
    {
        $reflectionClass = new ReflectionClass(get_class($object));

        $array = array();
        foreach ($reflectionClass->getProperties() as $property)
        {
            $property->setAccessible(true);
            $array[$property->getName()] = $property->getValue($object);
            $property->setAccessible(false);
        }

        return $array;
    }
}