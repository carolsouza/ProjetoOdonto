<?php

    $mensagem = '';
    if(isset($_GET['status'])){
        switch ($_GET['status']){
            case 'success':
                $mensagem = '<div class="alert alert-success mt-3">Ação executada com sucesso!</div>';
                break;

            case 'error':
                $mensagem = '<div class="alert alert-danger mt-3">Ação não executada!</div>';
                break;
        }
    }

    $resultados = '';
    foreach($cadastros as $cadastro){
        $resultados .= '<tr>
                            <td>'.$cadastro->id .'</td>
                            <td class="tam-coluna">'.$cadastro->nome.'</td>
                            <td>'.$cadastro->cpf.'</td>
                            <td>
                                <a href="listar_consultas.php?id='.$cadastro->id.'">
                                    <button type="button" class="btn btn-primary">Prontuário</button>
                                </a>
                                <a href="editar_ficha.php?id='.$cadastro->id.'">
                                    <button type="button" class="btn btn-primary">Ficha</button>
                                </a>
                                <a href="editar.php?id='.$cadastro->id.'">
                                    <button type="button" class="btn btn-primary">Editar</button>
                                </a>
                                <a href="excluir.php?id='.$cadastro->id.'">
                                    <button type="button" class="btn btn-danger">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                            <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                                        </svg>
                                    </button>
                                </a>
                            </td>
                        </tr>';

    }

    $resultados = strlen($resultados) ? $resultados : '<tr>
                                                            <td colspan="10" class="text-center">
                                                                <p>Nenhum cadastro encontrado.</p>
                                                            </td>
                                                        </tr>';


    unset($_GET['pagina']);
    $gets = http_build_query($_GET);
                                                    
    $paginacao = '';
    $paginas = $pagination->getPages();
    foreach($paginas as $key=>$pagina){
        $class = $pagina['atual'] ? 'btn-dark' : 'btn-danger';
        $paginacao .='<a href="?pagina='.$pagina['pagina'].'&'.$gets.'">
                        <button type="button" class="btn '.$class.'">'.$pagina['pagina'].'</button>
                      </a>  ';
    }
    

?>

<main>

    <div class="container area area-home"> 
        <div class="row justify-content-between"> 
            <div class="col-md-6">  
                <form method="GET" >
                    <div class="input-group search">
                        <input type="search" name="busca" class="form-control rounded" value="<?=$busca?>" placeholder="Digite o nome do paciente"/>
                        <button type="submit" class="btn btn-primary">Pesquisar</button>
                    </div>    
                </form>
            </div>
            <div class="col-md-2" align="end">
                <div class="">
                    <a href="cadastrar.php">
                        <button class="btn btn-success button-cad">Cadastrar </button>
                    </a>
                </div>  
            </div>
        </div>
        <?=$mensagem?>
        <div class="row m-2 table-responsive">
            <table class="table bg-light mt-3 table-hover">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nome</th>      
                        <th>CPF</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?=$resultados?>
                </tbody>
            </table>            
        </div>   
    </div>

    <div class="container mt-3">
        <?=$paginacao?>
    </div>
    

    <div class="cadastrar">
        <div>            
            <a href="cadastrar.php">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
                <path d="M8 0a1 1 0 0 1 1 1v6h6a1 1 0 1 1 0 2H9v6a1 1 0 1 1-2 0V9H1a1 1 0 0 1 0-2h6V1a1 1 0 0 1 1-1z"/>
                </svg>
            </a>
        </div>
    </div>


</main>