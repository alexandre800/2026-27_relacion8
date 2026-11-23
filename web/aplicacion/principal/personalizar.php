<?php

include_once(dirname(__FILE__) . "/../../cabecera.php");
include_once(dirname(__FILE__) . "/../../scripts/librerias/validacion.php");

$barra = [
    ["TEXTO" => "Inicio", "ENLACE" => "../../index.php"],
    ["TEXTO" => "Relación 8", "ENLACE" => "index.php"],
    ["TEXTO" => "Personalizar", "ENLACE" => "personalizar.php"]
];

//se envía el formulario
if (isset($_POST["personalizar"])) {

}

//vista
inicioCabecera("RELACION 8");
cabecera();
finCabecera();
inicioCuerpo("Relación 8", $barra);
cuerpo();
finCuerpo();

function cabecera() {}

function cuerpo()
{

?>

    <!--formulario para cambiar colores-->
    <form action="" method="post">

        Color del texto:
        <select name="color">
            <option value="">Seleccione color</option>
            <option value="black">Negro</option>
            <option value="red">Rojo</option>
            <option value="blue">Azul</option>
            <option value="green">Verde</option>
        </select>
        <br><br>

        Color del fondo:
        <select name="color">
            <option value="">Seleccione color</option>
            <option value="black">Negro</option>
            <option value="red">Rojo</option>
            <option value="blue">Azul</option>
            <option value="green">Verde</option>
        </select>
        <br><br>

        <input type="submit" name="personalizar" value="Personalizar">

    </form>
    

<?php
}
