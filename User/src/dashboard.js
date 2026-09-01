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