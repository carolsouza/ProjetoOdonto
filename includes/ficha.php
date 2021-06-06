<?php
    $i = 1;  

?>
    
    <!--Começo Ficha-->
    <div class="container area area-forms">
        <h1>Ficha de Avaliação do Paciente</h1>
        <form method="POST">
            <div class="row">
                <div class="col-md-8">
                    <div class="form-group">
                        <label>Nome do Paciente:</label>
                        <input readonly class="form-control" value="<?=$cadastro->nome ?>" type="text" name="nome">
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label>Cadastro Nº:</label>
                        <input readonly class="form-control" value="<?=$ficha->id ?>" type="text"  name="id">
                    </div>
                </div>
            </div>
            <!--------------------------------------------------------------------------------->
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Aluno:</label>
                        <input required class="form-control" type="text" name="aluno" value="<?=$ficha->aluno?>">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Professor:</label>
                        <input class="form-control" type="text" name="professor" value="<?=$ficha->professor?>">
                    </div>
                </div>
            </div>            
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="queixa">Queixa Principal:</label>
                        <textarea class="form-control" name="queixa" id="queixa" rows="3"><?=$ficha->queixa?></textarea>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="hist_doenca">História da doença atual:</label>
                        <textarea class="form-control" name="hist_doenca" id="hist_doenca" rows="3"><?=$ficha->hist_doenca?></textarea>
                    </div>
                </div>
            </div>

            <!-------------------------Começo questionário de Saúde--------------------------------------------------------->
            <h4>Questionário de Saúde</h4>
            <?php foreach($questoes as $chaves => $descricoes):?>
                <div class="row questions">
                    <div class="col-md-4">                    
                        <div class="form-group">
                            <label class="lb"><?=$descricoes?></label> 
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <div class="form-check form-check-inline">                            
                                <input class="form-check-input rd input-check1" type="radio" name="<?=$chaves?>" id="sim<?=$i?>" value="sim"
                                    <?=$questSaude->$chaves == 'sim' ? 'checked' : ''?>
                                >
                                <label class="form-check-label lb-check1" for="sim<?=$i?>">Sim</label>
                            </div>
                            <div class="form-check form-check-inline">                            
                                <input class="form-check-input rd input-check2" type="radio" name="<?=$chaves?>" id="nao<?=$i?>" value="nao"
                                    <?=$questSaude->$chaves == 'nao' ? 'checked' : ''?>
                                >
                                <label class="form-check-label lb-check2" for="nao<?=$i?>">Não</label>
                            </div>
                        </div>                    
                    </div>
                </div> 
                <hr>
            <?php $i++; endforeach ?>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <h5>Você e/ou algum familiar teve alguma dessas doenças:</h5>
                    </div>
                </div>
            </div>

            <div class="doencas-area">
            <?php foreach($doencas as $chaves => $descricoes):?>
                <div class="row questions">
                    <div class="col-md-4">                    
                        <div class="form-group">
                            <label class="lb"><?=$descricoes?></label> 
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <div class="form-check form-check-inline">                            
                                <input class="form-check-input rd input-check1" type="radio" name="<?=$chaves?>" id="sim<?=$i?>" value="sim"
                                    <?=$questSaude->$chaves == 'sim' ? 'checked' : ''?>
                                >
                                <label class="form-check-label lb-check1" for="sim<?=$i?>">Sim</label>
                            </div>
                            <div class="form-check form-check-inline">                            
                                <input class="form-check-input rd input-check2" type="radio" name="<?=$chaves?>" id="nao<?=$i?>" value="nao"
                                    <?=$questSaude->$chaves == 'nao' ? 'checked' : ''?>
                                >
                                <label class="form-check-label lb-check2" for="nao<?=$i?>">Não</label>
                            </div>
                        </div>                    
                    </div>
                </div> 
                <hr>
            <?php $i++; endforeach ?>
            </div>
            <div class="row align-items-center">
                <div class="col-md-1">
                    <label class="lb">Outras</label>
                </div>
                <div class="col-md-4">
                    <input class="form-control" type="text" name="outras" placeholder="Qual?" value="<?=$questSaude->outras?>">
                </div>
            </div>
            <!--------------------------Fim questionário de Saúde-------------------------------------------------------------------->
            
            <!-----------------------Começo Questionário Pediátrico----------------------------------------------------------------->
            <h4>Questionário complementar infantil - Odontopediatria</h4>
            <div class="q-pediatrico">
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label>História da gestação:</label>
                            <input class="form-control" name="hist_gestacao" type="text" value="<?=$questInfantil->hist_gestacao?>">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label>Nasceu de parto:</label>
                            <div class="form-check form-check-inline">                            
                                <input class="form-check-input" type="radio" name="parto" id="normal" value="Normal"
                                <?=$questInfantil->parto == 'Normal' ? 'checked' : ''?>>
                                <label class="form-check-label" for="normal">Normal</label>
                            </div>
                            <div class="form-check form-check-inline">                            
                                <input class="form-check-input" type="radio" name="parto" id="forceps" value="Forceps"
                                <?=$questInfantil->parto == 'Forceps' ? 'checked' : ''?>
                                >
                                <label class="form-check-label" for="forceps">A fórceps</label>
                            </div>
                            <div class="form-check form-check-inline">                            
                                <input class="form-check-input" type="radio" name="parto" id="cesariana" value="Cesariana"
                                <?=$questInfantil->parto == 'Cesariana' ? 'checked' : ''?>
                                >
                                <label class="form-check-label" for="cesariana">Cesariana</label>
                            </div>                            
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label>A criança teve algum problema no parto?</label>
                            <div class="form-check form-check-inline">                            
                                <input class="form-check-input" type="radio" name="problema_parto" id="sim20" value="sim"
                                    <?=$questInfantil->problema_parto == 'sim' ? 'checked' : ''?>
                                >
                                <label class="form-check-label" for="sim20">Sim</label>
                            </div>
                            <div class="form-check form-check-inline">                            
                                <input class="form-check-input" type="radio" name="problema_parto" id="nao20" value="nao"
                                    <?=$questInfantil->problema_parto == 'nao' ? 'checked' : ''?>
                                >
                                <label class="form-check-label" for="nao20">Não</label>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row align-items-center">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>A amamentação foi:</label>
                            <div class="form-check form-check-inline">                            
                                <input class="form-check-input" type="radio" name="amamentacao" id="natural" value="natural"
                                    <?=$questInfantil->amamentacao == 'natural' ? 'checked' : ''?>
                                >
                                <label class="form-check-label" for="natural">Natural</label>
                            </div>
                            <div class="form-check form-check-inline">                            
                                <input class="form-check-input" type="radio" name="amamentacao" id="mamadeira" value="mamadeira"
                                    <?=$questInfantil->amamentacao == 'mamadeira' ? 'checked' : ''?>
                                >
                                <label class="form-check-label" for="mamadeira">Mamadeira</label>
                            </div>
                        </div> 
                    </div>
                    <div class="col-md-1">
                        <div class="form-group">
                            <label>Até a idade de:</label>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <input class="form-control" name="amamentou_idade" type="text" value="<?=$questInfantil->amamentou_idade?>"> 
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label>Já lhe foi dito para não tomar anestesia local?</label>
                            <div class="form-check form-check-inline">                            
                                <input class="form-check-input" type="radio" name="anest_local" id="sim21" value="sim"
                                    <?=$questInfantil->anest_local == 'sim' ? 'checked' : ''?>
                                >
                                <label class="form-check-label" for="sim21">Sim</label>
                            </div>
                            <div class="form-check form-check-inline">                            
                                <input class="form-check-input" type="radio" name="anest_local" id="nao21" value="nao"
                                    <?=$questInfantil->anest_local == 'nao' ? 'checked' : ''?>
                                >
                                <label class="form-check-label" for="nao21">Não</label>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label>Já teve ou viveu com alguém que tivesse doença grave e contagiosa?</label>
                            <div class="form-check form-check-inline">                            
                                <input class="form-check-input" type="radio" name="contagio" id="sim22" value="sim"
                                    <?=$questInfantil->contagio == 'sim' ? 'checked' : ''?>
                                >
                                <label class="form-check-label" for="sim22">Sim</label>
                            </div>
                            <div class="form-check form-check-inline">                            
                                <input class="form-check-input" type="radio" name="contagio" id="nao22" value="nao"
                                    <?=$questInfantil->contagio == 'nao' ? 'checked' : ''?>
                                >
                                <label class="form-check-label" for="nao22">Não</label>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label>A criança já foi vacinada?</label>
                            <div class="form-check form-check-inline">                            
                                <input class="form-check-input" type="radio" name="vacinada" id="sim23" value="sim"
                                    <?=$questInfantil->vacinada == 'sim' ? 'checked' : ''?>
                                >
                                <label class="form-check-label" for="sim23">Sim</label>
                            </div>
                            <div class="form-check form-check-inline">                            
                                <input class="form-check-input" type="radio" name="vacinada" id="nao23" value="nao"
                                    <?=$questInfantil->vacinada == 'nao' ? 'checked' : ''?>
                                >
                                <label class="form-check-label" for="nao23">Não</label>
                            </div>
                        </div>
                    </div>
                </div>

                <h5>Conduta da criança</h5>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label>Durante os 2 primeiros anos de vida:</label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="primeiros_anos[]" value="sentou" id="sentou"
                                <?= mb_strpos($questInfantil->primeiros_anos, 'sentou') !== false ? 'checked' : ''?>
                                >
                                <label class="form-check-label" for="sentou">sentou-se</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="primeiros_anos[]" value="engatinhou" id="engatinhou"
                                <?= mb_strpos($questInfantil->primeiros_anos, 'engatinhou') !== false ? 'checked' : ''?>
                                >
                                <label class="form-check-label" for="engatinhou">engatinhou</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="primeiros_anos[]" value="andou" id="andou"
                                <?= mb_strpos($questInfantil->primeiros_anos, 'andou') !== false ? 'checked' : ''?>
                                >
                                <label class="form-check-label" for="andou">andou</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="primeiros_anos[]" value="falou" id="falou"
                                <?= mb_strpos($questInfantil->primeiros_anos, 'falou') !== false ? 'checked' : ''?>
                                >
                                <label class="form-check-label" for="falou">falou</label>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label>No lar e na escola: teve alguma dificuldade no aprendizado?</label>
                            <div class="form-check form-check-inline">                            
                                <input class="form-check-input" type="radio" name="aprendizado" id="sim24" value="sim"
                                    <?=$questInfantil->aprendizado == 'sim' ? 'checked' : ''?>
                                >
                                <label class="form-check-label" for="sim24">Sim</label>
                            </div>
                            <div class="form-check form-check-inline">                            
                                <input class="form-check-input" type="radio" name="aprendizado" id="nao24" value="nao"
                                    <?=$questInfantil->aprendizado == 'nao' ? 'checked' : ''?>
                                >
                                <label class="form-check-label" for="nao24">Não</label>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label>Estado anímico:</label>
                            <div class="form-check form-check-inline">                            
                                <input class="form-check-input" type="radio" name="animico" id="alegre" value="alegre"
                                    <?=$questInfantil->animico == 'alegre' ? 'checked' : ''?>
                                >
                                <label class="form-check-label" for="alegre">Alegre</label>
                            </div>
                            <div class="form-check form-check-inline">                            
                                <input class="form-check-input" type="radio" name="animico" id="triste" value="triste"
                                    <?=$questInfantil->animico == 'triste' ? 'checked' : ''?>
                                >
                                <label class="form-check-label" for="triste">Triste</label>
                            </div>
                            <div class="form-check form-check-inline">                            
                                <input class="form-check-input" type="radio" name="animico" id="timido" value="timido"
                                    <?=$questInfantil->animico == 'timido' ? 'checked' : ''?>
                                >
                                <label class="form-check-label" for="timido">Tímido</label>
                            </div>
                            <div class="form-check form-check-inline">                            
                                <input class="form-check-input" type="radio" name="animico" id="tranquilo" value="tranquilo"
                                    <?=$questInfantil->animico == 'tranquilo' ? 'checked' : ''?>
                                >
                                <label class="form-check-label" for="tranquilo">Tranquilo</label>
                            </div>
                            <div class="form-check form-check-inline">                            
                                <input class="form-check-input" type="radio" name="animico" id="inquieto" value="inquieto"
                                    <?=$questInfantil->animico == 'inquieto' ? 'checked' : ''?>
                                >
                                <label class="form-check-label" for="inquieto">Inquieto</label>
                            </div>
                            <div class="form-check form-check-inline">                            
                                <input class="form-check-input" type="radio" name="animico" id="assustado" value="assustado"
                                    <?=$questInfantil->animico == 'assustado' ? 'checked' : ''?>
                                >
                                <label class="form-check-label" for="assustado">Assustado</label>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label>Tem sono:</label>
                            <div class="form-check form-check-inline">                            
                                <input class="form-check-input" type="radio" name="sono" id="tranq" value="tranquilo"
                                    <?=$questInfantil->sono == 'tranquilo' ? 'checked' : ''?>
                                >
                                <label class="form-check-label" for="tranq">Tranquilo</label>
                            </div>
                            <div class="form-check form-check-inline">                            
                                <input class="form-check-input" type="radio" name="sono" id="intranquilo" value="intranquilo"
                                    <?=$questInfantil->sono == 'intranquilo' ? 'checked' : ''?>
                                >
                                <label class="form-check-label" for="intranquilo">Intranquilo</label>
                            </div>
                            <div class="form-check form-check-inline">                            
                                <input class="form-check-input" type="radio" name="sono" id="terror-noturno" value="terror-noturno"
                                    <?=$questInfantil->sono == 'terror-noturno' ? 'checked' : ''?>
                                >
                                <label class="form-check-label" for="terror-noturno">Terror Noturno</label>
                            </div>
                            <div class="form-check form-check-inline">                            
                                <input class="form-check-input" type="radio" name="sono" id="pesadelos" value="pesadelos"
                                    <?=$questInfantil->sono == 'pesadelos' ? 'checked' : ''?>
                                >
                                <label class="form-check-label" for="pesadelos">Pesadelos</label>
                            </div>
                            <div class="form-check form-check-inline">                            
                                <input class="form-check-input" type="radio" name="sono" id="sonambulismo" value="sonambulismo"
                                    <?=$questInfantil->sono == 'sonambulismo' ? 'checked' : ''?>
                                >
                                <label class="form-check-label" for="sonambulismo">Sonambulismo</label>
                            </div>
                            <div class="form-check form-check-inline">                            
                                <input class="form-check-input" type="radio" name="sono" id="insonia" value="insonia"
                                    <?=$questInfantil->sono == 'insonia' ? 'checked' : ''?>
                                >
                                <label class="form-check-label" for="insonia">Insonia</label>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label>Conduta psicomotora:</label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="psicomotora[]" value="Postura normal" id="post-normal"
                                <?= mb_strpos($questInfantil->psicomotora, 'Postura normal') !== false ? 'checked' : ''?>
                                >
                                <label class="form-check-label" for="post-normal">
                                    Postura normal
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="psicomotora[]" value="Postura alterada" id="post-alt"
                                <?= mb_strpos($questInfantil->psicomotora, 'Postura alterada') !== false ? 'checked' : ''?>
                                >
                                <label class="form-check-label" for="post-alt">
                                    Postura alterada
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="psicomotora[]" value="Formação normal" id="form-normal"
                                <?= mb_strpos($questInfantil->psicomotora, 'Formação normal') !== false ? 'checked' : ''?>
                                >
                                <label class="form-check-label" for="form-normal">
                                    Formação normal
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="sicomotora[]" value="Distúrbios da fala" id="dist-fala"
                                <?= mb_strpos($questInfantil->psicomotora, 'Distúrbios da fala') !== false ? 'checked' : ''?>
                                >
                                <label class="form-check-label" for="dist-fala">
                                    Distúrbios da fala
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="psicomotora[]" value="Alguma paralisia" id="paralisia"
                                <?= mb_strpos($questInfantil->psicomotora, 'Alguma paralisia') !== false ? 'checked' : ''?>
                                >
                                <label class="form-check-label" for="paralisia">
                                    Alguma paralisia
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="psicomotora[]" value="Enurese noturna" id="enurese-not"
                                <?= mb_strpos($questInfantil->psicomotora, 'Enurese noturna') !== false ? 'checked' : ''?>
                                >
                                <label class="form-check-label" for="enurese-not">
                                    Enurese noturna
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="psicomotora[]" value="Descontrole dos esfíncteres" id="esfincteres"
                                <?= mb_strpos($questInfantil->psicomotora, 'Descontrole dos esfíncteres') !== false ? 'checked' : ''?>
                                >
                                <label class="form-check-label" for="esfincteres">
                                    Descontrole dos esfíncteres
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label>Alimentação:</label>
                            <div class="form-check form-check-inline">                            
                                <input class="form-check-input" type="radio" name="alimentacao" id="rejeita" value="rejeita"
                                    <?=$questInfantil->alimentacao == 'rejeita' ? 'checked' : ''?>
                                >
                                <label class="form-check-label" for="rejeita">Rejeita</label>
                            </div>
                            <div class="form-check form-check-inline">                            
                                <input class="form-check-input" type="radio" name="alimentacao" id="alim-normal" value="normal"
                                    <?=$questInfantil->alimentacao == 'normal' ? 'checked' : ''?>
                                >
                                <label class="form-check-label" for="alim-normal">Alimenta-se normalmente</label>
                            </div>
                            <div class="form-check form-check-inline">                            
                                <input class="form-check-input" type="radio" name="alimentacao" id="supra" value="supra alimenta-se"
                                    <?=$questInfantil->alimentacao == 'supra alimenta-se' ? 'checked' : ''?>
                                >
                                <label class="form-check-label" for="supra">Supra alimenta-se</label>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label>Sociabilidade:</label>
                            <div class="form-check form-check-inline">                            
                                <input class="form-check-input" type="radio" name="sociabilidade" id="isolada" value="isolada"
                                    <?=$questInfantil->sociabilidade == 'isolada' ? 'checked' : ''?>
                                >
                                <label class="form-check-label" for="isolada">Isolada</label>
                            </div>
                            <div class="form-check form-check-inline">                            
                                <input class="form-check-input" type="radio" name="sociabilidade" id="agressiva" value="agressiva"
                                    <?=$questInfantil->sociabilidade == 'agressiva' ? 'checked' : ''?>
                                >
                                <label class="form-check-label" for="agressiva">Agressiva</label>
                            </div>
                            <div class="form-check form-check-inline">                            
                                <input class="form-check-input" type="radio" name="sociabilidade" id="rel_normal" value="normal"
                                    <?=$questInfantil->sociabilidade == 'normal' ? 'checked' : ''?>
                                >
                                <label class="form-check-label" for="rel_normal">Relações normais</label>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label>Apresenta patologia de conduta:</label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="pat_conduta[]" value="Tiques" id="tiques"
                                <?= mb_strpos($questInfantil->pat_conduta, 'Tiques') !== false ? 'checked' : ''?>
                                >
                                <label class="form-check-label" for="tiques">
                                    Tiques
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="pat_conduta[]" value="Fobias" id="fobias"
                                <?= mb_strpos($questInfantil->pat_conduta, 'Fobias') !== false ? 'checked' : ''?>
                                >
                                <label class="form-check-label" for="fobias">
                                    Fobias
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="pat_conduta[]" value="Ansiedade" id="ansiedade"
                                <?= mb_strpos($questInfantil->pat_conduta, 'Ansiedade') !== false ? 'checked' : ''?>
                                >
                                <label class="form-check-label" for="ansiedade">
                                    Ansiedade
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="pat_conduta[]" value="Medo" id="medo"
                                <?= mb_strpos($questInfantil->pat_conduta, 'Medo') !== false ? 'checked' : ''?>
                                >
                                <label class="form-check-label" for="medo">
                                    Medo
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="pat_conduta[]" value="Birra" id="birra"
                                <?= mb_strpos($questInfantil->pat_conduta, 'Birra') !== false ? 'checked' : ''?>
                                >
                                <label class="form-check-label" for="birra">
                                    Birra
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="pat_conduta[]" value="Ciúmes" id="ciumes"
                                    <?= mb_strpos($questInfantil->pat_conduta, 'Ciúmes') !== false ? 'checked' : ''?>
                                >
                                <label class="form-check-label" for="ciumes">
                                    Ciúmes
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="obs">Observações:</label>
                            <textarea class="form-control" name="obs" id="obs" rows="3"><?=$questInfantil->obs?></textarea>
                        </div>
                    </div>
                </div>      
            </div>      
            <!------------------------Fim Questionário pediátrico------------------------------------------------------->

            <!------------------------Começo exame físico--------------------------------------------------------------->
            <h5>Exame Físico</h5>
            <div class="ex-fisico">
            <?php foreach($fisico as $chaves => $descricoes):
                ?>
                <div class="row questions">
                    <div class="col-md-4">                    
                        <div class="form-group">
                            <label class="lb"><?=$descricoes?></label> 
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <div class="form-check form-check-inline">                            
                                <input class="form-check-input rd input-check1" type="radio" name="<?=$chaves?>" id="alterado<?=$i?>" value="alterado"
                                    <?=$exameFisico->$chaves == 'alterado' ? 'checked' : ''?>
                                >
                                <label class="form-check-label lb-check1" for="alterado<?=$i?>">Alterado</label>
                            </div>
                            <div class="form-check form-check-inline">                            
                                <input class="form-check-input rd input-check2" type="radio" name="<?=$chaves?>" id="normal<?=$i?>" value="normal"
                                    <?=$exameFisico->$chaves == 'normal' ? 'checked' : ''?>
                                >
                                <label class="form-check-label lb-check2" for="normal<?=$i?>">Normal</label>
                            </div>
                        </div>                    
                    </div>
                </div> 
                <hr>
            <?php $i++; endforeach ?>
            </div>

            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="alteracoes">Alterações encontradas:</label>
                        <textarea class="form-control" name="alteracoes" id="alteracoes" rows="3"><?=$exameFisico->alteracoes?></textarea>
                    </div>
                </div>
            </div>           

            <!------Começo pressão arterial------>
            <h5>Pressão Arterial</h5>
            <div class="row align-items-center">
                <div class="col-md-2">
                    <label>Máxima:</label>
                    <input class="form-control" type="text" placeholder="mmHG" name="arterial_max" value="<?=$exameFisico->arterial_max?>">
                </div>
                <div class="col-md-2">
                    <label>Mínima:</label>
                    <input class="form-control" type="text" placeholder="mmHG" name="arterial_min" value="<?=$exameFisico->arterial_min?>">
                </div>
            </div>
            <!--Fim pressão arterial-->
            <!------------------------Fim exame físico------------------------------------------------------------------>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="diag-presunt">Diagnóstico presuntivo:</label>
                        <textarea class="form-control" name="diag_presunt" id="diag-presunt" rows="3"><?=$ficha->diag_presunt?></textarea>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="exam-compl">Exames complementares:</label>
                        <textarea class="form-control" name="exame_comp" id="exam-compl" rows="3"><?=$ficha->exame_comp?></textarea>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="diag-def">Diagnóstico definitivo:</label>
                        <textarea class="form-control" name="diag_def" id="diag-def" rows="3"><?=$ficha->diag_def?></textarea>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="tratamento">Tratamento/Proservação:</label>
                        <textarea class="form-control" name="tratamento"id="tratamento" rows="3"><?=$ficha->tratamento?></textarea>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="plano-tratamento">Plano de Tratamento:</label>
                        <textarea class="form-control" name="plano_tratamento" id="plano-tratamento" rows="5"><?=$ficha->plano_tratamento?></textarea>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <div class="form-check">
                        <input required class="form-check-input" type="checkbox" name="urgente" value="1" id="urgente"
                            <?=$ficha->urgente == 1 ? 'checked' : ''?>
                        >
                        <label class="form-check-label" for="urgente">
                            Atendimento de Urgência (Estágio Sup. em Clínica Odontológica Integrada - Urgência)
                        </label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label>Medicação:</label>
                        <div class="form-check form-check-inline">                            
                            <input class="form-check-input" type="radio" name="medicacao" id="sim25" value="sim"
                                <?=$ficha->medicacao == 'sim' ? 'checked' : ''?>
                            >
                            <label class="form-check-label" for="sim25">Sim</label>
                        </div>
                        <div class="form-check form-check-inline">                            
                            <input class="form-check-input" type="radio" name="medicacao" id="nao25" value="nao"
                                <?=$ficha->medicacao == 'nao' ? 'checked' : ''?>
                            >
                            <label class="form-check-label" for="nao25">Não</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-check">
                        <input required class="form-check-input" type="checkbox" name="veracidade" value="1" id="veracidade"
                            <?=$ficha->veracidade == 1 ? 'checked' : ''?>
                        >
                        <label class="form-check-label" for="veracidade">
                            Afirmo a veracidade dos dados acima.
                        </label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div col>
                    <input type="submit" value="Salvar" class="btn btn-lg btn-primary w-100"/> 
                </div>
            </div>  
        </form>
    </div>
    <!------------------Fim Ficha------------------------------------------------------------------>
