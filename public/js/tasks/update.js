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
    }),
  })
    .then((request) => request.json())
    .then((response) => console.log(response));
}

function changeName(taskId, taskName) {
  const token = document.querySelector('.token').content;
  fetch('/taskChangeName', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
      'X-CSRF-Token': token,
    },
    body: JSON.stringify({
      task_id: taskId,
      task_name: taskName,
    }),
  })
    .then((request) => request.json())
    .then((response) => console.log(response));
}
