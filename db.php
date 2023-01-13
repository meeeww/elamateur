<?php

function conectar(){
    $usuario = "discordbot";
    $pass = "vMGhh64@tr";
    $host = "212.227.32.40";
    $dbname = "elamateur";

    $mysqli = new mysqli($host, $usuario, $pass, $dbname);
    if($mysqli->connect_errno){
        echo "Fallamos" . $mysqli->connect_errno;
    }

    return $mysqli;
}

conectar();

?>