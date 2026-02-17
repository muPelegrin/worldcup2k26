<?php

require_once __DIR__ . '/BaseController.php';
require_once __DIR__ . '/../models/Group.php';

class GroupController extends BaseController
{
    public function index(): void
    {
        $groupModel = new Group();
        $groups = $groupModel->all();
        foreach ($groups as &$group) {
            $group['teams'] = $groupModel->teamsByGroup((int) $group['id']);
        }

        $this->render('groups/index', ['groups' => $groups]);
    }

    public function store(): void
    {
        (new Group())->create($_POST['code']);
        $this->redirect('controller=group&action=index');
    }

    public function update(): void
    {
        (new Group())->update((int) $_POST['id'], $_POST['code']);
        $this->redirect('controller=group&action=index');
    }

    public function delete(): void
    {
        (new Group())->delete((int) $_GET['id']);
        $this->redirect('controller=group&action=index');
    }
}
