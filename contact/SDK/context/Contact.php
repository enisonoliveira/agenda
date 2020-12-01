<?php

namespace ContactApp\SDK\context;

use Exception;

class Contact
{

    private $idcontact;
    private $persons_id;
    private $phoneList;

    public function __construct($array) 
    {
        if($array){
            $this->idcontact=$array['idcontact'];
            $this->persons_id=$array['persons_id'];
            $this->phoneList=$array['phoneList'];
        }
    }

    public function setId($idcontact)
    {
        if (!is_numeric($idcontact)) {
            throw new Exception('setContactId must be a numeric!');
        }
        $this->idcontact= $idcontact;
        return $this;
    }

    public function getId()
    {
        return $this->idcontact;
    }

    public function getPersonsId()
    {
        return $this->persons_id;
    }

    public function setPersonsId($persons_id)
    {
       
        $this->persons_id = $persons_id;
        return $this;
    }

    public function addPhoneList($phone)
    {
        $this->phoneList[]=$phone;
        return $this;
    }

    public function getListPhone()
    {
       return  $this->phoneList;
    }

    public function run()
    {
        return get_object_vars($this);
    }

}