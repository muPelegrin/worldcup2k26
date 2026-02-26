<?php

require_once __DIR__ . '/../config/Database.php';

class MatchGame
{
    public function all(): array
    {
        $sql = 'SELECT m.*, ht.name AS home_team, at.name AS away_team, g.code AS group_code
                FROM matches m
                JOIN teams ht ON ht.id = m.home_team_id
                JOIN teams at ON at.id = m.away_team_id
                LEFT JOIN groups g ON g.id = m.group_id
                ORDER BY m.match_datetime';
        return Database::getConnection()->query($sql)->fetchAll();
    }

    public function create(int $homeTeam, int $awayTeam, string $datetime, string $stadium, ?int $groupId, string $phase): void
    {
        $stmt = Database::getConnection()->prepare(
            'INSERT INTO matches (home_team_id, away_team_id, match_datetime, stadium, group_id, phase) VALUES (?, ?, ?, ?, ?, ?)'
        );
        $stmt->execute([$homeTeam, $awayTeam, $datetime, trim($stadium), $groupId, trim($phase)]);
    }

    public function updateResult(int $id, int $homeGoals, int $awayGoals): void
    {
        $stmt = Database::getConnection()->prepare('UPDATE matches SET home_goals = ?, away_goals = ? WHERE id = ?');
        $stmt->execute([$homeGoals, $awayGoals, $id]);
    }

    public function find(int $id): ?array
    {
        $stmt = Database::getConnection()->prepare('SELECT * FROM matches WHERE id = ?');
        $stmt->execute([$id]);
        return $stmt->fetch() ?: null;
    }
}
