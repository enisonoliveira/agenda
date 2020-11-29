<?php

namespace ContactApp\SDK\context;

use Exception;

class Users  
{

    private $idusers;
    private $personsId;
    private $password = "";
    private $email = "";
    private $csfr_token = "";
    private $ip = "";

    public function setId($idusers)
    {
        if (!is_numeric($idusers)) {
            throw new Exception('setContactId must be a numeric!');
        }
        $this->idusers= $idusers;
        return $this;
    }

    public function getId()
    {
        return $this->idusers;
    }

    public function getPersonsId()
    {
        return $this->personsId;
    }

    public function setPersonsId($personsId)
    {
        if (!is_numeric($personsId)) {
            throw new Exception('setPersonsId must be a numeric!');
        }
        $this->personsId = $personsId;
        return $this;
    }

   

      public function getPhone()
    {
        return $this->phone;
    }

    public function setPhone($phone)
    {
        if (!is_numeric($phone)) {
            throw new Exception('setPhone must be a numeric!');
        }
        if (strlen($phone) >= 8) {
            throw new Exception('setPhone must be less than 8 characters');
        }
        $this->phone = $phone;
        return $this;
    }

    public function run()
    {
        return get_object_vars($this);
    }

}