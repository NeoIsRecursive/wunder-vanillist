function createTask(task) {
  const container = document.createElement('div');
  container.classList += 'task';
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

  container.appendChild(checkBoxContainer);
  container.appendChild(changeBtn);

  return container;
}
