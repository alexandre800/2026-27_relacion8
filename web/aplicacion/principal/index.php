<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");

$barra = [
    ["TEXTO" => "inicio", "ENLACE" => "../../index.php"],
    ["TEXTO" => "Relación 8", "ENLACE" => "index.php"],
];

//controlador
$visitas=0;
if (isset($_COOKIE['visitas'])) {
    $visitas = $_COOKIE['visitas'] + 1;
} else {
    $visitas = 1;
}

setcookie('visitas', $visitas);

//se guardan los valores de las cookies con los colores
//en variables
$fondo = $_COOKIE['fondo'] ?? 'white';
$texto = $_COOKIE['texto'] ?? 'black';

//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
cabecera($fondo, $texto);
finCabecera();
inicioCuerpo("Relación 8", $barra);
cuerpo($visitas); //llamo a la vista
finCuerpo();

// **********************************************************
//vista
function cabecera($fondo, $texto) {
    ?>
    <style>
        body{
            color: <?= $texto ?>;
        }
        #documento {
            background-color: <?= $fondo ?>;
        }
    </style>
    <?php
}

//vista
function cuerpo($contVisitas)
{

?>
    <?php 
    echo "El usuario ha entrado {$contVisitas} veces a la página";
    ?>
    <br><a href="personalizar.php">Personalizar colores</a>
    <br><a href="../texto/verTextos.php">Ver textos</a>
<?php

}
