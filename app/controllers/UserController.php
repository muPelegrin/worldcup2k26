<?php

require_once __DIR__ . '/BaseController.php';
require_once __DIR__ . '/../models/User.php';
require_once __DIR__ . '/../models/Team.php';

class UserController extends BaseController
{
    public function index(): void
    {
        $this->render('users/index', [
            'users' => (new User())->all(),
            'teams' => (new Team())->all(),
        ]);
    }

    public function store(): void
    {
        (new User())->create($_POST['name'], (int) $_POST['age'], (int) $_POST['team_id'], $_POST['role']);
        $this->redirect('controller=user&action=index');
    }

    public function update(): void
    {
        (new User())->update((int) $_POST['id'], $_POST['name'], (int) $_POST['age'], (int) $_POST['team_id'], $_POST['role']);
        $this->redirect('controller=user&action=index');
    }

    public function delete(): void
    {
        (new User())->delete((int) $_GET['id']);
        $this->redirect('controller=user&action=index');
    }
}
