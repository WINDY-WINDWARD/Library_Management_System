<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "Alphacentauri12";
$dbname = "loging_sample_db";
$dbname1 = "library_db";

$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);

$conLib = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname1);

if (!$con){
    die("failed to connect");
}

if (!$conLib){
    die("failed to connect");
}
