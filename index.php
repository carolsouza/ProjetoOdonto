<?php

require __DIR__.'/vendor/autoload.php';

use \App\Entity\Cadastro;
use \App\Db\Pagination;

//Busca
$busca = filter_input(INPUT_GET, 'busca', FILTER_SANITIZE_STRING);

//Condições
$condicoes = [
    strlen($busca) ? 'nome LIKE "%'.str_replace(' ','%',$busca).'%"' : null
];

$where = implode(' AND ', $condicoes);

$qtdCadastros = Cadastro::getQtdCadastros($where);

//Paginação
$pagination = new Pagination($qtdCadastros, $_GET['pagina'] ?? 1, 5);

//Pega os cadastros
$cadastros = Cadastro::getCadastros($where, null, $pagination->getLimit());

//echo "<pre>"; print_r($cadastros); echo "</pre>"; exit;

include __DIR__.'/includes/header.php';
include __DIR__.'/includes/listagem.php';
include __DIR__.'/includes/footer.php';