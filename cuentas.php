<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ingresos & Egresos</title>
    <link rel="stylesheet" href="estilos/estilos4.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container-segundo">
        <form action="" method="POST" class="delete">
            <h2 class="title">INGRESOS & EGRESOS</h2>
            <?php
            include("conexion/conexion.php");
            include("controlador/controlador_trigger.php");
            ?>
            <div class="padre-segundo">
                <div class="dui">
                    <label for="">¿Desea realizar un egreso? <br> Ingrese la cantidad que desea egresar:</label>
                    <input type="text" name="dui">
                </div>
                <div class="concepto">
                    <label for="">Ingrese el concepto del egreso:</label>
                    <input type="text" name="concepto">
                </div>
                <div class="registro boton-container">
                    <input class="boton" type="submit" value="Guardar" name="guardar">
                    <input class="boton2" type="button" value="Cancelar" name="cancelar" onclick="window.location.href = 'menu.php'">
                </div>
            </div>
        </form>
    </div>

    <?php
    $inc = include("conexion/conexion.php");
    if ($inc) {
        $consulta = "SELECT * FROM cantidad_acumulada";
        $resultado = mysqli_query($conexion, $consulta);

        if ($resultado) {
            echo '<div class="tabla-cantidad">';
            echo '<table class="table">';
            echo '<thead>
            <tr>
                <th scope="col" class="bg-info">ID</th>
                <th scope="col" class="bg-info">Fecha de Actualización</th>
                <th scope="col" class="bg-info">Cantidad</th>
            </tr>
        </thead>';
            echo '<tbody>';
            while ($row = $resultado->fetch_array()) {
                $id = $row['id'];
                $fechaActualizacion = $row['fecha_actualizacion'];
                $cantidad = $row['cantidad'];

                echo '<tr>';
                echo '<td class="cell">' . $id . '</td>';
                echo '<td class="cell">' . $fechaActualizacion . '</td>';
                echo '<td class="cell">' . $cantidad . '</td>';
                echo '</tr>';
            }
            echo '</tbody>';
            echo '</table>';
            echo '</div>';
        }
    }
    ?>

    <?php
    $inc = include("conexion/conexion.php");
    if ($inc) {
        $consulta = "SELECT * FROM resta_acumulada";
        $resultado = mysqli_query($conexion, $consulta);

        if ($resultado) {
            echo '<div class="tabla-resta">';
            echo '<table class="table">';
            echo '<thead>
            <tr>
                <th scope="col" class="bg-info">ID</th>
                <th scope="col" class="bg-info">Fecha de Actualización</th>
                <th scope="col" class="bg-info">Cantidad Resta</th>
                <th scope="col" class="bg-info">Concepto</th>
            </tr>
        </thead>';
            echo '<tbody>';
            while ($row = $resultado->fetch_array()) {
                $id = $row['id'];
                $fechaActualizacion = $row['fecha_actualizacion'];
                $cantidadResta = $row['cantidad_resta'];
                $concepto = $row['concepto'];

                echo '<tr>';
                echo '<td class="cell">' . $id . '</td>';
                echo '<td class="cell">' . $fechaActualizacion . '</td>';
                echo '<td class="cell">' . $cantidadResta . '</td>';
                echo '<td class="cell">' . $concepto . '</td>';
                echo '</tr>';
            }
            echo '</tbody>';
            echo '</table>';
            echo '</div>';
        }
    }
    ?>
</body>

</html>