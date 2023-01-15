<?php
namespace src\Core\DB;

use \PDO;
use \Exception;
use src\Core\Config\Config;
use src\Core\Utils\Debug;

class DB{

    private static $instance = null;
    private $id;
    private $key;
    private function __construct(){}

    public function __get(string $property): string{
    	$method = 'get' . ucfirst($property);
    	$this->key = $this->$method();
    	return $this->key;
    }

     public static function getInstance(){
        return is_null(self::$instance) ? self::getPDOConnection() : self::$instance;
    }

    public function clone(){}

    private static function getPDOConnection(){
    	
    	$config = Config::getGenConf();
    	
        // Display PDO Errors when dev
    	if($config['ENV'] === 'dev'){
            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_CASE => PDO::CASE_NATURAL,
                PDO::ATTR_ORACLE_NULLS => PDO::NULL_EMPTY_STRING
            ];
        }else{
            $options = [];
        }

        $dsn = 'mysql:dbname='.$config['DBNAME'].';host='.$config['DBHOST'];
        $user = $config['DBUSER'];
        $password = $config['DBPASS'];
        $pdoConnection = new PDO($dsn, $user, $password, $options);

        return $pdoConnection;
    }

    public static function query($query){
        try{
            $pdo = self::getInstance();
        }catch(Exception $e){
            echo $e->getMessage();
        }
        $statement = $pdo->query($query);
        // Result as array: FETCH_ALL, array: FETCH_BOTH, Object: FETCH_OBJ or FETCH_CLASS
        $data = $statement->fetchAll(PDO::FETCH_OBJ);
        return $data;
    }

    public static function queryClass($query, $class){
        try{
            $pdo = self::getInstance();
        }catch(Exception $e){
            echo $e->getMessage();
        }
        $statement = $pdo->query($query);
        // Result as array: FETCH_ALL, array: FETCH_BOTH, Object: FETCH_OBJ or FETCH_CLASS
        $oClass = $statement->fetchAll(PDO::FETCH_CLASS, $class);
        return $oClass;
    }

    /**
     * Summary of prepare
     * @param mixed $request
     * @param array $parameters
     * @param mixed $class
     * @param mixed $one
     * @return mixed
     */
    public static function prepare($request, array $parameters = [], $class=false, $one = false){
    	$statement = self::getInstance()->prepare($request, $parameters);  
    	$statement->execute($parameters);
        if ($class === false) {
            $statement->setFetchMode(PDO::FETCH_ASSOC);
        }else{
            $statement->setFetchMode(PDO::FETCH_CLASS, $class);
        }
    	if($one){
    		$datas = $statement->fetch();
    	}else{
    		$datas = $statement->fetchAll();
    	}
        
    	return $datas;
    }
    
}