<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="estilos/estilos2.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <form action="" method="POST" class="formulario">
            <h2 class="title">REGISTRAR USUARIO</h2>
            <?php
            include("conexion/conexion.php");
            include("controlador/controlador_registro.php");
            ?>
            <div class="padre">
                <div class="nombre">
                    <label for="">Nombres</label>
                    <input type="text" name="nombre">
                </div>
                <div class="apellidos">
                    <label for="">Apellidos</label>
                    <input type="text" name="apellido">
                </div>
                <div class="direccion">
                    <label for="">Dirección</label>
                    <input type="text" name="direccion">
                </div>
                <div class="dui">
                    <label for="">Dui</label>
                    <input type="text" name="dui">
                </div>
                <div class="registro boton-container">
                    <input class="boton" type="submit" value="Guardar Registro" name="registro">
                    <input class="boton2" type="button" value="Cancelar" name="cancelar" onclick="window.location.href = 'menu.php'">
                    <input class="boton4" type="button" value="Mostrar Registros" name="mostrar" onclick="window.location.href = 'registros.php'">
               </div>
            </div>
        </form>
    </div>
</body>
</html>