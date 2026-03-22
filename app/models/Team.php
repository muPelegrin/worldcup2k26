<?php

require_once __DIR__ . '/../config/Database.php';

class Team
{
    public function all(): array
    {
        $sql = 'SELECT t.*, g.code AS group_code FROM teams t LEFT JOIN groups g ON g.id = t.group_id ORDER BY t.name';
        $stmt = Database::getConnection()->query($sql);
        return $stmt->fetchAll();
    }

    public function find(int $id): ?array
    {
        $stmt = Database::getConnection()->prepare('SELECT * FROM teams WHERE id = ?');
        $stmt->execute([$id]);
        return $stmt->fetch() ?: null;
    }

    public function create(string $name, int $groupId, string $continent): void
    {
        $stmt = Database::getConnection()->prepare('INSERT INTO teams (name, group_id, continent) VALUES (?, ?, ?)');
        $stmt->execute([trim($name), $groupId, trim($continent)]);
    }

    public function update(int $id, string $name, int $groupId, string $continent): void
    {
        $stmt = Database::getConnection()->prepare('UPDATE teams SET name = ?, group_id = ?, continent = ? WHERE id = ?');
        $stmt->execute([trim($name), $groupId, trim($continent), $id]);
    }

    public function delete(int $id): void
    {
        $stmt = Database::getConnection()->prepare('DELETE FROM teams WHERE id = ?');
        $stmt->execute([$id]);
    }
}
