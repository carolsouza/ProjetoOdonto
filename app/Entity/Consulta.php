<?php

namespace App\Entity;

use \App\Db\Database;
use \PDO;

class Consulta{
    public $id_consulta;
    public $id_pac;
    public $procedimentos;
    public $data_consulta;

    public function cadastrar(){

        $database = new Database('consultas');
        $this->id = $database->insert([
            'id_pac' => $this->id_pac,
            'procedimentos' => $this->procedimentos,
            'data_consulta' => $this->data_consulta
        ]);

        return true;        
    }

    public function atualizar(){
        return (new Database('consultas'))->update('id_consulta ='.$this->id_consulta,[
            'id_pac' => $this->id_pac,
            'procedimentos' => $this->procedimentos,
            'data_consulta' => $this->data_consulta
        ]);
    }

    public function excluir(){
        return (new Database('consultas'))->delete('id_consulta = '.$this->id_consulta);
    }

    public static function getConsultas($where = null, $order = null, $limit = null){
        return (new Database('consultas'))->select($where,$order,$limit)->fetchAll(PDO::FETCH_CLASS,self::class);

    }

    public static function getConsulta($id){
        return (new Database('consultas'))->select('id_consulta = '.$id)->fetchObject(self::class);
    }
}