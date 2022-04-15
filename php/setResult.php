<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css" type="text/css">
    <title>Emitir Resultado</title>
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

if(isset($_POST['id']) && isset($_POST['result']) && $_POST['result'] != '') {
    $id = $_POST['id'];
    $resultado = $_POST['result'];
    // echo $id . " " . $resultado;

    $sql = "UPDATE examen SET resultado='$resultado' WHERE id='$id'";

    if(!$con) {
        die("conexion fallida");
    } else {
        if($result = mysqli_query($con, $sql) == true) {
            echo "<h1>Resultados ingresados correctamente</h1>";
        } else {
            echo "Algo salio mal";
        }
    }
} else {
    echo "ingrese un resultado valido";
}

?>