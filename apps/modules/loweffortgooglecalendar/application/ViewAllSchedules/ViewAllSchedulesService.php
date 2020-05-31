<?php

namespace loweffortgooglecalendar\Application\ViewScheduleIdeas;

use loweffortgooglecalendar\Application\ScheduleMapper;
use loweffortgooglecalendar\Domain\Repository\ScheduleRepository;

class ViewAllScheduleService
{
    protected $repository;

    public function __construct(ScheduleRepository $repository)
    {
        $this->repository = $repository;
    }

    public function handle()
    {
        $schedules = $this->repository->allSchedules();

        return new ScheduleMapper($ideas);
    }
}