<!DOCTYPE html>
{*Plantilla para login. Es invocada desde login.php. solo visualiza el $error del php*}
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <title>Login Tienda Web con Plantillas</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    {*la ruta es relativa al index.php que es el que carga el controlador*}
    <link href="./css/tienda.css" rel="stylesheet" type="text/css">
</head>
<body>
{*
<div id='login'>
    <form action='index.php' method='post'>
        <fieldset >
            <legend>Login</legend>
            <div><span class='error'>{$error}</span></div>
            <div class='campo'>
                <br/>
                <input type='text' name='usuario' id='usuario' maxlength="50" /><br/>
            </div>
            <div class='campo'>
                <label for='password'>Contraseña:</label><br/>
                <input type='password' name='password' id='password' maxlength="50" /><br/>
            </div>
            <div class='campo'>
                <input class="btn btn-outline-danger" type='submit' name='submit' value='Enviar' />
            </div>
        </fieldset>
    </form>
</div>
*}
<div class="container">
    <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
            <div class="card card-signin my-5">
                <div class="card-body">
                    {*si la variable error tiene algún valor se visualiza*}
                    <div><span class='error mb-2'>{$error}</span></div>
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
</html>