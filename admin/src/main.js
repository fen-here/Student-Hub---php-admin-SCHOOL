//Admin Login Page

//===========================================
// Variables
//===========================================

//buttons
const forgot_password_btn = document.getElementById('forgot-password-btn');
const back_to_login_btn = document.getElementById('back-to-login-btn');

// elements
const login_page = document.getElementById('login');
const forgot_password_page = document.getElementById('forgot-password');

//===========================================
// Function
//===========================================

forgot_password_btn.addEventListener('click', function(){
    login_page.style.display="none";
    forgot_password_page.style.display="grid";
});

back_to_login_btn.addEventListener('click', function(){
    login_page.style.display="grid";
    forgot_password_page.style.display="none";
});


//Admin Dashboard
// ==========================================
// 1. Page Swap Logic (Main Navigation)
// ==========================================

// Buttons
const teacher_btn = document.getElementById('teacher_btn');
const student_btn = document.getElementById('student_btn');
const global_posts_btn   = document.getElementById('global_posts_btn');

// Main Section Containers
const studentTable = document.getElementById('student-table');
const teacherTable = document.getElementById('teacher-table');
const global_posts   = document.getElementById('global-posts');

// Navigation Event Listeners
student_btn.addEventListener('click', function(){
    studentTable.style.display = "block";
    teacherTable.style.display = "none";
    global_posts.style.display   = "none";
});

teacher_btn.addEventListener('click', function(){
    studentTable.style.display = "none";
    teacherTable.style.display = "block";
    global_posts.style.display   = "none";
});

global_posts_btn.addEventListener('click', function(){
    studentTable.style.display = "none";
    teacherTable.style.display = "none";
    global_posts.style.display   = "block";
});


// ==========================================
// 2. Students Sub-menu Management
// ==========================================

// Buttons
const add_student_btn    = document.getElementById('add_student_btn');
const edit_student_btn   = document.getElementById('edit_student_btn');
const delete_student_btn = document.getElementById('delete_student_btn');

// Action Panels
const add_student    = document.getElementById('add_student');
const edit_student   = document.getElementById('edit_student');
const delete_student = document.getElementById('delete_student');

// Form Toggles
add_student_btn.addEventListener('click', function(){
    add_student.style.display    = "block";
    edit_student.style.display   = "none";
    delete_student.style.display = "none";
});

edit_student_btn.addEventListener('click', function(){
    add_student.style.display    = "none";
    edit_student.style.display   = "block";
    delete_student.style.display = "none";
});

delete_student_btn.addEventListener('click', function(){
    add_student.style.display    = "none";
    edit_student.style.display   = "none";
    delete_student.style.display = "block";
});


// ==========================================
// 3. Teachers Sub-menu Management
// ==========================================

// Buttons
const add_teacher_btn    = document.getElementById('add_teacher_btn');
const edit_teacher_btn   = document.getElementById('edit_teacher_btn');
const delete_teacher_btn = document.getElementById('delete_teacher_btn');

// Action Panels
const add_teacher    = document.getElementById('add_teacher');
const edit_teacher   = document.getElementById('edit_teacher');
const delete_teacher = document.getElementById('delete_teacher');

// Form Toggles
add_teacher_btn.addEventListener('click', function(){
    add_teacher.style.display    = "block";
    edit_teacher.style.display   = "none";
    delete_teacher.style.display = "none";
});

edit_teacher_btn.addEventListener('click', function(){
    add_teacher.style.display    = "none";
    edit_teacher.style.display   = "block";
    delete_teacher.style.display = "none";
});

delete_teacher_btn.addEventListener('click', function(){
    add_teacher.style.display    = "none";
    edit_teacher.style.display   = "none";
    delete_teacher.style.display = "block";
});
