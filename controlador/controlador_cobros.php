<?php
session_start();

$conexion = mysqli_connect("127.0.0.1", "root", "", "bdregistropago");

if (!$conexion) {
    die("Error al conectar a la base de datos: " . mysqli_connect_error());
}

$nombre = validarCampo($_POST["nombre"]);
$apellido = validarCampo($_POST["apellido"]);
$fecha = validarCampo($_POST["fecha"]);
$monto = validarCampo($_POST["monto"]);
$meses = validarCampo($_POST["meses"]);
$concepto = validarCampo($_POST["concepto"]);
$dui = validarCampo($_POST["dui"]);

if (empty($nombre) || empty($apellido) || empty($fecha) || empty($monto) || empty($meses) || empty($concepto) || empty($dui)) {
    echo "<script>alert('Por favor, complete todos los campos.'); window.history.back();</script>";
    exit;
}

if (!validarFecha($fecha)) {
    echo "<script> alert('Fecha inválida. Formato requerido: dd/mm/aaaa.');window.history.back();</script>";
    exit;
}

if (!esNumeroPositivo($monto)) {
    echo "<script> alert('Monto inválido. Debe ser un número positivo.');window.history.back();</script>";
    exit;
}

$sql = "INSERT INTO registro (Nombre, Apellido, Fecha, Monto, CantidaMeses, Concepto, Dui)
        VALUES (?, ?, ?, ?, ?, ?, ?)";

$stmt = mysqli_prepare($conexion, $sql);
mysqli_stmt_bind_param($stmt, "sssssss", $nombre, $apellido, $fecha, $monto, $meses, $concepto, $dui);

if (mysqli_stmt_execute($stmt)) {
    $factura = $conexion->insert_id;

    unset($_SESSION["nombre"]);
    unset($_SESSION["apellido"]);
    unset($_SESSION["fecha"]);
    unset($_SESSION["monto"]);
    unset($_SESSION["meses"]);
    unset($_SESSION["concepto"]);
    unset($_SESSION["dui"]);

    header("Location: ../impresion.php?dui=" . urlencode($dui));
    exit();
} else {
    echo "Error al guardar el registro: " . mysqli_stmt_error($stmt);
}

mysqli_stmt_close($stmt);
mysqli_close($conexion);

function validarCampo($campo)
{
    $campo = trim($campo);
    $campo = stripslashes($campo);
    $campo = htmlspecialchars($campo);
    return $campo;
}

function validarFecha($fecha)
{
    $patron = "/^\d{2}\/\d{2}\/\d{4}$/";
    return preg_match($patron, $fecha);
}

function esNumeroPositivo($numero)
{
    return is_numeric($numero) && $numero > 0;
}