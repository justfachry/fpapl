<?php

use loweffortgooglecalendar\Application\CreateNewSchedule\CreateNewScheduleService;
use loweffortgooglecalendar\Application\ViewAllSchedules\ViewAllSchedulesService;
use loweffortgooglecalendar\Infrastructure\Transport\SwiftMailer;
use Phalcon\Mvc\View;
use loweffortgooglecalendar\Infrastructure\Persistence\SqlScheduleRepository;

$di['voltServiceMail'] = function($view) use ($di) {

    $config = $di->get('config');

    $volt = new \Phalcon\Mvc\View\Engine\Volt($view, $di);
    if (!is_dir($config->mail->cacheDir)) {
        mkdir($config->mail->cacheDir);
    }

    $compileAlways = $config->mode == 'DEVELOPMENT' ? true : false;

    $volt->setOptions(array(
        "compiledPath" => $config->mail->cacheDir,
        "compiledExtension" => ".compiled",
        "compileAlways" => $compileAlways
    ));
    return $volt;
};

$di['view'] = function () {
    $view = new View();
    $view->setViewsDir(__DIR__ . '/../views/');

    $view->registerEngines(
        [
            ".volt" => "voltService",
        ]
    );

    return $view;
};

$di['db'] = function () use ($di) {

    $config = $di->get('config');

    $dbAdapter = $config->database->adapter;

    return new $dbAdapter([
        "host" => $config->database->host,
        "username" => $config->database->username,
        "password" => $config->database->password,
        "dbname" => $config->database->dbname
    ]);
};


$di->set('swiftMailerTransport', function ()  use ($di) {
    $config = $di->get('config');
    $transport = (new Swift_SmtpTransport($config->mail->smtp->server, $config->mail->smtp->port))
        ->setUsername($config->mail->smtp->username)
        ->setPassword($config->mail->smtp->password);

    return $transport;
});

$di->set('swiftMailer', function () use ($di) {
    $mailer = new Swift_Mailer($di->get('swiftMailerTransport'));

    return new SwiftMailer($mailer);
});

$di->set('scheduleRepository', function() use ($di) {
    return new SqlScheduleRepository($di->get('db'));
});

$di->set('viewAllSchedulesService', function () use ($di) {
   return new ViewAllSchedulesService($di->get('scheduleRepository'));
});

$di->set('createNewScheduleService', function () use ($di) {
   return new CreateNewScheduleService($di->get('scheduleRepository'));
});
