<?php

namespace loweffortgooglecalendar\Domain\Model;

use DateTime;

class  Date
{
    private $date;

    public function __construct(Date $date = null)
    {
        $this->date = $date;
    }

    public function getDate() : Date
    {
        $this->date = $date;
    }
}