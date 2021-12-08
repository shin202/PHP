<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Fuzzy+Bubbles&family=Lato:wght@300&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
        <link rel="stylesheet" href="../style.css">
        <title>Thông tin thành viên</title>
    </head>
    <style>
        div.infor .box div.change
        {
            position: relative;
            top: -45%;
            left: 50%;
        }
        div.infor .box div.change span
        {
            color: #ff512f;
            font-size: 20px;
            font-weight: 600;
            opacity: 0.5;
            transition: all 0.5s ease;
        }
        div.infor .box div.change span a
        {
            text-decoration: none;
            color: #ff512f;
        }
        div.infor .box div.change span:hover
        {
            opacity: 1;
        }
        div.infor .box div.comments span
        {
            max-width: 700px;
        }
    </style>
    <body>
        <?php
            require('../connectdb.php');
            require('../encode.php');
            require('../get.php');
        ?>

        <div class="container">
            <header>
                    <div class="nav_bar">
                        <ul>
                            <li>
                                <a href="../index.php">Home</a>
                            </li>
                            <li style="background: none;">
                                <a href="../register/index.php">Register</a>
                            </li>
                        </ul>
                    </div>
            </header>
            <div class="infor">
                <div class="box">
                        <div class="name">
                            <h1>Name:</h1>
                            <span><?php echo $information['username']?></span>
                        </div>
                        <div class="gender">
                            <h1>Gender:</h1>
                            <span><?php echo $information['gender']?></span>
                        </div>
                        <div class="comments">
                            <h1>Comments:</h1>
                            <span><?php echo $information['comment']?></span>
                        </div>
                        <div class="change">
                            <span class="update">
                                <a href="../update/index.php?id=<?php echo encode_id($information['id'])?>">>>Sửa thông tin<<</a>
                            </span>
                            <span class="remove">
                                <a href="../delete/index.php?id=<?php echo encode_id($information['id'])?>">>>Xóa thông tin<<</a>
                            </span>
                        </div>
                </div>
            </div>
        </div>
        <?php mysqli_close($connect)?>
    </body>
</html>