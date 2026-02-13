<?php

class BaseController
{
    protected function render(string $view, array $data = []): void
    {
        extract($data);
        require __DIR__ . '/../views/layout/header.php';
        require __DIR__ . '/../views/' . $view . '.php';
        require __DIR__ . '/../views/layout/footer.php';
    }

    protected function redirect(string $route): void
    {
        header('Location: index.php?' . $route);
        exit;
    }
}
