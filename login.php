<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de Sesión</title>
    <link rel="stylesheet" href="estilos/estilos3.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
    <form action="" method="POST" class="login">
        <h2 class="title">Inicio de Sesión</h2>
        <?php
            include("conexion/conexion.php");
            include("controlador/controlador_login.php");
        ?>
        <div class="principal">
            <div class="usuario">
                <label for="">Usuario</label>
                <input type="text" name="usuario">
            </div>
            <div class="contrasena">
                <label for="">Contraseña</label>
                <input type="password" name="clave">
            </div>
            <div class="registro">
                    <input class="boton" type="submit" value="Iniciar Sesión" name="login">
            </div>
    </form>
    </div>
</body>
</html>