<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        /* Vamos a diseñar un programa que simule el juego de “Piedra, papel o tijeras”. 
        Crearemos un array que contenga las 3 opciones: 0 - Piedra, 1 - Papel, 3 - Tijeras.
        Por una parte, el programa seleccionará aleatoriamente una de las opciones y por otra, crearemos una variable 
        donde nosotros introduciremos a mano un valor. Necesitaremos comparar lo que nuestra variable contiene 
        y lo que el ordenador ha sacado aleatoriamente.Para realizar ésta comparación utilizaremos una 
        función:seleccionarGanador().Como resultado, el programa mostrará lo que ha seleccionado el usuario, lo que ha 
        seleccionado el ordenador y el mensaje de “Has ganado” o “Ha ganado el ordenador” o 
        “Ha habido un empate”, tal y como se muestra en la imagen.
        Utiliza include() para la parte del diseño del encabezado y del pie */
        
       $elementos=["Piedra","Papel","Tijera"];
       
        function sacaAleatorio(){
            global $elementos;
            $eleccionaleatoria=rand(0,2);
            $saca=$elementos[$eleccionaleatoria];
            return $saca;
        }

        $aleatorio=sacaAleatorio();

        function resultado($mio,$aleatorio){
            if ($mio==$aleatorio) {
                echo "habeis sacado lo mismo";
            }else if($mio=="Piedra"&&$aleatorio=="Tijera"){
                echo "$mio<h3>Ha ganado El Usuario</h3>$$aleatorio";
            }else if($mio=="Tijera"&&$aleatorio=="Papel"){
                echo "$mio<h3>Ha ganado El Usuario</h3>$aleatorio";
            }else if($mio=="Papel"&&$aleatorio=="Piedra"){
                echo "$mio<h3>Ha ganado Papel</h3>$aleatorio";
            }else{
                echo"$mio<h3>Ha ganado el Ordenador</h3>$aleatorio";
            }
        }
        resultado("Tijera",$aleatorio);
        

        

        

        
       /*  function seleccionarGanador($eleccion){
            global $elementos;
            
            $idAleatorio=rand(1,3);

            
            $elemetoAleatorio=$elementos[$idAleatorio];
            
            if($eleccion===$elemetoAleatorio){

                return "<h3>Ha sido empate,velve a tirar</h3>";

            }else if($eleccion=="Tijera"&&$elemetoAleatorio=="Papel"){
               
                return "<h3>Gana Tijera</h3>";

            }else if($eleccion=="Piedra"&&$elemetoAleatorio=="Tijera"){

                    return"<h3>Gana Piedra</h3>";

            }else if($eleccion=="Papel"&&$elemetoAleatorio=="Piedra"){

                return "<h3>Gana Papel</h3>";
            }

        }

        $miEleccion="Papel";
        seleccionarGanador($miEleccion);
 */
    ?>
</body>
</html>