<!doctype html>
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
                    {*Llamamos a la plantilla*}
                    {include 'listadoProductos.tpl'}
                </div>
                <div class="col-5 position-relative" id="cesta">
                    {*Llamamos a la plantilla*}
                    {include 'cesta.tpl'}
                    <form action="producto.php" class="text-center" method="post">
                        <input value="Desconectar" name="desconectar" type="submit" class="btn btn-danger btn-lg desconectar">
                    </form>
                </div>
            </div>
        </div>

    </div> {* div container *}
</body>
</html>