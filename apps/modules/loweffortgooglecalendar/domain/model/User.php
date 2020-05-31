<?php

namespace Idy\Idea\Domain\Model;

use Idy\Idea\Domain\Exception\InvalidEmailDomainException;

class User
{
    const EMAIL_PATTERN = "/^([a-zA-Z0-9_\-\.]+)@[a-zA-Z0-9\.]*idy\.local$/";

    private $id;
    private $name;
    private $email;
    private $password;

    /**
     * Author constructor.
     * @param $name
     * @param $email
     * @throws InvalidEmailDomainException
     */
    public function __construct(UserID $id, $name, $email, $password)
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;

        $this->isEmailAllowed();
    }

    public function getId() : UserId
    {
        return $this->id;
    }

    public function name()
    {
        return $this->name;
    }

    public function email()
    {
        return $this->email;
    }

    public function password()
    {
        return $this->password;     
    }    
    public function isEmailAllowed()
    {
        if (preg_match(self::EMAIL_PATTERN, $this->email)) {
            return true;
        }

        throw new InvalidEmailDomainException('user email domain must end in @idy.local');
    }

}