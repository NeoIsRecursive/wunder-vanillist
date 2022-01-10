function createTask(task) {
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
  return container;
}
