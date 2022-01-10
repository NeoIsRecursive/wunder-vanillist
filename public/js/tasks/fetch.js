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
  parent.appendChild(tasks);
  getTasks(todoId, parent);
}

function show(tasks, todoId) {
  const parent = document.getElementById('listFor' + todoId);
  tasks.forEach((task) => {
    const container = document.createElement('div');
    const name = document.createElement('input');
    const changeBtn = document.createElement('button');
    changeBtn.innerText = 'save';
    name.value = task.task_name;
    name.addEventListener('keyup', (event) => {
      if (event.key === 'Enter') changeName(task.task_id, name.value);
    });
    container.appendChild(name);
    if (task.completed) {
      container.className = 'bg-green-100';
    }

    container.addEventListener('click', (event) => {
      let completed;
      if (container.className === 'bg-green-100') {
        completed = 1;
        container.className = 'bg-amber-100';
      } else {
        completed = 0;
        container.className = 'bg-green-100';
      }

      complete(task.task_id, completed);
    });
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
