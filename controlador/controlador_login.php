<?php
    if (!empty($_POST["login"])) {
        if (empty($_POST["usuario"]) || empty($_POST["clave"])) {
            echo '<div class="alerta">Uno de los campos está vacío</div>';
        } else {
            $usuario = $_POST["usuario"];
            $clave = $_POST["clave"];

            // Utiliza consultas preparadas para evitar la inyección de SQL
            $stmt = $conexion->prepare("SELECT * FROM usuario WHERE usuario = ? AND clave = ?");
            $stmt->bind_param("ss", $usuario, $clave);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows != 0) {
                header("Location: menu.php");
                exit();
            } else {
                echo '<div class="alerta">Los datos ingresados son incorrectos</div>';
            }
        }
    }
?>