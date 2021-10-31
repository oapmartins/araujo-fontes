<?php

$mensagem = '';
if(isset($_GET['status'])){
  switch ($_GET['status']) {
    case 'success':
      $mensagem = 'Ação executada com sucesso!';
      break;

    case 'error':
      $mensagem = 'Ação não executada!';
      break;
  }
}

$resultados = '';
foreach($patrimonios as $patrimonio){

    $dataPatrimonio     = $patrimonio->date         == null ? '' : date('d/m/Y', strtotime($patrimonio->date));
    $dataCriacao        = $patrimonio->created_at   == null ? '' : date('d/m/Y à\s H:i:s', strtotime($patrimonio->created_at));
    $dataAtualizacao    = $patrimonio->updated_at   == null ? '' : date('d/m/Y à\s H:i:s', strtotime($patrimonio->updated_at));

    $resultados .= 
    '<tr>
        <td>' .$patrimonio->id.'</td>
        <td>' . $dataPatrimonio .'</td>
        <td>' .$patrimonio->fundo_id.'</td>
        <td> R$ ' . number_format($patrimonio->value,2,",",".") .'</td>
       
        <td>' . $dataCriacao .'</td>
        <td>' . $dataAtualizacao .'</td>
        <td>
            <a href="editar.php?id='.$patrimonio->id.'">
                <button type="button" class="btn btn-primary btn-lista"><i class="fas fa-edit"></i> Editar</button>
            </a>
        </td>
        <td>
            <a href="excluir.php?id='.$patrimonio->id.'">
                <button type="button" class="btn btn-danger btn-lista"><i class="fas fa-trash-alt"></i> Excluir</button>
            </a>
        </td>

    <tr>';
}

?>

<main>

    <input type="hidden" id="msgRetorno" value="<?=$mensagem?>">
    <section>

    <div class="row">
        <div class="form-group">
            <a href="grafico.php">
                <button class="btn btn-success button-menu"> <i class="fas fa-chart-bar"></i> Gráfico</button>
            </a>
        </div>

        <div class="form-group mt-3">
            <a href="cadastrar.php">
                <button class="btn btn-success button-menu"><i class="fas fa-plus-circle"></i> Novo Patrimônio</button>
            </a>
        </div>
    </div>


    </section>

    <h3 class="mt-3">Listagem de Patrimônios</h3>
    <section class="card">
        <table class="table">
            <tr>
                <th>ID</th>
                <th>Data</th>
                <th>Fundo</th>
                <th>Valor</th>
                <th>Data Criação</th>
                <th>Data Atualização</th>
                <th></th>
                <th></th>
            </tr>

            <?=$resultados?>

        </table>
    </section>

</main>

<script src="./app/js/listagem.js"></script>