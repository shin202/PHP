<?php

            // Validate
            
            $nameErr = $genderErr = $emailErr = $passwordErr = $re_passwordErr = $commentErr = '';
            $isError = false;
            $isSubmit = false;

            $name = isset($_POST['name']) ? $_POST['name'] : '';
            $gender = isset($_POST['gender']) ? $_POST['gender'] : '';
            $email = isset($_POST['email']) ? $_POST['email'] : '';
            $password = isset($_POST['password']) ? $_POST['password'] : '';
            $re_password = isset($_POST['re_password']) ? $_POST['re_password'] : '';
            $comment = isset($_POST['comment']) ? $_POST['comment'] : '';
            if($name !== '' && $gender !== '' && $email !== '' && $password !== '' && $re_password !== '' && $comment !== '')
            {
                $isSubmit = true;
            }

            // RegEx
            $regName = '/^([A-ZAÀÁẢÃẠĂẰẲẴẶÂẦẤẨẪẬĐEÈÉẺẼẸÊỀẾỂỄỆIÌÍỈĨỊOÒÓỎÕỌÔỒỐỔỖỘƠỜỚỞỠỢUÙÚỦŨỤƯỪỨỬỮỰYỲÝỶỸỴ]|[a-zaàáảãạăằẳẵặâầấẩẫậđeèéẻẽẹêềếểễệiìíỉĩịoòóỏõọôồốổỗộơờớởỡợuùúủũụưừứửữựyỳýỷỹỵ]{1,}\s?)+$/';
            $regMail = '/^[\w\-\_\.]+@(?:[\w-]+\.)+[\w-]{2,}$/';
            $regPass = '/^(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*[!@#$%^&*.,])[A-Za-z0-9!@#$%^&*.,]{8,10}$/';
            $regCmt = '/^([A-Z0-9AÀÁẢÃẠĂẰẲẴẶÂẦẤẨẪẬĐEÈÉẺẼẸÊỀẾỂỄỆIÌÍỈĨỊOÒÓỎÕỌÔỒỐỔỖỘƠỜỚỞỠỢUÙÚỦŨỤƯỪỨỬỮỰYỲÝỶỸỴ]|[a-zaàáảãạăắằẳẵặâầấẩẫậđeèéẻẽẹêềếểễệiìíỉĩịoòóỏõọôồốổỗộơờớởỡợuùúủũụưừứửữựyỳýỷỹỵ]{1,}|\,|\.?\s?)+$/';

            if($_SERVER["REQUEST_METHOD"] == "POST")
            {
                // Name
                if(empty($_POST['name']))
                {
                    $nameErr = 'Nhập tên đii :<';
                    $isError = true;
                }
                else
                {
                    $name = test_input($_POST['name']);
                    if(!preg_match($regName, $name))
                    {
                        $nameErr = 'Tên không hợp lệ r :<';
                        $isError = true;
                    }
                }

                // Gender
                if(empty($_POST['gender']))
                {
                    $genderErr = 'Chọn giới tính đii :<';
                    $isError = true;
                }
                else
                {
                    $gender = test_input($_POST['gender']);
                }

                // Email
                if(empty($_POST['email']))
                {
                    $emailErr = 'Nhập email đii :<';
                    $isError = true;
                }
                else
                {
                    $email = test_input($_POST['email']);
                    if(!preg_match($regMail, $email))
                    {
                        $emailErr = 'Email không hợp lệ';
                        $isError = true;
                    }
                }

                // Password
                if(empty($_POST['password']))
                {
                    $passwordErr = 'Nhập mật khẩu đii :<';
                    $isError = true;
                }
                else
                {
                    $password = test_input($_POST['password']);
                    if(!preg_match($regPass, $password))
                    {
                        $passwordErr = 'Mật khẩu phải dài 8-10 ký tự bao gồm chữ hoa, thường số và ký tự đặc biệt';
                        $isError = true;
                    }
                }

                // Re Password
                if(empty($_POST['re_password']))
                {
                    $re_passwordErr = 'Xác nhận mật khẩu đii :<';
                    $isError = true;
                }
                elseif($_POST['re_password'] !== $_POST['password'])
                {
                    $re_passwordErr = 'Mật khẩu không khớp';
                    $isError = true;
                }
                else
                {
                    $re_password = test_input($_POST['re_password']);
                    if(!preg_match($regPass, $re_password))
                    {
                        $isError = true;
                    }
                }

                // Comments
                if(empty($_POST['comment']))
                {
                    $commentErr = 'Nhập gì đó đii :<';
                    $isError = true;
                }
                else
                {
                    $comment = test_input($_POST['comment']);
                    if(!preg_match($regCmt, $comment))
                    {
                        $commentErr = 'Chứa ký tự đặc biệt r :<';
                        $isError = true;
                    }
                }
            }

            if(!$isError && $isSubmit)
            {
                require('../connectdb.php');

                $sql = "INSERT INTO buoi5(username, gender, email, password, re_password, comment)
                VALUES(?, ?, ?, ?, ?, ?)";

                $stmt = $connect -> prepare($sql);
                $stmt -> bind_param("ssssss", $a, $b, $c, $d, $e, $f); 
                
                $a = $name;
                $b = $gender;
                $c = $email;
                $d = $password;
                $e = $re_password;
                $f = $comment;

                $stmt -> execute();

                $stmt -> close();

                mysqli_close($connect);
            }

            // Test input
            function test_input($data)
            {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);

                return $data;
            }
?>