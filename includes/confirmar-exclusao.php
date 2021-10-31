<main>

    <section>

    </section>

    <h3 class="mt-3">Excluir Patrimônio</h3>
    <form method="post" class="card">

        <div class="row">

        <div class="form-group">
            <p>Você deseja realmente excluir o Patrimônio de ID <strong><?=$objPatrimonio->id?></strong></p>
        </div>
      
        </div>

        <div class="row mt-3">
            <div class="form-group">
                <a href="index.php">
                    <button type="button" class="btn btn-success">Cancelar</button>
                </a>
                <button type="submit" name="excluir" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Excluir</button>
            </div>
        </div>
    </form>
</main>