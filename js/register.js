document.getElementById('registerForm').addEventListener('submit', function(event) {
    const firstName = document.getElementById('firstName').value;
    const lastName = document.getElementById('lastName').value;
    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;
    const confirmPassword = document.getElementById('confirmPassword').value;

    const namePattern = /^[A-Za-z\s'-]+$/;
    const emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
    //const passwordPattern = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/;
    const passwordPattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;

    let valid = true;

    if (!namePattern.test(firstName)) {
        alert('Invalid first name');
        valid = false;
    }
    if (!namePattern.test(lastName)) {
        alert('Invalid last name');
        valid = false;
    }
    if (!emailPattern.test(email)) {
        alert('Invalid email address');
        valid = false;
    }
    if (!passwordPattern.test(password)) {
        alert('Password must be at least 8 characters long and contain both letters and numbers');
        valid = false;
    }
    if (password !== confirmPassword) {
        const confirmPasswordField = document.getElementById('confirmPassword');
        confirmPasswordField.classList.add('is-invalid');
        event.preventDefault();
        valid = false;
    } else {
        document.getElementById('confirmPassword').classList.remove('is-invalid');
    }

    if (!valid) {
        event.preventDefault();
    }
});
