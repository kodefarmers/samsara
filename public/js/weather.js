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
    document.querySelector(".weather-icon").src = "https://openweathermap.org/img/wn/" + icon + ".png";
    document.querySelector("#span-weather").innerText = description;
    document.querySelector("#span-temperature").innerText = temp + "°C";
    document.querySelector("#span-humidity").innerText = humidity + "%";
    document.querySelector("#span-sunrise").innerText = sunrise;
    document.querySelector("#span-sunset").innerText = sunset;
  },
  search: function () {
    this.fetchWeather(document.querySelector('.city').value);
  }
};

document.querySelector('.btn-search')
  .addEventListener('click', function () {
    weather.search();
  })

document.querySelector('.city')
  .addEventListener('keyup', function (e) {
    if (e.key == "Enter") {
      weather.search()
    }
  })
