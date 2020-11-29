<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

use ContactApp\SDK\context\Persons As Persons;
use ContactApp\SDK\services\PersonsService As PersonsService;

class PersonsTest extends TestCase
{
   
    public function testClassArrayTest()
    {
        $persons= new Persons(null);
        $persons->setId("1")
            ->setAddressId("2")
            ->setName("Enison Oliveira")
            ->setEmail("enisonoliveira@hotmail.com");
        $value="1";
        $this->assertContains($value, $persons->run(), "testArray doesn't contains 1 as value") ;
        $value="2";
        $this->assertContains($value, $persons->run(), "testArray doesn't contains 2 as value") ; 
        $value="Enison Oliveira";
        $this->assertContains($value, $persons->run(), "testArray doesn't contains Enison Oliveira as value") ; 
        $value="enisonoliveira@hotmail.com";
        $this->assertContains($value, $persons->run(), "testArray doesn't contains enisonoliveira@hotmail.com as value") ; 
    }

    public function testAttributeClassTest()
    {
        $persons= new Persons(null);
        $value="idpersons";
        $this->assertArrayHasKey($value, $persons->run(), "testArray doesn't contains idpersons as attribute") ;
        $value="name";
        $this->assertArrayHasKey($value, $persons->run(), "testArray doesn't contains name as attribute") ; 
        $value="email";
        $this->assertArrayHasKey($value, $persons->run(), "testArray doesn't contains Enison Oliveira as attribute") ; 
        $value="address_id";
        $this->assertArrayHasKey($value, $persons->run(), "testArray doesn't contains enisonoliveira@hotmail.com as attribute") ; 
    }


}
