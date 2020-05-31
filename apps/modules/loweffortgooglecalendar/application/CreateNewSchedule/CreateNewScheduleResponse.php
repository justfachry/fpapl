<?php

namespace loweffortgooglecalendar\Application\CreateNewSchedule;

use loweffortgooglecalendar\Application\GenericResponse;

class CreateNewScheduleResponse extends GenericResponse
{
    public function __construct($data, $message, $code = 200, $error = null)
    {
        parent::__construct($data, $message, $code, $error);
    }
}