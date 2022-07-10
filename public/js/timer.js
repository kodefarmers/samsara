let audio = new Audio(URLROOT + '/audio/buzzer.mp3');

let playBtn = document.querySelector('#play');
let pauseBtn = document.querySelector('#pause');
let resetBtn = document.querySelector('#reset');

pauseBtn.style.display = 'none';
playBtn.style.display = 'block';

let hour = document.querySelector('#h');
let min = document.querySelector('#m');
let sec = document.querySelector('#s');

let counter = {
  hour: 0,
  min: 0,
  sec: 0
};

let startTimer = null;
clearInterval(startTimer)

const timer = () => {
  if (hour.value == 0 && min.value == 0 && sec.value == 0) {
    hour.value = 0;
    min.value = 0;
    sec.value = 0;

    localStorage.removeItem("counter");

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

  counter.hour = hour.value;
  counter.min = min.value;
  counter.sec = sec.value;

  localStorage.setItem('counter', JSON.stringify(counter))
  return;
}

const countdown = () => {
  if (hour.value == 0 && min.value == 0 && sec.value == 0) {
    return;
  }
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

  localStorage.removeItem("counter");

  clearInterval(startTimer)
}

playBtn.addEventListener('click', countdown)

pauseBtn.addEventListener('click', pauseCountdown)

resetBtn.addEventListener('click', resetCountdown)

if (localStorage.getItem("counter")) {
  let lhour = JSON.parse(localStorage.getItem("counter")).hour;
  let lmin = JSON.parse(localStorage.getItem("counter")).min;
  let lsec = JSON.parse(localStorage.getItem("counter")).sec;

  hour.value = lhour;
  min.value = lmin;
  sec.value = lsec;
  countdown();
}
