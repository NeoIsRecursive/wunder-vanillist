function removeTodo(todoId) {
  const token = document.querySelector('.token').content;
  fetch('/removeTodo', {
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
    .then((response) => console.log(response));
}
