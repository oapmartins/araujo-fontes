<?php

require __DIR__.'/vendor/autoload.php';

use \App\Entity\Patrimonio;

if(!isset($_GET['id']) || !is_numeric($_GET['id'])){
    header('location: index.php?status=error');
    exit;
}

// Consulta o Patrimônio
$objPatrimonio = Patrimonio::getPatrimonio($_GET['id']);

// Validação do Patrimônio
if(!$objPatrimonio instanceof Patrimonio){
    header('location: index.php?status=error');
    exit;
}

// Validação do POST
if(isset($_POST['excluir'])){
    
    $objPatrimonio->excluir(); 

    header('location: index.php?status=success');
    exit();
}

include __DIR__ .'/includes/header.php';
include __DIR__ .'/includes/confirmar-exclusao.php';
include __DIR__ .'/includes/footer.php';