<?php

require __DIR__.'/vendor/autoload.php';

define('TITLE', 'Editar Patrimônio');
define('TITLEBTN', 'Editar');

use \App\Entity\Patrimonio;

if(!isset($_GET['id']) || !is_numeric($_GET['id'])){
    header('location: index.php?status=error');
    exit;
}

$objPatrimonio = [];

// Consulta o Patrimônio
$objPatrimonio = Patrimonio::getPatrimonio($_GET['id']);

// Validação do Patrimônio
if(!$objPatrimonio instanceof Patrimonio){
    header('location: index.php?status=error');
    exit;
}

// Validação do POST
if(isset($_POST['dataPatrimonio'],$_POST['idFundo'],$_POST['valorPatrimonio'])){
    
    $objPatrimonio->date     = $_POST['dataPatrimonio'];
    $objPatrimonio->value    = $_POST['valorPatrimonio'];
    $objPatrimonio->fundo_id = $_POST['idFundo'];
    $objPatrimonio->atualizar();

    header('location: index.php?status=success');
    exit();
}


include __DIR__ .'/includes/header.php';
include __DIR__ .'/includes/formulario.php';
include __DIR__ .'/includes/footer.php';