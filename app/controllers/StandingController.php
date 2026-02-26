<?php

require_once __DIR__ . '/BaseController.php';
require_once __DIR__ . '/../models/Standing.php';
require_once __DIR__ . '/../models/Group.php';

class StandingController extends BaseController
{
    public function index(): void
    {
        $groupModel = new Group();
        $groups = $groupModel->all();

        $tables = [];
        $standingModel = new Standing();
        foreach ($groups as $group) {
            $tables[$group['id']] = $standingModel->byGroup((int) $group['id']);
        }

        $this->render('standings/index', [
            'groups' => $groups,
            'tables' => $tables,
        ]);
    }
}
