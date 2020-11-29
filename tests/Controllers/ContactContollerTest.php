<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ContactControllerTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function testSaveTest()
    {
        $json=json_encode([["number"=>47999665396],["number"=>47999665311]]);
        $inputs=array('name' => 'Enison Oliveira','email'=>'enisonoliveira@hotmail.com',"address"=>"rua%20caramuru","address2"=>"floresta","city"=>"joinville","postalCode"=>"1212","country"=>"br","state"=>"sc",'phones'=>$json);
        $response = $this->post('/contact/save',$inputs);
        $response->assertStatus(200);
    }

    public function testReportWithPhoneTest()
    {
        $response = $this->get('/contact/report/withphone');
        $response->assertSuccessful();
    }

    public function testReportWithOutTest()
    {
        $response =  $this->get('/contact/report/withoutphone');
        $response->assertSuccessful();
    }
}
