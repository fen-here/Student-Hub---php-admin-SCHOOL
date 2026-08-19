//teacher Login Page

//buttons
const forgot_password_btn = document.getElementById('forgot-password-btn');
const back_to_login_btn = document.getElementById('back-to-login-btn');

// elements
const login_page = document.getElementById('login');
const forgot_password_page = document.getElementById('forgot-password');

forgot_password_btn.addEventListener('click', function(){
    login_page.style.display="none";
    forgot_password_page.style.display="grid";
});

back_to_login_btn.addEventListener('click', function(){
    login_page.style.display="grid";
    forgot_password_page.style.display="none";
});
