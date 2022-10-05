<?php

namespace controller;

use model\User;

class UserContr extends User
{
    public function __construct()
    {
    }

    public function getUserEmailList()
    {

        $results = $this->getUserEmails();
        return $results;
    }
}
