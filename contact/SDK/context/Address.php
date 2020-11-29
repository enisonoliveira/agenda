<?php

namespace ContactApp\SDK\context;

use Exception;

class Address
{
    private $idaddress;
    private $street = "";
    private $neighborhood = "";
    private $city = "";
    private $state = "";
    private $zip = "";
    private $number = "1234";

    public function __construct($array) 
    {
        if($array){
            $this->idaddress=$arra['idaddress'];    
            $this->street=$arra['street'];
            $this->neighborhood=$arra['neighborhood'];
            $this->city=$arra['city'];
            $this->state=$arra['state'];
            $this->zip=$arra['zip'];
            $this->number=$arra['number'];
        }
    }
    
    public function setId($idaddress)
    {
        if (!is_numeric($idaddress)) {
            throw new Exception('setContactId must be a numeric!');
        }
        $this->idaddress= $idaddress;
        return $this;
    }

    public function getId()
    {
        return $this->idaddress;
    }


    public function getAddress()
    {
        return $this->street;
    }

    public function setAddress($street)
    {
        if (!is_string($street)) 
        {
            throw new Exception('setAddress must be a string!');
        }
        if (strlen($street) >= 150)
         {
            throw new Exception('setAddress must be less than 150 characters');
        }
        $this->street = $street;
        return $this;
    }

    public function getAddress2()
    {
        return $this->neighborhood;
    }

    public function setAddress2($neighborhood)
    {
        if (!is_string($neighborhood))
         {
            throw new Exception('setAddress2 must be a string!');
        }
        if (strlen($neighborhood) >= 150)
         {
            throw new Exception('setAddress2 must be less than 150 characters');
        }
        $this->neighborhood = $neighborhood;
        return $this;
    }

    public function getCity()
    {
        return $this->city;
    }

    public function setCity($city)
    {
        if (!is_string($city)) {
            throw new Exception('setCity must be a string!');
        }
        if (strlen($city) >= 50) {
            throw new Exception('setCity must be less than 50 characters');
        }
        $this->city = $city;
        return $this;
    }

    public function getState()
    {
        return $this->state;
    }

    public function setState($state)
    {
        if (!is_string($state)) {
            throw new Exception('setState must be a string!');
        }
        if (strlen($state) >= 50) {
            throw new Exception('setState must be less than 50 characters');
        }
        $this->state = $state;
        return $this;
    }

    public function getPostalCode()
    {
        return $this->zip;
    }


    public function setPostalCode($zip)
    {
        if (!is_string($zip)) {
            throw new Exception('setPostalCode must be a string!');
        }
        if (strlen($zip) >= 15) {
            throw new Exception('setPostalCode must be less than 15 characters');
        }
        $this->zip = $zip;
        return $this;
    }

    public function run()
    {
        return get_object_vars($this);
    }

   
}