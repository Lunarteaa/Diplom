let slider = document.querySelector('#hello');

let index = 0;

setInterval(() => {
  if (index < 4) {
    index++;
  } else {
    index = 0;
  }
  switch (index) {
    case (0):
      slider.style.backgroundImage = "url('/img/Group_11.png')";
      break;
    case (1):
      slider.style.backgroundImage = "url('/img/Group_12.png')";
      break;
    case (2):
      slider.style.backgroundImage = "url('/img/Group_13.png')";
      break;
    case (3):
      slider.style.backgroundImage = "url('/img/Group_14.png')";
      break;
  }
}, 5000);