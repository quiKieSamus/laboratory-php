<?php 

if(isset($_POST['examType']) && isset($_POST['document'])){
    $examType = $_POST['examType'];
    $doc = $_POST['document'];

    echo $examType . " " . $doc;
} else {
    header("refresh: 1; url=../index.html");
    echo "Faltaron datos por ingresar";
}

?>