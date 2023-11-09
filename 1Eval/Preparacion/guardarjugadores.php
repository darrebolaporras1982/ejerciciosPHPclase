<?php
//iniciamos la sesion 
session_start();
include("funciones.php");

//comprobamos si existen las variables
if (isset($_POST["nombre"]) && isset($_POST["posicion"]) && isset($_POST["equipo"]) && isset($_FILES["imagen"])) {
    //creamos las variables con los que no viene del $_POST y $_FILES
    $nombre = $_POST["nombre"];
    $posicion = $_POST["posicion"];
    $equipo = $_POST["equipo"];
    $imagen = $_FILES["imagen"]["name"];

    //comprobamos si los campos estan vacios
    if (empty($nombre) || empty($posicion) || empty($equipo) || $imagen == null) {
        //si hay algun campo vacio sacamos el mensaje por la sesion hasta jugadores.php
        $mensaje = "<h3 style = 'color:red'>No puedes dejar ningun campo vacio</h3>";
        $_SESSION["mensajeError"] = $mensaje;
        header("Location: jugadores.php");
        exit;

        //sino, quiere decir que todos los campos estan rellenados
    } else {
        //comprobamos que el jugador no exista en la base de datos
        $conexionComprobar=creoConexion();
        $consultaComprobar="SELECT * FROM jugador WHERE nombre_jugador=:nom_jug AND nombre_equipo=:nom_equi;";
        $stmtComprobar=$conexionComprobar->prepare($consultaComprobar);
        $stmtComprobar->bindParam(":nom_jug",$nombre);
        $stmtComprobar->bindParam(":nom_equi",$equipo);
        $stmtComprobar->execute();
        $resultado=$stmtComprobar->fetchAll(PDO::FETCH_ASSOC);
        if($stmtComprobar->rowCount()>0){
            echo "<h3>ya existe en ese jugador</h3>";
            $conexionComprobar=null;
        }else{

        //creamos la conexion
        $conexion = creoConexion();
        //creamos la consulta
        $consulta="INSERT INTO jugador (nombre_jugador,posicion,foto,nombre_equipo) VALUES(:nombre,:posicion,:foto,:equipo);";
        //preparamos los campos de la insercion
        $stmt=$conexion->prepare($consulta);
        $stmt->bindParam(":nombre",$nombre);
        $stmt->bindParam(":posicion",$posicion);
        $stmt->bindParam(":foto",$_FILES["imagen"]["name"]);//cogemos el campo de nombre de $_FILES
        $stmt->bindParam(":equipo",$equipo);
        $stmt->execute();
        $stmt->fetchAll(PDO::FETCH_ASSOC);
        if($stmt->rowCount()>0){
            $destino="./img/".$_FILES["imagen"]["name"];//Direccion donde queremos alojar la imagen en el servidor
            $origen=$_FILES["imagen"]["tmp_name"];//el origen desde el que vamos a coger la imagen. carpeta temporal
            move_uploaded_file($origen,$destino);//movemos la imagen de origen a destino

            //podemos sacar un mensaje con el resultado
            //podemos redirigir a la pagina de jugadores
            $mensajeCorrecto="<h3 style='color:green'>Jugador Agregado correctamente</h3>";
            $_SESSION["mensajeExito"]=$mensajeCorrecto;
            header("Location: jugadores.php");
            exit;
        }
    }
    }
}
