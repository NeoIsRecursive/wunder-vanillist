const token = document.querySelector('.token').content;
fetch('/taskapiAll', {
  method: 'POST',
  headers: {
    'Content-Type': 'application/json',
    'X-CSRF-Token': token,
  },
})
  .then((request) => request.json())
  .then((request) => {
    const container = document.querySelector('.all-tasks');
    let old_due;
    request.forEach((task) => {
      if (task.due_at !== old_due) {
        const p = document.createElement('p');
        p.textContent = 'due at ' + task.due_at;
        if (task.due_at === null)
          p.textContent = 'you can take it easy with these';
        container.appendChild(p);
      }
      old_due = task.due_at;
      container.appendChild(createTask(task));
    });
  });
