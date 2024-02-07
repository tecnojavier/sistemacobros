<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Administrador</title>
    <link rel="stylesheet" href="estilos/estilos6.css?v=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <form action="" method="POST" class="login">
            <h2 class="title">¡Bienvenido Administrador! <br>¿Qué deseas hacer?</h2>

            <div class="registro">
                <div class="botones-principales">
                    <input class="boton2" type="button" value="Eliminar Registro" onclick="window.location.href = 'main1.php'">
                    <input class="boton3" type="button" value="Eliminar Cobro" onclick="window.location.href = 'main.php'">
                </div>
                <input class="boton1 mt-2" type="button" value="Cancelar" name="cancelar" onclick="window.location.href = 'menu.php'">
            </div>
        </form>
    </div>
</body>

</html>