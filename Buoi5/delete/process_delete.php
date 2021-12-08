<?php 
        require_once('../connectdb.php');
        require_once('../encode.php');
        
        $id_delete = $_POST['id'];
        $decode_id_delete = decode_id($id_delete);

        $sql = "SELECT password FROM buoi5 WHERE id = ?";
        $stmt = $connect -> prepare($sql);
        $stmt -> bind_param("i", $decode_id_delete);
        $stmt -> execute();
        $result = $stmt -> get_result();
        $password_infor = $result -> fetch_array();

        $stmt -> close();

        $password = $_POST['password'];
        if(empty($password))
        {
            echo '<h1 style="color: #ff512f;">Nhập mật khẩu đii :<</h1>';
        }
        elseif($password !== $password_infor['password'])
        {
            echo '<h1 style="color: #ff512f;">Mật khẩu không đúng r :<</h1>';
        }
        else
        {
            $delete = "DELETE from buoi5 WHERE id = ?";
            $stmt_delete = $connect -> prepare($delete);
            $stmt_delete -> bind_param("i", $decode_id_delete);
            $stmt_delete -> execute();
            $stmt_delete -> close();
            mysqli_close($connect);

            echo '<h1 style="color: #1ce480;">Xóa thông tin thành công, về trang chủ để xem kết quả nhé :3</h1>';
            echo '<a href="../index.php" style="text-decoration: none; color: #ffffff; width: 150px; height: 50px; background: #ff512f; padding: 10px;">Về trang chủ</a>';
        }
    ?>