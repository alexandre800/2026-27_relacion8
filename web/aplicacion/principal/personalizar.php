<?php

include_once(dirname(__FILE__) . "/../../cabecera.php");

//if($_SESSION[])

$barra = [
    ["TEXTO" => "Inicio", "ENLACE" => "../../index.php"],
    ["TEXTO" => "Relación 8", "ENLACE" => "index.php"],
    ["TEXTO" => "Personalizar", "ENLACE" => "personalizar.php"]
];

//se envía el formulario
if (isset($_POST["personalizar"])) {
    $fondo = $_POST["colorFondo"];
    $texto = $_POST["colorTexto"];

    setcookie("fondo", $fondo, time() + 24 * 60 * 60);
    setcookie("texto", $texto, time() + 24 * 60 * 60);
} else {
    $fondo = $_COOKIE['fondo'] ?? 'white';
    $texto = $_COOKIE['texto'] ?? 'black';
}

//vista
inicioCabecera("RELACION 8");
cabecera($fondo, $texto);
finCabecera();
inicioCuerpo("Relación 8", $barra);
cuerpo($fondo, $texto);
finCuerpo();

function cabecera($fondo, $texto)
{
?>
    <style>
        body {
            color: <?= $texto ?>;
        }

        #documento {
            background-color: <?= $fondo ?>;
        }
    </style>
<?php
}

function cuerpo($fondo, $texto)
{

?>

    <!--formulario para cambiar colores-->
    <form action="" method="post">

        Color del texto:
        <select name="colorTexto">
            <?php
            foreach (COLORESTEXTO as $clave => $color) {
                echo "<option value='$color' " .
                    (($texto == $color) ? "selected" : "")
                    . ">$clave</option>";
            }
            ?>
        </select>
        <br><br>

        Color del fondo:
        <select name="colorFondo">
            <?php
            foreach (COLORESFONDO as $clave => $color) {
                echo "<option value='$color' " .
                    (($fondo == $color) ? "selected" : "")
                    . ">$clave</option>";
            }
            ?>
        </select>
        <br><br>

        <input type="submit" name="personalizar" value="Personalizar">

    </form>

<?php
}
