<?php
include 'conexion.php';

$correo = $_POST['corr_log'];
$contra = $_POST['pass_log'];

$consulta = "SELECT * FROM usuario WHERE correo='$correo' and contra='$contra'";
$resultado =mysqli_query($conn,$consulta);

$filas=mysqli_num_rows($resultado);
if ($filas>0) {
    header("location:inicio_usuario.html");
}else {
    echo "Error en la autentificacion";
}
mysqli_free_result($resultado);
mysqli_close($conn);
?>