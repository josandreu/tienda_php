<?php
/* Smarty version 3.1.33, created on 2019-05-29 18:29:13
  from '/var/www/phpStorm/tienda/vistas/plantillas/pagar.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5ceeb35913cd55_76816080',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4f86f1e5ef21fa7041e6a81ff5228982f394cb43' => 
    array (
      0 => '/var/www/phpStorm/tienda/vistas/plantillas/pagar.tpl',
      1 => 1559147350,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ceeb35913cd55_76816080 (Smarty_Internal_Template $_smarty_tpl) {
?><!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <title>Document</title>
</head>
<body class="min-vh-100">
    <div class="container-fluid mt-3">
        <h1 class="text-center display-4 mb-2 text-dark">Factura</h1>
        <div>
            <h6 class="text-right">Fecha: <?php echo date('d-m-Y H:i');?>
</h6>
        </div>
        <div class="row justify-content-center mt-5">
            <div class="col-6">
                <h5 class="font-weight-bold text-secondary">Artículo</h5>
            </div>
            <div class="col-3">
                <h5 class="font-weight-bold text-secondary">Cantidad</h5>
            </div>
            <div class="col-3">
                <h5 class="font-weight-bold text-secondary">Precio unitario</h5>
            </div>
        </div>
        <hr>
                <?php $_smarty_tpl->_assignInScope('cantidadArt', 0);?>
        <?php $_smarty_tpl->_assignInScope('totalSinIva', 0);?>
        <?php $_smarty_tpl->_assignInScope('total', 0);?>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['cesta']->value, 'producto', false, 'cod');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['cod']->value => $_smarty_tpl->tpl_vars['producto']->value) {
?>
            <div class="row bg-light py-2">
                <div class="col-6">
                    <p><?php echo $_smarty_tpl->tpl_vars['producto']->value['producto']['nombre_corto'];?>
</p>
                </div>
                <div class="col-3">
                    <p><?php echo $_smarty_tpl->tpl_vars['producto']->value['unidades'];?>
</p>
                    <?php ob_start();
echo $_smarty_tpl->tpl_vars['producto']->value['unidades'];
$_prefixVariable1 = ob_get_clean();
$_smarty_tpl->_assignInScope('cantidadArt', $_smarty_tpl->tpl_vars['cantidadArt']->value+$_prefixVariable1);?>
                </div>
                <div class="col-3">
                    <?php $_smarty_tpl->_assignInScope('importeUnitario', $_smarty_tpl->tpl_vars['producto']->value['producto']['PVP']);?>
                    <?php $_smarty_tpl->_assignInScope('importUnSinIva', round($_smarty_tpl->tpl_vars['importeUnitario']->value/1.21,2));?>
                    <p><?php echo $_smarty_tpl->tpl_vars['importUnSinIva']->value;?>
€</p>
                                        <?php $_smarty_tpl->_assignInScope('pvp', $_smarty_tpl->tpl_vars['importeUnitario']->value*$_smarty_tpl->tpl_vars['producto']->value['unidades']);?>
                    <?php $_smarty_tpl->_assignInScope('pvpSinIva', $_smarty_tpl->tpl_vars['importUnSinIva']->value*$_smarty_tpl->tpl_vars['producto']->value['unidades']);?>
                                        <?php $_smarty_tpl->_assignInScope('totalSinIva', $_smarty_tpl->tpl_vars['pvpSinIva']->value+$_smarty_tpl->tpl_vars['totalSinIva']->value);?>
                    <?php $_smarty_tpl->_assignInScope('total', $_smarty_tpl->tpl_vars['pvp']->value+$_smarty_tpl->tpl_vars['total']->value);?>
                </div>
            </div>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        <hr class="">
                <div class="row mt-5">
            <div class="col-8">
                <div class="card bg-light mb-3" >
                    <div class="card-header text-center"><h3><i class="fas fa-money-check-alt"></i> Resumen de la factura</h3></div>
                                        <?php $_smarty_tpl->_assignInScope('iva', $_smarty_tpl->tpl_vars['total']->value-$_smarty_tpl->tpl_vars['totalSinIva']->value);?>
                    <div class="card-body">
                        <div class="row text-center">
                            <div class="col"><p class="card-text">Total artículos</p></div>
                                                        <div class="col"><p class="card-text font-weight-bold"><?php echo $_smarty_tpl->tpl_vars['cantidad']->value;?>
</p></div>
                        </div>
                        <hr style="max-width: 75%">
                        <div class="row text-center">
                            <div class="col"><p class="card-text">Total a pagar sin IVA</p></div>
                            <div class="col"><p class="card-text font-weight-bold"><?php echo $_smarty_tpl->tpl_vars['totalSinIva']->value;?>
 €</p></div>
                        </div>
                        <hr style="max-width: 75%">
                        <div class="row text-center">
                            <div class="col"><p class="card-text">IVA aplicado</p></div>
                            <div class="col"><p class="card-text font-weight-bold"><?php echo $_smarty_tpl->tpl_vars['iva']->value;?>
 €</p></div>
                        </div>
                        <hr style="max-width: 75%">
                        <div class="row text-center">
                            <div class="col"><p class="card-text">Total a pagar con IVA</p></div>
                            <div class="col"><p class="card-text font-weight-bold"><?php echo $_smarty_tpl->tpl_vars['total']->value;?>
 €</p></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-4 text-center">
                                <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
                    <input name="cmd" type="hidden" value="_cart" />
                    <input name="business" type="hidden" value="runnerhebo-facilitator@gmail.com" />
                    <input name="shopping_url" type="hidden" value="http://localhost/phpStorm/tienda/pagar.php" />
                    <input name="currency_code" type="hidden" value="EUR" />
                    <input name="return" type="hidden" value="http://localhost/phpStorm/tienda/producto.php" />
                    <input type="hidden" name="item_name" value="Compra realizada el <?php echo date('d-m-Y');?>
">
                    <input type="hidden" name="amount" value="<?php echo $_smarty_tpl->tpl_vars['importeTotal']->value;?>
">
                    <input name="upload" type="hidden" value="1" />
                    <?php $_smarty_tpl->_assignInScope('n', 1);?>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['cesta']->value, 'producto', false, 'cod');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['cod']->value => $_smarty_tpl->tpl_vars['producto']->value) {
?>
                        <input name="item_name_<?php echo $_smarty_tpl->tpl_vars['n']->value;?>
" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['producto']->value['producto']['nombre_corto'];?>
" />
                        <input name="amount_<?php echo $_smarty_tpl->tpl_vars['n']->value;?>
" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['producto']->value['producto']['PVP'];?>
" />
                        <input name="quantity_<?php echo $_smarty_tpl->tpl_vars['n']->value++;?>
" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['producto']->value['unidades'];?>
" />
                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    <div class="text-center mt-5">
                        <input type="image" style="width: 64px" src="../img/paypal.png" name="submit" alt="Realice pagos con PayPal: es rápido, gratis y seguro">
                    </div>
                    Pagar con Paypal
                </form>
            </div>
        </div>


                <form action="producto.php" method="post">
            <div class="row justify-content-center">
                <div class="m-auto position-fixed" style="bottom: 10px">
                    <div class="btn-group" role="group">
                        <a href="../index.php" class="btn btn-primary">Volver al index</a>
                        <a href="producto.php" class="btn btn-secondary">Volver a productos</a>
                        <input type="submit" name="desconectar" class="btn btn-danger" value="Desconectar" />
                    </div>
                </div>
            </div>
        </form>
    </div>
</body>
</html><?php }
}
