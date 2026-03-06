window.onload = function () {
    document.registerform.username.focus();   
    document.registerform.onsubmit = function () {
        return username_validation() && 
               password_validation() && 
               fullname_validation() && 
               nic_validation() && 
               email_validation();
    };
};

function username_validation() {
    let username = document.registerform.username;
    let error = document.getElementById('usernameerror');
    let pattern = /^[a-zA-Z0-9_]{3,20}$/;

    if (username.value.trim() === "") {
        error.innerText = "*Username is required";
        error.style.color = 'red';
        return false;
    }
    if (!username.value.match(pattern)) {
        error.innerText = "3-20 chars (letters, numbers, underscore)";
        error.style.color = 'red';
        return false;
    }
    error.innerText = "✓ Valid Username";
    error.style.color = 'green';
    return true;
}

function password_validation() {
    let password = document.registerform.password;
    let error = document.getElementById('passworderror');
    // Pattern: Min 8 chars, 1 Upper, 1 Lower, 1 Number, 1 Special
    let pattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;

    if (password.value === "") {
        error.innerText = "*Password is required";
        error.style.color = 'red';
        return false;
    }
    if (!password.value.match(pattern)) {
        error.innerText = "Need 8+ chars (A, a, 1, @)";
        error.style.color = 'red';
        return false;
    }
    error.innerText = "✓ Secure Password";
    error.style.color = 'green';
    return true;
}

function fullname_validation() {
    let fullname = document.registerform.fullname;
    let error = document.getElementById('fullnameerror');
    
    if (fullname.value.trim().length < 5) {
        error.innerText = "*Enter your full name";
        error.style.color = 'red';
        return false;
    }
    error.innerText = "✓ Valid Name";
    error.style.color = 'green';
    return true;
}

function nic_validation() {
    let nic = document.registerform.nic;
    let error = document.getElementById('nicerror');
    let pattern = /^([0-9]{9}[vVxX]|[0-9]{12})$/;

    if (!nic.value.match(pattern)) {
        error.innerText = "*Invalid NIC (e.g. 123456789V)";
        error.style.color = 'red';
        return false;
    }
    error.innerText = "✓ Valid NIC";
    error.style.color = 'green';
    return true;
}

function email_validation() {
    let email = document.registerform.email;
    let error = document.getElementById('emailerror');
    let pattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    if (!email.value.match(pattern)) {
        error.innerText = "*Enter a valid email";
        error.style.color = 'red';
        return false;
    }
    error.innerText = "✓ Valid Email";
    error.style.color = 'green';
    return true;
}