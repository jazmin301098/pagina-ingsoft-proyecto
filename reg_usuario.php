<?php

include 'conexion.php';

$Nombre = $_POST['nomb_pac'];
$Apellido = $_POST['ap_pac'];
$Edad = $_POST['edad_pac'];
$Telefono = $_POST['tel_pac'];
$Direccion = $_POST['dir_pac'];
$Padecimiento = $_POST['pad_pac'];



$sql = "INSERT INTO paciente (Nombre,Apellido,Edad,Telefono,Direccion,Padecimiento) VALUES ('$Nombre', '$Apellido', '$Edad', '$Telefono', '$Direccion', '$Padecimiento')";

//verificar usuarios
$verificar_telefono = mysqli_query($conn,"SELECT * FROM paciente WHERE Telefono ='$Telefono'");
$verificar_direccion = mysqli_query($conn,"SELECT * FROM paciente WHERE Direccion ='$Direccion'");
if((mysqli_num_rows($verificar_telefono)>0) && (mysqli_num_rows($verificar_direccion)>0)){
    echo '<script>
    alert("El paciente ya se encuentra registrado");
    window.history.go(-1);
    </script>';
    exit;
}

/*$verificar_telefono = mysqli_query($conn,"SELECT * FROM usuario WHERE telefono ='$Telefono'");
if(mysqli_num_rows($verificar_telefono)>0){
    echo '<script>
    alert("El numero de telefono ya se encuentra registrado");
    window.history.go(-1);
    </script>';
    exit;
}*/

//Ejecutar consulta
$resultado = mysqli_query($conn,$sql);

if (!$resultado) {
    echo '<script>
    alert("Error al registrar el paciente");
    window.history.go(-1);
    </script>';
}else {
    echo '<script>
    alert("El paciente se ha registrado exitosamente");
    window.history.go(-1);
    </script>';
}

mysqli_close($conn);
//if (mysqli_query($conn, $sql)) {
 //   echo "New record created successfully";
//} else {
//    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
//}
//mysqli_close($conn);
?>