<?php

require_once __DIR__ . '/../config/Database.php';

class Standing
{
    public function byGroup(int $groupId): array
    {
        $sql = 'SELECT s.*, t.name AS team_name, g.code AS group_code
                FROM standings s
                JOIN teams t ON t.id = s.team_id
                JOIN groups g ON g.id = s.group_id
                WHERE s.group_id = ?
                ORDER BY s.points DESC, s.goal_difference DESC, s.goals_for DESC, t.name';
        $stmt = Database::getConnection()->prepare($sql);
        $stmt->execute([$groupId]);
        return $stmt->fetchAll();
    }

    public function recomputeGroup(int $groupId): void
    {
        $pdo = Database::getConnection();
        $pdo->beginTransaction();

        $pdo->prepare('DELETE FROM standings WHERE group_id = ?')->execute([$groupId]);

        $teamsStmt = $pdo->prepare('SELECT id FROM teams WHERE group_id = ?');
        $teamsStmt->execute([$groupId]);
        $teamIds = array_column($teamsStmt->fetchAll(), 'id');

        foreach ($teamIds as $teamId) {
            $pdo->prepare('INSERT INTO standings (group_id, team_id) VALUES (?, ?)')->execute([$groupId, $teamId]);
        }

        $matchesSql = 'SELECT * FROM matches WHERE group_id = ? AND home_goals IS NOT NULL AND away_goals IS NOT NULL';
        $matchesStmt = $pdo->prepare($matchesSql);
        $matchesStmt->execute([$groupId]);

        while ($match = $matchesStmt->fetch()) {
            $this->applyTeamStats($pdo, $groupId, (int) $match['home_team_id'], (int) $match['home_goals'], (int) $match['away_goals']);
            $this->applyTeamStats($pdo, $groupId, (int) $match['away_team_id'], (int) $match['away_goals'], (int) $match['home_goals']);
        }

        $pdo->commit();
    }

    private function applyTeamStats(PDO $pdo, int $groupId, int $teamId, int $goalsFor, int $goalsAgainst): void
    {
        $win = $goalsFor > $goalsAgainst ? 1 : 0;
        $draw = $goalsFor === $goalsAgainst ? 1 : 0;
        $loss = $goalsFor < $goalsAgainst ? 1 : 0;
        $points = ($win * 3) + $draw;

        $sql = 'UPDATE standings
                SET played = played + 1,
                    wins = wins + ?,
                    draws = draws + ?,
                    losses = losses + ?,
                    goals_for = goals_for + ?,
                    goals_against = goals_against + ?,
                    goal_difference = goal_difference + ?,
                    points = points + ?
                WHERE group_id = ? AND team_id = ?';

        $pdo->prepare($sql)->execute([
            $win,
            $draw,
            $loss,
            $goalsFor,
            $goalsAgainst,
            $goalsFor - $goalsAgainst,
            $points,
            $groupId,
            $teamId,
        ]);
    }
}
