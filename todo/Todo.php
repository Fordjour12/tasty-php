<?php

class Todo
{
    private $pdo;


    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function getAllTodos()
    {
        $stmt = $this->pdo->query("SELECT * FROM todos");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public function getTodoById($id)
    {
        $stmt = this->pdo->prepare("SELECT * FROM todos where id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function createTodo($title, $description)
    {
        $stmt = $this->pdo->prepare("INSERT INTO todos (title, description) VALUES (?, ?)");
        return $stmt->execute([$title, $description]);

    }
    public function updateTodo($id, $title, $description, $status)
    {
        $stmt = $this->pdo->prepare("UPDATE todos SET title = ?, description = ?, status = ? W
         HERE id = ?");
        return $stmt->execute([$title, $description, $status, $id]);

    }
    public function deleteTodo()
    {
    }

}
