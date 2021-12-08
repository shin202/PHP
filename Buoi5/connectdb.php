<?php

    $hostname = 'localhost';
    $username = 'root';
    $hostpass = '100/100/100';
    $database = 'register';

    $connect = mysqli_connect($hostname, $username, $hostpass, $database);
    mysqli_set_charset($connect, 'utf8');
    if($connect -> connect_error)
    {
        die('Connection failed: '. $connect -> connect_error);
    }
?>