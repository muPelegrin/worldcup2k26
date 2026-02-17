<?php

require_once __DIR__ . '/../config/Database.php';

class Group
{
    public function all(): array
    {
        $stmt = Database::getConnection()->query('SELECT * FROM groups ORDER BY code');
        return $stmt->fetchAll();
    }

    public function find(int $id): ?array
    {
        $stmt = Database::getConnection()->prepare('SELECT * FROM groups WHERE id = ?');
        $stmt->execute([$id]);
        return $stmt->fetch() ?: null;
    }

    public function create(string $code): void
    {
        $stmt = Database::getConnection()->prepare('INSERT INTO groups (code) VALUES (?)');
        $stmt->execute([strtoupper(trim($code))]);
    }

    public function update(int $id, string $code): void
    {
        $stmt = Database::getConnection()->prepare('UPDATE groups SET code = ? WHERE id = ?');
        $stmt->execute([strtoupper(trim($code)), $id]);
    }

    public function delete(int $id): void
    {
        $stmt = Database::getConnection()->prepare('DELETE FROM groups WHERE id = ?');
        $stmt->execute([$id]);
    }

    public function teamsByGroup(int $groupId): array
    {
        $stmt = Database::getConnection()->prepare('SELECT * FROM teams WHERE group_id = ? ORDER BY name');
        $stmt->execute([$groupId]);
        return $stmt->fetchAll();
    }
}
