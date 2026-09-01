//Student Login Page

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


//Student Dashboard

//buttons
const dashboard_btn = document.getElementById('dashboard_btn');
const timetable_btn = document.getElementById('time_table_btn');

// elements
const timetable_page = document.getElementById('timetable');
const dashboard_page = document.getElementById('dashboard');

//functions

dashboard_btn.addEventListener('click', function(){
    dashboard_page.style.display="block";
    timetable_page.style.display='none';
});

timetable_btn.addEventListener('click', function(){
    dashboard_page.style.display="none";
    timetable_page.style.display='block';
});