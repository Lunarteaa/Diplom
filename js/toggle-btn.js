let toggleBtn = document.querySelector('.toggle-btn');
let toggle = document.querySelector('.toggle');
toggleBtn.addEventListener('click', function(){
	toggleBtn.classList.toggle('active');
    toggle.classList.toggle('active');
});