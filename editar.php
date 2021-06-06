<?php

    require __DIR__.'/vendor/autoload.php';

    define('TITLE', 'Editar cadastro');

    use \App\Entity\Cadastro;
    use \App\Db\Infos;

    $estados = Infos::getEstados();
    $verificador = '';

    if(!isset($_GET['id']) or !is_numeric($_GET['id'])){
        header('location: index.php?status=error');
        exit;
    }

    $cadastro = Cadastro::getCadastro($_GET['id']);
    //echo "<pre>"; print_r($cadastro); echo "</pre>"; exit;

    if(!$cadastro instanceof Cadastro){
        header('location: index.php?status=error');
        exit;
    }

    if(isset($_POST['nome'], $_POST['cpf'], $_POST['declaracao'])){
        
        $cadastros = Cadastro::getCadastros('cpf = '.$_POST['cpf']);

        if($cadastros != NULL && $cadastros[0]->id != $_GET['id']){
            $verificador = 'CPF já cadastrado!';
        }else{
            $cadastro->nome = $_POST['nome'];
            $cadastro->data_nasc = $_POST['data_nasc'];
            $cadastro->sexo = $_POST['sexo'] == NULL ? '' :  $_POST['sexo'];
            $cadastro->cor = $_POST['cor'];
            $cadastro->altura = $_POST['altura'];
            $cadastro->peso = $_POST['peso'];
            $cadastro->escolaridade = $_POST['escolaridade'];
            $cadastro->profissao = $_POST['profissao'];
            $cadastro->rg = $_POST['rg'];
            $cadastro->cpf = $_POST['cpf'];
            $cadastro->estado_civil = $_POST['estado_civil'];
            $cadastro->naturalidade = $_POST['naturalidade'];
            $cadastro->estado_nat = $_POST['estado_nat'];
            $cadastro->pai = $_POST['pai'];
            $cadastro->pai_nac = $_POST['pai_nac'];
            $cadastro->mae = $_POST['mae'];
            $cadastro->mae_nac = $_POST['mae_nac'];
            $cadastro->tel = $_POST['tel'];
            $cadastro->cel1 = $_POST['cel1'];
            $cadastro->cel2 = $_POST['cel2'];
            $cadastro->endereco = $_POST['endereco'];
            $cadastro->num_endereco = $_POST['num_endereco'];
            $cadastro->complemento = $_POST['complemento'];
            $cadastro->bairro = $_POST['bairro'];
            $cadastro->cep = $_POST['cep'];
            $cadastro->cidade = $_POST['cidade'];
            $cadastro->estado_atual = $_POST['estado_atual'];
            $cadastro->veracidade = $_POST['veracidade'];
            $cadastro->declaracao = $_POST['declaracao'];

            //echo "<pre>"; print_r($cadastro); echo "</pre>"; exit;

            $cadastro->atualizar();

            header('location: index.php?status=success');

            exit;
        }
    }



    include __DIR__.'/includes/header.php';
    include __DIR__.'/includes/formulario.php';
    include __DIR__.'/includes/footer.php';