<?php
//inicio la sesion y la destruimos
session_start();
session_destroy();

//redirigimos al la pagina index
header("Location:index.php");
//cerramos con la sentencia exit
exit;
?>