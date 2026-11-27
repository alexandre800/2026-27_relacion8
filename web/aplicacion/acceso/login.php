<?php

include_once(dirname(__FILE__) . "/../../cabecera.php");

$barra = [
    ["TEXTO" => "Inicio", "ENLACE" => "../../index.php"],
    ["TEXTO" => "Relación 8", "ENLACE" => "../principal/index.php"],
    ["TEXTO" => "Inicio sesión", "ENLACE" => "login.php"]
];

$aclArray = new ACLArray();
$acceso = new Acceso();

$error = "";

if (isset($_POST["registrar"])) {

    if (!$acceso->hayUsuario()) {
        $nick = $_POST["nick"] ?? "";
        $passwd = $_POST["passwd"] ?? "";

        if ($aclArray->esValido($nick, $passwd)) {

            $codUsuario = $aclArray->getCodUsuario($nick);
            if ($acceso->registrarUsuario(
                $nick,
                $aclArray->getNombre($codUsuario),
                $aclArray->getPermisos($codUsuario)
            )) {
                header("location: ../principal/index.php");
            } else
                $error = "Fallo al registrar el usuario";
        } else
            $error = "El usuario o la contraseña no son válidas";
    }
    // if (!$acceso->puedePermiso(2)){
    //     paginaError("Acceso no permitido");
    //     exit;
    // }


}

//vista
inicioCabecera("RELACION 8");
cabecera();
finCabecera();
inicioCuerpo("Relación 8", $barra);
cuerpo($error);
finCuerpo();

function cabecera() {}

function cuerpo($error)
{

    if ($error !== "") {
?><h2 style="color: red">Error: <?php echo $error; ?></h2><?php
                                                            }

                                                                ?>

    <!--formulario para iniciar sesión-->
    <form action="" method="post">

        Nombre de usuario: <input type="text" name="nick"><br>
        Contraseña: <input type="password" name="passwd">
        <input type="submit" name="registrar" value="Registrar"><br><br>

    </form>

<?php
}
