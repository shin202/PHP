<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Mono:wght@500&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
        <title>Thông tin thành viên</title>
    </head>
    <style>
        *
        {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        html, body
        {
            width: 100%;
            height: auto;
        }
        body
        {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: linear-gradient(135deg, #fdfcfb 0%, #e2d1c3 100%);
            font-family: 'Noto Sans Mono', monospace;
            user-select: none;
        }
        .container
        {
            position: relative;
            width: 1500px;
            height: auto;
            padding: 10px;
            background: linear-gradient(to top, #fff1eb 0%, #ace0f9 100%);
            display: flex;
            justify-content: center;
            align-items: center;
            flex-wrap: wrap;
            border-radius: 16px;
            box-shadow: 5px 5px 15px rgba(0, 0, 0, 0.2);
            border-right: 1px solid rgba(255, 255, 255, 0.5);
            border-bottom: 1px solid rgba(255, 255, 255, 0.5);
        }
        .container .user_avatar
        {
            position: relative;
            top: 0;
            left: -20rem;
            width: 300px;
            height: 300px;
            margin: 20px;
            background: #d9afd9;
            box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.2);
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 50%;
            cursor: pointer;
        }
        .container .user_avatar img
        {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .container .userdata
        {
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            flex-wrap: wrap;
            gap: 20px;
            color: #8585ad;
        }
        .container .userdata .username,
        .container .userdata .age,
        .container .userdata .gender,
        .container .userdata .infor,
        .container .userdata .facebook
        {
            position: relative;
            background-image: linear-gradient(120deg, #f6d365 0%, #fda085 100%);
            background-repeat: no-repeat;
            background-size: 100% 3px;
            background-position: bottom left;
        }
        .container .userdata .infor
        {
            width: 400px;
        }
    </style>
    <body>
        <?php
            $id = $_GET['id'];
            $connect = mysqli_connect('localhost', 'root', '100/100/100', 'register');
            mysqli_set_charset($connect, 'utf8');

            $sql = "select * from login where id = $id";
            $result = mysqli_query($connect, $sql);

            $information = mysqli_fetch_array($result);
        ?>
        <div class="container">
            <div class="user_avatar">
                <a href="<?php echo $information['facebook_url']?>">
                    <img src="<?php echo $information['avatar']?>">
                </a>
            </div>
            <div class="userdata">
                <div class="username">Tên: <?php echo $information['username']?></div>
                <div class="age">Tuổi: <?php echo $information['age']?></div>
                <div class="gender">Giới tính: <?php echo $information['gender']?></div>
                <div class="infor">Thông tin: <?php echo $information['information']?></div>
                <div class="facebook">Facebook: <?php echo $information['facebook_url']?></div>
            </div>
        </div>
        <?php mysqli_close($connect)?>
    </body>
</html>