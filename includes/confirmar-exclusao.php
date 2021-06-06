<main class="container area text-center bg-light" >
    <div class="p-4">
        <h2><?=TITLE?></h2>

        <form method="POST">
            <div>
                <p><?=TEXTO?></p>
            </div>

            <div class="form-group">
                <a href="<?=LINK?>">
                    <button type="button" class="btn btn-success">Cancelar</button>
                </a>
                <button type="submit" name="excluir" class="btn btn-danger">Excluir</button>
            </div>
        </form>
    </div>
</main>