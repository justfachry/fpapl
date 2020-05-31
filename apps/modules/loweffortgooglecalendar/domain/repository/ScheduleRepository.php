<?php

namespace loweffortgooglecalendar\Domain\Repository;

use loweffortgooglecalendar\Domain\Model\Schedule;
use loweffortgooglecalendar\Domain\Model\ScheduleId;

interface ScheduleRepository
{
    public function byId(ScheduleId $id);
    public function save(Schedule $schedule);
    public function allShedules();
}