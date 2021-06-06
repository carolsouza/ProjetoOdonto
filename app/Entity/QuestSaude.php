<?php

namespace App\Entity;

use \App\Db\Database;
use \PDO;

class QuestSaude{
    public $id;
    public $hemorragia;
    public $alergia;
    public $reumatismo;
    public $cardio;
    public $gastrite;
    public $diabetes;
    public $desmaio;
    public $trat_medico;
    public $medicamento;
    public $doente_operado;
    public $vicios;
    public $ansie_depre;
    public $tuberculose;
    public $sifilis;
    public $hepatite;
    public $sarampo;
    public $caxumba;
    public $varicela;
    public $outras;

    public function cadastrar(){

        $database = new Database('questionario_saude');
        $this->id = $database->insert([
            'hemorragia'=> $this->hemorragia,
            'alergia'=> $this->alergia,
            'reumatismo'=> $this->reumatismo,
            'cardio'=> $this->cardio,
            'gastrite'=> $this->gastrite,
            'diabetes'=> $this->diabetes,
            'desmaio'=> $this->desmaio,
            'trat_medico'=> $this->trat_medico,
            'medicamento'=> $this->medicamento,
            'doente_operado'=> $this->doente_operado,
            'vicios'=> $this->vicios,
            'ansie_depre'=> $this->ansie_depre,
            'tuberculose'=> $this->tuberculose,
            'sifilis'=> $this->sifilis,
            'hepatite'=> $this->hepatite,
            'sarampo'=> $this->sarampo,
            'caxumba'=> $this->caxumba,
            'varicela'=> $this->varicela,
            'outras'=> $this->outras
        ]);

        return true;

        //echo "<pre>"; print_r($this); echo "</pre>"; exit;

        
    }

    public function atualizar(){
        return (new Database('questionario_saude'))->update('id ='.$this->id,[
            'hemorragia'=> $this->hemorragia,
            'alergia'=> $this->alergia,
            'reumatismo'=> $this->reumatismo,
            'cardio'=> $this->cardio,
            'gastrite'=> $this->gastrite,
            'diabetes'=> $this->diabetes,
            'desmaio'=> $this->desmaio,
            'trat_medico'=> $this->trat_medico,
            'medicamento'=> $this->medicamento,
            'doente_operado'=> $this->doente_operado,
            'vicios'=> $this->vicios,
            'ansie_depre'=> $this->ansie_depre,
            'tuberculose'=> $this->tuberculose,
            'sifilis'=> $this->sifilis,
            'hepatite'=> $this->hepatite,
            'sarampo'=> $this->sarampo,
            'caxumba'=> $this->caxumba,
            'varicela'=> $this->varicela,
            'outras'=> $this->outras
        ]);
    }

    public function excluir(){
        return (new Database('questionario_saude'))->delete('id = '.$this->id);
    }

    public static function getQuestionariosSaude($where = null, $order = null, $limit = null){
        return (new Database('questionario_saude'))->select($where,$order,$limit)->fetchAll(PDO::FETCH_CLASS,self::class);

    }

    public static function getQuestionarioSaude($id){
        return (new Database('questionario_saude'))->select('id = '.$id)->fetchObject(self::class);
    }
}