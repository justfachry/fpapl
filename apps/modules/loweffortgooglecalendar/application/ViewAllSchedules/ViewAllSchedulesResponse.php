<?php

namespace loweffortgooglecalendar\Application\ViewAllSchedule;

class ViewAllScheduleResponse
{
    protected $data;

    public function __construct($schedules)
    {
        $data = [];

        foreach ($schedules as $schedule)
        {
//            $data[$idea['id']]
        }
    }
}