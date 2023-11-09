<?php
session_start();
include("conexion.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

</head>

<body>
    <?php
    if (!isset($_SESSION["admin"])) {
        require("navIniciar.php");
    } else {
        require("navConSesion.php");
    }
    ?>
    <?php
    if (!isset($_POST["enviar"])) {
        ?>
         <div class="contenedor">
        <h2>Mostrar jugadores de Equipo</h2>
            <h3>Equipo</h3>
            <form action="" method="post">
                <label for="">Selecciona un equipo para ver los jugadores</label>
                <select name='equipos' id=''>
<?php
        $conexion = crearconexionBD();

        $consulta = "SELECT nombre_equipo from equipos;";
        $stmt = $conexion->prepare($consulta);
        $stmt->execute();
        $fila = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($fila as $valor) {
            echo "<option>" . $valor["nombre_equipo"] . "</option>";
        }
        $conexion = null;
    ?>
        </select>
        <button type="submit" name="enviar">Enviar</button>
        </form>
        </div>
    <?php
    } else {
        $equipo = $_POST["equipos"];
        
       
        $conexion2 = crearconexionBD();
        $consulta2 = "SELECT entrenador,nombre_jugador,posicion,foto FROM equipos join jugador using(nombre_equipo) WHERE nombre_equipo= :equipo;";
        $stmt2 = $conexion2->prepare($consulta2);
        $stmt2->bindParam(":equipo", $equipo);
        $stmt2->execute();
        $filasTabla = $stmt2->fetchAll(PDO::FETCH_ASSOC);
        
        echo "<h2>Jugadores del equipo $equipo</h2>";
        echo "El entrenador es ". $filasTabla[0]['entrenador'];
        echo "<table><thead><td>Nombre</td><td>Foto</td><td>Posicion</td></thead>";
        foreach ($filasTabla as $fila) {
            echo "<tr><td>" . $fila["nombre_jugador"] . "</td><td><img src='./img/".$fila["foto"]."' width='50px'></td><td>" . $fila["posicion"] . "</td></tr>";
        }

        echo "</table>";
    }

    ?>


</body>

</html>