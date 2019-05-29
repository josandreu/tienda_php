{* Plantilla llamada desde producto.tpl *}
<div class="jumbotron">
    <h3 class="display-5 text-center"> <i class="fas fa-shopping-bag"></i> Cesta de la compra</h3>
    <hr class="my-4">
{*    {if (!$cesta->cestaVacia())}    ASI SERÍA PASANDO LA VARIABLE CESTA, EN LUGAR DE LOS METODOS  *}
    {if (isset([$cesta]))}
        {if count($cesta) == 0}  {* Implemento tambien un metodo en Cesta.php, pero no lo utilizo *}
            {$enabled = 'disabled'} {* Para el boton de pagar *}
            <p>No hay productos en la cesta.</p>
        {else}
            {$enabled = 'enabled'}
            {* foreach $cesta->getProductosCesta() as $cod=>$producto    ASI SERÍA PASANDO LA VARIABLE CESTA, EN LUGAR DE LOS METODOS  *}
            {foreach $cesta as $cod=>$producto}
                <span class="font-weight-bold" style="font-size: 16px">{$producto['unidades']}</span>
                <span style="font-size: 16px">{$producto['producto']['cod']}</span>
                <span class="font-weight-bold" style="font-size: 16px">{$producto['producto']['PVP']}€</span>
                <form class="d-inline" method="post" action="producto.php">
                    <button name="borrar" class="btn btn-sm" value="{$producto['producto']['cod']}" style="background-color:transparent" type="submit"><i class="fas fa-trash-alt"></i></button>
                </form>
                <br>
            {/foreach}
        {/if}
    {/if}
    <hr class="my-4">
    {* La variable total la recogemos desde productos.php, a través del método importe_total de Cesta.php *}
    <p class="font-weight-bold">Total: <span class="text-primary">{$total}€</span></p>

        <div class="row justify-content-center">
            <div class="col-6 text-center">
                <form action="producto.php" method="post">
                    {* Aquí implemento la opción disabled directamente en el input *}
                    <input value="Vaciar" name="vaciar" type="submit" class="btn btn-outline-primary" {if count($cesta) == 0} disabled {/if}>
                </form>
            </div>
            <div class="col-6 text-center">
                <form action="pagar.php" method="post">
                    {* Aquí implemento el disabled encima del foreach *}
                    <input value="Pagar" name="pagar" type="submit" class="btn btn-outline-primary" {$enabled}>
                </form>
            </div>
        </div>
</div>

