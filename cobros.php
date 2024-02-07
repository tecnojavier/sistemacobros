<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro Cobros</title>
    <link rel="stylesheet" href="estilos/estilos4.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container-segundo">
        <form action="controlador/controlador_cobros.php" method="POST" class="formulario">
            <h2 class="title">REGISTRAR ARANCEL</h2>
            <div class="padre-segundo">
            <div class="fecha">
                    <label for="fecha">Nombre</label>
                    <input type="text" name="nombre" id="nombre">
                </div>
                <div class="fecha">
                    <label for="fecha">Apellido</label>
                    <input type="text" name="apellido" id="apellido">
                </div>
                <div class="fecha">
                    <label for="fecha">Fecha</label>
                    <input type="text" name="fecha" id="fecha">
                </div>
                <div class="monto">
                    <label for="monto">Monto $</label>
                    <input type="number" step="0.01" id="monto" name="monto">
                </div>
                <div class="meses">
                    <label for="meses">Meses</label>
                    <input type="text" name="meses" id="meses">
                </div>
                <div class="concepto">
                    <label for="concepto">Concepto</label>
                    <input type="text" name="concepto" id="concepto">
                </div>
                <div class="dui">
                    <label for="dui">Dui</label>
                    <input type="text" name="dui" id="dui">
                </div>
                <div class="registro boton-container">
                    <input class="boton" type="submit" value="Guardar Cobro" name="guardar">
                    <input class="boton2" type="button" value="Cancelar" name="cancelar" onclick="window.location.href = 'menu.php'">
                    <input class="boton4" type="button" value="Mostrar Registros" name="mostrar" onclick="window.location.href = 'aranceles.php'">
               </div>
            </div>
        </form>
    </div>
</body>
</html>