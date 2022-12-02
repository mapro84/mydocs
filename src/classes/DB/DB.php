<?php
namespace src\classes\DB;
use \PDO;
use \Exception;

class DB{

    private static $instance = null;

    private function __construct(){}

    public static function getInstance(){
        return is_null(self::$instance) ? self::getPDOConnection() : self::$instance;
    }

    public function clone(){}

    private function getPDOConnection(){
        // Display PDO Errors when dev
        if(ENV === 'dev'){
            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_CASE => PDO::CASE_NATURAL,
                PDO::ATTR_ORACLE_NULLS => PDO::NULL_EMPTY_STRING
            ];
        }else{
            $options = [];
        }

        $dsn = 'mysql:dbname='.DBNAME.';host='.DBHOST;
        $user = DBUSER;
        $password = DBPASS;
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

}