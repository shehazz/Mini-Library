window.onload = function () {
    document.loginform.username.focus();   
    document.loginform.onsubmit = function () {
        return username_validation() && password_validation();
    };
};

function username_validation() {
    let username = document.loginform.username;
    let error = document.getElementById('usernameerror');
    error.innerText = "";
    let pattern = /^[a-zA-Z0-9_]{3,20}$/;

    if (username.value === "") {
        error.innerText = "*Username is required";
        error.style.color = 'red';
        return false;
    }

    if (!username.value.match(pattern)) {
        error.innerText = "Username: 3-20 chars (letters, numbers, underscore)";
        error.style.color = 'red';
        username.focus();
        return false;
    }
    error.innerText = "✓ Valid Username";
    error.style.color = 'green';
    return true;
}

function password_validation() {
    let password = document.loginform.password;
    let error = document.getElementById('passworderror');
    error.innerText = "";
    let pattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;

    if (password.value === "") {
        error.innerText = "*Password is required";
        error.style.color = 'red';
        return false;
    }

    if (!password.value.match(pattern)) {
        error.innerText = "Min 8 chars: uppercase, lowercase, number, special char (@$!%*?&)";
        error.style.color = 'red';
        password.focus();
        return false;
    }
    error.innerText = "✓ Valid Password";
    error.style.color = 'green';
    return true;
}