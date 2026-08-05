
//Page Swap

//buttons
const teacher_btn=document.getElementById('teacher_btn');
const student_btn=document.getElementById('student_btn');

//pages
const signInForm=document.getElementById('student-table');
const signUpForm=document.getElementById('teacher-table');

//Functions
teacher_btn.addEventListener('click',function(){
    signInForm.style.display="none";
    signUpForm.style.display="block";
});
student_btn.addEventListener('click', function(){
    signInForm.style.display="block";
    signUpForm.style.display="none";
});

//Students

//Buttons
const add_student_btn=document.getElementById('add_student_btn');
const edit_student_btn=document.getElementById('edit_student_btn');
const delete_student_btn=document.getElementById('delete_student_btn');

//Pages
const add_student=document.getElementById('add_student');
const edit_student=document.getElementById('edit_student');
const delete_student=document.getElementById('delete_student');

//Function
add_student_btn.addEventListener('click', function(){
    add_student.style.display="block";
    edit_student.style.display="none";
    delete_student.style.display="none";

});

edit_student_btn.addEventListener('click', function(){
    add_student.style.display="none";
    edit_student.style.display="block";
    delete_student.style.display="none";
});

delete_student_btn.addEventListener('click', function(){
    add_student.style.display="none";
    edit_student.style.display="none";
    delete_student.style.display="block";
});


//Teachers

//Buttons
const add_teacher_btn = document.getElementById('add_teacher_btn');
const edit_teacher_btn = document.getElementById('edit_teacher_btn');
const delete_teacher_btn = document.getElementById('delete_teacher_btn');

//Pages
const add_teacher = document.getElementById('add_teacher');
const edit_teacher = document.getElementById('edit_teacher');
const delete_teacher = document.getElementById('delete_teacher');

//Functions
add_teacher_btn.addEventListener('click', function(){
    add_teacher.style.display = "block";
    edit_teacher.style.display = "none";
    delete_teacher.style.display = "none";
});

edit_teacher_btn.addEventListener('click', function(){
    add_teacher.style.display = "none";
    edit_teacher.style.display = "block";
    delete_teacher.style.display = "none";
});

delete_teacher_btn.addEventListener('click', function(){
    add_teacher.style.display = "none";
    edit_teacher.style.display = "none";
    delete_teacher.style.display = "block";
});
