<?php

$mensagem = '';
if(isset($_GET['status'])){
  switch ($_GET['status']) {
    case 'success':
      $mensagem = '<div class="alert alert-success">Ação executada com sucesso!</div>';
      break;

    case 'error':
      $mensagem = '<div class="alert alert-danger">Ação não executada!</div>';
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
                <button type="button" class="btn btn-primary">Editar</button>
            </a>
        </td>
        <td>
            <a href="excluir.php?id='.$patrimonio->id.'">
                <button type="button" class="btn btn-danger">Excluir</button>
            </a>
        </td>

    <tr>';
}

?>

<main>

    <?=$mensagem?>

    <section>
    <a href="cadastrar.php">
        <button class="btn btn-success">Gráfico</button>
    </a>

    <a href="cadastrar.php">
        <button class="btn btn-success">Novo Patrimônio</button>
    </a>
    </section>

    <h3 class="mt-3">Listagem de Patrimônios</h3>
    <section>
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