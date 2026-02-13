<?php

require_once __DIR__ . '/BaseController.php';
require_once __DIR__ . '/../models/MatchGame.php';
require_once __DIR__ . '/../models/Team.php';
require_once __DIR__ . '/../models/Group.php';
require_once __DIR__ . '/../models/Standing.php';

class MatchController extends BaseController
{
    public function index(): void
    {
        $this->render('matches/index', [
            'matches' => (new MatchGame())->all(),
            'teams' => (new Team())->all(),
            'groups' => (new Group())->all(),
        ]);
    }

    public function store(): void
    {
        (new MatchGame())->create(
            (int) $_POST['home_team_id'],
            (int) $_POST['away_team_id'],
            $_POST['match_datetime'],
            $_POST['stadium'],
            $_POST['group_id'] !== '' ? (int) $_POST['group_id'] : null,
            $_POST['phase']
        );

        $this->redirect('controller=match&action=index');
    }

    public function registerResult(): void
    {
        $matchModel = new MatchGame();
        $matchModel->updateResult((int) $_POST['id'], (int) $_POST['home_goals'], (int) $_POST['away_goals']);

        $match = $matchModel->find((int) $_POST['id']);
        if (!empty($match['group_id'])) {
            (new Standing())->recomputeGroup((int) $match['group_id']);
        }

        $this->redirect('controller=match&action=index');
    }
}
