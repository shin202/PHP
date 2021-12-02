<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Mono:wght@500&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
        <title>Register</title>
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
        /* Scroll bar */
        html
        {
            scrollbar-width: normal;
            scrollbar-color: #ace09f #fff1eb;
        }
        html::-webkit-scrollbar
        {
            width: 2vw;
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
            min-height: 100vh;
            background: linear-gradient(135deg, #fdfcfb 0%, #e2d1c3 100%);
            font-family: 'Noto Sans Mono', monospace;
            user-select: none;
        }
        /* Container */
        .container
        {
            position: relative;
            width: 700px;
            height: auto;
            background: linear-gradient(to top, #fff1eb 0%, #ace0f9 100%);
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 16px;
            box-shadow: 5px 5px 15px rgba(0, 0, 0, 0.2);
            border-right: 1px solid rgba(255, 255, 255, 0.5);
            border-bottom: 1px solid rgba(255, 255, 255, 0.5);
        }
        /* Form */
        form
        {
            position: relative;
            padding: 10px;
            right: -100px;
        }
        form div
        {
            position: relative;
            padding: 10px;
        }
        div.information
        {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        /* Choose avatar */
        div.user_avatar
        {
            position: absolute;
            width: 170px;
            height: 170px;
            top: 0;
            left: -250px;
            margin: 20px;
            background: transparent;
            border-radius: 50%;
            cursor: pointer;
        }
        div.user_avatar input[type="radio"]
        {
            position: absolute;
            width: 100%;
            height: 100%;
            left: 0;
            margin-bottom: 10px;
            background: #d9afd9;
            border-radius: 50%;
            outline: none;
            -webkit-appearance: none;
            cursor: pointer;
            z-index: 99;
        }
        div.user_avatar input[type="radio"]:nth-child(1)
        {
            top: 0;
            background-image: url('img/avatar_1.svg');
            background-repeat: no-repeat;
            background-size: cover;
        }
        div.user_avatar input[type="radio"]:nth-child(2)
        {
            top: 200px;
            background-image: url('img/avatar_2.svg');
            background-repeat: no-repeat;
            background-size: cover;
        }
        div.user_avatar input[type="radio"]:last-child
        {
            top: 400px;
            background-image: url('img/avatar_3.svg');
            background-repeat: no-repeat;
            background-size: cover;
        }
        div.user_avatar input[type="radio"]::before
        {
            position: absolute;
            font-family: "Font Awesome 6 Free";
            content: '\f2bd';
            color: #8585ad;
            font-size: 20px;
            width: 100%;
            height: 100%;
        }
        div.user_avatar input[type="radio"]::after
        {
            position: absolute;
            font-family: "Font Awesome 6 Free";
            content: '\f111';
            color: #8585ad;
            font-size: 170px;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
        }
        div.user_avatar input[type="radio"]:checked::before,
        div.user_avatar input[type="radio"]:checked::after
        {
            color: #1ec480;
        }
        /* Username & Age & Facebook*/
        input#username, input#age, .facebook_url input
        {
            width: 100%;
            padding: 5px;
            margin: 10px;
            border: none;
            outline: none;
            background-color: transparent;
            background-image: linear-gradient(to top, #d9afd9 0%, #97d9e1 100%);
            background-size: 50% 3px;
            background-repeat: no-repeat;
            background-position: bottom left;
            transition: all 1s ease;
        }
        input#age
        {
            width: 100px;
        }
        input#username:focus, input#age:focus, .facebook_url input:focus
        {
            background-size: 100% 3px;
        }
        textarea
        {
            position: relative;
            width: 100%;
            height: 300px;
            padding: 10px;
            border: none;
            outline: none;
            border-radius: 10px;
            resize: none;
            background-color: rgba(255, 255, 255, 0.1);
            box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.15);
            border-right: 1px solid rgba(255, 255, 255, 0.5);
            border-bottom: 1px solid rgba(255, 255, 255, 0.5);
        }

        /* Gender */
        div.gender input[type="radio"]
        {
           position: relative;
           width: 15px;
           height: 15px;
           margin-left: 10px;
           outline: none;
           background: transparent;
           cursor: pointer;
           -webkit-appearance: none;
           border-radius: 50%;
        }
        div.gender input[type="radio"]:checked + span
        {
            color: #1ec480;
        }
        div.gender input[type="radio"]::before
        {
            position: absolute;
            font-family: "Font Awesome 6 Free";
            content: '\f111';
            font-size: 20px;
            width: 100%;
            height: 100%;
            color: #8585ad;
            top: -2.4px;
            left: -2.4px;
        }
        div.gender input[type="radio"]:checked::before
        {
            content: "\f058";
            color: #1ec480;
        }
        span
        {
            color: #8585ad;
        }
        /* Button */
        #btn_submit
        {
            position: relative;
            width: 200px;
            height: 50px;
            left: 20%;
            border: none;
            background: linear-gradient(to right, #43e97b 0%, #38f9d7 100%);
            box-shadow: 2px 2px 6px rgba(0, 0, 0, 0.2);
            color: #8585ad;
            text-transform: uppercase;
            font-weight: 600;
            cursor: pointer;
            transition: all 1s ease;
        }
        #btn_submit:hover
        {
            background: transparent;
            color: #1ec480;
        }
        #btn_submit::before, #btn_submit::after
        {
            position: absolute;
            content: '';
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            background-image: linear-gradient(to right, #43e97b 0%, #38f9d7 100%);
            background-repeat: no-repeat;
            background-size: 0% 5px;
            transition: all 0s ease;
        }
        #btn_submit::before
        {
            background-position: bottom left;
        }
        #btn_submit::after
        {
            background-position: top right;
        }
        #btn_submit:hover::before, #btn_submit:hover::after
        {
            background-size: 100% 5px;
            transition: all 1s ease;
        }
    </style>
    <body>
        <div class="container">
            <form method="post" action="process_register.php">
                <div class="user_avatar">
                    <input type="radio" name="user_avatar" id="avatar_1" value="img/avatar_1.svg" checked>
                    <input type="radio" name="user_avatar" id="avatar_2" value="img/avatar_2.svg">
                    <input type="radio" name="user_avatar" id="avatar_3" value="img/avatar_3.svg">
                </div>
                <div class="username">
                    <span>Tên người dùng</span>
                    <input type="text" id="username" name="username" required>
                </div>
                <div class="age">
                    <span>Tuổi</span>
                    <input type="number" id="age" name="age" required>
                </div>
                <div class="gender">
                    <span>Giới tính</span>
                    <input type="radio" name="gender" value="Nam" required>
                    <span>Nam</span>
                    <input type="radio" name="gender" value="Nữ" required>
                    <span>Nữ</span>
                </div>
                <div class="information">
                    <span>Mô tả bản thân</span>
                    <textarea id="information" name="information" maxlength="250" required></textarea>
                </div>
                <div class="facebook_url">
                    <span>Facebook</span>
                    <input type="text" id="facebook_url" name="facebook_url" required>
                </div>
                <div class="btn">
                    <button id="btn_submit">Submit</button>
                </div>
            </form>
        </div>
    </body>
</html>