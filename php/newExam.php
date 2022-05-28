<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css" type="text/css">
    <title>Generar examen</title>
</head>
<body>
    <div>
        <a href="../index.html" class="navLink">Inicio</a>
        <a href="../newPatient.html" class="navLink">Nuevo Paciente</a>
        <a href="../searchExam.html" class="navLink">Buscar examen</a>
    </div>
</body>
</html>

<?php 

include('dbConfig/config.php');

if(isset($_POST['examType']) && isset($_POST['document']) && isset($_POST['date'])){
    $examType = $_POST['examType'];
    $doc = $_POST['document'];
    $fecha = $_POST['date'];

    // echo $examType . " " . $doc . " " . $fecha;

    $sql = "INSERT INTO examen(documento, tipoExamen, fecha) VALUES ('$doc', '$examType', '$fecha')";
    $sql1 = "SELECT * FROM paciente WHERE documento='$doc'";

    if(!$con){
        die("Conexión fallida");
    } else {
        if(mysqli_num_rows(mysqli_query($con, $sql1)) == 0){
            echo "<h1>El paciente no está registrado</h1>";
        } else {
            if($result = mysqli_query($con, $sql) == true) {
                echo("<h1>Examen generado</h1>");
            }
        } 
        
    } 
} else {
    header("refresh: 1; url=../index.html");
    echo "Faltaron datos por ingresar";
}

?>