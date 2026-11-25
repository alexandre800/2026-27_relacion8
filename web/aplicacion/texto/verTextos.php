<?php

include_once(dirname(__FILE__) . "/../../cabecera.php");

$barra = [
    ["TEXTO" => "Inicio", "ENLACE" => "../../index.php"],
    ["TEXTO" => "Relación 8", "ENLACE" => "../principal/index.php"],
    ["TEXTO" => "Ver textos", "ENLACE" => "verTextos.php"]
];

//si se registra un nuevo texto, se añade a $SESSION["textos"]
//el nuevo texto
if (isset($_POST["registrar"])) {
    
    $texto=$_POST["inputTxt"] ?? ""; //si le llega vacío no hace nada
    if($texto!==""){
        $_SESSION["textos"][]=new RegistroTexto($texto);
    }

//si no se ha creado $_SESSION["textos"], se crea
//(esto solo ocurre la primera vez que se inicia sesión)
}elseif(!isset($_SESSION["textos"]))
    $_SESSION["textos"]=[];

//con el botón limpiar, se borran todos los textos
//de $_SESSION["textos"]
if(isset($_POST["limpiar"])){
    $_SESSION["textos"]=[];
}

//se guardan los textos de la sesion en
//el array $textos
$textos = $_SESSION["textos"];

//se guardan los valores de las cookies con los colores
//en variables
// $fondo = $_COOKIE['fondo'] ?? 'white';
// $texto = $_COOKIE['texto'] ?? 'black';

//vista
inicioCabecera("RELACION 8");
cabecera();
finCabecera();
inicioCuerpo("Relación 8", $barra);
cuerpo($textos);
finCuerpo();

function cabecera(){

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
        <textarea rows="25" cols="85" readonly><?php
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
