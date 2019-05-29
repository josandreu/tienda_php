<?php
session_start();

require './clases/Plantilla.php';
require './clases/Bd.php';

// creamos un objeto de la clase Plantilla
$plantilla = new Plantilla();


// si el usuario viene redireccionado desde producto.php por no haberse logueado antes...
if (isset($_GET['error'])) {
    $plantilla->compartir('error', $_GET['error']);
}

// se recogen los datos enviados desde el formulario de la plantilla index.tpl (el usuario se loguea)
if (isset($_POST['submit'])) {
    $user = $_POST['usuario'];
    $pass = $_POST['password'];
    $bd = new Bd();
    if ($bd->verifica_usuario($user, $pass)){
        $_SESSION['user'] = $user;
        header('Location:./controlador/producto.php');
        exit();
    } else {
        $error = 'Debe de aportar datos correctos';
        $plantilla->compartir('error', $error);
    }
}
$plantilla->mostrar('index.tpl');
?>
