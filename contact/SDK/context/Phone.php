<?php

namespace ContactApp\SDK\context;

use Exception;

class Phone 
{

    private $idphone ;
    private $contact_id;
    private $number = "";

    public function setId($idphone)
    {
        if (!is_numeric($idphone)) {
            throw new Exception('setContactId must be a numeric!');
        }
        $this->idphone= $idphone;
        return $this;
    }
   
    public function getId()
    {
        return $this->idphone;
    }

    public function getContactId()
    {
        return $this->contact_id;
    }

    public function setContactId($contact_id)
    {
        if (!is_numeric($contact_id)) {
            throw new Exception('setContactId must be a numeric!');
        }
        $this->contact_id = $contact_id;
        return $this;
    }

     public function getPhoneNumber()
    {
        return $this->number;
    }

    public function setPhoneNumber($number)
    {
        if (strlen($number) <= 7) {
            throw new Exception('setPhone must be less than 8 characters');
        }
        $this->number = $number;
        return $this;
    }

    public function run()
    {
        return get_object_vars($this);
    }

}