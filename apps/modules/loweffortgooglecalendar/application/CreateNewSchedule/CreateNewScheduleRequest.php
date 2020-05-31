<?php

namespace loweffortgooglecalendar\Application\CreateNewSchedule;

class CreateNewScheduleRequest
{
    public $scheduleTitle;
    public $scheduleDescription;
    public $userName;
    public $scheduleDate;

    public function __construct($scheduleTitle, $scheduleDescription, $userName, $scheduleDate)
    {
        $this->scheduleTitle = $scheduleTitle;
        $this->scheduleDescription = $scheduleDescription;
        $this->userName = $userName;
        $this->scheduleDate = $scheduleDate;
    }

    /**
     * @return mixed
     */
    public function getScheduleTitle()
    {
        return $this->scheduleTitle;
    }

    /**
     * @param mixed $scheduleTitle
     */
    public function setScheduleTitle($scheduleTitle)
    {
        $this->scheduleTitle = $scheduleTitle;
    }

    /**
     * @return mixed
     */
    public function getScheduleDescription()
    {
        return $this->scheduleDescription;
    }

    /**
     * @param mixed $scheduleDescription
     */
    public function setScheduleDescription($scheduleDescription)
    {
        $this->scheduleDescription = $scheduleDescription;
    }

    /**
     * @return mixed
     */
    public function getUserName()
    {
        return $this->userName;
    }

    /**
     * @param mixed $userName
     */
    public function setUserName($userName)
    {
        $this->userName = $userName;
    }

    /**
     * @return mixed
     */
    public function getScheduleDate()
    {
        return $this->scheduleDate;
    }

    /**
     * @param mixed $scheduleDate
     */
    public function setScheduleDate($scheduleDate)
    {
        $this->scheduleDate = $scheduleDate;
    }

}