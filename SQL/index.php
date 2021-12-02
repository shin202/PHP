<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Mono:wght@500&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
        <title>Home</title>
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
        html
        {
            scrollbar-width: normal;
            scrollbar-color: #ace09f #fff1eb;
        }
        html::-webkit-scrollbar
        {
            width: 3vw;
        }
        html::-webkit-scrollbar-thumb
        {
            background-color: #ace0f9;
            border-radius: 16px;
        }
        html::-webkit-scrollbar-track
        {
            background-color: #fff1eb;
        }
        body
        {
            display: flex;
            justify-content: center;
            align-items: center;
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
            gap: 40px;
            border-radius: 16px;
            box-shadow: 5px 5px 15px rgba(0, 0, 0, 0.2);
            border-right: 1px solid rgba(255, 255, 255, 0.5);
            border-bottom: 1px solid rgba(255, 255, 255, 0.5);
        }
        .container .box
        {
            position: relative;
            width: 300px;
            height: 300px;
            margin: 20px;
            background: rgba(0, 0, 0, 0.2);
            box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.2);
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 16px;
            border-right: 1px solid rgba(255, 255, 255, 0.5);
            border-bottom: 1px solid rgba(255, 255, 255, 0.5);
            cursor: pointer;
        }
        .container .box .img
        {
            position: relative;
            width: 200px;
            height: 200px;
            background: #d9afd9;
            border-radius: 50%;
        }
        .container .box .img img
        {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .container .box .username
        {
            position: absolute;
            bottom: 10px;;
        }
        .container .box .infor
        {
            position: absolute;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.2);
            border-radius: 16px;
            backdrop-filter: blur(10px);
            transform: scaleY(0);
            transform-origin: top;
            transition: transform 0s ease;
        }
        .container .box:hover .infor
        {
            transform: scaleY(1);
            transform-origin: bottom;
            transition: transform 1s ease;
        }
        .container .box .infor span
        {
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-wrap: wrap;
            flex-direction: column;
            padding: 10px;
            font-size: 0;
        }
        .container .box:hover .infor span
        {
            font-size : 20px;
        }
        #btn
        {
            position: absolute;
            width: 150px;
            height: 50px;
            top: 4rem;
            left: 0;
            margin: 20px;
            border: 4px solid #1ec480;
            background: transparent;
            font-size: 16px;
            color: rgba(0, 0, 0, 0.5);
            cursor: pointer;
            z-index: 1;
            text-decoration: none;
            text-align: center;
        }
        #btn:hover
        {
            color: #1ec480;
        }
        #btn::before, #btn::after
        {
            position: absolute;
            content: '';
            width: 100%;
            height: 100%;
            left: -4px;
            top: -4px;
            border: 4px solid transparent;
            transform: translate(0);
            transition: all 1s ease;
        }
        #btn::before
        {
            z-index: 2;
        }
        #btn::after
        {
            z-index: -1;
        }
        #btn:hover::before
        {
            border: 4px solid #fc3567;
            transform: translate(10px, 10px);
        }
        #btn:hover::after
        {
            border: 4px solid #4ad1e0;
            transform: translate(-10px, -10px);
        }
    </style>
    <body>
        <?php
            $connect = mysqli_connect('localhost', 'root', '100/100/100', 'register');
            mysqli_set_charset($connect, 'utf8');

            $sql = "select * from login";
            $result = mysqli_query($connect, $sql);
        ?>
        <div class="container">

        <?php foreach ($result as $members){ ?>
            <div class="box">
                <div class="img">
                    <img src="<?php echo $members['avatar']?>">
                </div>
                <div class="username"><?php echo $members['username']?></div>  
                <div class="infor">
                    <span id="name"> Tên: <?php echo $members['username']?></span>
                    <span id="age">Tuổi: <?php echo $members['age']?></span>
                    <span id="gender">Giới tính: <?php echo $members['gender']?></span>
                    <span id="information"><a href="show.php?id=<?php echo $members['id']?>">Chi tiết</a></span>
                </div>
            </div>
        <?php } ?>

            <a id="btn" href="register.php" >Thêm thành viên</a>
        </div>
        <?php mysqli_close($connect)?>
    </body>
</html>