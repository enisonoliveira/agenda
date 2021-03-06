<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//Context
use ContactApp\SDK\context\Contact As Contact;
use ContactApp\SDK\context\Persons As Persons;
use ContactApp\SDK\context\Phone As Phone;
use ContactApp\SDK\context\Address As Address;

//services
use ContactApp\SDK\services\ContactService As ContactService;
use ContactApp\SDK\services\PersonService As PersonService;
use ContactApp\SDK\services\PhoneService As PhoneService;
use ContactApp\SDK\services\AddressService As AddressService;

use Session;

class ContactController extends Controller
{
    private $contact;
    private $request;
    private $requestArray;
    private $idcontato;

    public function  __construct(Request $request)
    {
        try
        {
            $this->request=$request;
            $this->contact=new Contact(null);
            $this->requestArray=$this->request->all();
        }catch(Exception $e)
        {
            throw new Exception("error!");
        }
    }

    public function saveContact($id)
    {
        try
        {
            $contactService= new ContactService();
            if($this->request->has('idcontact'))
            {
                $this->contact->setPersonsId($this->request->input('idcontact'));
            }
            $this->contact->setPersonsId($id);
            return $contactService->save($this->contact->run());
        }catch(Exception $e)
        {
            throw new Exception("error!");
        }
    }

    public function savePhoneList()
    {
        try{
            if($this->request->has('phones'))
            {
                $array = json_decode($this->requestArray['phones'],true);
                if($this->request->has('idcontact')){
                    $this->idcontato=$this->request->input('idcontact');
                }
                foreach($array as $phoneList)
                {
                    $phone= new Phone();
                    $phoneService=  new PhoneService();
                    $phoneService->delete($this->idcontato);
                    $phone->setContactId( $this->idcontato)
                        ->setPhoneNumber($phoneList['number']);
                    $phone=$phoneService->save($phone->run());
                    $this->contact->addPhoneList($phone);
                }    
            }
        }catch(Exception $e)
        {
            throw new Exception("error!");
        }
    }

    public function saveAddress()
    {
        try
        {
            $address= new Address(null);
            $AddressService= new AddressService();
            if($this->request->has('idpersons'))
            {
                $address= new Address( $AddressService->find($this->request->input('idAddress')));
            }
            $address->setAddress($this->requestArray['address'])
                ->setAddress2($this->requestArray['address2'])
                ->setCity($this->requestArray['city'])
                ->setPostalCode($this->requestArray['postalCode'])
                ->setState($this->requestArray['state']);
            return $AddressService->save($address->run());
        }catch(Exception $e)
        {
            throw new Exception("error!");
        }
    }

    public function savePersons()
    {
        try
        {
            $person= new Persons(null);
            $personService= new PersonService();
            if($this->request->has('idpersons'))
            {
                $person= new Persons( $personService->find($this->request->input('idpersons')));
            }
            $person->setName($this->requestArray['name'])
                ->setEmail($this->requestArray['email'])
                ->setAddressId(self:: saveAddress())
                ->setAvatar("/app/img/user.png");
            return  $personService->save($person->run());
        }catch(Exception $e)
        {
            throw new Exception("error!");
        }
    }

    public function avatar()
    {
        $personService= new PersonService();
        $destinationPath = public_path("image");
        $idpersons = Session::get('idpersons');
        if ($this->request->hasFile('photo')) 
        {
            $this->request->file('photo')->move($destinationPath, $idpersons . ".png");
            $avatar_path = "image/" . $idpersons . ".png";
        } else 
        {
            $avatar_path = "image/avatar.png";
        }
        $person= new Persons( $personService->find($idpersons));
        $person->setAvatar($avatar_path);
        $personService->save($person->run());
        return \Response::json( ['avatar'=>  $avatar_path], 200);
    }

    public function setIdPersons()
    { 
        $id= $this->requestArray['idpersons'];
         Session::put('idpersons', $id);
    }

    public function save()
    {
        try
        {
            $id=self::savePersons();
            self::saveAddress($id);
            Session::put('idpersons', $id);
            $this->idcontato=self::saveContact($id);
            self::savePhoneList();
            return \Response::json( ['idcontact'=> $this->idcontato,"idpersons"=>$id], 200);
        }catch(Exception $e)
        {
            throw new Exception("error!");
        }
    }

    public function deletePhone()
    {
        try{
            $phoneService=  new PhoneService();
            $phone= $phoneService->find($this->request->input('idcontact'));
            $phoneService->delete($phone->idphone);
            return \Response::json( 'ok', 200);
        }catch(Exception $e)
        {
            throw new Exception("error!");
        }
    }

    public function deleteAdress()
    {

        try{       
             $AddressService= new AddressService();
            $address= $AddressService->find($person->address_id);
            $AddressService->delete($this->request->input('idperson'));
            return \Response::json( 'ok', 200);
        }catch(Exception $e)
        {
            throw new Exception("error!");
        }
    }

    public function delete()
    {
        try
        {
            $contactService= new ContactService();
            $this->contact= $contactService->find($this->request->input('idcontact'));
            $personService= new PersonService();
            $person=$personService->find($this->contact['persons_id']);
            $AddressService= new AddressService();
            $address= $AddressService->find($person['address_id']);
            $phoneService=  new PhoneService();
            $phoneService->delete($this->contact['idcontact']);
            $contactService->delete($this->contact['idcontact']);
            $personService->delete($this->contact['persons_id']);
            if($address)
                $AddressService->delete($address['idaddress']);
            return \Response::json( 'ok', 200);
        }catch(Exception $e)
        {
            throw new Exception("error!");
        }
    }

    public function getReportContactWithPhone()
    {
        try
        {
            $contactService= new ContactService();
            $result = $contactService->findWithPhone();
            return \Response::json( $result , 200);
        }catch(Exception $e)
        {
            throw new Exception("error!");
        }
    }

    public function getReportContactWitOuthPhone()
    {   
        try{
            $contactService= new ContactService();
            $result = $contactService->findWitOuthPhone();
            return \Response::json( $result , 200);
        }catch(Exception $e)
        {
            throw new Exception("error!");
        }
    }

    public function all()
    {
        try{
            $contactService= new ContactService();
            $result = $contactService->all();
            return \Response::json( $result , 200);
        }catch(Exception $e)
        {
            throw new Exception("error!");
        }
    }
}
