<?php

namespace loweffortgooglecalendar\Application;


use loweffortgooglecalendar\Domain\Model\User;
use loweffortgooglecalendar\Domain\Model\Schedule;
use loweffortgooglecalendar\Domain\Model\ScheduleId;
use loweffortgooglecalendar\Domain\Model\Date;

class ScheduleMapper
{
    /**
     * @var Schedule[]
     */
    protected $schedule = [];

    public function __construct(array $ideas)
    {
        foreach ($schedules as $schedule)
        {
            $user = new User($schedule['user_name']);
            $scheduleId = new scheduleId($schedule['id']);
            $date = new Date($schedule['date']);
            $this->ideas[$schedule['id']] = new Schedule($scheduleId, $schedule['title'], $schedule['description'], $user, $date);
        }
    }

    /**
     * @return Schedule[]
     */
    public function get() : array
    {
        return $this->ideas;
    }
}