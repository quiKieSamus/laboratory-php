<?php 

include('dbConfig/config.php');

if(isset($_POST['examType']) && isset($_POST['document']) && isset($_POST['date'])){
    $examType = $_POST['examType'];
    $doc = $_POST['document'];
    $fecha = $_POST['date'];

    // echo $examType . " " . $doc . " " . $fecha;

    $sql = "INSERT INTO examen(documento, tipoExamen, fecha) VALUES ('$doc', '$examType', '$fecha')";

    if(!$con){
        die("Conexión fallida");
    } else {
        if($result = mysqli_query($con, $sql) == true) {
            echo("<h1>Examen generado</h1>");
        }
    }
} else {
    header("refresh: 1; url=../index.html");
    echo "Faltaron datos por ingresar";
}

?>