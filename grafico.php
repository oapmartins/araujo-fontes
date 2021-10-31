<?php

require __DIR__.'/vendor/autoload.php';
use \App\Entity\Patrimonio;

// Consulta o Patrimônio
$objPatrimonio = Patrimonio::getPatrimonios();

include __DIR__ .'/includes/header.php';
include __DIR__ .'/includes/page-grafico.php';
include __DIR__ .'/includes/footer.php';