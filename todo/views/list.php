<?php

/** @var array $todos */
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Todo List</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header>
        <div class="container">
            <h1>Todo List</h1>
        </div>
    </header>
    <div class="container">
        <a href="index.php?action=create" class="button">Add New Todo</a>
        <ul>
            <?php foreach ($todos as $todo): ?>
                <li class="todo-item">
                    <strong><?php echo htmlspecialchars($todo['title']); ?></strong>
                    <p><?php echo htmlspecialchars($todo['description']); ?></p>
                    <p>Status: <?php echo $todo['status'] ? 'Completed' : 'Pending'; ?></p>
                    <a href="index.php?action=edit&id=<?php echo $todo['id']; ?>" class="button">Edit</a>
                    <a href="index.php?action=delete&id=<?php echo $todo['id']; ?>" class="button" onclick="return confirm('Are you sure?')">Delete</a>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
    <footer>
        <div class="container">
            <p>&copy; <?php echo date('Y'); ?> Todo List</p>
        </div>
    </footer>
</body>

</html>