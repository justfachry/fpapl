<?php

namespace Idy\Idea\Presentation\Controllers\Web;

use loweffortgooglecalendar\Application\CreateNewIdea\CreateNewScheduleRequest;
use loweffortgooglecalendar\Application\CreateNewIdea\CreateNewScheduleService;
use loweffortgooglecalendar\Application\ViewAllIdeas\ViewAllSchedulesService;
use Phalcon\Mvc\Controller;

class ScheduleController extends Controller
{
    /**
     * @var ViewAllSchedulesService $viewAllSchedulesService
     */
    protected $viewAllSchedulesService;
    /**
     * @var CreateNewScheduleService $createNewScheduleService
     */
    protected $createNewScheduleService;

    public function initialize()
    {
        $this->viewAllSchedulesService = $this->di->get('viewAllSchedulesService');
        $this->createNewIdeaService = $this->di->get('createNewScheduleService');
    }

    protected function send($data, $code = 200, $message = 'OK')
    {
        $this->response->setContentType('application/json');

        $json = json_encode($data, JSON_PRETTY_PRINT);

        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new \RuntimeException('Failed to convert server response to JSON: ' . json_last_error_msg());
        }

        $this->response->setStatusCode($code, $message);
        $this->response->setContent($json);
        $this->response->send();
    }

    public function indexAction()
    {
        $response = $this->viewAllScheduleService->handle();
        $this->view->schedules = $response->get();

        return $this->view->pick('home');
    }

    public function addPageAction()
    {
        return $this->view->pick('add');
    }

    public function addAction()
    {
        $scheduleTitle = $this->request->getPost('scheduleTitle');
        $scheduleDescription = $this->request->getPost('scheduleDescription');
        $userName = $this->request->getPost('userName');
        $scheduleDate = $this->request->getPost('scheduleDate');

        $request = new CreateNewScheduleRequest($scheduleTitle, $scheduleDescription, $userName, $scheduleDate);
        $response = $this->createNewScheduleService->handle($request);

        $response->getError()
            ? $this->flashSession->error($response->getMessage())
            : $this->flashSession->success($response->getMessage());

        return $this->response->redirect('');

    }

}