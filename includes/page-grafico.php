<main>

    <section>
        <a href="index.php">
            <button class="btn btn-success"><i class="fas fa-arrow-circle-left"></i> Voltar</button>
        </a>
    </section>

    <h3 class="mt-3">Gráfico Fundos e Patrimônios</h3>

    <section class="mt-3">
        <div class="row">
            <div class="form-group col-md-3">
                <label for="dataInicial">Data Inicial</label>
                <input type="date" class="form-control" id="dataInicial" name="dataInicial">
            </div>
            <div class="form-group col-md-3">
                <label for="dataFinal">Data Final</label>
                <input type="date" class="form-control" id="dataFinal" name="dataFinal">
            </div>
            <div class="form-group col-md-3">
                <button type="button" class="btn btn-primary btn-pesquisa" id="btnPesquisar"><i class="fas fa-search"></i> Buscar</button>
            </div>

        </div>
    </section>

    <section>
        <canvas id="myChart" class="grafico"></canvas>
    </section>
</main>

<script src="./app/js/grafico.js"></script>