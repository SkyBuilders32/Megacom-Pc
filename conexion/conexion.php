<?php

$con = new mysqli('localhost', 'root', '', 'megacom');

if ($con->connect_errno) {
    
    die('Error' . $con->connect_errno);
} else {
    // echo "conectada";

}
?>