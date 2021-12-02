<?php
    $username = $_POST['username'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $information = $_POST['information'];
    $facebook_url = $_POST['facebook_url'];
    $avatar = $_POST['user_avatar'];

    $connect = mysqli_connect('localhost', 'root', '100/100/100', 'register');
    mysqli_set_charset($connect, 'utf8');

    $sql = "insert into login(username, age, gender, information, facebook_url, avatar)
    values('$username', '$age', '$gender', '$information','$facebook_url', '$avatar')";

    mysqli_query($connect, $sql);

    $error = mysqli_error($connect);
    echo $error;
    header('Location: index.php');

    mysqli_close($connect);