<?php

include_once(dirname(__FILE__) . "/../../cabecera.php");

$barra = [
    ["TEXTO" => "Inicio", "ENLACE" => "../../index.php"],
    ["TEXTO" => "Relación 8", "ENLACE" => "../principal/index.php"],
    ["TEXTO" => "Inicio sesión", "ENLACE" => "login.php"]
];


if (isset($_POST["registrar"])) {
    
    // $nick=$_POST["inputTxt"] ?? "";
    // if($texto!==""){
    //     $_SESSION["textos"][]=new RegistroTexto($texto);
    // }

}

//vista
inicioCabecera("RELACION 8");
cabecera();
finCabecera();
inicioCuerpo("Relación 8", $barra);
cuerpo();
finCuerpo();

function cabecera(){

}

function cuerpo()
{

?>

    <!--formulario para iniciar sesión-->
    <form action="" method="post">

        Nombre de usuario: <input type="text" name="nick"><br>
        Contraseña: <input type="password" name="passwd">
        <input type="submit" name="registrar" value="Registrar"><br><br>

    </form>

<?php
}
