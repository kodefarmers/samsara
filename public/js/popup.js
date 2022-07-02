const add = document.querySelector('.add');
const popupModal = document.querySelector('.popup');

const openPopupModal = () => {
  popupModal.style.display = 'grid';
}

const closePopupModal = (e) => {
  if (e.target.classList.contains('popup')) {
    popupModal.style.display = 'none';
  }
}

popupModal.addEventListener('click', closePopupModal);

add.addEventListener('click', openPopupModal);
