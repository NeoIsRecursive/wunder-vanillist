function hide(todoId) {
  const parent = document.getElementById(todoId);
  parent.querySelector('p').setAttribute('onclick', 'reveal(' + todoId + ')');

  document.getElementById('listFor' + todoId).remove();
}

function reveal(todoId) {
  const parent = document.getElementById(todoId);
  parent.querySelector('p').setAttribute('onclick', 'hide(' + todoId + ')');
  const tasks = document.createElement('ul');
  tasks.setAttribute('id', 'listFor' + todoId);

  const newTask = document.createElement('div');
  const newTaskname = document.createElement('input');
  const newTaskButton = document.createElement('button');
  newTaskButton.textContent = 'Add new task';
  newTaskButton.addEventListener('click', (event) => {
    if (newTaskname.value.trim() === '') return alert('must type in some text');
    addNewTask(todoId, newTaskname.value);
    newTaskname.value = '';
  });
  newTask.appendChild(newTaskname);
  newTask.appendChild(newTaskButton);

  tasks.appendChild(newTask);
  parent.appendChild(tasks);
  getTasks(todoId, parent);
}

function show(tasks, todoId) {
  if (tasks === 'none') {
    alert('there is no tasks in that list, add new ones!');
    return;
  }
  const parent = document.getElementById('listFor' + todoId);
  tasks.forEach((task) => {
    const container = createTask(task);
    parent.appendChild(container);
  });
}

function getTasks(todoId) {
  const token = document.querySelector('.token').content;
  fetch('/taskapi', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
      'X-CSRF-Token': token,
    },
    body: JSON.stringify({
      todo_id: todoId,
    }),
  })
    .then((request) => request.json())
    .then((request) => show(request, todoId));
}
