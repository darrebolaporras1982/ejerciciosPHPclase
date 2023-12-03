<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>
    <h1 class="h1" text-center>Edita el Alumno</h1>
    <div class="container">
        <form action="{{ route('editarAlumno',["alumno"=>$alumno->id]) }}" method="post">
            @csrf
            @method('PUT')
            <label for="" class="form-label">Nombre y Apellidos</label>
            <input type="text" name="name" id="nombre" value="{{ $alumno->nom_ape }}">
            <label for="" class="form-label>Edad</label>
            <input type="number" name="edad" id="edad" value="{{ $alumno->edad }}">
            <label for="" class="form-label>Telefono</label>
            <input type="tel" name="telephone" id="telephone" value="{{ $alumno->telefono }}">
            <label for="" class="form-label>Direccion</label>
            <input type="text" name="address" id="address" value="{{ $alumno->direccion }}">
            <input type="submit" class="btn btn-primary" value="Enviar">
        </form>
    </div>
</body>
</html>
