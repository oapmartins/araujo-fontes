<?php

require __DIR__.'/vendor/autoload.php';
use App\Entity\Patrimonio;

$dataInicial    = $_GET['dataInicial'];
$dataFinal      = $_GET['dataFinal'];   

// Caso as datas estejam vazias, a data final irá ser a de hoje, e a inicial será a final - 7 dias.
if(empty($dataInicial) && empty($dataFinal)){
    $dataInicial    = date('Y-m-d', strtotime('-7 days'));
    $dataFinal      = date('Y-m-d');   
}

//SELECT UTILIZADO
// select 
//     fundo_id,
//     sum(value) as value 
// from patrimonios  
// where date BETWEEN 'dataInicial' AND 'dataFinal'
// group by fundo_id

$retornoDadosGrafico = Patrimonio::getPatrimonios(
    'date BETWEEN ' . "'{$dataInicial}'" . ' AND ' . "'{$dataFinal}'",
    null, 
    null,
    'fundo_id, sum(value) as value',
    'fundo_id'
);

return print(json_encode($retornoDadosGrafico));
?>