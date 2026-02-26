<?php

require_once __DIR__ . '/../config/Database.php';

class User
{
    public function all(): array
    {
        $sql = 'SELECT u.*, t.name AS team_name FROM users u LEFT JOIN teams t ON t.id = u.team_id ORDER BY u.name';
        $stmt = Database::getConnection()->query($sql);
        return $stmt->fetchAll();
    }

    public function find(int $id): ?array
    {
        $stmt = Database::getConnection()->prepare('SELECT * FROM users WHERE id = ?');
        $stmt->execute([$id]);
        return $stmt->fetch() ?: null;
    }

    public function create(string $name, int $age, int $teamId, string $role): void
    {
        $stmt = Database::getConnection()->prepare('INSERT INTO users (name, age, team_id, role) VALUES (?, ?, ?, ?)');
        $stmt->execute([trim($name), $age, $teamId, trim($role)]);
    }

    public function update(int $id, string $name, int $age, int $teamId, string $role): void
    {
        $stmt = Database::getConnection()->prepare('UPDATE users SET name = ?, age = ?, team_id = ?, role = ? WHERE id = ?');
        $stmt->execute([trim($name), $age, $teamId, trim($role), $id]);
    }

    public function delete(int $id): void
    {
        $stmt = Database::getConnection()->prepare('DELETE FROM users WHERE id = ?');
        $stmt->execute([$id]);
    }
}
