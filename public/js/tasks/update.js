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
  }).then((request) => request);
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
  }).then((response) => response);
}

function deleteTask(taskId) {
  const token = document.querySelector('.token').content;
  fetch('/deleteTask', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
      'X-CSRF-Token': token,
    },
    body: JSON.stringify({
      task_id: taskId,
    }),
  })
    .then((response) => response.json())
    .then((response) => {
      if (response.tasks_deleted)
        document.getElementById('task' + taskId).remove();
      console.log(response.tasks_deleted);
    });
}
