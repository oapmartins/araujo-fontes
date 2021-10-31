<main>

    <section>
        <a href="index.php">
            <button class="btn btn-success">Voltar</button>
        </a>
    </section>

    <h3 class="mt-3">Cadastro de Patrimônio</h3>
    <form method="post" class="painel-fundo">

        <div class="row">
            <div class="form-group col-md-3">
                <label for="dataPatrimonio">Data</label>
                <input type="date" class="form-control" id="dataPatrimonio" name="dataPatrimonio">
            </div>
            <div class="form-group col-md-3">
                <label for="idFundo">Fundo</label>
                <select id="idFundo" class="form-control" name="idFundo">
                    <option selected>Escolha o fundo...</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">3</option>
                </select>
            </div>
            <div class="form-group col-md-6">
                <label for="valorPatrimonio">Valor</label>
                <input type="number" class="form-control" id="valorPatrimonio" name="valorPatrimonio" placeholder="Valor do Patrimônio">
            </div>
        </div>

        <div class="row mt-3">
            <div class="form-group">
                <button type="submit" class="btn btn-success">Cadastrar</button>
            </div>
        </div>
    </form>
</main>