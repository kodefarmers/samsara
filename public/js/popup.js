const add = document.querySelector('.add');
const popupModal = document.querySelector('.popup');
const editButtons = document.querySelectorAll('.edit');

// Form Elements
const form = document.querySelector('#popup-form');
const popupFor = document.querySelector('#popup-card-heading');
const titleInput = document.querySelector('#title');
const descriptionInput = document.querySelector('#description');
const dateTimeInput = document.querySelector('#datetime');
const dateTimeInputDiv = document.querySelector('.popup-card-remainder');

const openPopupModal = () => {
  popupModal.style.display = 'grid';
}

const closePopupModal = (e) => {
  if (e.target.classList.contains('popup')) {
    popupModal.style.display = 'none';
    // RESET VALUES THAT WAS SET WHILE EDIT WAS CLICKED
    const formAction = form.action;
    let arr = formAction.split('/');
    console.log(arr);
    arr = arr.slice(0, -2);
    arr.push('insert');
    arr = arr.join('/');
    form.action = arr;

    titleInput.value = '';
    descriptionInput.value = '';
    dateTimeInput.value = '';
    popupFor.innerHTML = "Add Todo"
  }
}

const fetchData = (e) => {
  let id = e.target.id;

  let xhr = new XMLHttpRequest();

  xhr.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      let response = JSON.parse(this.responseText);
      titleInput.value = response.title;
      descriptionInput.value = response.description;
      dateTimeInput.value = response.remainder.replace(/\s/g, 'T');
      popupFor.innerHTML = "Edit Todo"

      const formAction = form.action;
      let arr = formAction.split('/');
      arr = arr.slice(0, -1);
      arr.push('edit', id);
      arr = arr.join('/');
      form.action = arr;
    }
  }

  xhr.open('GET', 'todos/get/' + id, false);
  xhr.send();
}



popupModal.addEventListener('click', closePopupModal);

add.addEventListener('click', openPopupModal);

editButtons.forEach((btn) => {
  btn.addEventListener("click", openPopupModal)
  btn.addEventListener("click", fetchData)
});

