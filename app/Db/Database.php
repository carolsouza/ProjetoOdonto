<?php

namespace App\Db;

use \PDO;
use \PDO\PDOException;

class Database{

    const HOST = "localhost";
    const DBNAME = "odontodb";    
    const USER = "root";
    const PASSWORD = "";

    private $table;
    private $connection;

    public function __construct($table = null){
        $this->table = $table;
        $this->setConnection();
    }

    private function setConnection(){
        try{
            $this->connection = new PDO('mysql:host='.self::HOST.';dbname='.self::DBNAME,self::USER,self::PASSWORD);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);//atenção!!
        }catch(PDOException $e){
            die('ERROR: '.$e->getMessage());
        }
    }

    public function execute($query, $params = []){
        try{
            $statement = $this->connection->prepare($query);
            $statement->execute($params);
            return $statement;
        }catch(PDOException $e){
            die('ERROR: '.$e->getMessage());
        }
    }


    public function insert($values){

        $fields = array_keys($values);
        $binds = array_pad([], count($fields), '?');

        //echo "<pre>"; print_r($binds); echo "</pre>"; exit;

        $query = 'insert into '.$this->table.'('.implode(',', $fields).')values('.implode(',',$binds).')';

        $this->execute($query, array_values($values));

        return $this->connection->lastInsertId();

        echo($query); exit;

    }

    public function select($where = null, $order = null, $limit = null, $fields = '*'){

        $where = strlen($where) ? 'where '.$where : '';
        $order = strlen($order) ? 'order by'.$order : '';
        $limit = strlen($limit) ? 'limit '.$limit : '';

        $query = 'select '.$fields.' from '.$this->table.' '.$where.' '.$order.' '.$limit;

        return $this->execute($query);
    }

    public function update($where, $values){
        $fields = array_keys($values);

        $query = 'update '.$this->table.' set '.implode('=?,',$fields ).'=? where '.$where;
        
        $this->execute($query, array_values($values));

        return true;
    }

    public function delete($where){
        $query = 'delete from '.$this->table. ' where '.$where;
        
        $this->execute($query);

        return true;
    }

}