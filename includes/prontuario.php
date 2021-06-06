<?php

    $resultados = '';
    foreach($consultas as $consulta){
        $resultados .= '
        <div class="row ">
        <div class="col-lg-4 col-md-5 col-xl-3">
            <input type="hidden" name="id_consulta" value="'.$consulta->id_consulta.'"> 
            <h6>Data da consulta:</h6>
        </div>
        <div class="col-md-3">
            <p>'.date('d/m/Y',strtotime($consulta->data_consulta)).'</p>
        </div>                
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-5 col-xl-3">
                <h6>Procedimento realizado:</h6>
                
            </div>
            <div class="col-lg-3 col-md-4 col-xl-7">
                <p>'.$consulta->procedimentos.'</p>
            </div>
            <div class="col-md-2 text-center">
                <a href="excluir_consulta.php?id='.$consulta->id_consulta.'">
                    <button type="button" class="btn btn-danger">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                            <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                        </svg>
                    </button>
                </a>
            </div> 
        </div>
        <hr> ';
    }

    $resultados = strlen($resultados) ? $resultados : '<div>                                                            
                                                            <p>Nenhuma consulta encontrada.</p>                                                            
                                                        </div>'
?>


<div class="container area area-pac-prontuario bg-light"> 
        <h2><?=$cadastro->nome?></h2>
        <div>
            <div >
                <a href="cadastrar_consulta.php?id=<?=$cadastro->id?>">
                   <button type="button" class="btn btn-primary" >
                        Adicionar consulta
                   </button> 
                </a>
                
            </div>  
        </div> 
        <hr>  

        <div class="container">
            
            <form method="POST">
               <?=$resultados?>
            </form>
        </div>

    </div>