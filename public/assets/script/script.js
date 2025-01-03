const login = document.getElementById('login');

const loginForm = document.getElementById('loginForm');
const signinForm = document.getElementById('signinForm');

const loginLink = document.getElementById('loginLink');
const signinLink = document.getElementById('signinLink');
const signinLink2 = document.getElementById('signinLink2');

const overlay = document.getElementById('overlay');

loginLink.addEventListener('click',()=> {
    login.style.display ='flex';
    overlay.style.opacity = '0.5';
    overlay.style.display = 'block';
    loginForm.style.display = 'flex';
});

signinLink.addEventListener('click',()=> {
    login.style.display ='flex';
    overlay.style.opacity = '0.5';
    overlay.style.display = 'block';
    signinForm.style.display = 'flex';
});

signinLink2.addEventListener('click',()=> {
    loginForm.style.display = 'none';
    signinForm.style.display = 'flex';
});

overlay.addEventListener('click',()=> {
    login.style.display ='none';
    overlay.style.opacity = '0';
    overlay.style.display = 'none';
    loginForm.style.display = 'none';
    signinForm.style.display = 'none';
});
