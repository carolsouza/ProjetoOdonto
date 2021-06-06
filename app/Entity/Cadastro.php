<?php

namespace App\Entity;

use \App\Db\Database;
use \PDO;

class Cadastro{
    public $id;
    public $nome;
    public $data_nasc;
    public $data_cad;
    public $sexo;
    public $cor;
    public $altura;
    public $peso;
    public $escolaridade;
    public $profissao;
    public $rg;
    public $cpf;
    public $estado_civil;
    public $naturalidade;
    public $estado_nat;
    public $pai;
    public $pai_nac;
    public $mae;
    public $mae_nac;
    public $tel;
    public $cel1;
    public $cel2;
    public $endereco;
    public $num_endereco;
    public $complemento;
    public $bairro;
    public $cep;
    public $cidade;
    public $estado_atual;
    public $veracidade;
    public $declaracao;

    public function cadastrar(){
        $this->data_cad = date('Y-m-d H:i:s');

        $database = new Database('cadastros');
        $this->id = $database->insert([
            'nome' => $this->nome,
            'data_nasc' => $this->data_nasc,
            'data_cad' => $this->data_cad,
            'sexo' => $this->sexo,
            'cor' => $this->cor,
            'altura' => $this->altura,
            'peso' => $this->peso,
            'escolaridade' => $this->escolaridade,
            'profissao' => $this->profissao,
            'rg' => $this->rg,
            'cpf' => $this->cpf,
            'estado_civil' => $this->estado_civil,
            'naturalidade' => $this->naturalidade,
            'estado_nat' => $this->estado_nat,
            'pai' => $this->pai,
            'pai_nac' => $this->pai_nac,
            'mae' => $this->mae,
            'mae_nac' => $this->mae_nac,
            'tel' => $this->tel,
            'cel1' => $this->cel1,
            'cel2' => $this->cel2,
            'endereco' => $this->endereco,
            'num_endereco' => $this->num_endereco,
            'complemento' => $this->complemento,
            'bairro' => $this->bairro,
            'cep' => $this->cep,
            'cidade' => $this->cidade,
            'estado_atual' => $this->estado_atual,
            'veracidade' => $this->veracidade,
            'declaracao' => $this->declaracao
        ]);

        return true;

        //echo "<pre>"; print_r($this); echo "</pre>"; exit;

        
    }

    public function atualizar(){
        return (new Database('cadastros'))->update('id ='.$this->id,[
            'nome' => $this->nome,
            'data_nasc' => $this->data_nasc,
            'data_cad' => $this->data_cad,
            'sexo' => $this->sexo,
            'cor' => $this->cor,
            'altura' => $this->altura,
            'peso' => $this->peso,
            'escolaridade' => $this->escolaridade,
            'profissao' => $this->profissao,
            'rg' => $this->rg,
            'cpf' => $this->cpf,
            'estado_civil' => $this->estado_civil,
            'naturalidade' => $this->naturalidade,
            'estado_nat' => $this->estado_nat,
            'pai' => $this->pai,
            'pai_nac' => $this->pai_nac,
            'mae' => $this->mae,
            'mae_nac' => $this->mae_nac,
            'tel' => $this->tel,
            'cel1' => $this->cel1,
            'cel2' => $this->cel2,
            'endereco' => $this->endereco,
            'num_endereco' => $this->num_endereco,
            'complemento' => $this->complemento,
            'bairro' => $this->bairro,
            'cep' => $this->cep,
            'cidade' => $this->cidade,
            'estado_atual' => $this->estado_atual,
            'veracidade' => $this->veracidade,
            'declaracao' => $this->declaracao
        ]);
    }

    public function excluir(){
        return (new Database('cadastros'))->delete('id = '.$this->id);
    }

    public static function getQtdCadastros($where = null){
        return (new Database('cadastros'))->select($where, null, null, 'COUNT(*) as qtd')->fetchObject()->qtd;

    }

    public static function getCadastros($where = null, $order = null, $limit = null){
        return (new Database('cadastros'))->select($where,$order,$limit)->fetchAll(PDO::FETCH_CLASS,self::class);

    }

    public static function getCadastro($id){
        return (new Database('cadastros'))->select('id = '.$id)->fetchObject(self::class);
    }
}
