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

    container.setAttribute('class', task.task_id);
    container.innerText = task.task_name;

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
      'csrf-token': token,
    }),
  })
    .then((request) => request.json())
    .then((request) => show(request, todoId));
}

function complete(taskId, status) {
  const token = document.querySelector('.token').content;
  fetch('/taskComplete', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
      'X-CSRF-Token': token,
    },
    body: JSON.stringify({
      task_id: taskId,
      completed: status,
      'csrf-token': token,
    }),
  })
    .then((request) => request.json())
    .then((response) => console.log(response));
}
