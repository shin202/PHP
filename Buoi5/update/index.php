<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Fuzzy+Bubbles&family=Lato:wght@300&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
        <link type="text/css" rel="stylesheet" href="../style.css">
        <link rel="stylesheet" href="../register/style.css">
        <title>Cập nhật thông tin</title>
    </head>
    <style>
        .container header ul li:last-child
        {
            min-width: 200px;
        }
    </style>
    <body>

    <?php
        require_once('../connectdb.php');
        require_once('../encode.php');
        
        // Fetch Infor
        require('../get.php');
    ?>

        <div class="container">
            <header>
                <div class="nav_bar">
                    <ul>
                        <li style="background: none;">
                            <a href="../index.php">Home</a>
                        </li>
                        <li style="background: none;">
                            <a href="../register/index.php">Register</a>
                        </li>
                        <li>
                            <a href="">Update</a>
                        </li>
                    </ul>
                </div>
            </header>
            <h1 id="title">Cập nhật thông tin</h1>
            <span id="text_content">*Note: Nhập mật khẩu lúc các bạn đăng ký</span>
            <div class="form_action">
                <form method="POST" action="process_update.php" id="form">
                    <div>
                        <span>Tên bạn là gì ?</span>
                        <input type="text" name="name" id="name" value="<?php echo $information['username']?>">
                        <i class="fa fa-check"></i>
                        <i class="fa fa-exclamation"></i>
                        <small></small>
                    </div>
                    <div>
                        <span>Bạn là nam hay nữ ?</span>
                        <input type="radio" name="gender" <?php if(isset($information['gender']) && $information['gender'] == 'Nam') echo 'checked';?> value="Nam">
                        <span>Nam</span>
                        <input type="radio" name="gender" <?php if(isset($information['gender']) && $information['gender'] == 'Nữ') echo 'checked';?> value="Nữ">
                        <span>Nữ</span>
                        <i class="fa fa-check"></i>
                        <i class="fa fa-exclamation"></i>
                        <small></small>
                    </div>
                    <div>
                        <span>Mật khẩu:</span>
                        <input type="password" name="password" id="password">
                        <i class="fa fa-check"></i>
                        <i class="fa fa-exclamation"></i>
                        <small></small>
                    </div>
                    <div>
                        <span>Comment:</span>
                        <textarea name="comment" rows="20" id="comment"><?php echo $information['comment']?></textarea>
                        <i class="fa fa-check"></i>
                        <i class="fa fa-exclamation"></i>
                        <small></small>
                    </div>
                    <div>
                        <input type="hidden" name="id" value="<?php echo $id?>">
                    </div>
                    <div>
                        <button type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>