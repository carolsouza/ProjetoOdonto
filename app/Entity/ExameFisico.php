<?php

namespace App\Entity;

use \App\Db\Database;
use \PDO;

class ExameFisico{
    public $id;
    public $labios;
    public $mucosa_jugal;
    public $lingua;
    public $soalho_boca;
    public $palato_duro;
    public $garganta;
    public $palato_mole;
    public $mucosa_alv;
    public $gengivas;
    public $gland_saliva;
    public $linfonodos;
    public $atm;
    public $musc_mastiga;
    public $oclusao;
    public $alteracoes;
    public $arterial_max;
    public $arterial_min;

    public function cadastrar(){

        $database = new Database('exame_fisico');
        $this->id = $database->insert([
            'labios' => $this->labios,
            'mucosa_jugal' => $this->mucosa_jugal,
            'lingua' => $this->lingua,
            'soalho_boca' => $this->soalho_boca,
            'palato_duro' => $this->palato_duro,
            'garganta' => $this->garganta,
            'palato_mole' => $this->palato_mole,
            'mucosa_alv' => $this->mucosa_alv,
            'gengivas' => $this->gengivas,
            'gland_saliva' => $this->gland_saliva,
            'linfonodos' => $this->linfonodos,
            'atm' => $this->atm,
            'musc_mastiga' => $this->musc_mastiga,
            'oclusao' => $this->oclusao,
            'alteracoes' => $this->alteracoes,
            'arterial_max' => $this->arterial_max,
            'arterial_min' => $this->arterial_min
        ]);

        return true;

        //echo "<pre>"; print_r($this); echo "</pre>"; exit;

        
    }

    public function atualizar(){
        return (new Database('exame_fisico'))->update('id ='.$this->id,[
            'labios' => $this->labios,
            'mucosa_jugal' => $this->mucosa_jugal,
            'lingua' => $this->lingua,
            'soalho_boca' => $this->soalho_boca,
            'palato_duro' => $this->palato_duro,
            'garganta' => $this->garganta,
            'palato_mole' => $this->palato_mole,
            'mucosa_alv' => $this->mucosa_alv,
            'gengivas' => $this->gengivas,
            'gland_saliva' => $this->gland_saliva,
            'linfonodos' => $this->linfonodos,
            'atm' => $this->atm,
            'musc_mastiga' => $this->musc_mastiga,
            'oclusao' => $this->oclusao,
            'alteracoes' => $this->alteracoes,
            'arterial_max' => $this->arterial_max,
            'arterial_min' => $this->arterial_min
        ]);
    }

    public function excluir(){
        return (new Database('exame_fisico'))->delete('id = '.$this->id);
    }

    public static function getExamesFisicos($where = null, $order = null, $limit = null){
        return (new Database('exame_fisico'))->select($where,$order,$limit)->fetchAll(PDO::FETCH_CLASS,self::class);

    }

    public static function getExameFisico($id){
        return (new Database('exame_fisico'))->select('id = '.$id)->fetchObject(self::class);
    }
}