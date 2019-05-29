<?php

require '../clases/Plantilla.php';
require '../clases/Bd.php';
require '../clases/Cesta.php';

session_start();

$plantilla = new Plantilla();

$bbdd = new Bd();

// si no estoy registrado, que redirija al index para que el usuario haga el login
// lo controlaremos por variable de sesión
if (!isset($_SESSION['user'])) {
    header('Location:../index.php?error=Debes registrarte');
    exit();
}


// si el usuario pulsa el botón desconectar... borramos la sesión y lo mandamos al index
if (isset($_POST['desconectar'])) {
    unset($_SESSION['user']);
    session_destroy();
    header('Location:../index.php');
    exit();
}

// leo la cesta anterior (si existia)
$cesta = Cesta::obtenerCesta();

// agrego en la cesta el nuevo producto
if (isset($_POST['add'])) {
    $cod = $_POST['cod'];
    $cesta->addProducto($cod, $bbdd);
}

// si el usuario pulsa el botón de añadir de cada producto...
if (isset($_POST['submit'])) {
    $cod_producto = $_POST['cod'];
    $producto = $bbdd->obtenerProducto($cod_producto); // recuperamos mediante el metodo obtenerProducto el codigo del producto en la tabla de la bbdd
    $plantilla->compartir('producto', $producto);
}

// si le damos al botón de vaciar...
if (isset($_POST['vaciar'])) {
    $cesta->vaciarCesta();
}

if (isset($_POST['borrar'])) {
    $codigoProducto = $_POST['borrar'];
    $cesta->quitarProducto($codigoProducto, $bbdd);
}

// guardo la cesta para la proxima interaccion
$cesta->guardarCesta();

// Obtener todos los productos de la bbdd y compartir ese resultado con la plantilla
$resultado = $bbdd->listarProductos();
$plantilla->compartir('productos', $resultado);

// retorna el array de productos que es un atributo de la clase Cesta
$plantilla->compartir('cesta', $cesta->getProductosCesta());
$plantilla->compartir('total', $cesta->importe_total());

// EN LUGAR DE PASAR LOS METODOS, PODEMOS PASAR LA CESTA DIRECTAMENTE Y TENDREMOS ACCESO A TODOS LOS MÉTODOS, CAMBIARÁ LA FORMA DE UTILIZACION EN LA PLANTILLA
// $plantilla->compartir('cesta', $cesta);

// mostramos la plantilla
$plantilla->mostrar('../vistas/plantillas/producto.tpl');

?>