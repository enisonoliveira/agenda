<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

use ContactApp\SDK\context\Address As Address;
use ContactApp\SDK\services\AddressService As AddressService;

class AddressTest extends TestCase
{
   
    public function testClassArrayTest()
    {
        $address= new Address(null);
        $address->setId("1")
            ->setAddress("Rua Caramuru-31")
            ->setAddress2("Bairro das rosalia")
            ->setCity("Joinville")
            ->setPostalCode("123456-123")
            ->setState("SC");
        $value="1";
        $this->assertContains($value, $address->run(), "testArray doesn't contains 1 as value") ;
        $value="Rua Caramuru-31";
        $this->assertContains($value, $address->run(), "testArray doesn't contains Rua Caramuru-31 as value") ; 
        $value="Joinville";
        $this->assertContains($value, $address->run(), "testArray doesn't contains Joinville as value") ; 
        $value="Bairro das rosalia";
        $this->assertContains($value, $address->run(), "testArray doesn't contains Bairro das rosalia as value") ; 
        $value="SC";
        $this->assertContains($value, $address->run(), "testArray doesn't contains SC as value") ; 
        $value="123456-123";
        $this->assertContains($value, $address->run(), "testArray doesn't contains 123456-123 as value") ; 
    }

    public function testAttributeClassTest()
    {
        $address= new Address(null);
        $value="idaddress";
        $this->assertArrayHasKey($value, $address->run(), "testArray doesn't contains id as key") ;
        $value="street";
        $this->assertArrayHasKey($value, $address->run(), "testArray doesn't contains address as key") ; 
        $value="neighborhood";
        $this->assertArrayHasKey($value, $address->run(), "testArray doesn't contains address2 as key") ; 
        $value="city";
        $this->assertArrayHasKey($value, $address->run(), "testArray doesn't contains city as key") ; 
        $value="state";
        $this->assertArrayHasKey($value, $address->run(), "testArray doesn't contains state as key") ; 
        $value="zip";
        $this->assertArrayHasKey($value, $address->run(), "testArray doesn't contains postalCode as key") ; 
    }


}
