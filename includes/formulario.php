
<div class="container area area-forms">    
    <h1><?=TITLE?></h1> 

    <form method="POST">
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="nome">Nome Completo</label>
                    <input required class="form-control" name="nome" type="text" value="<?=$cadastro->nome?>" placeholder="Digite seu nome completo" minlength="4" maxlength="50">
                </div>
            </div>
        </div>
        <div class="row ">                
            <div class="col-md-3">
                <div class="form-group">
                    <label>Data de Nascimento</label>
                    <input required class="form-control" name="data_nasc" type="date" value="<?=date('Y-m-d',strtotime($cadastro->data_nasc))?>" placeholder="dd/mm/aaaa" min="1900-01-01" max=""/>
                        
                    </input>
                </div>     
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <legend class="col-form-label">Sexo</legend>
                    <div class="form-check form-check-inline">                            
                        
                        <input class="form-check-input" type="radio" name="sexo" id="feminino" value="F"
                            <?=$cadastro->sexo == 'F' ? 'checked' : ''?>
                        >
                        <label class="form-check-label" for="feminino">Feminino</label>
                    </div>
                    <div class="form-check form-check-inline">                            
                        <input class="form-check-input" type="radio" name="sexo" id="masculino" value="M"
                            <?=$cadastro->sexo == 'M' ? 'checked' : ''?>
                        >
                        <label class="form-check-label" for="masculino">Masculino</label>
                    </div>
                    <div class="form-check form-check-inline">                            
                        <input class="form-check-input" type="radio" name="sexo" id="outro" value="O"
                            <?=$cadastro->sexo == 'O' ? 'checked' : ''?>
                        >
                        <label class="form-check-label" for="outro">Outro</label>
                    </div>
                </div>  
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="cor">Cor</label>
                    <select class="form-control" name="cor" id="cor">
                        <option selected>Escolha...</option>
                        <option <?=$cadastro->cor == 'Branco' ? 'selected' : ''?>>Branco</option>
                        <option <?=$cadastro->cor == 'Pardo' ? 'selected' : ''?>>Pardo</option>
                        <option <?=$cadastro->cor == 'Negro' ? 'selected' : ''?>>Negro</option>
                    </select>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="altura">Altura</label>
                    <input class="form-control" type="number" step="0.01" name="altura" value="<?=$cadastro->altura?>" id="altura" placeholder="Em metros" min="0" max="4">
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="peso">Peso</label>
                    <input class="form-control" type="number" step="0.01" name="peso" value="<?=$cadastro->peso?>" id="peso" placeholder="Kg" min="0" max="300">
                </div>
            </div>
        </div>    
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label for="escolaridade">Escolaridade</label>
                    <select class="form-control" name="escolaridade" id="escolaridade">
                        <option value="" selected>Escolha...</option>
                        <option <?=$cadastro->escolaridade == 'Ensino Médio Incompleto' ? 'selected' : ''?>>Ensino Médio Incompleto</option>
                        <option <?=$cadastro->escolaridade == 'Ensino Médio Completo' ? 'selected' : ''?>>Ensino Médio Completo</option>
                        <option <?=$cadastro->escolaridade == 'Ensino Superior' ? 'selected' : ''?>>Ensino Superior</option>
                    </select>
                </div>
            </div>
            <div class="col-md-5">
                <div class="form-group">
                    <label for="profissao">Profissão</label>
                    <input class="form-control " name="profissao" type="text" value="<?=$cadastro->profissao?>" placeholder="Digite a profissão">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <label for="rg">RG</label>
                <input class="form-control " name="rg" type="text" value="<?=$cadastro->rg?>">
            </div>
            <div class="col-md-4">
                <label for="cpf">CPF</label> <?=$verificador?>
                <input required class="form-control " name="cpf" type="text" value="<?=$cadastro->cpf?>">
                
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="estado_civil">Estado Civil</label>
                    <select class="form-control" name="estado_civil" id="estado_civil">
                        <option value="" selected>Escolha...</option>
                        <option <?=$cadastro->estado_civil == 'Solteiro' ? 'selected' : ''?>>Solteiro</option>
                        <option <?=$cadastro->estado_civil == 'Casado' ? 'selected' : ''?>>Casado</option>
                        <option <?=$cadastro->estado_civil == 'Divorciado' ? 'selected' : ''?>>Divorciado</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">                        
                    <label for="naturalidade">Naturalidade</label>
                    <input class="form-control " name="naturalidade" type="text" value="<?=$cadastro->naturalidade?>" placeholder="Digite a cidade">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="estado_nat">Estado</label>
                    <select class="form-control" name="estado_nat" id="estado_nat">
                        <?php foreach($estados as $sigla => $estado): ?>                        
                            <option <?=$cadastro->estado_nat == $sigla ? 'selected' : ''?> value="<?=$sigla?>"><?=$estado?></option>                        
                        <?php endforeach ?>
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <h2>Filiação</h2>
            <div class="col-md-8">
                <div class="form-group">
                    <label for="pai">Nome do Pai</label>
                    <input class="form-control" name="pai" type="text" value="<?=$cadastro->pai?>"placeholder="Nome completo do Pai">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="pai_nac">Nacionalidade</label>
                    <select class="form-control" name="pai_nac" id="pai_nac">
                        <option value=""selected>Escolha...</option>
                        <option <?=$cadastro->pai_nac == 'Brasil' ? 'selected' : ''?>>Brasil</option>
                        <option <?=$cadastro->pai_nac == 'Outro' ? 'selected' : ''?>>Outro</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="form-group">
                    <label for="mae">Nome da Mãe</label>
                    <input class="form-control " name="mae" type="text" value="<?=$cadastro->mae?>" placeholder="Nome completo da Mãe">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="mae_nac">Nacionalidade</label>
                    <select class="form-control" name="mae_nac" id="mae_nac">
                        <option value="" selected>Escolha...</option>
                        <option <?=$cadastro->mae_nac == 'Brasil' ? 'selected' : ''?>>Brasil</option> 
                        <option <?=$cadastro->mae_nac == 'Outro' ? 'selected' : ''?>>Outro</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <h2>Contato</h2>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="tel">Telefone</label>
                    <input class="form-control " name="tel" type="text" value="<?=$cadastro->tel?>" placeholder="(11)3000-0000">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="cel1">Celular</label>
                    <input class="form-control " name="cel1" type="text" value="<?=$cadastro->cel1?>" placeholder="(11)99999-9999">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="cel2">Celular</label>
                    <input class="form-control " name="cel2" type="text" value="<?=$cadastro->cel2?>" placeholder="(11)99999-9999">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="form-group">
                    <label for="endereco">Endereço</label>
                    <input class="form-control " name="endereco" type="text" value="<?=$cadastro->endereco?>" placeholder="Ex.: Avenida Getúlio Vargas">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="num_endereco">Número</label>
                    <input class="form-control " name="num_endereco" type="text" value="<?=$cadastro->num_endereco?>" placeholder="Nº Endereço">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="complemento">Complemento</label>
                    <input class="form-control " name="complemento" type="text" value="<?=$cadastro->complemento?>" placeholder="Ex.: apto 8, fundos...">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="bairro">Bairro</label>
                    <input class="form-control " name="bairro" type="text" value="<?=$cadastro->bairro?>">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="cep">CEP</label>
                    <input class="form-control " name="cep" type="text" value="<?=$cadastro->cep?>" placeholder="Ex.: 17000-000">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="cidade">Cidade</label>
                    <input class="form-control " name="cidade" type="text" value="<?=$cadastro->cidade?>">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="estado_atual">Estado</label>
                    <select class="form-control" name="estado_atual" id="estado_atual">
                        <?php foreach($estados as $sigla => $estado): ?>                        
                            <option <?=$cadastro->estado_atual == $sigla ? 'selected' : ''?> value="<?=$sigla?>"><?=$estado?></option>                        
                        <?php endforeach ?>
                    </select>
                </div>
            </div>
        </div>            
        <div class="row">
            <div class="col">
                <h2>Termo de Responsabilidade</h2>
                <iframe src="./assets/documents/termo.pdf"></iframe>
            </div>
        </div>   
        <div class="row">
            <div class="col">
                <div class="form-check">
                    <input required class="form-check-input" type="checkbox" value="1" name="veracidade" id="veracidade"
                            <?=$cadastro->veracidade == 1 ? 'checked' : ''?>>
                    <label class="form-check-label" for="veracidade">
                        Afirmo a veracidade dos dados acima.
                    </label>
                    
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col">
                <div class="form-check">
                    <input required class="form-check-input" type="checkbox" value="1" name="declaracao" id="declaracao"
                        <?=$cadastro->declaracao == 1 ? 'checked' : ''?>>
                    <label class="form-check-label" for="declaracao">
                        Declaro que efetuei a leitura de toda esta autorização, aceito e concordo com o acima exposto.
                    </label>
                </div>
            </div>
        </div>
        <div class="row">
            <div col>
                <input type="submit" value="Salvar" class="btn btn-lg btn-success w-100"/> 
            </div>
        </div>         
    </form> 
</div>   