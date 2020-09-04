<?php

include 'conexion.php';

$Nombre = $_POST['nomb_reg'];
$Apellido = $_POST['ap_reg'];
$Telefono = $_POST['tel_reg'];
$Correo = $_POST['corr_reg'];
$Contra = $_POST['con_reg'];

$sql = "INSERT INTO usuario (nombre, apellido, telefono, correo, contra) VALUES ('$Nombre', '$Apellido', '$Telefono', '$Correo', '$Contra')";

//verificar usuarios
$verificar_correo = mysqli_query($conn,"SELECT * FROM usuario WHERE correo ='$Correo'");
if(mysqli_num_rows($verificar_correo)>0){
    echo '<script>
    alert("El correo ya se encuentra registrado");
    window.history.go(-1);
    </script>';
    exit;
}

$verificar_telefono = mysqli_query($conn,"SELECT * FROM usuario WHERE telefono ='$Telefono'");
if(mysqli_num_rows($verificar_telefono)>0){
    echo '<script>
    alert("El numero de telefono ya se encuentra registrado");
    window.history.go(-1);
    </script>';
    exit;
}

//Ejecutar consulta
$resultado = mysqli_query($conn,$sql);

if (!$resultado) {
    echo '<script>
    alert("Error al registrar el usuario");
    window.history.go(-1);
    </script>';
}else {
    echo '<script>
    alert("El usuario se ha registrado exitosamente");
    window.history.go(-1);
    </script>';
    header("location:index.html");
}

mysqli_close($conn);
//if (mysqli_query($conn, $sql)) {
 //   echo "New record created successfully";
//} else {
//    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
//}
//mysqli_close($conn);
?>