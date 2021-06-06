    <div class="container area area-pac-prontuario"> 
        <h1><?=$cadastro->nome?></h1>
        <hr>
        <form method="POST">        
            <div class="row">
                <div class="col-lg-4 col-md-4 col-xl-3">
                    <label>Data da consulta:</label>
                    <input class="form-control" id="date" type="date" placeholder="dd/mm/aaaa" name="data_consulta" min="2000-01-01">
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <label>Procedimento realizado:</label>
                    <textarea class="form-control" rows="7" name="procedimentos" value="<?=$consulta->procedimentos?>"></textarea>
                </div>
            </div>
            <div class="row">
                <div col>
                    <input type="submit" value="Adicionar" class="btn btn-lg btn-primary w-100"/> 
                </div>
            </div>
        </form>
    </div>