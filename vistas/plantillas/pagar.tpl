<!doctype html>
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
            <h6 class="text-right">Fecha: {date('d-m-Y H:i')}</h6>
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
        {* Mostramos los productos de la cesta y calculamos el total *}
        {$cantidadArt = 0}
        {$totalSinIva = 0}
        {$total = 0}
        {foreach $cesta as $cod=>$producto}
            <div class="row bg-light py-2">
                <div class="col-6">
                    <p>{$producto['producto']['nombre_corto']}</p>
                </div>
                <div class="col-3">
                    <p>{$producto['unidades']}</p>
                    {$cantidadArt = $cantidadArt + {$producto['unidades']}}
                </div>
                <div class="col-3">
                    {$importeUnitario = $producto['producto']['PVP']}
                    {$importUnSinIva = round($importeUnitario/1.21, 2)}
                    <p>{$importUnSinIva}€</p>
                    {* Calculamos el pvp de cada producto, su precio * unidades *}
                    {$pvp = $importeUnitario * $producto['unidades']}
                    {$pvpSinIva = $importUnSinIva * $producto['unidades']}
                    {* Calculamos el total, vamos acumulando por cada producto gracias al foreach *}
                    {$totalSinIva = $pvpSinIva + $totalSinIva}
                    {$total = $pvp + $total}
                </div>
            </div>
        {/foreach}
        <hr class="">
        {* Resumen de la factura *}
        <div class="row mt-5">
            <div class="col-8">
                <div class="card bg-light mb-3" >
                    <div class="card-header text-center"><h3><i class="fas fa-money-check-alt"></i> Resumen de la factura</h3></div>
                    {* Calculamos el iva aplicado *}
                    {$iva = $total - $totalSinIva}
                    <div class="card-body">
                        <div class="row text-center">
                            <div class="col"><p class="card-text">Total artículos</p></div>
                            {* $cantidad es un método de la clase Cesta.php, pero también podríamos mostrar la variable $cantidadArt ya que calcula lo mismo a través del foreach *}
                            <div class="col"><p class="card-text font-weight-bold">{$cantidad}</p></div>
                        </div>
                        <hr style="max-width: 75%">
                        <div class="row text-center">
                            <div class="col"><p class="card-text">Total a pagar sin IVA</p></div>
                            <div class="col"><p class="card-text font-weight-bold">{$totalSinIva} €</p></div>
                        </div>
                        <hr style="max-width: 75%">
                        <div class="row text-center">
                            <div class="col"><p class="card-text">IVA aplicado</p></div>
                            <div class="col"><p class="card-text font-weight-bold">{$iva} €</p></div>
                        </div>
                        <hr style="max-width: 75%">
                        <div class="row text-center">
                            <div class="col"><p class="card-text">Total a pagar con IVA</p></div>
                            <div class="col"><p class="card-text font-weight-bold">{$total} €</p></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-4 text-center">
                {* runnerhebo-buyer@gmail.com *}
                <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
                    <input name="cmd" type="hidden" value="_cart" />
                    <input name="business" type="hidden" value="runnerhebo-facilitator@gmail.com" />
                    <input name="shopping_url" type="hidden" value="http://localhost/phpStorm/tienda/pagar.php" />
                    <input name="currency_code" type="hidden" value="EUR" />
                    <input name="return" type="hidden" value="http://localhost/phpStorm/tienda/producto.php" />
                    <input type="hidden" name="item_name" value="Compra realizada el {date('d-m-Y')}">
                    <input type="hidden" name="amount" value="{$importeTotal}">
                    <input name="upload" type="hidden" value="1" />
                    {$n=1}
                    {foreach $cesta as $cod=>$producto}
                        <input name="item_name_{$n}" type="hidden" value="{$producto['producto']['nombre_corto']}" />
                        <input name="amount_{$n}" type="hidden" value="{$producto['producto']['PVP']}" />
                        <input name="quantity_{$n++}" type="hidden" value="{$producto['unidades']}" />
                    {/foreach}
                    <div class="text-center mt-5">
                        <input type="image" style="width: 64px" src="../img/paypal.png" name="submit" alt="Realice pagos con PayPal: es rápido, gratis y seguro">
                    </div>
                    Pagar con Paypal
                </form>
            </div>
        </div>


        {* Botones de la parte inferior de la página *}
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
</html>