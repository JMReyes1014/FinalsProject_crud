<?php 

    $con = new mysqli('localhost', 'root', '', 'portfolio_crud');

    if(!$con) {
    die(mysqli_error($con));
    }
    
?>