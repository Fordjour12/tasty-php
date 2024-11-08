<?php

class Todo
{
    private $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function getAllTodos(): array
    {
        $stmt = $this->pdo->query("SELECT * FROM todos");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getTodoById(int $id): array
    {
        $stmt = $this->pdo->prepare("SELECT * FROM todos where id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function createTodo(string $title, string $description): bool
    {
        $stmt = $this->pdo->prepare("INSERT INTO todos (title, description) VALUES (?, ?)");
        return $stmt->execute([$title, $description]);
    }

    public function updateTodo(int $id, string $title, string $description, string $status): bool
    {
        $stmt = $this->pdo->prepare("UPDATE todos SET title = ?, description = ?, status = ? WHERE id = ?");
        return $stmt->execute([$title, $description, $status, $id]);
    }

    public function deleteTodo(int $id): bool
    {
        $stmt = $this->pdo->prepare("DELETE FROM todos WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
