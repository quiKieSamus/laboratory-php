<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css" type="text/css">
    <title>Añadir paciente</title>
</head>
<body>
    <div>
        <a href="../index.html" class="navLink">Inicio</a>
        <a href="../newPatient.html" class="navLink">Nuevo Paciente</a>
        <a href="../searchExam.html" class="navLink">Buscar examen</a>
    </div>
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
        $sql1 = "SELECT * FROM paciente WHERE documento='$doc'";
        if(mysqli_num_rows(mysqli_query($con, $sql1)) > 0){
            echo "<h1>El paciente ya existe</h1>";
        } else {
            echo "<h1>Datos ingresados correctamente</h1>";
            $result = mysqli_query($con, $sql);
        }
        
    }

} else {
    echo 'Faltaron datos por ingresar. Intente de nuevo';
}
?>
</body>
</html>