<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Busqueda Registro</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style>
        .title {
            text-align: center;
            margin-top: 30px;
            margin-bottom: 20px;
            font-weight: bold;
        }

        .search-container {
            text-align: center;
            margin-bottom: 20px;
        }

        @media (max-width: 576px) {
            .title {
                font-size: 24px;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <h2 class="title">Registro de Cobros</h2>

        <div class="search-container">
            <h4>Buscar</h4>
            <form action="" method="post">
                <div class="input-group">
                    <input type="text" name="campo" id="campo" class="form-control">
                </div>
            </form>
        </div>

        <table class="table table-bordered">
            <thead class="bg-info">
                <tr>
                    <th>NoFactura</th>
                    <th>Fecha</th>
                    <th>Monto</th>
                    <th>Meses</th>
                    <th>Concepto</th>
                    <th>Dui</th>
                </tr>
            </thead>

            <tbody id="content">

            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <script>
        getData()

        document.getElementById("campo").addEventListener("keyup", getData)

        function getData() {
            let input = document.getElementById("campo").value
            let content = document.getElementById("content")
            let url = "load.php"
            let formaData = new FormData()
            formaData.append('campo', input)

            fetch(url, {
                    method: "POST",
                    body: formaData
                }).then(response => response.json())
                .then(data => {
                    content.innerHTML = data
                }).catch(err => console.log(err))
        }
    </script>
</body>

</html>