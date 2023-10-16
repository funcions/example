
<?php
session_start();


//validar que los campos NO esten vacios 
if (!empty($_POST["btningresar"])) {
   
    if ( !empty($_POST["usuario"]) and !empty($_POST["password"]) ) {
        $usuario = $_POST["usuario"];
        $password = $_POST["password"];

        //verificar que el usuario existe o no existe en la base de datos
        $sql = $conexion->query(" select * from usuario where usuario='$usuario' and clave='$password' ");
        if ($datos=$sql->fetch_object()) {
            $_SESSION["id"]=$datos->id;
            $_SESSION["nombre"]=$datos->nombres;
            $_SESSION["apellido"]=$datos->apellidos;
            header("location:inicio.php");
        } else {
            echo "<div class='alert alert-danger'>Acceso denegado</div>";
        }
        

    } else {
        echo "campos vacios";
    }
    

} else {
    # code...
}



?>