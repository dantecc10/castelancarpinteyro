function checkFields() {
    if (((document.getElementById('emailInput').textContent) !== '') && ((document.getElementById('passwordInput').textContent) !== '')) {
        document.getElementById('loginForm').submit();
    }
}