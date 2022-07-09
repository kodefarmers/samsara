let weather = {
  key: "793095f686150038b8961daba10a7e40",
  fetchWeather: function (city) {
    fetch(
      "https://api.openweathermap.org/data/2.5/weather?q="
      + city
      + "&units=metric&appid="
      + this.key
    )
      .then((response) => response.json())
      .then((data) => this.display(data));
  },
  display: function (data) {
    const {icon, description} = data.weather[0];
    const {temp, humidity} = data.main;
    const {sunrise, sunset} = data.sys;
    let sr = new Date(sunrise * 1000);
    let ss = new Date(sunset * 1000);

    let sr_hours = sr.getHours();
    let sr_minutes = sr.getMinutes();
    let sr_seconds = sr.getSeconds();

    if (+sr_hours <= 9) {
      sr_hours = `0${sr_hours}`;
    }
    if (+sr_minutes <= 9) {
      sr_minutes = `0${sr_minutes}`;
    }
    if (+sr_seconds <= 9) {
      sr_seconds = `0${sr_seconds}`;
    }

    let ss_hours = ss.getHours();
    let ss_minutes = ss.getMinutes();
    let ss_seconds = ss.getSeconds();

    if (+ss_hours <= 9) {
      ss_hours = `0${ss_hours}`;
    }
    if (+ss_minutes <= 9) {
      ss_minutes = `0${ss_minutes}`;
    }
    if (+ss_seconds <= 9) {
      ss_seconds = `0${ss_seconds}`;
    }

    document.querySelector(".weather-icon").src = "https://openweathermap.org/img/wn/" + icon + "@2x.png";
    document.querySelector("#span-weather").innerText = description;
    document.querySelector("#span-temperature").innerText = temp + "°C";
    document.querySelector("#span-humidity").innerText = humidity + "%";
    document.querySelector("#span-sunrise").innerText = `${sr_hours}:${sr_minutes}:${sr_seconds}`;
    document.querySelector("#span-sunset").innerText = `${ss_hours}:${ss_minutes}:${ss_seconds}`;
  },
  search: function () {
    this.fetchWeather(document.querySelector('.city').value);
  }
};

const searchBtn = document.querySelector('.btn-search');
if (searchBtn !== null) {
  searchBtn.addEventListener('click', function () {
    weather.search();
  })
}

const cityInput = document.querySelector('.city');
if (cityInput !== null) {
  cityInput.addEventListener('keyup', function (e) {
    if (e.key == "Enter") {
      weather.search()
    }
  })
}
