let toggleBtn = document.getElementById('burger_ul');
let toggle = document.getElementById('burger_ul_open');

toggleBtn.addEventListener('click', ()=>{
    console.log(toggle);
    toggle.classList.toggle('active');
});

