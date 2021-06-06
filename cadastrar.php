<?php

    require __DIR__.'/vendor/autoload.php';

    use \App\Entity\Cadastro;
    use \App\Entity\Ficha;
    use \App\Entity\QuestSaude;
    use \App\Entity\QuestInfantil;
    use \App\Entity\ExameFisico;
    use \App\Db\Infos;

    $info = new Infos;
    $estados = $info->getEstados();

    define('TITLE', 'Cadastrar paciente');

    $cadastro = new Cadastro;
    $verificador = '';
    

    if(isset($_POST['nome'], $_POST['cpf'], $_POST['declaracao'])){

        //verificando se exite o mesmo cpf
        $cadastros = Cadastro::getCadastros('cpf = '.$_POST['cpf']);
        
        if($cadastros != NULL){
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

            $cadastro->cadastrar();

            $ficha = new Ficha();
            $ficha->aluno = "";
            $ficha->professor = "";
            $ficha->queixa = "";
            $ficha->hist_doenca = "";
            $ficha->diag_presunt = "";
            $ficha->exame_comp = "";
            $ficha->diag_def = "";
            $ficha->tratamento = "";
            $ficha->plano_tratamento = "";
            $ficha->urgente = "";
            $ficha->medicacao = "";
            $ficha->veracidade = "";

            $ficha->cadastrar();

            $questsaude = new QuestSaude();
            $questsaude->hemorragia = "";
            $questsaude->alergia = "";
            $questsaude->reumatismo = "";
            $questsaude->cardio = "";
            $questsaude->gastrite = "";
            $questsaude->diabetes = "";
            $questsaude->desmaio = "";
            $questsaude->trat_medico = "";
            $questsaude->medicamento = "";
            $questsaude->doente_operado = "";
            $questsaude->vicios = "";
            $questsaude->ansie_depre = "";
            $questsaude->tuberculose = "";
            $questsaude->sifilis = "";
            $questsaude->hepatite = "";
            $questsaude->sarampo = "";
            $questsaude->caxumba = "";
            $questsaude->varicela = "";
            $questsaude->outras = "";

            $questsaude->cadastrar();

            $questinfantil = new QuestInfantil();
            $questinfantil->hist_gestacao = "";
            $questinfantil->parto = "";
            $questinfantil->problema_parto = "";
            $questinfantil->amamentacao = "";
            $questinfantil->amamentou_idade = "";
            $questinfantil->anest_local = "";
            $questinfantil->contagio = "";
            $questinfantil->vacinada = "";
            $questinfantil->primeiros_anos = "";
            $questinfantil->aprendizado = "";
            $questinfantil->animico = "";
            $questinfantil->sono = "";
            $questinfantil->psicomotora = "";
            $questinfantil->alimentacao = "";
            $questinfantil->sociabilidade = "";
            $questinfantil->pat_conduta = "";
            $questinfantil->obs = "";

            $questinfantil->cadastrar();

            $examefisico = new ExameFisico();
            $examefisico->labios = "";
            $examefisico->mucosa_jugal = "";
            $examefisico->lingua = "";
            $examefisico->soalho_boca = "";
            $examefisico->palato_duro = "";
            $examefisico->garganta = "";
            $examefisico->palato_mole = "";
            $examefisico->mucosa_alv = "";
            $examefisico->gengivas = "";
            $examefisico->gland_saliva = "";
            $examefisico->linfonodos = "";
            $examefisico->atm = "";
            $examefisico->musc_mastiga = "";
            $examefisico->oclusao = "";
            $examefisico->alteracoes = "";
            $examefisico->arterial_max = "";
            $examefisico->arterial_min = "";

            $examefisico->cadastrar();

            header('location: index.php?status=success');

            exit;
        }
            //echo "<pre>"; print_r($cadastro); echo "</pre>"; exit;
    }
    



    include __DIR__.'/includes/header.php';
    include __DIR__.'/includes/formulario.php';
    include __DIR__.'/includes/footer.php';