<?php
session_start();
include("conexion.php");
    if(isset($_POST["nombre"])&&isset($_POST["posicion"])&&isset($_FILES["imagen"])&&isset($_POST["equipos"])){
        var_dump($_POST);
        var_dump($_FILES);
$nombre=$_POST["nombre"];
$posicion=$_POST["posicion"];
$imagen=$_FILES["imagen"];
$equipo=$_POST["equipos"];

        if(empty($nombre)||empty($posicion)||empty($equipo)||$_FILES["imagen"]==null){
            $error="<h2 style='color:red'>Error, campos vacios</h2>";
            $_SESSION["mensaje"]=$error;
            header("Location: jugadores.php");
            exit;
        }else{
            $conexion=crearconexionBD();

            $consulta="INSERT INTO jugador (nombre_jugador,posicion,nombre_equipo,foto)VALUES(:nombre,:posicion, :equipo,:foto);";
            $stmt =$conexion->prepare($consulta);
            $stmt->bindParam(":nombre",$nombre);
            $stmt->bindParam(":posicion",$posicion);
            $stmt->bindParam(":equipo",$equipo);
            $stmt->bindParam(":foto",$_FILES["imagen"]["name"]);
            $stmt->execute();
            if($stmt->rowCount()>0){
                $ruta="./img/".$_FILES["imagen"]["name"];
                $origen=$_FILES["imagen"]["tmp_name"];
                move_uploaded_file($origen,$ruta);
                $exito="<h2 style='color:green'>Jugador insertado correctamente</h2>";
                $_SESSION["mensaje"]=$exito;
                header("Location: jugadores.php");
                exit;
            }else{

            }
        }

    }



?>