// ==========================================
// 1. Page Swap Logic (Main Navigation)
// ==========================================

// Buttons
const teacher_btn = document.getElementById('teacher_btn');
const student_btn = document.getElementById('student_btn');
const admin_btn   = document.getElementById('admin_btn');

// Main Section Containers
const studentTable = document.getElementById('student-table');
const teacherTable = document.getElementById('teacher-table');
const adminTable   = document.getElementById('admin-table');

// Navigation Event Listeners
student_btn.addEventListener('click', function(){
    studentTable.style.display = "block";
    teacherTable.style.display = "none";
    adminTable.style.display   = "none";
});

teacher_btn.addEventListener('click', function(){
    studentTable.style.display = "none";
    teacherTable.style.display = "block";
    adminTable.style.display   = "none";
});

admin_btn.addEventListener('click', function(){
    studentTable.style.display = "none";
    teacherTable.style.display = "none";
    adminTable.style.display   = "block";
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


// ==========================================
// 4. Admins Sub-menu Management
// ==========================================

// Buttons
const add_admins_btn   = document.getElementById('add_admins_btn');
const edit_admins_btn  = document.getElementById('edit_admins_btn');
const delete_admin_btn = document.getElementById('delete_admin_btn');

// Action Panels
const add_admin    = document.getElementById('add_admin');
const edit_admin   = document.getElementById('edit_admin');
const delete_admin = document.getElementById('delete_admin');

// Form Toggles
add_admins_btn.addEventListener('click', function(){
    add_admin.style.display    = "block";
    edit_admin.style.display   = "none";
    delete_admin.style.display = "none";
});

edit_admins_btn.addEventListener('click', function(){
    add_admin.style.display    = "none";
    edit_admin.style.display   = "block";
    delete_admin.style.display = "none";
});

delete_admin_btn.addEventListener('click', function(){
    add_admin.style.display    = "none";
    edit_admin.style.display   = "none";
    delete_admin.style.display = "block";
});
