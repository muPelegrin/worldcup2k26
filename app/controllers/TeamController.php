<?php

require_once __DIR__ . '/BaseController.php';
require_once __DIR__ . '/../models/Team.php';
require_once __DIR__ . '/../models/Group.php';

class TeamController extends BaseController
{
    public function index(): void
    {
        $this->render('teams/index', [
            'teams' => (new Team())->all(),
            'groups' => (new Group())->all(),
        ]);
    }

    public function store(): void
    {
        (new Team())->create($_POST['name'], (int) $_POST['group_id'], $_POST['continent']);
        $this->redirect('controller=team&action=index');
    }

    public function update(): void
    {
        (new Team())->update((int) $_POST['id'], $_POST['name'], (int) $_POST['group_id'], $_POST['continent']);
        $this->redirect('controller=team&action=index');
    }

    public function delete(): void
    {
        (new Team())->delete((int) $_GET['id']);
        $this->redirect('controller=team&action=index');
    }
}
