<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>
    <h1 class="h1 text-center bg-primary">Los datos del Alumno:</h1>
    <div class="container">
    <table class="table table-striped">
        <thead>
            <th scope="col">Edad</th><th scope="col">Teléfono</th><th scope="col">Dirección</th>
        </thead>
        <tbody>
            <tr>
                <td>{{ $alumno->edad }}</td>
                <td>{{ $alumno->telefono }}</td>
                <td>{{ $alumno->direccion }}</td>
            </tr>
        </tbody>
    </table>
    <a href="#" class="btn btn-primary stretched-link">Editar</a>
    <a href="#" class="btn btn-primary stretched-link">Eliminar</a>
</div>
</body>
</html>
