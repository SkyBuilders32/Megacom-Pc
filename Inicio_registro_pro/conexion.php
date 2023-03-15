<?php

$con= new mysqli('localhost', 'root','', 'login_register');

if($con->connect_errno){

    die('Error' . $con->connect_errno);
}else{
    // echo"conectada";
}
?>