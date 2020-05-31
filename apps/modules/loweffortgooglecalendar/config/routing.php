<?php

$namespace = 'loweffortgooglecalendar\Presentation\Controllers\Web';
$module = 'schedule';

$router->addGet('/schedule/add', [
    'namespace' => $namespace,
    'module' => $module,
    'controller' => 'schedule',
    'action' => 'addPage'
]);

$router->addPost('/schedule/add', [
    'namespace' => $namespace,
    'module' => $module,
    'controller' => 'schedule',
    'action' => 'add'
]);

return $router;
