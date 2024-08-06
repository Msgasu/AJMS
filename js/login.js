document.getElementById('loginForm').addEventListener('submit', function(event) {
    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;

    const emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
    //const passwordPattern = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/;
    const passwordPattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;

    let valid = true;

    if (!emailPattern.test(email)) {
        alert('Invalid email address');
        valid = false;
    }

    if (!passwordPattern.test(password)) {
        alert('Password must be at least 8 characters long and contain both letters and numbers');
        valid = false;
    }

    if (!valid) {
        event.preventDefault();
    }
});
