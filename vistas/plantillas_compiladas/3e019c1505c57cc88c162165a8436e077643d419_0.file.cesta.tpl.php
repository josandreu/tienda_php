<?php
/* Smarty version 3.1.33, created on 2019-05-29 17:03:24
  from '/var/www/phpStorm/tienda/vistas/plantillas/cesta.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5cee9f3c426f88_87482622',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3e019c1505c57cc88c162165a8436e077643d419' => 
    array (
      0 => '/var/www/phpStorm/tienda/vistas/plantillas/cesta.tpl',
      1 => 1559142202,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cee9f3c426f88_87482622 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="jumbotron">
    <h3 class="display-5 text-center"> <i class="fas fa-shopping-bag"></i> Cesta de la compra</h3>
    <hr class="my-4">
    <?php if ((((array($_smarty_tpl->tpl_vars['cesta']->value) !== null )))) {?>
        <?php if (count($_smarty_tpl->tpl_vars['cesta']->value) == 0) {?>              <?php $_smarty_tpl->_assignInScope('enabled', 'disabled');?>             <p>No hay productos en la cesta.</p>
        <?php } else { ?>
            <?php $_smarty_tpl->_assignInScope('enabled', 'enabled');?>
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['cesta']->value, 'producto', false, 'cod');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['cod']->value => $_smarty_tpl->tpl_vars['producto']->value) {
?>
                <span class="font-weight-bold" style="font-size: 16px"><?php echo $_smarty_tpl->tpl_vars['producto']->value['unidades'];?>
</span>
                <span style="font-size: 16px"><?php echo $_smarty_tpl->tpl_vars['producto']->value['producto']['cod'];?>
</span>
                <span class="font-weight-bold" style="font-size: 16px"><?php echo $_smarty_tpl->tpl_vars['producto']->value['producto']['PVP'];?>
€</span>
                <form class="d-inline" method="post" action="producto.php">
                    <button name="borrar" class="btn btn-sm" value="<?php echo $_smarty_tpl->tpl_vars['producto']->value['producto']['cod'];?>
" style="background-color:transparent" type="submit"><i class="fas fa-trash-alt"></i></button>
                </form>
                <br>
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        <?php }?>
    <?php }?>
    <hr class="my-4">
        <p class="font-weight-bold">Total: <span class="text-primary"><?php echo $_smarty_tpl->tpl_vars['total']->value;?>
€</span></p>

        <div class="row justify-content-center">
            <div class="col-6 text-center">
                <form action="producto.php" method="post">
                                        <input value="Vaciar" name="vaciar" type="submit" class="btn btn-outline-primary" <?php if (count($_smarty_tpl->tpl_vars['cesta']->value) == 0) {?> disabled <?php }?>>
                </form>
            </div>
            <div class="col-6 text-center">
                <form action="pagar.php" method="post">
                                        <input value="Pagar" name="pagar" type="submit" class="btn btn-outline-primary" <?php echo $_smarty_tpl->tpl_vars['enabled']->value;?>
>
                </form>
            </div>
        </div>
</div>

<?php }
}
