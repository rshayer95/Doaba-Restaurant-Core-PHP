<?php 
    try{
        
        $conn = new mysqli("localhost","root","root","appdb");
        if($conn -> connect_error){
            die("There is some problem in connecting to the server");
            exit();
        }
    }
    catch(Exception $e){
        die("There is some problem in connecting to the server");
        exit();
    }
?>