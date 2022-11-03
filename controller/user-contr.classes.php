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

    public function getMyProfileByID($userID)
    {

        $results = $this->getMyProfile($userID);
        return $results;
    }
    public function setMyUserProfileByID($userID, $fullName, $email, $mobile, $birthDate)
    {

        $this->setUserProfileByID($userID, $fullName, $email, $mobile, $birthDate);
    }
}