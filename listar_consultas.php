<?php

    require __DIR__.'/vendor/autoload.php';

    use \App\Entity\Consulta;
    use \App\Entity\Cadastro;

    $cadastro = Cadastro::getCadastro($_GET['id']);
    $where = $_GET['id'];
    $consultas = Consulta::getConsultas('id_pac = '.$where);   


include __DIR__.'/includes/header.php';
include __DIR__.'/includes/prontuario.php';
include __DIR__.'/includes/footer.php';