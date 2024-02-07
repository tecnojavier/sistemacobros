<?php
if (!empty($_GET["dui"])) {
    // Establecer la conexión a la base de datos
    $conexion = new mysqli("127.0.0.1", "root", "", "bdregistropago");

    // Verificar si la conexión fue exitosa
    if ($conexion->connect_errno) {
        echo "Falló la conexión a la base de datos: " . $conexion->connect_error;
        exit();
    }

    $dui = $_GET["dui"];

    // Preparar la consulta SQL para obtener el último registro
    $query = "SELECT NoFactura, Nombre, Apellido, Fecha, Monto, CantidaMeses, Concepto, Dui FROM registro WHERE NoFactura = (SELECT MAX(NoFactura) FROM registro)";
    $stmt = $conexion->prepare($query);
    $stmt->execute();

    // Obtener el resultado de la consulta
    $result = $stmt->get_result();

    // Verificar si se encontró un registro
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Crear el recibo en formato PDF
        require('fpdf/fpdf.php');

        // Crear una nueva instancia de FPDF
        $pdf = new FPDF('P', 'mm', array(80, 200));

        // Agregar una nueva página
        $pdf->AddPage();

        // Configurar los márgenes
        $pdf->SetMargins(5, 5, 5);

        // Configurar la fuente y el tamaño del texto
        $pdf->SetFont('Arial', 'B', 9);

        // Agregar el logo en el encabezado
        $pdf->Image('imagenes/logo.png', 15, 2, 45);

        // Espacio vertical
        $pdf->Ln(35);

        // Espacio adicional
        $pdf->Ln(1);

        // Agregar el título del recibo
        $pdf->Cell(0, 10, 'Recibo de Pago', 0, 1, 'C');

        $pdf->SetFont('Arial', '', 8);

        // Espacio vertical
        $pdf->Ln(2);

        // Configurar la fuente y el tamaño del texto
        $pdf->SetFont('Arial', '', 8);

        // Agregar línea vacía
        $pdf->MultiCell(70, 4, '', 0, 'L');
        $pdf->Ln();

        // Verificar si se encontró un registro
        if ($row !== null) {
            $pdf->Ln(10);
            $pdf->SetFont('Arial', 'B', 9);
            $pdf->Cell(40, 5, 'No. de Factura:', 0, 0, 'L');
            $pdf->SetFont('Arial', '', 9);
            $pdf->Cell(30, 5, $row["NoFactura"], 0, 1, 'L');

            $pdf->SetFont('Arial', 'B', 9);
            $pdf->Cell(40, 5, 'Nombre:', 0, 0, 'L');
            $pdf->SetFont('Arial', '', 9);
            $pdf->Cell(30, 5, $row["Nombre"], 0, 1, 'L');

            $pdf->SetFont('Arial', 'B', 9);
            $pdf->Cell(40, 5, 'Apellido:', 0, 0, 'L');
            $pdf->SetFont('Arial', '', 9);
            $pdf->Cell(30, 5, $row["Apellido"], 0, 1, 'L');

            $pdf->SetFont('Arial', 'B', 9);
            $pdf->Cell(40, 5, 'Fecha:', 0, 0, 'L');
            $pdf->SetFont('Arial', '', 9);
            $pdf->Cell(30, 5, $row["Fecha"], 0, 1, 'L');

            $pdf->SetFont('Arial', 'B', 9);
            $pdf->Cell(40, 5, 'Monto:', 0, 0, 'L');
            $pdf->SetFont('Arial', '', 9);
            $pdf->Cell(30, 5, $row["Monto"], 0, 1, 'L');

            $pdf->SetFont('Arial', 'B', 9);
            $pdf->Cell(40, 5, 'Meses:', 0, 0, 'L');
            $pdf->SetFont('Arial', '', 9);
            $pdf->Cell(30, 5, $row["CantidaMeses"], 0, 1, 'L');

            $pdf->SetFont('Arial', 'B', 9);
            $pdf->Cell(40, 5, 'Concepto:', 0, 0, 'L');
            $pdf->SetFont('Arial', '', 9);
            $pdf->Cell(30, 5, $row["Concepto"], 0, 1, 'L');

            $pdf->SetFont('Arial', 'B', 9);
            $pdf->Cell(40, 5, 'Dui:', 0, 0, 'L');
            $pdf->SetFont('Arial', '', 9);
            $pdf->Cell(30, 5, $row["Dui"], 0, 1, 'L');
        } else {
            echo "No se encontró ningún registro con el número de DUI especificado.";
            exit();
        }

        // Agregar una línea separadora
        $pdf->Ln();
        $pdf->Cell(70, 2, '-------------------------------------------------------------------------', 0, 1, 'L');
        // Cerrar la conexión a la base de datos
        $stmt->close();
        $conexion->close();

        // Agregar nombre de la asociación
        $pdf->SetFont('Arial', 'B', 9);
        $pdf->MultiCell(70, 5, 'Asociacion Comunal Administrativa de Agua Potable Las Isletas', 0, 'C');
        $pdf->Ln(4);

        // Agregar código postal
        $pdf->SetFont('Arial', 'B', 9);
        $pdf->Cell(15, 5, 'Codigo Postal: ', 0, 0, 'L');
        $pdf->Cell(5, 4, '', 0, 0, 'L');
        $pdf->Cell(5, 4, '', 0, 0, 'L');
        $pdf->SetFont('Arial', '', 9);
        $pdf->Cell(15, 5, '01618', 0, 1, 'L');
        $pdf->Ln(2);
        $pdf->Cell(0, 5, utf8_decode('¡¡¡GRACIAS POR SU PUNTUALIDAD!!!'), 0, 1, 'C');
        $pdf->Ln(4);

        // Configurar la fuente y el tamaño del texto
        $pdf->SetFont('Arial', '', 8);

        // Agregar una línea separadora
        $pdf->Ln();
        $pdf->Cell(70, 2, '-------------------------------------------------------------------------', 0, 1, 'L');

        // Agregar la dirección
        $pdf->MultiCell(70, 5, 'San Jose Las Isletas, San Pedro Masahuat, La Paz.', 0, 'C');

        // Guardar el archivo PDF
        $pdf->Output("recibo.pdf", "I");
    }
}
