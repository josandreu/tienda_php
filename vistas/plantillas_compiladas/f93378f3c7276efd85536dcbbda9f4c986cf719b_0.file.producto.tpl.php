<?php
/* Smarty version 3.1.33, created on 2019-05-28 17:51:59
  from '/var/www/phpStorm/tienda/vistas/plantillas/producto.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5ced591fc6da95_94372150',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f93378f3c7276efd85536dcbbda9f4c986cf719b' => 
    array (
      0 => '/var/www/phpStorm/tienda/vistas/plantillas/producto.tpl',
      1 => 1559058716,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:listadoProductos.tpl' => 1,
    'file:cesta.tpl' => 1,
  ),
),false)) {
function content_5ced591fc6da95_94372150 (Smarty_Internal_Template $_smarty_tpl) {
?><!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>
    <div class="container-fluid mt-3" id="productos">
        <h1 class="text-center text-secondary display-4"><i class="fab fa-product-hunt"></i> Listado de productos</h1>
        <div class="mt-5">
            <div class="row">
                <div class="col-7">
                                        <?php $_smarty_tpl->_subTemplateRender('file:listadoProductos.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
                </div>
                <div class="col-5 position-relative" id="cesta">
                                        <?php $_smarty_tpl->_subTemplateRender('file:cesta.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
                    <form action="producto.php" class="text-center" method="post">
                        <input value="Desconectar" name="desconectar" type="submit" class="btn btn-danger btn-lg desconectar">
                    </form>
                </div>
            </div>
        </div>

    </div> </body>
</html><?php }
}
