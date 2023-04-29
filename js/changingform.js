// Получаем ссылку и формы
const switchFormLink = document.getElementById('switch-form-link');
const registrationForm = document.getElementById('registration-form');
const loginForm = document.getElementById('login-form');

// Обработчик клика по ссылке
switchFormLink.addEventListener('click', () => {
  // Скрываем форму регистрации и показываем форму авторизации
  registrationForm.style.display = 'none';
  loginForm.style.display = 'block';
});
