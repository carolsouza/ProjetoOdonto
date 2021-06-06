<?php

require __DIR__.'/vendor/autoload.php';

use \App\Entity\Consulta;

define('TITLE', 'Excluir consulta');
define('TEXTO', 'Deseja mesmo excluir esta consulta?');


if(!isset($_GET['id']) or !is_numeric($_GET['id'])){
    header('location: index.php?status=error');
    exit;
}

$consulta = Consulta::getConsulta($_GET['id']);
define('LINK', 'listar_consultas.php?id='.$consulta->id_pac);   

if(!$consulta instanceof Consulta){
    header('location: listar_consultas.php?id='.$consulta->id_pac);
    exit;
}

if(isset($_POST['excluir'])){
    
    $consulta->excluir();

    header('location: listar_consultas.php?id='.$consulta->id_pac);
    exit;
}


include __DIR__.'/includes/header.php';
include __DIR__.'/includes/confirmar-exclusao.php';
include __DIR__.'/includes/footer.php';