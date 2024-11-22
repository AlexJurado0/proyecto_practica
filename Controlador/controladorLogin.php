<?php 
    
if (mysqli_num_rows($result) == 1) {
    $_SESSION["autentificado"] = "1";

    header("Location: ../Vista/paginaPrincipal.php");
    
} else {
    header("Location: ../Vista/index.html?error=1");

    return $id_usuario;
    exit();
}

?>