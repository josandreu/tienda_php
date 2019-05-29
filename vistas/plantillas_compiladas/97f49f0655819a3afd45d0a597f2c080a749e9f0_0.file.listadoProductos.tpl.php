<?php
/* Smarty version 3.1.33, created on 2019-05-28 15:41:39
  from '/var/www/phpStorm/tienda/vistas/plantillas/listadoProductos.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5ced3a93042bb9_92481591',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '97f49f0655819a3afd45d0a597f2c080a749e9f0' => 
    array (
      0 => '/var/www/phpStorm/tienda/vistas/plantillas/listadoProductos.tpl',
      1 => 1559050888,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ced3a93042bb9_92481591 (Smarty_Internal_Template $_smarty_tpl) {
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['productos']->value, 'producto');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['producto']->value) {
?>
    <form class="mt-3" action="../controlador/producto.php" method="post">
        <span class='text-dark'><?php echo $_smarty_tpl->tpl_vars['producto']->value['nombre_corto'];?>
</span> <span class="text-danger"> - Precio <?php echo $_smarty_tpl->tpl_vars['producto']->value['PVP'];?>
€</span>
        <input type="submit" value='Añadir' class='ml-2 btn btn-outline-secondary' name='add'/>
        <input type=hidden value='<?php echo $_smarty_tpl->tpl_vars['producto']->value['cod'];?>
' name='cod'>
        <hr class="bg-white w-75">
    </form>
<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
}
}
