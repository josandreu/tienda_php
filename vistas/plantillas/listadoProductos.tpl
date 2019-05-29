{* Plantilla llamada desde producto.tpl *}
{foreach $productos as $producto}
    <form class="mt-3" action="../controlador/producto.php" method="post">
        <span class='text-dark'>{$producto['nombre_corto']}</span> <span class="text-danger"> - Precio {$producto['PVP']}€</span>
        <input type="submit" value='Añadir' class='ml-2 btn btn-outline-secondary' name='add'/>
        <input type=hidden value='{$producto['cod']}' name='cod'>
        <hr class="bg-white w-75">
    </form>
{/foreach}