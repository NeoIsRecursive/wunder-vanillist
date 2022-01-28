function createTask(task) {
  const container = document.createElement('div');
  container.classList += 'task';
  container.setAttribute('id', 'task' + task.task_id);
  const name = document.createElement('input');
  const changeBtn = document.createElement('button');
  changeBtn.innerText = 'save';
  name.setAttribute('type', 'text');
  name.value = task.task_name;
  changeBtn.addEventListener('click', (event) => {
    changeName(task.task_id, name.value);
  });
  const checkBoxContainer = document.createElement('div');
  const checkBox = document.createElement('input');
  checkBox.setAttribute('type', 'checkbox');
  if (task.completed) {
    checkBox.setAttribute('checked', '');
    container.classList.add('completed');
  }
  const label = document.createElement('label');

  checkBox.addEventListener('click', (event) => {
    let completed;
    if (checkBox.hasAttribute('checked')) {
      checkBox.removeAttribute('checked');
      container.classList.remove('completed');
      completed = 1;
    } else {
      checkBox.setAttribute('checked', '');
      container.classList.add('completed');
      completed = 0;
    }
    complete(task.task_id, completed);
  });
  checkBoxContainer.appendChild(checkBox);
  checkBoxContainer.appendChild(name);

  // remove task button
  const deleteButton = document.createElement('button');
  deleteButton.innerText = 'delete';

  deleteButton.addEventListener('click', (event) => {
    if (confirm('Are you sure?')) deleteTask(task.task_id);
  });

  const buttonWrapper = document.createElement('div');
  buttonWrapper.appendChild(deleteButton);
  buttonWrapper.appendChild(changeBtn);

  container.appendChild(checkBoxContainer);
  container.appendChild(buttonWrapper);

  return container;
}
