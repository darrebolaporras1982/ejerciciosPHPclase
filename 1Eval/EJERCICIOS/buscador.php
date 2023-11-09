<?php
include_once('conexion.php');
$busqueda = 0;
//if ($_SERVER['REQUEST_METHOD'] == 'POST') {
if ($_POST) {
  
    $tit_busqueda = isset($_REQUEST['titulo']) ? $_REQUEST['titulo'] : null;
    $aut_busqueda = isset($_REQUEST['autor']) ? $_REQUEST['autor'] : null;
    $disp_busqueda = isset($_REQUEST['disponible']) ? $_REQUEST['disponible'] : null;



    // Prepara SELECT
    if ($tit_busqueda != NULL){
        $miConsulta = $miPDO->prepare("SELECT * FROM libros WHERE titulo like concat('%', :titulua, '%');");

        $array_datos =   array(
                'titulua' => $tit_busqueda
            /* 'autor' => $autor,
                'disponible' => $disponible*/
        );
        $busqueda = $tit_busqueda;

    } else if ($aut_busqueda != NULL){
            $miConsulta = $miPDO->prepare("SELECT * FROM libros WHERE autor like concat('%', :autorea, '%');");
    
            $array_datos =   array(
                    'autorea' => $aut_busqueda
                /* 'autor' => $autor,
                    'disponible' => $disponible*/
            );
            $busqueda = $aut_busqueda;
    
    } else if ($disp_busqueda != NULL){
        $miConsulta = $miPDO->prepare("SELECT * FROM libros WHERE disponible = :disponible;");

        $array_datos =   array(
                'disponible' => $disp_busqueda
            /* 'autor' => $autor,
                'disponible' => $disponible*/
        );
        $busqueda = $disp_busqueda;
        
    }else{
// Gainontzekoa

    }

    $miConsulta->execute( $array_datos );

$datuak = $miConsulta->fetchColumn();


} else {

    // Prepara SELECT - Lehenego aldia bada, liburu guztiak bilatzezn ditugu
    $miConsulta = $miPDO->prepare('SELECT * FROM libros;');

    //$datuak = 1;
    $miConsulta->execute();
    $datuak = $miConsulta->fetchColumn();

} 


// Ejecuta consulta
$miConsulta->execute();
    
 ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Irakurri - CRUD PHP</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        table td ,tr{
            border: 1px solid orange;
            text-align: center;
            padding: 1.3rem;
        }
        table th{
            border-radius: .5rem;
            color: white;
            background-color: orange;
            padding: 1rem;
            text-decoration: none;
        }
        .button {
            border-radius: .5rem;
            color: white;
            background-color: orange;
            padding: 1rem;
            text-decoration: none;
        }
    </style>
</head>
<body>
    
<p>&nbsp;</p><p>&nbsp;</p>
<?php echo "Busqueda: " . $busqueda . "<br>"; ?>
<form action="buscador.php" method="post">
        <p>
            <label for="titulo">Izenburua</label>
            <input id="titulo" type="text" name="titulo">
            &nbsp;&nbsp;
            <label for="autor">Autorea</label>
            <input id="autor" type="text" name="autor">
            &nbsp;&nbsp;
            <label>Erabilgarri</label>
            <input id="si-disponible" type="radio" name="disponible" value="1"> <label for="si-disponible">Bai</label>
            <input id="no-disponible" type="radio" name="disponible" value="0"> <label for="no-disponible">Ez</label>
        </p>
        <p>
            <input type="submit"   value="Bilatu">
        </p>
    </tr>
    </form>

    <p>&nbsp;</p>
    <table>
        <!-- <th >LIBURUTEGIA</th> -->
        <tr>
            <th>Kodea</th>
            <th>Izenburua</th>
            <th>Autorea</th>
            <th>Erabilgarri?</th>
            <td></td>
            <td></td>
        </tr>
    <?php 
   
    if ($datuak >= 1){
        
       
        foreach ($miConsulta as $clave => $valor): ?> 
            <tr>
            <td><?= $valor['codigo']; ?></td>
            <td><?= $valor['titulo']; ?></td>
            <td><?= $valor['autor']; ?></td>
            <td><?= $valor['disponible'] ? 'Bai' : 'Ez'; ?></td>
            <!-- Se utilizará más adelante para indicar si se quiere modificar o eliminar el registro 
            <td><a class="button" href="modificar.php?codigo=<--?= //$valor['codigo'] ?>">Aldatu</a></td>
            <td><a class="button" href="borrar.php?codigo=<--?=// $valor['codigo'] ?>">Ezabatu</a></td>-->
            </tr>

        <?php 
        endforeach;
    
    }else{
    ?>   
    <tr>
            <td colspan="6">Ez dago horren moduko libururik</td> </tr>

   <?php  
   }
   ?>
    
    </table>
</body>
</html>
