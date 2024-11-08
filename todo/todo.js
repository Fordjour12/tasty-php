document.addEventListener('DOMContentLoaded', function() {
    // Add event listener for adding a new todo item
    document.getElementById('addTodoForm').addEventListener('submit', function(event) {
        event.preventDefault();
        const todoText = document.getElementById('todoText').value;
        if (todoText.trim() !== '') {
            addTodoItem(todoText);
            document.getElementById('todoText').value = '';
        }
    });

    // Function to add a new todo item to the list
    function addTodoItem(text) {
        const todoList = document.getElementById('todoList');
        const newItem = document.createElement('li');
        newItem.textContent = text;
        todoList.appendChild(newItem);
    }

    // Add event listener for marking todo items as completed
    document.getElementById('todoList').addEventListener('click', function(event) {
        if (event.target.tagName === 'LI') {
            event.target.classList.toggle('completed');
        }
    });
});
