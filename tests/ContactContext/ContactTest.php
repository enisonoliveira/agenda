<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

use ContactApp\SDK\context\Contact As Contact;
use ContactApp\SDK\services\ContactService As ContactService;
use ContactApp\SDK\context\Phone As Phone;

class ContactTest extends TestCase
{
    public function testClassArrayTest()
    {
        $contact= new Contact(null);
        $contact->setId("1")
            ->setPersonsId("123");
            
        $value="1";
        $this->assertContains($value, $contact->run(), "testArray doesn't contains 1 as value") ; 
        $value="123";
        $this->assertContains($value, $contact->run(), "testArray doesn't contains 123 as value") ; 
        $value=5547999665396;
    }

    public function testAttributeClassTest()
    {
        $contact= new Contact(null);
        $value="idcontact";
        $this->assertArrayHasKey($value, $contact->run(), "testArray doesn't contains id as value") ; 
        $value="persons_id";
        $this->assertArrayHasKey($value, $contact->run(), "testArray doesn't contains persons_id as value") ; 
    }

    public function testPhoneListTest()
    {
        $array= array(array("idphone"=>"1","contact_id"=>"1","number"=>"479999912312")
                    ,array("idphone"=>"2","contact_id"=>"1","number"=>"479999912311"));
        $contact= new Contact(null);
        $contact=self::addPhoneList($array,$contact);
        $array=$contact->getListPhone();
        $value="479999912312";
        $this->assertContains($value, $array[0], "testArray doesn't contains 479999912312 as value") ; 
        $value="479999912311";
        $this->assertContains($value, $array[1], "testArray doesn't contains 479999912311 as value") ; 

    }


    public function addPhoneList($array,$contact)
    {
       
        foreach($array as $phoneList){
            $phone= new Phone(null);
            $phone->setId($phoneList['idphone'])
                ->setContactId($phoneList['contact_id'])
                ->setPhoneNumber($phoneList['number']);
            $contact->addPhoneList($phone->run());
        }  
        $contact->setId("1")
        ->setPersonsId("123");
        return $contact;  
    }

}
