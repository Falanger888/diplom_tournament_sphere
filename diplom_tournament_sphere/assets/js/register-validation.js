document.addEventListener('DOMContentLoaded', () => {
    const lettersRegex  = /^[A-Za-zА-Яа-я]+$/;
    const emailRegex    = /^[a-zA-Z0-9._-]+@(mail|gmail|yandex)\.(com|ru)$/;
    const passwordRegex = /^(?=.*\d)(?=.*[a-zа-я])(?=.*[A-ZА-Я])[0-9a-zA-Zа-яА-Я]{8,}$/;

    const loginInput           = document.getElementById('login');
    const loginError           = document.getElementById('login-error');
    const emailInput           = document.getElementById('email');
    const emailError           = document.getElementById('error-msg');
    const nickInput            = document.getElementById('nickName');
    const nickError            = document.getElementById('nickError');
    const passwordInput        = document.getElementById('password');
    const passwordError        = document.getElementById('passwordError');
    const confirmPasswordInput = document.getElementById('confirmPassword');
    const confirmPasswordError = document.getElementById('confirmPasswordError');

    const validateLogin = () => {
        const v = loginInput.value;
        const ok = v.length >= 3 && lettersRegex.test(v);
        loginError.textContent = ok ? '' : 'Логин должен состоять минимум из 3 букв';
        return ok;
    };
    const validateEmail = () => {
        const ok = emailRegex.test(emailInput.value);
        emailError.style.display = ok ? 'none' : 'block';
        return ok;
    };
    const validateNick = () => {
        const v = nickInput.value;
        const ok = v.length >= 3 && lettersRegex.test(v);
        nickError.textContent = ok ? '' : 'Никнейм должен состоять минимум из 3 букв';
        return ok;
    };
    const validatePassword = () => {
        const ok = passwordRegex.test(passwordInput.value);
        passwordError.textContent = ok ? '' : 'Пароль: минимум 8 символов, цифра, строчная и заглавная буква';
        return ok;
    };
    const validateConfirm = () => {
        const ok = passwordInput.value === confirmPasswordInput.value;
        confirmPasswordError.textContent = ok ? '' : 'Пароли не совпадают';
        return ok;
    };

    loginInput?.addEventListener('input', validateLogin);
    emailInput?.addEventListener('input', validateEmail);
    nickInput?.addEventListener('input', validateNick);
    passwordInput?.addEventListener('input', validatePassword);
    confirmPasswordInput?.addEventListener('input', validateConfirm);

    document.getElementById('registration-form')?.addEventListener('submit', (e) => {
        if (![validateLogin(), validateEmail(), validateNick(), validatePassword(), validateConfirm()].every(Boolean)) {
            e.preventDefault();
        }
    });
});