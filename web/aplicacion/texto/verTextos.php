<?php

include_once(dirname(__FILE__) . "/../../cabecera.php");

$barra = [
    ["TEXTO" => "Inicio", "ENLACE" => "../../index.php"],
    ["TEXTO" => "Relación 8", "ENLACE" => "../principal/index.php"],
    ["TEXTO" => "Ver textos", "ENLACE" => "verTextos.php"]
];

//se envía el formulario
if (isset($_POST["registrar"])) {
    
    $texto=$_POST["inputTxt"] ?? "";
    if($texto!==""){
        $_SESSION["textos"][]=new RegistroTexto($texto);
    }

}

if(isset($_POST["limpiar"])){
    $_SESSION["textos"]=[];
}

$textos = $_SESSION["textos"];

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

        Introduzca texto: <input type="text" name="inputTxt">
        <input type="submit" name="registrar" value="Registrar"><br><br>

    </form>

    <form action="" method="post">
        <textarea rows="25" cols="110" readonly><?php
        foreach($textos as $texto) {
            echo $texto->getFechaHora()->format("d/M/Y H:i:s")
                ." ---> ".$texto->getCadena().PHP_EOL.PHP_EOL;
        }
        ?>
        </textarea>
        <input type="submit" name="limpiar" value="Limpiar">
    </form>

<?php
}
