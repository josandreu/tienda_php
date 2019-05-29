<?php
/* Smarty version 3.1.33, created on 2019-05-23 16:59:30
  from '/var/www/phpStorm/tienda/vistas/plantillas/index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5ce6b5522d80d5_41689916',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '11af811123a6a39f8601d29c613ab42b6fd8f5a0' => 
    array (
      0 => '/var/www/phpStorm/tienda/vistas/plantillas/index.tpl',
      1 => 1558623564,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ce6b5522d80d5_41689916 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <title>Login Tienda Web con Plantillas</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
        <link href="./css/tienda.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
            <div class="card card-signin my-5">
                <div class="card-body">
                                        <div><span class='error mb-2'><?php echo $_smarty_tpl->tpl_vars['error']->value;?>
</span></div>
                    <h4 class="card-title text-center font-weight-bold mb-0">Registro</h4>
                    <form class="form-signin" action='index.php' method='post'>
                        <div class="form-label-group">
                            <label for='usuario'>Usuario:</label><br><br>
                            <input type="text" id="usuario" name="usuario" class="form-control" required autofocus>
                        </div>
                        <div class="form-label-group">
                            <label for="password">Contraseña:</label><br><br>
                            <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
                        </div>
                        <button class="btn btn-lg btn-outline-secondary btn-block text-uppercase" type="submit" name='submit'>Enviar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html><?php }
}
