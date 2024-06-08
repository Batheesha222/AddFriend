<?php
    $conn = mysqli_connect("localhost","root","","seng_21253");
    
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit();
    }
    
?>