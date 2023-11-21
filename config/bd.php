<?php


$conexion = mysqli_connect("localhost","root","","bd_agencia_pil");

define("KEY","Sublimate");
define("COD","AES-128-ECB");
define("SERVIDOR","localhost");
define("USUARIO","root");
define("PASSWORD","");
define("BD","bd_agencia_pil");

$servidor="mysql:dbname=".BD.";host=".SERVIDOR;


    $pdo= new PDO($servidor,USUARIO,PASSWORD,
    array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8")
    );

 
?>