const updateTodoStatus = (e) => {
  let todoId = e.getAttribute("data-checkbox-id");
  let task = document.querySelector('#task-' + CSS.escape(todoId));

  if (task.classList.contains('completed-task')) {
    task.classList.remove('completed-task');
  } else {
    task.classList.add('completed-task');
  }

  // let task = document.querySelector('[data-task-id=' + CSS.escape(todoId) + ']');

  let xhr = new XMLHttpRequest();

  xhr.open('POST', 'todos/check/' + todoId, true);
  xhr.send();

}
