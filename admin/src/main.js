// Admin Dashboard

// Page swap function
function switchView(activeElement, allElements) {
    allElements.forEach(el => {
        if (el) el.style.display = el === activeElement ? "block" : "none";
    });
}

// page change
const studentTable = document.getElementById('student-table');
const teacherTable = document.getElementById('teacher-table');
const global_posts = document.getElementById('global-posts');

const mainPages = [studentTable, teacherTable, global_posts];

const studentBtn = document.getElementById('student_btn');
const teacherBtn = document.getElementById('teacher_btn');
const globalPostsBtn = document.getElementById('global_posts_btn');

if (studentBtn) studentBtn.addEventListener('click', () => switchView(studentTable, mainPages));
if (teacherBtn) teacherBtn.addEventListener('click', () => switchView(teacherTable, mainPages));
if (globalPostsBtn) globalPostsBtn.addEventListener('click', () => switchView(global_posts, mainPages));

// Student Management
const add_student = document.getElementById('add_student');
const edit_student = document.getElementById('edit_student');
const delete_student = document.getElementById('delete_student');

const studentPanels = [add_student, edit_student, delete_student];

const addStudentBtn = document.getElementById('add_student_btn');
const editStudentBtn = document.getElementById('edit_student_btn');
const deleteStudentBtn = document.getElementById('delete_student_btn');

if (addStudentBtn) addStudentBtn.addEventListener('click', () => switchView(add_student, studentPanels));
if (editStudentBtn) editStudentBtn.addEventListener('click', () => switchView(edit_student, studentPanels));
if (deleteStudentBtn) deleteStudentBtn.addEventListener('click', () => switchView(delete_student, studentPanels));

// Teacher Management
const add_teacher = document.getElementById('add_teacher');
const edit_teacher = document.getElementById('edit_teacher');
const delete_teacher = document.getElementById('delete_teacher');

const teacherPanels = [add_teacher, edit_teacher, delete_teacher];

const addTeacherBtn = document.getElementById('add_teacher_btn');
const editTeacherBtn = document.getElementById('edit_teacher_btn');
const deleteTeacherBtn = document.getElementById('delete_teacher_btn');

if (addTeacherBtn) addTeacherBtn.addEventListener('click', () => switchView(add_teacher, teacherPanels));
if (editTeacherBtn) editTeacherBtn.addEventListener('click', () => switchView(edit_teacher, teacherPanels));
if (deleteTeacherBtn) deleteTeacherBtn.addEventListener('click', () => switchView(delete_teacher, teacherPanels));

// Global Posts