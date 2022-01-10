function addNewTask(todoId, taskName) {
  const token = document.querySelector('.token').content;
  fetch('/newTask', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
      'X-CSRF-Token': token,
    },
    body: JSON.stringify({
      todo_id: todoId,
      task: taskName,
    }),
  })
    .then((response) => response.json())
    .then((response) => {
      const task = {
        id: response.todo_id,
        task_id: response.id,
        task_name: response.task,
      };
      document
        .getElementById('listFor' + task.id)
        .appendChild(createTask(task));
    });
}
