<?php
/** @var array $todoItem */
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title><?php echo isset($todoItem) ? 'Edit Todo' : 'Add Todo'; ?></title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header>
        <div class="container">
            <h1><?php echo isset($todoItem) ? 'Edit Todo' : 'Add Todo'; ?></h1>
        </div>
    </header>
    <div class="container">
        <form method="post" action="index.php?action=<?php echo isset($todoItem) ? 'update' : 'create'; ?>">
            <?php if (isset($todoItem)): ?>
                <input type="hidden" name="id" value="<?php echo $todoItem['id']; ?>">
            <?php endif; ?>
            <label for="title">Title:</label>
            <input type="text" name="title" id="title" value="<?php echo htmlspecialchars($todoItem['title'] ?? ''); ?>" required>
            <br>
            <label for="description">Description:</label>
            <textarea name="description" id="description"><?php echo htmlspecialchars($todoItem['description'] ?? ''); ?></textarea>
            <br>
            <?php if (isset($todoItem)): ?>
                <label for="status">Status:</label>
                <input type="checkbox" name="status" id="status" value="1" <?php echo $todoItem['status'] ? 'checked' : ''; ?>>
                <br>
            <?php endif; ?>
            <button type="submit"><?php echo isset($todoItem) ? 'Update' : 'Create'; ?></button>
        </form>
        <a href="index.php" class="button">Back to Todo List</a>
    </div>
    <footer>
        <div class="container">
            <p>&copy; <?php echo date('Y'); ?> Todo List</p>
        </div>
    </footer>
</body>

</html>
