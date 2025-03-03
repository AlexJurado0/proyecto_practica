<?php
session_start();
$_SESSION["autentificado"] = "0"; // Opcional: asignar un valor distinto para confirmar el cierre
session_unset();  // Limpia todas las variables de sesión
session_destroy(); // Destruye la sesión

// Redirige al login
header("Location: ../Vista/index.php");
exit();
?>
