let form = document.getElementById('form');
let name = document.getElementById('name');
let gender = document.getElementsByName('gender');
let email = document.getElementById('email');
let password = document.getElementById('password');
let re_password = document.getElementById('re_password');
let comment = document.getElementById('comment');


form.addEventListener('submit', (e) => {
    e.preventDefault();
    checkInputs();
});

function checkInputs()
{
    let name_value = name.value;
    let email_value = email.value;
    let password_value = password.value;
    let re_password_value = re_password.value;
    let comment_value = comment.value;

    // Name
    if(name_value === '')
    {
        setError(name, 'Nhập tên đii :<');
    }
    else if(name_value.length < 1)
    {
        setError(name, 'Tên quá ngắn');
    }
    else if(!validName(name_value))
    {
        setError(name, 'Tên không hợp lệ');
    }
    else
    {
        setSuccess(name, 'Ổn r đó :3');
    }

    // Gender
    let isChecked = false;
    for(let i = 0; i < gender.length; i++)
    {
        if(gender[i].checked)
        {
            isChecked = true;
        }
    }
    if(!isChecked)
    {
        setError(gender, 'Chọn giới tính đii :<');
    }
    else if(isChecked)
    {
        setSuccess(gender, 'Ổn r đó :3');
    }

    // Email
    if(email_value === '')
    {
        setError(email, 'Nhập email đii :<');
    }
    else if(!validEmail(email_value))
    {
        setError(email, 'Email không hợp lệ');
    }
    else if(validEmail(email_value))
    {
        setSuccess(email, 'Ổn r đó :3');
    }

    // Password
    if(password_value === '')
    {
        setError(password, 'Nhập mật khẩu đii :<');
    }
    else if(!validPass(password_value))
    {
        setError(password, 'Mật khẩu phải dài 8-10 ký tự bao gồm chữ hoa, thường, số và ký tự đặc biệt');
    }
    else if(validPass(password_value))
    {
        setSuccess(password, 'Ổn r đó :3');
    }

    // Re-Password
    if(re_password_value === '')
    {
        setError(re_password, 'Xác nhận mật khẩu đii :<');
    }
    else if(re_password_value !== password_value)
    {
        setError(re_password, 'Mật khẩu không khớp');
    }
    else
    {
        setSuccess(re_password, 'Ổn r đó :3');
    }

    // Comment
    if(comment_value === '')
    {
        setError(comment, 'Điền gì đó đii :<');
    }
    else if(!validCmt(comment_value))
    {
        setError(comment, 'Chứa ký tự đặc biệt r :<');
    }
    else if(validCmt(comment_value))
    {
        setSuccess(comment, 'Ổn r đó :3');
    }

    isSubmit();

}

function isSubmit()
{
    let div_success = document.getElementsByClassName('success');

    for(let i = 0; i < div_success.length; i++)
    {
        if
        (
            div_success[0].classList.contains('success')
            && div_success[1].classList.contains('success')
            && div_success[2].classList.contains('success')
            && div_success[3].classList.contains('success')
            && div_success[4].classList.contains('success')
            && div_success[5].classList.contains('success')
        )
        {
            setTimeout(e => {form.submit();}, 1500);
        }
    }
}

function setError(input, message)
{
    let div = input.parentElement;

    if(input == gender)
    {
        div = input[0].parentElement;
    }

    let small = div.querySelector('small');

    small.innerText = message;
    div.className = 'error';
}

function setSuccess(input, message)
{
    let div = input.parentElement;

    if(input == gender)
    {
        div = input[0].parentElement;
    }

    let small = div.querySelector('small');

    small.innerText = message;
    div.className = 'success';
}

function validName(value)
{
    let regexName = /^([A-ZAÀÁẢÃẠĂẰẲẴẶÂẦẤẨẪẬĐEÈÉẺẼẸÊỀẾỂỄỆIÌÍỈĨỊOÒÓỎÕỌÔỒỐỔỖỘƠỜỚỞỠỢUÙÚỦŨỤƯỪỨỬỮỰYỲÝỶỸỴ]|[a-zaàáảãạăằẳẵặâầấẩẫậđeèéẻẽẹêềếểễệiìíỉĩịoòóỏõọôồốổỗộơờớởỡợuùúủũụưừứửữựyỳýỷỹỵ]{1,}\s?)+$/;

    return regexName.test(value);
}

function validEmail(value)
{
    let regexMail = /^[\w\-\_\.]+@(?:[\w-]+\.)+[\w-]{2,}$/;

    return regexMail.test(value);
}

function validPass(value)
{
    let regexPass = /^(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*[!@#$%^&*.,])[A-Za-z0-9!@#$%^&*.,]{8,10}$/;

    return regexPass.test(value);
}

function validCmt(value)
{
    let regexCmt = /^([A-Z0-9AÀÁẢÃẠĂẰẲẴẶÂẦẤẨẪẬĐEÈÉẺẼẸÊỀẾỂỄỆIÌÍỈĨỊOÒÓỎÕỌÔỒỐỔỖỘƠỜỚỞỠỢUÙÚỦŨỤƯỪỨỬỮỰYỲÝỶỸỴ]|[a-zaàáảãạăắằẳẵặâầấẩẫậđeèéẻẽẹêềếểễệiìíỉĩịoòóỏõọôồốổỗộơờớởỡợuùúủũụưừứửữựyỳýỷỹỵ]{1,}|\,|\.?\s?)+$/;

    return regexCmt.test(value);
}