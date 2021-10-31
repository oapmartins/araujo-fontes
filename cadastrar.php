<?php

require __DIR__.'/vendor/autoload.php';

define('TITLE', 'Cadastrar Patrimônio');
define('TITLEBTN', 'Cadastrar');

use \App\Entity\Patrimonio;

// Validação do POST
if(isset($_POST['dataPatrimonio'],$_POST['idFundo'],$_POST['valorPatrimonio'])){
   
   $objPatrimonio = new Patrimonio;
   $objPatrimonio->date     = $_POST['dataPatrimonio'];
   $objPatrimonio->value    = $_POST['valorPatrimonio'];
   $objPatrimonio->fundo_id = $_POST['idFundo'];
   $objPatrimonio->cadastrar();

    header('location: index.php?status=success');
    exit();
}

include __DIR__ .'/includes/header.php';
include __DIR__ .'/includes/formulario.php';
include __DIR__ .'/includes/footer.php';