<?php

namespace App\Entity;

use \App\Db\Database;
use \PDO;

class QuestInfantil{
    public $id;
    public $hist_gestacao;
    public $parto;
    public $problema_parto;
    public $amamentacao;
    public $amamentou_idade;
    public $anest_local;
    public $contagio;
    public $vacinada;
    public $primeiros_anos;
    public $aprendizado;
    public $animico;
    public $sono;
    public $psicomotora;
    public $alimentacao;
    public $sociabilidade;
    public $pat_conduta;
    public $obs;

    public function cadastrar(){

        $database = new Database('questionario_infantil');
        $this->id = $database->insert([
            'hist_gestacao' => $this->hist_gestacao,
            'parto' => $this->parto,
            'problema_parto' => $this->problema_parto,
            'amamentacao' => $this->amamentacao,
            'amamentou_idade' => $this->amamentou_idade,
            'anest_local' => $this->anest_local,
            'contagio' => $this->contagio,
            'vacinada' => $this->vacinada,
            'primeiros_anos' => $this->primeiros_anos,
            'aprendizado' => $this->aprendizado,
            'animico' => $this->animico,
            'sono' => $this->sono,
            'psicomotora' => $this->psicomotora,
            'alimentacao' => $this->alimentacao,
            'sociabilidade' => $this->sociabilidade,
            'pat_conduta' => $this->pat_conduta,
            'obs' => $this->obs
        ]);

        return true;

        //echo "<pre>"; print_r($this); echo "</pre>"; exit;

        
    }

    public function atualizar(){
        return (new Database('questionario_infantil'))->update('id ='.$this->id,[
            'hist_gestacao' => $this->hist_gestacao,
            'parto' => $this->parto,
            'problema_parto' => $this->problema_parto,
            'amamentacao' => $this->amamentacao,
            'amamentou_idade' => $this->amamentou_idade,
            'anest_local' => $this->anest_local,
            'contagio' => $this->contagio,
            'vacinada' => $this->vacinada,
            'primeiros_anos' => $this->primeiros_anos,
            'aprendizado' => $this->aprendizado,
            'animico' => $this->animico,
            'sono' => $this->sono,
            'psicomotora' => $this->psicomotora,
            'alimentacao' => $this->alimentacao,
            'sociabilidade' => $this->sociabilidade,
            'pat_conduta' => $this->pat_conduta,
            'obs' => $this->obs
        ]);
    }

    public function excluir(){
        return (new Database('questionario_infantil'))->delete('id = '.$this->id);
    }

    public static function getQuestionariosInfantil($where = null, $order = null, $limit = null){
        return (new Database('questionario_infantil'))->select($where,$order,$limit)->fetchAll(PDO::FETCH_CLASS,self::class);

    }

    public static function getQuestionarioInfantil($id){
        return (new Database('questionario_infantil'))->select('id = '.$id)->fetchObject(self::class);
    }
}