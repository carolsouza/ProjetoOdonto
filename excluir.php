<?php

require __DIR__.'/vendor/autoload.php';


use \App\Entity\Cadastro;
use \App\Entity\Ficha;
use \App\Entity\QuestSaude;
use \App\Entity\QuestInfantil;
use \App\Entity\ExameFisico;
use \App\Entity\Consulta;

define('TITLE', 'Excluir cadastro');
define('LINK', 'index.php?status=success');


if(!isset($_GET['id']) or !is_numeric($_GET['id'])){
    header('location: index.php?status=error');
    exit;
}

$cadastro = Cadastro::getCadastro($_GET['id']);
$ficha = Ficha::getFicha($_GET['id']);
$questSaude = QuestSaude::getQuestionarioSaude($_GET['id']);
$questInfantil = questInfantil::getQuestionarioInfantil($_GET['id']);
$exameFisico = ExameFisico::getExameFisico($_GET['id']);
$where = $_GET['id'];
$consultas = Consulta::getConsultas('id_pac = '.$where);  
//echo "<pre>"; print_r($cadastro); echo "</pre>"; exit;

define('TEXTO', 'Deseja mesmo excluir o paciente <strong>'.$cadastro->nome.'</strong>?');

if(!$cadastro instanceof Cadastro){
    header('location: index.php?status=error');
    exit;
}

if(isset($_POST['excluir'])){
    
    $cadastro->excluir();
    $ficha->excluir();
    $questSaude->excluir();
    $questInfantil->excluir();
    $exameFisico->excluir();
    $consultas == null ? $consultas : $consultas[0]->excluir();

    header('location: index.php?status=success');
    exit;
}


//echo "<pre>"; print_r($cadastro); echo "</pre>"; exit;

include __DIR__.'/includes/header.php';
include __DIR__.'/includes/confirmar-exclusao.php';
include __DIR__.'/includes/footer.php';