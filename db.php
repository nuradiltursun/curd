<?php

$dsn="mysql:host=localhost;dbname=students";
$user="root";
$password="";
$options=[];

try{
    $conn=new PDO($dsn,$user,$password,$options);

}catch(PDOException $e){

}
// $conn=mysqli_connect("localhost","root","","students");