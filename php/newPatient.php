<?php 

include('dbConfig/config.php');

if(isset($_POST['name']) && isset($_POST['birthday']) && isset($_POST['document']) && isset($_POST['residence']) && isset($_POST['prefix']) && isset($_POST['cellphone']) && isset($_POST['email']) && isset($_POST['gender'])) {
    
    $name = $_POST['name'];
    $bDay = $_POST['birthday'];
    $res = $_POST['residence'];
    $doc = $_POST['document'];
    $prefix = $_POST['prefix'];
    $cell = $_POST['cellphone'];
    $number = $prefix . $cell;
    $mail = $_POST['email'];
    $gender = $_POST['gender'];

    // echo $name . " " . $bDay . " " . $res . " " . $doc . " " . $number . " " . $mail . " " . $gender;
    $sql = "INSERT INTO paciente(nombre, fechaNacimiento, direccion, documento, telefono, genero, correo) VALUES ('$name', '$bDay', '$res', '$doc', '$number', '$gender', '$mail')";

    if(!$con) {
        die('conexion fallida');
    } else {
        echo "<h1>Datos ingresados correctamente</h1>";
        $result = mysqli_query($con, $sql);
    }

} else {
    echo 'Faltaron datos por ingresar. Intente de nuevo';
}
