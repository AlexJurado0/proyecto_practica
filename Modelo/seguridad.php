<?php 

//comprueba que el usuario esta autentificado 
if ($_SESSION["autentificado"] != "1") {
//si no existe, se dirige a la página de inicio 
header("location: ../Vista/index.php");
//salimos del script 
exit();
}
?>

