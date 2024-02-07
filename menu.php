<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Menú</title>
  <link rel="stylesheet" href="estilos/estilos.css">
  <link rel="stylesheet" href="estilos/buttons.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
  <header class="container-cabeza">
    <nav class="navbar navbar-expand-lg">
      <a class="navbar-brand">
        ¿Qué quieres hacer hoy?
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"><img src="imagenes/toggle.png" width="100%"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav ml-auto">
          <a class="nav-link" href="cobros.php">Registro de Cobros</a>
          <a class="nav-link" href="registro.php">Registro</a>
          <a class="nav-link" href="admin.php">Administrador</a>
          <a class="nav-link" href="estado.php">Estado de Cuentas</a>
          <a class="nav-link" href="buscar.php">Buscar Registro</a>
          <a class="nav-link" href="buscar2.php">Buscar Usuario</a>
        </div>
      </div>
    </nav>
  </header>

  <div class="container">

    <div class="imagenes mt-4">
      <img src="imagenes/logo.png" width="40%">
    </div>
    <div class="tarjetas mt-4">
      <div class="card" style="width: 18rem;">
        <img src="imagenes/logo.png" class="card-img-top" alt="">
        <div class="card-body">
          <h5 class="card-title">Bomba de Agua</h5>
          <p class="card-text"><strong>Fundada el 15 de mayo de 1998</strong> || En San José Las Isletas.</p>
        </div>
      </div>

      <div class="card" style="width: 18rem;">
        <img src="imagenes/tecnojavier.png" class="card-img-top" alt="">
        <div class="card-body">
          <h5 class="card-title">TecnoJavier</h5>
          <p class="card-text"><strong>Esta es una web desarrollada por &copy;TecnoJavier</strong> || Juan Javier Bonilla Maldonado.</p>
        </div>
      </div>

      <div class="card" style="width: 18rem;">
        <img src="imagenes/dolar.png" class="card-img-top" alt="">
        <div class="card-body">
          <h5 class="card-title">Cobros</h5>
          <p class="card-text"><strong>Recordar que los cobros se realizarán en fechas estipuladas y comunicadas a los beneficiarios</strong> || Asociación de Suministro de Agua Potable - Las Isletas.</p>
        </div>
      </div>
    </div>
  </div>

  <footer class="credenciales">
    <div class="footer-container mt-4">
      <br>
      <div class="whatsapp">
        <img src="imagenes/whatsapp.png" width="10%">
        <a href="https://wa.me/+50376013497">WhatsApp </a>
      </div>
      <div class="telefono">
        <img src="imagenes/telefono.png" width="10%">
        <a href="tel:+50376013497">Llamar</a>
      </div>
      <div class="correo">
        <img src="imagenes/correo.png" width="10%">
        <a href="mailto:bonillajuan244@gmail.com">Correo electrónico</a>
      </div>
    </div>
    <div class="derechos mt-2">
      <p><strong>Todos los derechos reservados &copy;2024 <br> &copy;TecnoJavier</strong></p>
    </div>
  </footer>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>