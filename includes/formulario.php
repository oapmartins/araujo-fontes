<main>

    <section>
        <a href="index.php">
            <button class="btn btn-success"><i class="fas fa-arrow-circle-left"></i> Voltar</button>
        </a>
    </section>

    <input type="hidden" id="data" value="<?= !empty($objPatrimonio) ? $objPatrimonio->date : '' ?>">
    <input type="hidden" id="id_fundo" value="<?= !empty($objPatrimonio) ? $objPatrimonio->fundo_id : '0'?>">
    <input type="hidden" id="valor" value="<?= !empty($objPatrimonio) ? $objPatrimonio->value : ''?>">

    <h3 class="mt-3"><?= TITLE ?></h3>
    <form method="post" class="card" id="formCrud">

        <div class="row">
            <div class="form-group col-md-3">
                <label for="dataPatrimonio">Data</label>
                <input type="date" class="form-control" id="dataPatrimonio" name="dataPatrimonio">
            </div>
            <div class="form-group col-md-3">
                <label for="idFundo">Fundo</label>
                <select id="idFundo" class="form-control" name="idFundo">
                    <option value="0" selected>Escolha o fundo...</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                </select>
            </div>
            <div class="form-group col-md-6">
                <label for="valorPatrimonio">Valor</label>
                <input type="number" class="form-control" id="valorPatrimonio" name="valorPatrimonio" placeholder="Valor do Patrimônio">
            </div>
        </div>

        <div class="row mt-3">
            <div class="form-group">
                <button type="button" class="btn btn-success" id="btnCadastrar"><i class="fas fa-plus-circle"></i> <?= TITLEBTN ?></button>
            </div>
        </div>
    </form>
</main>

<script src="./app/js/form.js"></script>