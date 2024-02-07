<?php
if (!empty($_POST["guardar"])) {
    if (empty($_POST["dui"]) or empty($_POST["concepto"])) {
        echo '<div class="alerta">Uno de los campos está vacío</div>';
    } else {
        $dui = $_POST["dui"];
        $concepto = $_POST["concepto"];
        $sql = $conexion->query("INSERT INTO resta_acumulada(cantidad_resta,concepto)values('$dui','$concepto')");
        if ($sql == 1) {
            echo 'Egreso registrado correctamente';
        } else {
            echo '<div class="alerta">Error al registrar el egreso</div>';
        }

        header("Location: " . $_SERVER["PHP_SELF"]);
        exit();
    }
}