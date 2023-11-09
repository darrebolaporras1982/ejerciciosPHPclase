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
      <form action="guardarjugadores.php" method="post" enctype="multipart/form-data">
            <label for="">Nombre :</label>
            <input type="text" name="nombre" id="">
            <label for="">posicion :</label>
            <input type="radio" name="posicion" id="" value="Base" checked>Base
            <input type="radio" name="posicion" id="" value="Escolta">Escolta
            <input type="radio" name="posicion" id="" value="Alero">Alero
            <input type="radio" name="posicion" id="" value="Pivot">Pivot
            <label for="">Insertar Foto : </label>
            <input type="file" name="imagen" id="">
            <label for="">Equipo de Destino</label>
            <select name="equipo" id="">
        <?php
        //creamos la conexion con la base de datos
            $conexion= creoConexion();

            //creamos la consulta
            $consulta="SELECT * FROM equipos;";
            
            $stmt=$conexion->prepare($consulta);
            var_dump($stmt);
            $stmt->execute();
             $filas=$stmt->fetchAll(PDO::FETCH_ASSOC);
             //rellenamos la lista de seleccion de equipos
            foreach($filas as $fila){
                echo "<option>".$fila["nombre_equipo"]."</option>";
            }
            //cerramos la conexion
            $conexion=null;
        ?>
    </select>
    <input type="submit" value="Insertar">
            <?php
            //aqui mostramos los mensajes de error al insertar del fichero guardarjugadores.php
            if(isset($_SESSION["mensajeError"])){
                $mensaje=$_SESSION["mensaje"];
                echo $mensaje;
                $_SESSION["mensajeError"]=null;
            }else if(isset($_SESSION["mensajeExito"])){
                $mensaje=$_SESSION["mensajeExito"];
                echo $mensaje;
                $_SESSION["mensajeExito"]=null;
            }
            ?>
      </form>
</body>
</html>