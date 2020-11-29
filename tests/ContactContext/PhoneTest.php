<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

use ContactApp\SDK\context\Phone As Phone;
use ContactApp\SDK\services\PhoneService As PhoneService;

class PhoneTest extends TestCase
{
    public function testClassArrayTest()
    {
        $phone= new Phone(null);
        $phone->setId("1")
            ->setContactId("123")
            ->setPhoneNumber(5547999665396);
        $value="1";
        $this->assertContains($value, $phone->run(), "testArray doesn't contains 1 as value") ; 
        $value="123";
        $this->assertContains($value, $phone->run(), "testArray doesn't contains 123 as value") ; 
        $value=5547999665396;
        $this->assertContains($value, $phone->run(), "testArray doesn't contains 5547999665396 as value") ; 
    }

    public function testAttributeClassTest()
    {
        $phone= new Phone(null);
        $value="idphone";
        $this->assertArrayHasKey($value, $phone->run(), "testArray doesn't contains id as value") ; 
        $value="contact_id";
        $this->assertArrayHasKey($value, $phone->run(), "testArray doesn't contains contact_id as value") ; 
        $value="number";
        $this->assertArrayHasKey($value, $phone->run(), "testArray doesn't contains number as value") ; 
    }


}
