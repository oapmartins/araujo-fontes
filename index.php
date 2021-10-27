<!doctype html>
<html lang="pt-bt">

<head>
  <title>Araujo Fontes</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="./css/style.css">
</head>

<body>

  <div class="row linha-logo">
    <img src="./img/logo.png" alt="" class="logo">
  </div>
  <nav class='nav-principal'>
    <div class="nav nav-tabs" id="nav-tab" role="tablist">
      <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Informações</a>
      <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Manutenção</a>
    </div>
  </nav>
  <div class="tab-content" id="nav-tabContent">
    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
      <div>
        <canvas id="myChart" width="700" height="300"></canvas>
      </div>
    </div>
    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">

      <form class="formularioCrud">
        <div class="form-row">

          <div class="form-group col-md-3">
            <label for="idPatrimonio">ID</label>
            <input type="number" class="form-control" id="idPatrimonio" placeholder="">
          </div>

          <div class="form-group col-md-3">
            <label for="dataPatrimonio">Data</label>
            <input type="date" class="form-control" id="dataPatrimonio">
          </div>

          <div class="form-group col-md-3">
            <label for="idFundo">Fundo</label>
            <select id="idFundo" class="form-control">
              <option selected>Escolher o fundo...</option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">3</option>
            </select>
          </div>

          <div class="form-group col-md-3">
            <label for="idPatrimonio">Valor</label>
            <input type="number" class="form-control" id="idPatrimonio" placeholder="Valor do Patrimônio">
          </div>

          <div id="buttonsCrud">
            <button type="button" class="btn btn-primary buttonsCrud" id="btnCadastrar">Cadastrar</button>
            <button type="button" class="btn btn-primary buttonsCrud" id="btnExcluir">Excluir</button>
            <button type="button" class="btn btn-primary buttonsCrud" id="btnlimpar">Limpa</button>
          </div>
      </form>
    </div>
  </div>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="js/home.js"></script>
</body>

</html>