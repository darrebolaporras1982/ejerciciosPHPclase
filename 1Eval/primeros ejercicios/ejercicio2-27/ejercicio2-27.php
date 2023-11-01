<?php
include("ejercicio2-27header.php");
$aleatorio=rand(0,5);
echo "El numero es: ".$aleatorio;

/* ●Si sale 0, mostrará el mensaje “Acceso denegado” y volverá a sacar un 
nuevo número.
●Si sale 1, mostrará el mensaje “Bienvenido, que pases un buen día!”
●Si sale 2, mostrará la tabla de multiplicar del número aleatorio (el 
formato será num x 1 = valor, num x 2 = valor, …)
●Si sale 3, mostrará 4 imágenes en una tabla de 4 columnas. Realizalo 
en una función.
●Si no está entre 0 y 3 mostrará el mensaje correspondiente. */
/* function tabla($numero){
    for($i=0;$i<11;$i++){
        $numero=$aleatorio*$i;
        echo"<h5>$aleatorio x $i = $numero</h5><br>";
        }
} */
if($aleatorio==0){
    echo "<br> Acceso Denegado";
}else if($aleatorio==1){
    echo"<br> Bienvenido al sistema!";
}else if($aleatorio==2){
    $aleratorio2=rand(1,10);
    //tabla($aleratorio2);
}else if($aleatorio==3){

}
include("ejercicio2-27footer.php")
?>