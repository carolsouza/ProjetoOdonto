<?php

namespace App\Entity;

use \App\Db\Database;
use \PDO;

class Ficha{
    public $id;
    public $aluno;
    public $professor;
    public $queixa;
    public $hist_doenca;
    public $diag_presunt;
    public $exame_comp;
    public $diag_def;
    public $tratamento;
    public $plano_tratamento;
    public $urgente;
    public $medicacao;
    public $veracidade;

    public function cadastrar(){

        $database = new Database('fichas');
        $this->id = $database->insert([
            'aluno' => $this->aluno,
            'professor' => $this->professor,
            'queixa' => $this->queixa,
            'hist_doenca' => $this->hist_doenca,
            'diag_presunt' => $this->diag_presunt,
            'exame_comp' => $this->exame_comp,
            'diag_def' => $this->diag_def,
            'tratamento' => $this->tratamento,
            'plano_tratamento' => $this->plano_tratamento,
            'urgente' => $this->urgente,
            'medicacao' => $this->medicacao,
            'veracidade' => $this->veracidade
        ]);

        return true;

        //echo "<pre>"; print_r($this); echo "</pre>"; exit;

        
    }

    public function atualizar(){
        return (new Database('fichas'))->update('id ='.$this->id,[
            'aluno' => $this->aluno,
            'professor' => $this->professor,
            'queixa' => $this->queixa,
            'hist_doenca' => $this->hist_doenca,
            'diag_presunt' => $this->diag_presunt,
            'exame_comp' => $this->exame_comp,
            'diag_def' => $this->diag_def,
            'tratamento' => $this->tratamento,
            'plano_tratamento' => $this->plano_tratamento,
            'urgente' => $this->urgente,
            'medicacao' => $this->medicacao,
            'veracidade' => $this->veracidade
        ]);
    }

    public function excluir(){
        return (new Database('fichas'))->delete('id = '.$this->id);
    }

    public static function getFichas($where = null, $order = null, $limit = null){
        return (new Database('fichas'))->select($where,$order,$limit)->fetchAll(PDO::FETCH_CLASS,self::class);

    }

    public static function getFicha($id){
        return (new Database('fichas'))->select('id = '.$id)->fetchObject(self::class);
    }
}