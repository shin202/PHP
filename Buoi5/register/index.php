<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Fuzzy+Bubbles&family=Lato:wght@300&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
        <link type="text/css" rel="stylesheet" href="..\style.css">
        <link type="text/css" rel="stylesheet" href="style.css">
        <title>Đăng ký</title>
    </head>
    
    <body>
       <?php require('process.php')?>
        <div class="container">
            <header>
                <div class="nav_bar">
                    <ul>
                        <li style="background: none;">
                            <a href="../index.php">Home</a>
                        </li>
                        <li>
                            <a href="index.php">Register</a>
                        </li>
                    </ul>
                </div>
            </header>
            <h1 id="title">Đăng ký tham gia</h1>
            <span id="text_content">Các bạn nhớ điền đầy đủ thông tin nhé :3</span>
            <div class="form_action">
                <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" id="form"> 
                    <div>
                        <span>Tên bạn là gì ?</span>
                        <input type="text" name="name" value="<?php echo $name?>" id="name">
                        <i class="fa fa-check"></i>
                        <i class="fa fa-exclamation"></i>
                        <small><?php echo $nameErr?></small>
                    </div>
                    <div>
                        <span>Bạn là nam hay nữ ?</span>
                        <input type="radio" name="gender" <?php if(isset($gender) && $gender == 'Nam') echo 'checked';?> value="Nam">
                        <span>Nam</span>
                        <input type="radio" name="gender" <?php if(isset($gender) && $gender == 'Nữ') echo 'checked';?> value="Nữ">
                        <span>Nữ</span>
                        <i class="fa fa-check"></i>
                        <i class="fa fa-exclamation"></i>
                        <small><?php echo $genderErr?></small>
                    </div>
                    <div>
                        <span>Email:</span>
                        <input type="email" name="email" value="<?php echo $email?>" id="email">
                        <i class="fa fa-check"></i>
                        <i class="fa fa-exclamation"></i>
                        <small><?php echo $emailErr?></small>
                    </div>
                    <div>
                        <span>Mật khẩu:</span>
                        <input type="password" name="password" value="<?php echo $password?>" id="password">
                        <i class="fa fa-check"></i>
                        <i class="fa fa-exclamation"></i>
                        <small><?php echo $passwordErr?></small>
                    </div>
                    <div>
                        <span>Xác nhận mật khẩu:</span>
                        <input type="password" name="re_password" value="<?php echo $re_password?>" id="re_password">
                        <i class="fa fa-check"></i>
                        <i class="fa fa-exclamation"></i>
                        <small><?php echo $re_passwordErr?></small>
                    </div>
                    <div>
                        <span>Comment:</span>
                        <textarea name="comment" rows="20" id="comment" placeholder="Bạn tham gia vì lý do gì?"><?php echo $comment?></textarea>
                        <i class="fa fa-check"></i>
                        <i class="fa fa-exclamation"></i>
                        <small><?php echo $commentErr?></small>
                    </div>
                    <div>
                        <button type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
        <script src="script.js"></script>
    </body>
</html>