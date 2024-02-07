<?php
    if (!empty($_POST["login"])) {
        if (empty($_POST["user"]) || empty($_POST["password"])) {
            echo '<div class="alerta">Uno de los campos está vacío</div>';
        } else {
            $usuario = $_POST["user"];
            $clave = $_POST["password"];

            // Utiliza consultas preparadas para evitar la inyección de SQL
            $stmt = $conexion->prepare("SELECT * FROM user WHERE UserAdmin = ? AND Password = ?");
            $stmt->bind_param("ss", $usuario, $clave);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows != 0) {
                header("Location: menu-admin.php");
                exit();
            } else {
                echo '<div class="alerta">Los datos ingresados son incorrectos</div>';
            }
        }
    }
?>