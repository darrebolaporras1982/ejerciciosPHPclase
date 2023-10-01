    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
    <div class="container_modificar">
        <form action="" method="post">
            <label for="titulo">Titulo : <input type="text" name="titulo" id="titulo"></label>
            <label for="autor">Autor : <input type="text" name="autor" id="autor"></label>
            <label for="disponible">Disponible ?</label>
            <div class="radio">
                <input type="radio" name="disponible" id="si" value="1" checked>Si
                <input type="radio" name="disponible" id="no" value="0">No
            </div>
            <input type="submit" value="Modificar" id="modificar">
        </form>
    </div>
    </body>
    </html>
<?php
    foreach($_POST as $clave=>$valor){
       $codigo=$clave;
    }
      //creo las variables para la conexion
      $dbHost="localhost";
      $dbNombre="db_biblioteca";
      $dbUsusario="root";
      $dbPassword="";
  
      //para utilizar PDO hace falta especificar cual sera el nombre de la base de datos y el servidor
      $hostPDO="mysql:host=$dbHost;dbname=$dbNombre;";
     
      //creo el bloque try-catch para la conexion
      try{
          //creo la conexion
        $conexion=new PDO($hostPDO,$dbUsusario,$dbPassword);
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        //como no sabemos el boton de modificar que se ha pulsado, he pasado el codigo de la posicion.
        //hago primero un select para saber los datos

        $consultaSelect="SELECT * FROM LIBROS WHERE CODIGO=:codigo;";
        $stmt=$conexion->prepare($consultaSelect);
        $stmt->bindParam(":codigo",$codigo);
        $stmt->execute();
        while($fila=$stmt->fetch()){
            echo "<h2>El libro que vas a Modificar es :</h2><br>Codigo : ".$fila['codigo']." - "."Titulo : ".$fila['titulo']." - "."Autor : ".$fila['autor']." - "."Disponible : ".$fila['disponible']."<br><br><br>";
        }

        if(isset($_SERVER["REQUIRE_METHOD"])==="POST"){

            if(isset($_POST["titulo"])){
                $tituloNuevo=$_POST["titulo"];
                    if(empty($tituloNuevo)){
                        $tituloNuevo=$fila["titulo"];
                    }
            } 
            if(isset($_POST["autor"])){
                $autorNuevo=$_POST["autor"];
                    if(empty($autorNuevo)){
                        $autorNuevo=$fila["autor"];
                    }
            } 
            if(isset($_POST["disponible"])) {
                $disponibleNuevo=$_POST["disponible"];
                    if(empty($disponibleNuevo)){
                        $disponibleNuevo=$fila["disponible"];
                    }
            }
            //comprobamos cuantos campos quiere cambiar
           
        
            $consulta="UPDATE LIBROS SET TITULO =:titulo,AUTOR =:autor,DISPONIBLE=:valor WHERE CODIGO= :codigo;";
        
                $stmt=$conexion->prepare($consulta);
                $stmt->bindParam(":titulo",$tituloNuevo);
                $stmt->bindParam(":autor",$autorNuevo);
                $stmt->bindParam(":valor",$disponibleNuevo);
                $stmt->bindParam(":codigo",$codigo);
        
                $stmt->execute();
                
                print_r($_POST);
        }
        }catch(Exception $e){
                        echo "error al conectarse a la base de datos";
                    }
       
?>
        

       


      



