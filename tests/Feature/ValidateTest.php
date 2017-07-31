<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ValidateTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * A basic test example.
     *
     * @return void
     */

    public function testValidateName(){
    	$data=[
    		'name'=> '12345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678911',
    		'address'=>'hanoi',
    		'age'=>'20',
    	];
    	$response=$this->call('POST', 'add', $data);
    	$this->assertDatabaseMissing('members', [
            'name' => $data['name'],
            'address' => $data['address'],
            'age' => $data['age'],
        ]);


    }
    public function testValidateName100Char(){
        $data=[
            'name'=> '1234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890',
            'address'=>'hanoi',
            'age'=>'20',
        ];
        $response=$this->call('POST', 'add', $data);
        $this->assertDatabaseHas('members', [
            'name' => $data['name'],
            'address' => $data['address'],
            'age' => $data['age'],
        ]);
    }
    public function testValidateNameNull(){
        $data=[
            'name'=> '',
            'address'=>'hanoi',
            'age'=>'20',

        ];
        $response=$this->call('POST', 'add', $data);
        $this->assertDatabaseMissing('members', [
            'name' => $data['name'],
            'address' => $data['address'],
            'age' => $data['age'],
        ]);
    }
    public function testValidateAddressNull(){
        $data=[
            'name'=> 'nguyendai',
            'address'=>'',
            'age'=>'20',
        ];
        $response=$this->call('POST', 'add', $data);
        $this->assertDatabaseMissing('members', [
            'name' => $data['name'],
            'address' => $data['address'],
            'age' => $data['age'],
        ]);

    }
    public function testValidateAddress(){
    	$data=[
    		'name'=> 'nguêndai',
    		'address'=>'123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789111234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567891112345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678911',
    		'age'=>'20',

    	];
    	$response=$this->call('POST', 'add', $data);
    	$this->assertDatabaseMissing('members', [
            'name' => $data['name'],
            'address' => $data['address'],
            'age' => $data['age']
        ]);

    }
    public function testValidateAddress300char(){
        $data=[
            'name'=> 'nguêndai',
            'address'=>'123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890',
            'age'=>'20',

        ];
        $response=$this->call('POST', 'add', $data);
        $this->assertDatabaseHas('members', [
            'name' => $data['name'],
            'address' => $data['address'],
            'age' => $data['age']
        ]);

    }
    public function testValidateAgeNull(){
        $data=[
            'name'=> 'nguyendai',
            'address'=>'hanoi',
            'age'=>'',

        ];
        $response=$this->call('POST', 'add', $data);
        $this->assertDatabaseMissing('members', [
            'name' => $data['name'],
            'address' => $data['address'],
            'age' => $data['age'],
        ]);

    }
    public function testValidateAgeLessThan0(){
        $data=[
            'name'=> 'nguyendai',
            'address'=>'hanoi',
            'age'=>'-10',

        ];
        $response=$this->call('POST', 'add', $data);
        $this->assertDatabaseMissing('members', [
            'name' => $data['name'],
            'address' => $data['address'],
            'age' => $data['age'],
        ]);

    }
    public function testValidateAgeOneNumber(){
        $data=[
            'name'=> 'nguyendai',
            'address'=>'hanoi',
            'age'=>'1',

        ];
        $response=$this->call('POST', 'add', $data);
        $this->assertDatabaseHas('members', [
            'name' => $data['name'],
            'address' => $data['address'],
            'age' => $data['age'],
        ]);

    }
    public function testValidateAge(){
    	$data=[
    		'name'=> 'nguyendai',
    		'address'=>'hanoi',
    		'age'=>'120',
    	];
    	$response=$this->call('POST', 'add', $data);
    	$this->assertDatabaseMissing('members', [
            'name' => $data['name'],
            'address' => $data['address'],
            'age' => $data['age'],
        ]);

    }

}
