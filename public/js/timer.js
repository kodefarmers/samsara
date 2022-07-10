let audio = new Audio(URLROOT + '/audio/buzzer.mp3');


let playBtn = document.querySelector('#play');
let pauseBtn = document.querySelector('#pause');
let resetBtn = document.querySelector('#reset');

pauseBtn.style.display = 'none';
playBtn.style.display = 'block';

let hour = document.querySelector('#h');
let min = document.querySelector('#m');
let sec = document.querySelector('#s');

let startTimer = null;

const timer = () => {
  if (hour.value == 0 && min.value == 0 && sec.value == 0) {
    hour.value = 0;
    min.value = 0;
    sec.value = 0;

    setTimeout(() => {
      audio.play();
      setTimeout(() => {
        audio.pause()
        audio.currentTime = 0;
      }, 10000)
    }, 1000)

  } else if (sec.value != 0) {
    sec.value--;
  } else if (min.value != 0 && s.value == 0) {
    s.value = 59;
    min.value--;
  } else if (hour.value != 0 && min.value == 0) {
    min.value = 60;
    hour.value--;
  }
  return;
}

const countdown = () => {
  function startInterval() {
    startTimer = setInterval(() => {
      timer();
    }, 1000);
  }
  startInterval()
  pauseBtn.style.display = 'block';
  playBtn.style.display = 'none';
}

const pauseCountdown = () => {
  pauseBtn.style.display = 'none';
  playBtn.style.display = 'block';
  clearInterval(startTimer)
}

const pauseTimer = () => {
  playBtn.removeEventListener('click', countdown)
}

const resetCountdown = () => {
  hour.value = 0;
  min.value = 0;
  sec.value = 0;
  clearInterval(startTimer)
}

playBtn.addEventListener('click', countdown)

pauseBtn.addEventListener('click', pauseCountdown)

resetBtn.addEventListener('click', resetCountdown)
