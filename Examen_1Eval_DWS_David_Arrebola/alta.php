<?php
session_start();
//iniciamos la sesion 
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
    //incluimos la carpeta de funciones
    include("conexion.php");

    //si no existe la sesion
    if (!isset($_SESSION["admin"])) {
        //requerimos la barra de navegacion corresppondiente
        require("./vistas/sinsesion.php");
    } else {
        // sino 
        require("./vistas/consesion.php");
    }
    ?>
    <h2>Nuevas obras. Practica con nosotros</h2>
    <h4>te interesa que la gente vea tus obras en nuestra galeria</h4>
    <h3>DATOS DE AUTOR / CUADRO</h3>

    <form action="alta.php" method="post" enctype="multipart/form-data">
        <label for="">Nombre de la obra : </label>
        <input type="text" name="nombre" id="">
        <label for="">Autor : </label>
        <select name="autor" id="">
            <?php
            //creo una conexion para sacar de la base de datos los nombres de los autores
            $conexion = creoConexion();
            $consulta = "SELECT * FROM autor;";
            $stmt = $conexion->prepare($consulta);
            $stmt->execute();
            //$filas es un array y lo recorro y voy insertando en el option cada nombre
            $filas = $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach ($filas as $fila) {
                echo "<option>" . $fila["nom_autor"] . "</option>";
            }
            //cierro la conexion
            $conexion = null;
            ?>
        </select>
        <input type="file" name="imagen" id="">
        <label for="">Descripcion de la Obra : </label>
        <input type="text" name="descripcion" id="">
        <input type="submit" value="Enviar">
        <button type="reset">Borrar Formulario</button>
    </form>
    <?php
    //compruebo que los campos existen
    if (isset($_POST["nombre"]) && isset($_POST["autor"]) && isset($_FILES["imagen"]) && isset($_POST["descripcion"])) {
        //los meto en variables
        $nombre = $_POST["nombre"];
        $autor = $_POST["autor"];
        $imagen = $_FILES["imagen"]["name"]; //como es un file saco el nombre que tiene
        $descrip = $_POST["descripcion"];


        //compruebo si estan vacios
        if (empty($nombre) || empty($autor) || empty($descrip) || $imagen == null) {
            //si hay alguno vacios
            echo "<h3 style='color:red'>Todos los campos deben estar completados</h3>";
        } else {
            //si no hay ninguno vacio
            //creamos la conexion
            $conexionconsultar = creoConexion();
            //saco el codigo del autor
            $consultaCodigo = "SELECT cod_autor from autor where nom_autor=:nombreautor;";
            $stmtcodigo = $conexionconsultar->prepare($consultaCodigo);
            $stmtcodigo->bindParam(":nombreautor", $autor);
            $stmtcodigo->execute();
            $resultado = $stmtcodigo->fetch(PDO::FETCH_ASSOC);
            //aqui tengo el codigo del autor
            $_SESSION["codigoAutor"] = $resultado["cod_autor"];
            
            $conexionconsultar=null;

            $conexionInsertar=creoConexion();
            //creamos la consulta
            
            $consultaInsertar = "INSERT INTO cuadro (nom_cuadro,des_cuadro,foto_cuadro,autor) VALUES(:nombre,:descrip,:foto,:codautor);";
            //preparamos los campos de la insercion
            $stmt = $conexionInsertar->prepare($consultaInsertar);
            $stmt->bindParam(":nombre", $nombre);
            $stmt->bindParam(":descrip", $descrip);
            $stmt->bindParam(":foto", $_FILES["imagen"]["name"]); //cogemos el campo de nombre de $_FILES
            $stmt->bindParam(":codautor", $_SESSION["codigoAutor"]);
            $stmt->execute();
            $stmt->fetchAll(PDO::FETCH_ASSOC);
            if ($stmt->rowCount() > 0) {
                $destino = "/Examen_1Eval_DWS_David_Arrebola/Imagenes/". $_FILES["imagen"]["name"]; //Direccion donde queremos alojar la imagen en el servidor
                $origen = $_FILES["imagen"]["tmp_name"]; //el origen desde el que vamos a coger la imagen. carpeta temporal
                move_uploaded_file($origen, $destino); //movemos la imagen de origen a destino

                //podemos sacar un mensaje con el resultado
                //podemos redirigir a la pagina de jugadores
                header("Location: index.php");
                exit;
            }
        }
    }
    ?>

    <?php require("./vistas/footer.php"); ?>


</body>

</html>