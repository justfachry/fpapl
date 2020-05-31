<?php

namespace loweffortgooglecalendar\Infrastructure\Persistence;
use loweffortgooglecalendar\Domain\Model\User;
use loweffortgooglecalendar\Domain\Repository\UserRepository;

class SqlUserRepository implements UserRepository
{
    protected $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function findUser($email, $password):User
    {
        $sql = "SELECT * FROM User WHERE email = :email and password = :password";

        $result = $this->db->fetchOne($sql, \Phalcon\Db::FETCH_ASSOC, [
            'email' => $email,
            'password' => $password
        ]);

        $user = new User(
            $result['id'],
            $result['name'],
            $result['email'],
            $result['password']
        );

        return $user;
    }

    public function register($name, $email, $password)
    {
        $sql = "INSERT INTO User(name, email, password) VALUES(:name, :email, :password)";

        $this->db->query($sql, [
            'name' => $name,
            'email' => $email,
            'password' => $password
        ]);
    }

}