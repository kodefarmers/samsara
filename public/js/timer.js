const sidebarMenuItems = document.querySelectorAll('.sidebar-menuitem');
const timerPopup = document.querySelector('.timer-popup');

sidebarMenuItems.forEach((item) => {
  timerPopup.style.display = 'none';
  item.addEventListener('click', () => {
    item.classList.add('active');
    if (item.id !== 'timer-popup') {
      timerPopup.style.display = 'none';
    } else {
      timerPopup.style.display = (timerPopup.style.display === 'none') ? 'block' : 'none';
    }
    if (timerPopup.style.display === 'none') {
      item.classList.remove('active');
    }
  })
})
