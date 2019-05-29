<?php

require '../clases/Plantilla.php';
require '../clases/Cesta.php';

// también podríamos iniciar sesion en Cesta.php
session_start();

// si no nos hemos logueado...
if (!isset($_SESSION['user'])) {
    header('Location:../index.php?error=Debes registrarte');
    exit();
}

$plantilla = new Plantilla();

// leo la cesta anterior (si existia)
$cesta = Cesta::obtenerCesta();
$plantilla->compartir('cesta', $cesta->getProductosCesta());


// si el usuario pulsa el botón desconectar... borramos la sesión y lo mandamos al index
if (isset($_POST['desconectar'])) {
    unset($_SESSION['user']);
    session_destroy();
    header('Location:../index.php');
    exit();
}

$plantilla->compartir('cantidad', $cesta->totalArticulos());
$plantilla->compartir('importeTotal', $cesta->importe_total());

// mostramos la plantilla
$plantilla->mostrar('../vistas/plantillas/pagar.tpl');