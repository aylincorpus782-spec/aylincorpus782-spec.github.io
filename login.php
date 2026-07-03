<?php

session_start();
include("conexion.php");

$usuario = $_POST['usuario'];
$password = $_POST['password'];

$consulta = "SELECT * FROM usuarios
WHERE usuario='$usuario'
AND password='$password'";

$resultado = mysqli_query($conexion,$consulta);

if(mysqli_num_rows($resultado) > 0){

    $_SESSION['usuario'] = $usuario;

    header("Location: principal.php");

}else{

    echo "
    <script>
    alert('Usuario o contraseña incorrectos');
    window.location='menu.html';
    </script>
    ";

}

?>