<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Busqueda</title>
</head>
<body>
<div>
    <a href="../index.html" class="navLink">Inicio</a>
    <a href="../newPatient.html" class="navLink">Ingresar Paciente</a>
    <a href="../newExams.html" class="navLink">Generar examen</a>
</div>

<?php 

include('dbConfig/config.php');

if(isset($_POST['documento'])){
    $doc = $_POST['documento'];
    // echo $doc;
    $sql = "SELECT * FROM examen where documento='$doc'";

    if(!$con) {
        die("conexion fallida");
    } else{
        $result = mysqli_query($con, $sql);
        if(mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                // echo $row['id'] . " " . $row['documento'] . " " . $row['tipoExamen'] . " " . $row['fecha'] . "<a href=''>Emitir resultado</a><br>";
                echo "
                <form action='setResult.php' method='post'>
                <input type='text' name='id' value='$row[id]' readonly></input>
                <input type='text' name='document' value='$row[documento]' readonly></input>
                <input type='text' name='examType' value='$row[tipoExamen]' readonly></input>
                <input type='text' name='date' value='$row[fecha]' readonly></input>
                <textarea col=10 name='result'>$row[resultado]</textarea>
                <input type='submit' value='emitir resultado'></input>
                </form>";
            }
        }
    }

} else {
    echo "faltaron datos";
}

?>    
</body>
</html>

