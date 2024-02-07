<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registros Guardados</title>
    <link rel="stylesheet" href="estilos/estilos.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<?php
    $inc = include("conexion/conexion.php");
    if ($inc) {
        $consulta = "SELECT * FROM registro ORDER BY NoFactura DESC";
        $resultado = mysqli_query($conexion, $consulta);
        if ($resultado) {
            echo '<div class="tabla-cobros">';
            echo '<table class="table">';
            echo '<thead>
                    <tr>
                    <th scope="col" class="bg-info">NoFactura</th>
                    <th scope="col" class="bg-info">Fecha</th>
                    <th scope="col" class="bg-info">Monto</th>
                    <th scope="col" class="bg-info">Meses</th>
                    <th scope="col" class="bg-info">Concepto</th>
                    <th scope="col" class="bg-info">Dui</th>
                    </tr>
                </thead>';
            echo '<tbody>';
            $contador = 1;
            while ($row = $resultado->fetch_array()) {
                $factura = $row['NoFactura'];
                $fecha = $row['Fecha'];
                $monto = $row['Monto'];
                $meses = $row['CantidaMeses'];
                $concepto = $row['Concepto'];
                $dui = $row['Dui'];
                echo '<tr>';
                echo '<td class="cell">' . $factura . '</td>';
                echo '<td class="cell">' . $fecha . '</td>';
                echo '<td class="cell">' . $monto . '</td>';
                echo '<td class="cell">' . $meses . '</td>';
                echo '<td class="cell">' . $concepto . '</td>';
                echo '<td class="cell">' . $dui . '</td>';
                echo '</tr>';
                $contador++;
            }
            echo '</tbody>';
            echo '</table>';
            echo '</div>';
        }
    }
?>
</body>
</html>