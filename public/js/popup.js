let whichComponent = ''; // If buttons on todo was clicked this will be set to todo
let whichAction = ''; // If edit button was clicked this will be set to edit

const setWhichAction = (e) => {
  e.target.classList.forEach((i) => {
    if (i.startsWith('add')) {
      whichAction = 'insert';
    } else if (i.startsWith('edit')) {
      whichAction = 'edit';
    } else if (i.startsWith('view')) {
      whichAction = 'view';
    }
  });
}

const setWhichComponent = (e) => {
  e.target.classList.forEach((i) => {
    if (i.startsWith('add-')) {
      whichComponent = i.slice(4);
    } else if (i.startsWith('edit-') || i.startsWith('view-')) {
      whichComponent = i.slice(5);
    }
  });
}

const setFormAction = (component, method, id = '') => {
  let arr = URLROOT.split('/');
  arr.push(component + 's', method);
  if (method === 'edit') {
    arr.push(id);
  }
  arr = arr.join('/');
  form.action = arr;
}

const addButtons = document.querySelectorAll('.add');
const viewButtons = document.querySelectorAll('.view');
const popupModal = document.querySelector('.popup');
const editButtons = document.querySelectorAll('.edit');

// Form Elements
const form = document.querySelector('#popup-form');
const popupFor = document.querySelector('#popup-card-heading');
const titleInput = document.querySelector('#title');
const descriptionInput = document.querySelector('#description');
const dateTimeInput = document.querySelector('#datetime');
const dateTimeInputDiv = document.querySelector('.popup-card-remainder');
const saveBtn = document.querySelector('#btn-save');

const openPopupModal = (e) => {
  let id = e.target.id;

  switch (whichComponent) {
    case "todo":
      popupFor.innerHTML = ((whichAction == 'insert') ? 'Add' : 'Edit') + " Todo";
      dateTimeInputDiv.style.display = 'block';
      setFormAction(whichComponent, whichAction, id);
      break;
    case "note":
      popupFor.innerHTML = ((whichAction == 'insert') ? 'Add' : (whichAction == 'edit') ? 'Edit' : 'View') + " Note";
      dateTimeInputDiv.style.display = 'none';
      setFormAction(whichComponent, whichAction, id);

      if (whichAction == 'view') {
        titleInput.disabled = true;
        descriptionInput.disabled = true;
        saveBtn.style.display = 'none';
      } else {
        titleInput.disabled = false;
        descriptionInput.disabled = false;
        saveBtn.style.display = 'inline-block';
      }

      break;
    default:
      popupFor.innerHTML = "Add";
  }
  popupModal.style.display = 'grid';
}

const closePopupModal = (e) => {
  if (e.target.classList.contains('popup')) {
    popupModal.style.display = 'none';

    // RESET VALUES THAT WAS SET WHILE EDIT WAS CLICKED
    titleInput.value = '';
    descriptionInput.value = '';
    dateTimeInput.value = '';
    popupFor.innerHTML = "Add"
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
      if (response.remainder && response.remainder !== null) {
        dateTimeInput.value = response.remainder.replace(/\s/g, 'T');
      }
    }
  }

  xhr.open('GET', whichComponent + 's/get/' + id, false);
  xhr.send();
}

popupModal.addEventListener('click', closePopupModal);

addButtons.forEach((btn) => {
  btn.addEventListener('click', setWhichComponent)
  btn.addEventListener('click', setWhichAction)
  btn.addEventListener('click', openPopupModal);
});

editButtons.forEach((btn) => {
  btn.addEventListener('click', setWhichComponent)
  btn.addEventListener('click', setWhichAction)
  btn.addEventListener("click", fetchData)
  btn.addEventListener("click", openPopupModal)
});

viewButtons.forEach((btn) => {
  btn.addEventListener('click', setWhichComponent)
  btn.addEventListener('click', setWhichAction)
  btn.addEventListener("click", fetchData)
  btn.addEventListener('click', openPopupModal)
});

