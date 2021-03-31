const signUpAndUserBtn = $('#displayBtnRightUp');

auth.onAuthStateChanged(user => {
    console.log(user);
    let html = '';
    if (!user) {
        html = `
            <a href="#" class="sign-in" data-toggle="modal" data-target="#login">
            <i class="fas fa-user"></i> Sign In
            </a>
        `;

        $('#displayBtnRightUp').append(html);
        html = `<a href="" class="mybtn1" data-toggle="modal" data-target="#signin"> Join</a>`;
        $('#main_menu').append(html);
    } else {
        html = `
        <a href="#" class="sign-in" data-toggle="modal" data-target="#userInfo">
                                            
        </a>
        <div class="btn-group">
            <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-user"></i> ` + user.displayName + `
            </button>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="#">Profile</a>
                <a class="dropdown-item" href="#">Settings</a>
                <a class="dropdown-item" href="#">Support</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" id="sign-out-a" href="#">Sign out!</a>
            </div>
        </div>
        `;
        $('#displayBtnRightUp').append(html);
        html = `<a href="" class="mybtn1"> Profile</a>`;
        $('#main_menu').append(html);
        $("#sign-out-a").click(function(event) {
            event.preventDefault();
            console.log("sign");
            auth.signOut().then(() => {
                $.redirect('./assets/views/success.html', { 'title': "Signed out!", 'message': 'Cya! hope to see you again!', 'logout': 'true' });
            });
        })
    }
});

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
    if (password.length < 6) {
        error.error = 'Please make your password at least 6 characters';
        return false;
    }
    if (!password.match(/[a-z]+/) && !password.match(/[A-Z]+/)) {
        error.error = 'Please use atleast one letter in password';
        return false;
    } else if (!password.match(/[0-9]+/)) {
        error.error = 'Please use atleast one number in password';
        return false;
    } else {
        return true;
    }

}

function loginValid(userInfo) {
    var passErr = { error: '' };
    if (userInfo.email == null)
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
            console.log(response);
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
        //sendUserRegister(userInfo);
        auth.createUserWithEmailAndPassword(userInfo.email, userInfo.password).then(res => {
            auth.currentUser.updateProfile({
                displayName: userInfo.username
            }).then(res => {
                $.redirect('./assets/views/success.html', { 'title': "Signed up!", 'message': 'Thanks for joining to our team!' });
            }, err => {
                alert(err.message);
            })

        }).catch(err => {
            alert(err.message);
        });
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
        auth.signInWithEmailAndPassword(userInfo.email, userInfo.password).then(res => {
            $.redirect('./assets/views/success.html', { 'title': "Signed in!", 'message': 'Welcome back! glad to have you here!' });
        }).catch(err => {
            alert(err.message);
        });
    } else {
        alert(loginValid(userInfo));
    }
});