<?php

    require __DIR__.'/vendor/autoload.php';

    use \App\Entity\Consulta;
    use \App\Entity\Cadastro;

    $consulta = new Consulta;
    $cadastro = Cadastro::getCadastro($_GET['id']);

    if(isset($_POST['data_consulta'], $_POST['procedimentos'])){
        
        $consulta->id_pac = $cadastro->id;
        $consulta->procedimentos = $_POST['procedimentos'];
        $consulta->data_consulta = $_POST['data_consulta'];
        
        $consulta->cadastrar();

        header('location: listar_consultas.php?id='.$consulta->id_pac);

        exit;
    }

include __DIR__.'/includes/header.php';
include __DIR__.'/includes/consulta.php';
include __DIR__.'/includes/footer.php';