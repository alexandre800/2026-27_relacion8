<?php

include_once(dirname(__FILE__) . "/../../cabecera.php");

$barra = [
    ["TEXTO" => "Inicio", "ENLACE" => "../../index.php"],
    ["TEXTO" => "Relación 8", "ENLACE" => "../principal/index.php"],
    ["TEXTO" => "Ver textos", "ENLACE" => "verTextos.php"]
];

$textos = $_SESSION["textos"];

//se envía el formulario
if (isset($_POST["registrar"])) {
    
}

$fondo = $_COOKIE['fondo'] ?? 'white';
$texto = $_COOKIE['texto'] ?? 'black';

//vista
inicioCabecera("RELACION 8");
cabecera($fondo, $texto);
finCabecera();
inicioCuerpo("Relación 8", $barra);
cuerpo($textos);
finCuerpo();

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

function cuerpo(array $textos)
{

?>

    <!--formulario para cambiar colores-->
    <form action="" method="post">

        Introduzca texto: <input type="text">
        <input type="submit" name="registrar" value="Registrar">

    </form>

    <textarea>
        <?php  ?>
    </textarea>

<?php
}
