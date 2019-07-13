<?php
    include "Base.php";
    $mysqli = conectar();
    $sql = "Select * from palabras;";
    $response = $mysqli->query($sql);
    $response->data_seek(0);
    echo("[");
    for($numFila = 0; $numFila < $response->num_rows; $numFila++){
        $response->data_seek($numFila);
        $row = $response->fetch_assoc();
        if($numFila == $response->num_rows - 1){
            echo("{ \"id\" : \"". $row["id"] ."\", \"texto\" : \"".$row["texto"]."\"}");
        } else {
            echo("{ \"id\" : \"". $row["id"] ."\", \"texto\" : \"".$row["texto"]."\"},");
        }
    }
    echo("]");
?>