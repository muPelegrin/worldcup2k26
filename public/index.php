<?php

$controllerName = $_GET['controller'] ?? 'team';
$action = $_GET['action'] ?? 'index';

$controllerMap = [
    'team' => 'TeamController',
    'user' => 'UserController',
    'group' => 'GroupController',
    'match' => 'MatchController',
    'standing' => 'StandingController',
];

if (!isset($controllerMap[$controllerName])) {
    http_response_code(404);
    exit('Controller não encontrado');
}

require_once __DIR__ . '/../app/controllers/' . $controllerMap[$controllerName] . '.php';

$controllerClass = $controllerMap[$controllerName];
$controller = new $controllerClass();

if (!method_exists($controller, $action)) {
    http_response_code(404);
    exit('Ação não encontrada');
}

$controller->{$action}();
