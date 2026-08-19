
const home_btn = document.getElementById('home');
const support_btn = document.getElementById('Support');

const support_page = document.getElementById('support-page');
const homepage = document.getElementById('content');


support_btn.addEventListener('click', () => {
    support_page.style.display = "block";
    homepage.style.display = "none";
});

home_btn.addEventListener('click', () => {
    support_page.style.display = "none";
    homepage.style.display = "block";
});
