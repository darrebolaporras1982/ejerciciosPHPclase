<?php


function crearConexion(){

    $db_host="localhost";
    $db_name="db_biblioteca";
    $db_user="root";
    $bb_password="";
    $HostPDO="mysql:host=$db_host;dbname=$db_name";
    try{
        $conexion=new PDO($HostPDO,$db_user,$bb_password);
        $conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    }catch(Exception $e){
        echo "No se ha podido conectar a la base de datos";
        echo $e->getMessage();
    }
    return $conexion;
}

function comprobarUsuario($fila){
    if($fila){
        return true;
    }else{
        return false;
    }
    }


function comprobarSiEsta($titulo,$autor){
    $conexion=crearConexion();
    $query="SELECT titulo FROM LIBROS where titulo = :titulo and autor=:autor;";
    $stmt=$conexion->prepare($query);
    $stmt->bindParam(":titulo",$titulo);
    $stmt->bindParam(":autor",$autor);
    $stmt->execute();
    $fila=$stmt->fetch();
    if($fila!=null){
        return true;
    }else{
        return false;
    }
}

?>