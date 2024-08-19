<?php

$hostName = "localhost";
$databaseUsername = "root";
$databasePassword = NULL;
$databaseName = "bingo_hoss";

$con = @mysqli_connect($hostName,$databaseUsername,$databasePassword,$databaseName)
        or die("Database Connection Error!");


    
?>