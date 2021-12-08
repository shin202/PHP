<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Fuzzy+Bubbles&family=Lato:wght@300&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
        <link rel="stylesheet" href="style.css">
        <title>Trang chủ</title>
    </head>
    <body>
        <?php 
            require('connectdb.php');
            require('encode.php');

            $page = 1;
            if(isset($_GET['page']))
            {
                $page = $_GET['page'];
            }
            $search = '';

            if(isset($_GET['search']))
            {
                $search = $_GET['search'];
            }

             // Pagination
            $sql_members = "SELECT count(*) FROM buoi5
            WHERE username like '%$search%'";
            $array_members = mysqli_query($connect, $sql_members);
            $result_of_members = mysqli_fetch_array($array_members);
            $number_of_members = $result_of_members['count(*)'];
            
            $members_per_page = 3;
            $number_of_page = ceil($number_of_members/$members_per_page);
            $skip = $members_per_page * ($page - 1);

            // Search
            $sql = "SELECT * FROM buoi5 WHERE username like '%$search%'
            limit $members_per_page offset $skip";

            $result = mysqli_query($connect, $sql);

        ?>
        <div class="container">
            <header>
                <div class="nav_bar">
                    <ul>
                        <li>
                            <a href="index.php">Home</a>
                        </li>
                        <li style="background: none;">
                            <a href="./register/index.php">Register</a>
                        </li>
                        <li>
                            <i class="fa fa-magnifying-glass"></i>
                            <form>
                                <input type="search" name="search" id="search" placeholder="Nhập tên cần tìm" value="<?php echo $search?>">
                            </form>
                        </li>
                    </ul>
                </div>
            </header>
            <h1 id="heading_title">Câu lạc bộ lập trình</h1>
            <span id="text_content"></span>
            <h1 id="title">Danh sách thành viên</h1>
            <div class="main">
                <?php foreach ($result as $members){ ?>
                <div class="card">
                    <div class="box">
                        <div class="content">
                            <h2><?php echo $members['username']?></h2>
                            <p><?php echo $members['comment']?></p>
                            <a href="./infor/index.php?id=<?php echo encode_id($members['id'])?>">Chi tiết</a>
                        </div>
                    </div>
                </div>
                <?php  } ?>
            </div>

            <div class="pagination">
                <?php for($i = 1; $i <= $number_of_page; $i++) {?>
                    <a href="?page=<?php echo $i?>&search=<?php echo $search?>" class="<?php if($i == $page) echo 'active';?>">
                        <?php echo $i?>
                    </a>
                <?php } ?>
            </div>
            <?php mysqli_close($connect)?>
        </div>
        <script>

            function content()
            {
                let text = document.getElementById('text_content');
                typing(`Hãy đăng ký tham gia với chúng mình nhé! <span>&#128151;</span> <span>&#128151;</span> <span>&#128151;</span>`, 150, text);
            }

            function typing(text, speed, element)
            {
                let txt = '';
                let chars = text.split('');
                chars.forEach((char, index) => {
                    setTimeout(() => {
                        txt += char;
                        element.innerHTML = txt;
                    }, speed * index);
                });
            }

            window.onload = function () {
                setTimeout(content, 1000);
            }
        </script>
    </body>
</html>