function convertArrayToObject(array, key) {
    const initialValue = {};
    return array.reduce((obj, item) => {
        return {
            ...obj,
            [item[key]]: item,
        };
    }, initialValue);
};

function agreeCheckSignUp(object) {
    if ('agreecheck' in object)
        return true
    return false;
}

function validateEmail(email) {
    const re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}

function validPassword(password, error) {
    if (!password.match(/[a-z]+/)) {
        error.error = 'Please use atleast one lowercase letter in password';
        return false;
    } else if (!password.match(/[A-Z]+/)) {
        error.error = 'Please use atleast one highercase letter in password';
        return false;
    } else if (!password.match(/[0-9]+/)) {
        error.error = 'Please use atleast one number in password';
        return false;
    } else if (!password.match(/[$@#&!]+/)) {
        error.error = 'Please use atleast one character in password';
        return false;
    } else {
        return true;
    }

}

function loginValid(userInfo) {
    var passErr = { error: '' };
    if (userInfo.email == null)
        return "Email/Password is incorrect can't log you in!";
    if (!validateEmail(userInfo.email))
        return "Email/Password is incorrect can't log you in!";
    if (!validPassword(userInfo.password, passErr)) {
        return "Email/Password is incorrect can't log you in!";
    }
    return "";
}

function signUpValid(userInfo) {
    if (userInfo.username == '')
        return "username can't be empty";
    if (userInfo.username.length < 3)
        return "username can't be less than 3 characters";
    if (userInfo.email == '')
        return "email address can't be empty";
    if (!validateEmail(userInfo.email))
        return "email address is not valid email address";
    if (userInfo.password == null)
        return "password can't be empty";
    var passErr = { error: '' };
    if (!validPassword(userInfo.password, passErr)) {
        return passErr.error;
    }
    if (userInfo.password != userInfo.passwordre) {
        return "passwords do not match";
    }
    if (!userInfo.check) {
        return "Please check our user privacy and policies";
    }
    return "";
}

function sendUserLogin(userInfo) {
    $.ajax({
        type: "POST",
        url: "assets/php/login.php",
        data: {
            password: userInfo.password,
            email: userInfo.email,
            submit: true
        },
        success: function(response) {
            console.log(response);
            var resObj = JSON.parse(response);
            if (resObj['success'] == true) {
                $.redirect('./assets/views/success.php', { 'title': "Signed in!", 'message': 'Welcome back! glad to have you here!' });
            } else {
                alert(resObj['error']);
            }
        },
        error: function(response) {
            $.redirect('./assets/views/failed.php', { 'title': "Can't sign you in!", 'message': 'Please try again later if it happens alot contact support team' });
        }
    });
}
/*dont forget to check user existence*/
function sendUserRegister(userInfo) {
    $.ajax({
        type: "POST",
        url: "assets/php/signup.php",
        data: {
            username: userInfo.username,
            password: userInfo.password,
            email: userInfo.email,
            submit: true
        },
        success: function(response) {
            var resObj = JSON.parse(response);

            if (resObj['success'] == false) {
                $.redirect('./assets/views/failed.php', { 'title': "Can't sign you up!", 'message': 'Please try again later if it happens alot contact support team' });
            } else {
                $.redirect('./assets/views/success.php', { 'title': "Signed up!", 'message': 'Thanks for joining to our team!' });
            }

        },
        error: function(response) {
            $.redirect('./assets/views/failed.php', { 'title': "Can't sign you up!", 'message': 'Please try again later if it happens alot contact support team' });
        }
    });
}
$("#signup-form").submit(function(event) {
    event.preventDefault();
    let formInfo = $(this).serializeArray();
    let formObj = convertArrayToObject(formInfo, 'name');

    let userInfo = {
        username: formObj.username.value,
        email: formObj.email.value,
        password: formObj.password.value,
        passwordre: formObj.confirmpassword.value,
        check: agreeCheckSignUp(formObj)
    };
    if (signUpValid(userInfo) == "") {
        sendUserRegister(userInfo);
    } else {
        alert(signUpValid(userInfo));
    }
});
$("#login-form").submit(function(event) {
    event.preventDefault();
    let formInfo = $(this).serializeArray();
    let formObj = convertArrayToObject(formInfo, 'name');
    let userInfo = {
        email: formObj.email.value,
        password: formObj.password.value
    };
    if (loginValid(userInfo) == "") {
        sendUserLogin(userInfo);
    } else {
        alert(loginValid(userInfo));
    }
});
$("#sign-out-a").click(function(event) {
    event.preventDefault();
    console.log("sign");
    $.redirect('./assets/views/success.php', { 'title': "Signed out!", 'message': 'Cya! hope to see you again!', 'logout': 'true' });
})