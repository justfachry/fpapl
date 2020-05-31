<?php

namespace loweffortgooglecalendar;

use Phalcon\DiInterface;
use Phalcon\Loader;
use Phalcon\Mvc\ModuleDefinitionInterface;

class Module implements ModuleDefinitionInterface
{
    public function registerAutoloaders(DiInterface $di = null)
    {
        $loader = new Loader();

        $loader->registerNamespaces([
            'loweffortgooglecalendar\Domain\Model' => __DIR__ . '/domain/model',   
            'loweffortgooglecalendar\Domain\Repository' => __DIR__ . '/domain/repository',
            'loweffortgooglecalendar\Domain\Transport' => __DIR__ . '/domain/transport',
            'loweffortgooglecalendar\Domain\Exception' => __DIR__ . '/domain/exception',
            'loweffortgooglecalendar\Infrastructure\Persistence' => __DIR__ . '/infrastructure/persistence',
            'loweffortgooglecalendar\Infrastructure\Transport' => __DIR__ . '/infrastructure/transport',
            'loweffortgooglecalendar\Application' => __DIR__ . '/application',
            'loweffortgooglecalendar\Presentation\Controllers\Web' => __DIR__ . '/presentation/controllers/web',
            'loweffortgooglecalendar\Presentation\Controllers\Api' => __DIR__ . '/presentation/controllers/api',
            'loweffortgooglecalendar\Presentation\Controllers\Validators' => __DIR__ . '/presentation/controllers/validators',
        ]);

        $loader->register();
    }

    public function registerServices(DiInterface $di = null)
    {
        $moduleConfig = require __DIR__ . '/config/config.php';

        $di->get('config')->merge($moduleConfig);

        include_once __DIR__ . '/config/services.php';
        include_once  __DIR__ . '/config/register-events.php';
    }

}