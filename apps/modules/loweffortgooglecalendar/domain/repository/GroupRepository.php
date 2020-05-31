<?php

namespace loweffortgooglecalendar\Domain\Repository\GroupRepository;

use loweffortgooglecalendar\Domain\Model\Group;

interface GroupRepository
{
    public function MakeGroup();
    public function AddMember();
}