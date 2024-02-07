<?php
if (!empty($_POST["registro"])) {
    if (empty($_POST["nombre"]) or empty($_POST["apellido"]) or empty($_POST["direccion"]) or empty($_POST["dui"])) {
        echo "<script>alert('Por favor, complete todos los campos.'); window.history.back();</script>";
    } else {
        $nombre = $_POST["nombre"];
        $apellido = $_POST["apellido"];
        $direccion = $_POST["direccion"];
        $dui = $_POST["dui"];

        $sql = "INSERT INTO cliente (Nombre, Apellido, Direccion, Dui) VALUES (?, ?, ?, ?)";
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param("ssss", $nombre, $apellido, $direccion, $dui);

        if ($stmt->execute()) {
            echo "<script>alert('Usuario registrado correctamente!'); window.history.back();</script>";
        } else {
            echo '<div class="alerta">Error al registrar el usuario</div>';
        }

        $stmt->close();

        header("Location: " . $_SERVER["PHP_SELF"]);
        exit();
    }
}
