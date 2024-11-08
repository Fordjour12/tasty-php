<?php

require_once 'db.php';
require_once 'Todo.php';

// Initialize the todo instance
$todo = new Todo($pdo);

$action = $_GET['action'] ?? 'list';

$errors = [];

switch ($action) {
    case 'create':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // handle form submission
            $title = trim($_POST['title']);
            $description = trim($_POST['description']);

            // Validate inputs
            if (empty($title)) {
                $errors[] = "Title is required.";
            } elseif (strlen($title) > 100) {
                $errors[] = "Title must not exceed 100 characters.";
            }

            if (strlen($description) > 255) {
                $errors[] = "Description must not exceed 255 characters.";
            }

            if (empty($errors)) {
                $todo->createTodo($title, $description);
                header("Location: index.php");
                exit;
            }
        }
        include 'views/form.php';
        break;

    case 'edit':
        // fetch todo and display the edit form
        $id = $_GET['id'] ?? null;
        $todoItem = $todo->getTodoById($id);
        include 'views/form.php';
        break;

    case 'update':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = trim($_POST['id']);
            $title = trim($_POST['title']);
            $description = trim($_POST['description']);
            $status = $_POST['status'] ?? 0;

            if (empty($title)) {
                $errors[] = "Title is required.";
            } elseif (strlen($title) > 100) {
                $errors[] = "Title must not exceed 100 characters.";
            }

            if (strlen($description) > 255) {
                $errors[] = "Description must not exceed 255 characters.";
            }

            if (empty($errors)) {
                $todo->updateTodo($id, $title, $description, $status);
                header('Location: index.php');
                exit;
            }
        }
        break;

    case 'delete':
        $id = $_GET['id'] ?? null;
        $todo->deleteTodo($id);
        header('Location: index.php');
        exit;
        break;

    default:
        $todos = $todo->getAllTodos();
        include 'views/list.php';
        break;
}
