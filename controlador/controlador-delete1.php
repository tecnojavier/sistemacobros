<?php
if (!empty($_POST["guardar"])) {
    if (empty($_POST["dui"])) {
        echo '<div class="alerta">El campo DUI está vacío</div>';
    } else {
        $dui = $_POST["dui"];
        
        // Verificar si el DUI existe en la tabla
        $sqlVerificar = $conexion->query("SELECT * FROM cliente WHERE Dui = '$dui'");
        if ($sqlVerificar->num_rows > 0) {
            // El DUI existe, eliminar el registro
            $sqlEliminar = $conexion->query("DELETE FROM cliente WHERE Dui = '$dui'");
            if ($sqlEliminar) {
                echo 'Registro eliminado correctamente';
            } else {
                echo '<div class="alerta">Error al eliminar el registro</div>';
            }
        } else {
            echo '<div class="alerta">No se encontró ningún registro con el DUI ingresado</div>';
        }

        header("Location: " . $_SERVER["PHP_SELF"]);
        exit();
    }
}
?>