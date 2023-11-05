<?php
//iniciamos la sesion
session_start();
include("funciones.php");
if(!isset($_SESSION["admin"])){
    require("./nav/sinSesion.php");
}else{
    require("./nav/conSesion.php");
}
?>
<h2>EQUIPOS Y JUGADORES QUE PARTICIPAN EN EL TORNEO</h2>
<?php
//si no se encuentra la varible, mostramos el inicio del formulario
if(!isset($_POST["mostrar"])){
?>
<form action="equipos.php" method="post">
    <label for="">Equipos</label>
    <select name="equipo" id="">
        <?php
            $conexion= creoConexion();
            $consulta="SELECT * FROM equipos;";
            
            $stmt=$conexion->prepare($consulta);
            $stmt->execute();
             $filas=$stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach($filas as $fila){
                echo "<option>".$fila["nombre_equipo"]."</option>";
            }
            $conexion=null;
        ?>
    </select>
    <button type="submit" name="mostrar">Mostrar</button>
    <?php
        }else{
            //si hemos pulsado el boton mostrar cambiará el formulario y mostrará los jugadores del equipo seleccionado
            $equipo=$_POST["equipo"];
            $conexion2=creoConexion();

            $consulta2="SELECT entrenador,nombre_jugador,posicion,foto FROM equipos JOIN Jugador USING(nombre_equipo) WHERE nombre_equipo=:equipo;";
            $stmt2=$conexion2->prepare($consulta2);
            $stmt2->bindParam(":equipo",$equipo);
            $stmt2->execute();
            $filas2=$stmt2->fetchAll(PDO::FETCH_ASSOC);
            echo "El equipo $equipo tiene como entrenador a ".$filas2[0]["entrenador"];
            echo "<table><thead><th>Nombre Jugador</th><th>Posicion</th><th>Foto</th></thead>";
            foreach($filas2 as $valor2){
                echo"<tr><td>".$valor2["nombre_jugador"]."</td><td>".$valor2["posicion"]."</td><td><img src='./img/".$valor2["foto"]."' width=40px></td></tr>";
            }
            $conexion2=null;
        }
    ?>
</form>      
</body>
</html>