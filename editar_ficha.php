<?php

    require __DIR__.'/vendor/autoload.php';

    use \App\Entity\Ficha;
    use \App\Entity\Cadastro;
    use \App\Entity\QuestSaude;
    use \App\Entity\QuestInfantil;
    use \App\Entity\ExameFisico;
    use \App\Db\Infos;

    $info = new Infos;
    $questoes = $info->getQuestoes();
    $doencas = $info->getDoencas();
    $fisico = $info->getFisico();

    $conduta = null;
    $condutas = null;
    $psicomot = null;
    $psicomots = null;
    $prim_anos = null;
    $prime_anos = null;

    if(!isset($_GET['id']) or !is_numeric($_GET['id'])){
        header('location: index.php?status=error');
        exit;
    }

    $ficha = Ficha::getFicha($_GET['id']);    
    $questSaude = QuestSaude::getQuestionarioSaude($_GET['id']);
    $questInfantil = QuestInfantil::getQuestionarioInfantil($_GET['id']);
    $exameFisico = ExameFisico::getExameFisico($_GET['id']);
    $cadastro = Cadastro::getCadastro($_GET['id']);
    //echo "<pre>"; print_r($ficha); echo "</pre>"; exit;

    if(!$ficha instanceof Ficha){
        header('location: index.php?status=error');
        exit;
    }

    if(isset($_POST['pat_conduta'])){
        $conduta = $_POST['pat_conduta'];
    }

    if($conduta !== NULL){
        for($i = 0; $i < count($conduta); $i++){
            $condutas .= "{$conduta[$i]} ";
        }
    }

    if(isset($_POST['psicomotora'])){
        $psicomot = $_POST['psicomotora'];
    }

    if($psicomot !== NULL){
        for($i = 0; $i < count($psicomot); $i++){
            $psicomots .= "{$psicomot[$i]} ";
        }
    }

    if(isset($_POST['primeiros_anos'])){
        $prim_anos = $_POST['primeiros_anos'];
    }

    if($prim_anos !== NULL){
        for($i = 0; $i < count($prim_anos); $i++){
            $prime_anos .= "{$prim_anos[$i]} ";
        }
    }

    if(isset($_POST['aluno'])){
            //echo "<pre>"; print_r($_POST['pat_conduta']); echo "</pre>"; exit;

            $ficha->aluno = $_POST['aluno'];
            $ficha->professor = $_POST['professor'];
            $ficha->queixa = $_POST['queixa'];
            $ficha->hist_doenca = $_POST['hist_doenca'];
            $ficha->diag_presunt = $_POST['diag_presunt'];
            $ficha->exame_comp = $_POST['exame_comp'];
            $ficha->diag_def = $_POST['diag_def'];
            $ficha->tratamento = $_POST['tratamento'];
            $ficha->plano_tratamento = $_POST['plano_tratamento'];
            $ficha->urgente = $_POST['urgente'];
            $ficha->medicacao = $_POST['medicacao'] == NULL ? '' :  $_POST['medicacao'];
            $ficha->veracidade = $_POST['veracidade'];

            $questSaude->hemorragia = $_POST['hemorragia'] == NULL ? '' :  $_POST['hemorragia'];
            $questSaude->alergia = $_POST['alergia'] == NULL ? '' :  $_POST['alergia'];
            $questSaude->reumatismo = $_POST['reumatismo'] == NULL ? '' :  $_POST['reumatismo'];
            $questSaude->cardio = $_POST['cardio'] == NULL ? '' :  $_POST['cardio'];
            $questSaude->gastrite = $_POST['gastrite'] == NULL ? '' :  $_POST['gastrite'];
            $questSaude->diabetes = $_POST['diabetes'] == NULL ? '' :  $_POST['diabetes'];
            $questSaude->desmaio = $_POST['desmaio'] == NULL ? '' :  $_POST['desmaio'];
            $questSaude->trat_medico = $_POST['trat_medico'] == NULL ? '' :  $_POST['trat_medico'];
            $questSaude->medicamento = $_POST['medicamento'] == NULL ? '' :  $_POST['medicamento'];
            $questSaude->doente_operado = $_POST['doente_operado'] == NULL ? '' :  $_POST['doente_operado'];
            $questSaude->vicios = $_POST['vicios'] == NULL ? '' :  $_POST['vicios'];
            $questSaude->ansie_depre = $_POST['ansie_depre'] == NULL ? '' :  $_POST['ansie_depre'];
            $questSaude->tuberculose = $_POST['tuberculose'] == NULL ? '' :  $_POST['tuberculose'];
            $questSaude->sifilis = $_POST['sifilis'] == NULL ? '' :  $_POST['sifilis'];
            $questSaude->hepatite = $_POST['hepatite'] == NULL ? '' :  $_POST['hepatite'];
            $questSaude->sarampo = $_POST['sarampo'] == NULL ? '' :  $_POST['sarampo'];
            $questSaude->caxumba = $_POST['caxumba'] == NULL ? '' :  $_POST['caxumba'];
            $questSaude->varicela = $_POST['varicela'] == NULL ? '' :  $_POST['varicela'];
            $questSaude->outras = $_POST['outras'];

            $questInfantil->hist_gestacao = $_POST['hist_gestacao'];
            $questInfantil->parto = $_POST['parto'] == NULL ? '' :  $_POST['parto'];
            $questInfantil->problema_parto = $_POST['problema_parto'] == NULL ? '' :  $_POST['problema_parto'];
            $questInfantil->amamentacao = $_POST['amamentacao'] == NULL ? '' :  $_POST['amamentacao'];
            $questInfantil->amamentou_idade = $_POST['amamentou_idade'];
            $questInfantil->anest_local = $_POST['anest_local'] == NULL ? '' :  $_POST['anest_local'];
            $questInfantil->contagio = $_POST['contagio'] == NULL ? '' :  $_POST['contagio'];
            $questInfantil->vacinada = $_POST['vacinada'] == NULL ? '' :  $_POST['vacinada'];
            $questInfantil->primeiros_anos = $prime_anos == NULL ? '' :  $prime_anos;
            $questInfantil->aprendizado = $_POST['aprendizado'] == NULL ? '' :  $_POST['aprendizado'];
            $questInfantil->animico = $_POST['animico'] == NULL ? '' :  $_POST['animico'];
            $questInfantil->sono = $_POST['sono'] == NULL ? '' :  $_POST['sono'];
            $questInfantil->psicomotora = $psicomots == NULL ? '' :  $psicomots;
            $questInfantil->alimentacao = $_POST['alimentacao'] == NULL ? '' :  $_POST['alimentacao'];
            $questInfantil->sociabilidade = $_POST['sociabilidade'] == NULL ? '' :  $_POST['sociabilidade'];            
            $questInfantil->pat_conduta = $condutas == NULL ? '' :  $condutas;
            $questInfantil->obs = $_POST['obs'];

            $exameFisico->labios = $_POST['labios'] == NULL ? '' :  $_POST['labios'];
            $exameFisico->mucosa_jugal = $_POST['mucosa_jugal'] == NULL ? '' :  $_POST['mucosa_jugal'];
            $exameFisico->lingua = $_POST['lingua'] == NULL ? '' :  $_POST['lingua'];
            $exameFisico->soalho_boca = $_POST['soalho_boca'] == NULL ? '' :  $_POST['soalho_boca'];
            $exameFisico->palato_duro = $_POST['palato_duro'] == NULL ? '' :  $_POST['palato_duro'];
            $exameFisico->garganta = $_POST['garganta'] == NULL ? '' :  $_POST['garganta'];
            $exameFisico->palato_mole = $_POST['palato_mole'] == NULL ? '' :  $_POST['palato_mole'];
            $exameFisico->mucosa_alv = $_POST['mucosa_alv'] == NULL ? '' :  $_POST['mucosa_alv'];
            $exameFisico->gengivas = $_POST['gengivas'] == NULL ? '' :  $_POST['gengivas'];
            $exameFisico->gland_saliva = $_POST['gland_saliva'] == NULL ? '' :  $_POST['gland_saliva'];
            $exameFisico->linfonodos = $_POST['linfonodos'] == NULL ? '' :  $_POST['linfonodos'];
            $exameFisico->atm = $_POST['atm'] == NULL ? '' :  $_POST['atm'];
            $exameFisico->musc_mastiga = $_POST['musc_mastiga'] == NULL ? '' :  $_POST['musc_mastiga'];
            $exameFisico->oclusao = $_POST['oclusao'] == NULL ? '' :  $_POST['oclusao'];
            $exameFisico->alteracoes = $_POST['alteracoes'];
            $exameFisico->arterial_max = $_POST['arterial_max'];
            $exameFisico->arterial_min = $_POST['arterial_min'];

        //echo "<pre>"; print_r($ficha); echo "</pre>"; exit;

        
        $ficha->atualizar();
        $questSaude->atualizar();
        $questInfantil->atualizar();
        $exameFisico->atualizar();

        header('location: index.php?status=success');

        exit;
    }



    include __DIR__.'/includes/header.php';
    include __DIR__.'/includes/ficha.php';
    include __DIR__.'/includes/footer.php';