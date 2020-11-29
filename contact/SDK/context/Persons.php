<?php

namespace ContactApp\SDK\context;

use Exception;
use  ContactApp\SDK\context\Address As Address;

class Persons
{

    private $idpersons;
    private $name = "";
    private $email = "";
    private $address_id;
    private $avatar;

    public function __construct($array) 
    {
        if($array){
            $this->idpersons=$array['idpersons'];
            $this->name=$array['name'];
            $this->email=$array['email'];
            $this->address_id=$array['address_id'];
            $this->avatar=$array['avatar'];
        }
    }

    public function setId($idpersons)
    {
        if (!is_numeric($idpersons)) {
            throw new Exception('setContactId must be a numeric!');
        }
        $this->idpersons= $idpersons;
        return $this;
    }

    public function getId()
    {
        return $this->idpersons;
    }

    public function getAddress(): Contact\SDK\Adress
    {
       
        return $this->address;
    }

    public function getAddressId()
    {
       
        return $this->address_id;
    }

    public function setAdress(Contact\SDK\Address $address):Addrress
    {
        $this->address_id = $address->id;
        return $this;
    }

    public function setAddressId($address)
    {
        if (!is_numeric($address)) {
            throw new Exception('setaddress must be a string!');
        }
        if (strlen($address) >= 300) {
            throw new Exception('setaddress must be less than 300 characters');
        }
        $this->address_id = $address;
        return $this;
    }

    public function getAvatar()
    {
        return $this->avatar;
    }

    public function setAvatar($avatar)
    {
        $this->avatar = $avatar;
        return $this;
    }


    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        if (!is_string($name)) {
            throw new Exception('setName must be a string!');
        }
        if (strlen($name) >= 70) {
            throw new Exception('setName must be less than 70 characters');
        }
        $this->name = $name;
        return $this;
    }

    public function setEmail($email)
    {
        if (!is_string($email)) {
            throw new Exception('setEmail must be a string!');
        }
        if (strlen($email) >= 150) {
            throw new Exception('setEmail must be less than 150 characters');
        }
        if (empty($email)) {
            $email = null;
        }
        $this->email = $email;
        return $this;
    }

  
    public function run()
    {
        return get_object_vars($this);
    }

}