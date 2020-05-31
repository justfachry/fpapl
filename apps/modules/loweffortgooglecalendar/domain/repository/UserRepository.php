<?php

namespace loweffortgooglecalendar\Domain\Repository;
use loweffortgooglecalendar\Domain\Model\User;

interface UserRepository
{
    public function findUser($email, $password):User;
    public function register($name, $email, $password);
}