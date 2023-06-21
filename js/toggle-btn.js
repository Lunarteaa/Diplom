let toggleBtn = document.querySelector('.toggle-btn');
let toggle = document.querySelector('.toggle');
let heading = document.getElementById('my-heading');

toggleBtn.addEventListener('click', function(){
	toggleBtn.classList.toggle('active');
    toggle.classList.toggle('active');
});

heading.addEventListener('click', function() {
  toggle.classList.toggle('active');
  toggleBtn.classList.toggle('active');
});