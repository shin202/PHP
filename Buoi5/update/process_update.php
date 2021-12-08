<?php
    require_once('../connectdb.php');
    require_once('../encode.php');

    $isError = false;

    // Regex
    $regName = '/^([A-ZAÀÁẢÃẠĂẰẲẴẶÂẦẤẨẪẬĐEÈÉẺẼẸÊỀẾỂỄỆIÌÍỈĨỊOÒÓỎÕỌÔỒỐỔỖỘƠỜỚỞỠỢUÙÚỦŨỤƯỪỨỬỮỰYỲÝỶỸỴ]|[a-zaàáảãạăằẳẵặâầấẩẫậđeèéẻẽẹêềếểễệiìíỉĩịoòóỏõọôồốổỗộơờớởỡợuùúủũụưừứửữựyỳýỷỹỵ]{1,}\s?)+$/';
    $regCmt = '/^([A-Z0-9AÀÁẢÃẠĂẰẲẴẶÂẦẤẨẪẬĐEÈÉẺẼẸÊỀẾỂỄỆIÌÍỈĨỊOÒÓỎÕỌÔỒỐỔỖỘƠỜỚỞỠỢUÙÚỦŨỤƯỪỨỬỮỰYỲÝỶỸỴ]|[a-zaàáảãạăắằẳẵặâầấẩẫậđeèéẻẽẹêềếểễệiìíỉĩịoòóỏõọôồốổỗộơờớởỡợuùúủũụưừứửữựyỳýỷỹỵ]{1,}|\,|\.?\s?)+$/';


    $id_update = $_POST['id'];
    $decode_id_update = decode_id($id_update);
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $comment = $_POST['comment'];
    $password = $_POST['password'];

    // Select ID
    $select = "SELECT password FROM buoi5 WHERE id =?";
    $stmt_select = $connect -> prepare($select);
    $stmt_select -> bind_param("i", $decode_id_update);
    $stmt_select -> execute();
    $result_select = $stmt_select -> get_result();

    $password_infor = $result_select -> fetch_array();
    $stmt_select -> close();

    if(empty($name))
    {
        echo '<h1 style="color #ff512f;">Nhập tên đii :<</h1>';
        $isError = true;
    }
    else
    {
        $name = test_input($name);
        if(!preg_match($regName, $name))
        {
            echo '<h1 style="color #ff512f;">Tên không hợp lệ :<</h1>';
            $isError = true;
        }
    }

    if(empty($password))
    {
        echo '<h1 style="color: #ff512f;">Nhập mật khẩu đii :<</h1>';
        $isError = true;
    }
    if($password !== $password_infor['password'])
    {
        echo '<h1 style="color: #ff512f;">Mật khẩu không đúng r :<</h1>';
        $isError = true;
    }

    if(empty($gender))
    {
        echo '<h1 style="color: #ff512f;">Chọn giới tính đii :<</h1>';
        $isError = true;
    }
    else
    {
        $gender = test_input($gender);
    }

    if(empty($comment))
    {
        echo '<h1 style="color: #ff512f;">Cho mình biết ý kiến của bạn nhé!</h1>';
        $isError = true;
    }
    else 
    {
        $comment = test_input($comment);
        if(!preg_match($regCmt, $comment))
        {
            echo '<h1 style="color: #ff512f;">Comment chứa ký tự đặc biệt r :<</h1>';
            $isError = true;
        }
    }
    


    if(!$isError)
    {
        $sql_update = "UPDATE buoi5 SET
        username = '$name',
        gender = '$gender',
        comment = '$comment'
        WHERE id = ?";

        $stmt_update = $connect -> prepare($sql_update);
        $stmt_update -> bind_param("i", $decode_id_update);
        $stmt_update -> execute();
        $stmt_update -> close();

        echo '<h1 style="color: #1ce480;">Cập nhật thành công, về trang chủ để xem kết quả nhé :3</h1>';
        echo '<a href="../index.php" style="text-decoration: none; color: #ffffff; width: 150px; height: 50px; background: #ff512f; padding: 10px;">Về trang chủ</a>';
        mysqli_close($connect);
        
    }

    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);

        return $data;
    }
?>
