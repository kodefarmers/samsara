const h2 = document.querySelector('.clock-h2');
const p = document.querySelector('.date-p');
const dateObj = new Date();

const digitalClock = () => {
  if (h2 !== null) { // had to add this because when other page was active then h2 and p would be null
    const dateObj = new Date();
    let hours = dateObj.getHours();
    let minutes = dateObj.getMinutes();
    let seconds = dateObj.getSeconds();

    //Adding a zero to the left of the time if it's less or equal to 9.
    if (+hours <= 9) {
      hours = `0${hours}`;
    }
    if (+minutes <= 9) {
      minutes = `0${minutes}`;
    }
    if (+seconds <= 9) {
      seconds = `0${seconds}`;
    }
    h2.innerHTML = `${hours}:${minutes}:${seconds}`;
  }
}

setInterval(digitalClock, 1000);

const months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
const days = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];

let dayOfTheMonth = (dateObj.getDate() <= 9) ? `0${dateObj.getDate()}` : dateObj.getDate();

if (p !== null) {
  p.innerHTML = `${days[dateObj.getDay()]} ${dayOfTheMonth} ${months[dateObj.getMonth()]}`
}

