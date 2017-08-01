<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ValidateEditTest extends TestCase
{
   use DatabaseMigrations;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testValidateEditName(){
        $member = factory(\App\Members::class)->create([
            'name' => 'Test edit',
            'address' => 'localhost',
            'age' => '23',
            'images'=>'',
        ]);
    	$data=[
    		'name'=>"12345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901",
    		'age'=>'12',
    		'address'=>'ha noi',
            'images'=>'',

    	];
    	$reponse=$this->call('POST','edit/'.$member->id,$data);
    	$this->assertDatabaseMissing('members',[
    		'name'=>$data['name'],
    		'age'=>$data['age'],
    		'address'=>$data['address'],
    		]);
    }
    public function testValidateEditName100char(){
        $member = factory(\App\Members::class)->create([
            'name' => 'Test edit',
            'address' => 'localhost',
            'age' => '23',
            'images'=>'',
        ]);
        $data=[
            'name'=>"1234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890",
            'age'=>'12',
            'address'=>'ha noi',
            'images'=>'',

        ];
        $reponse=$this->call('POST','edit/'.$member->id,$data);
        $this->assertDatabaseHas('members',[
            'name'=>$data['name'],
            'age'=>$data['age'],
            'address'=>$data['address'],
            ]);
    }
    public function testValidateEditAge(){
        $member = factory(\App\Members::class)->create([
            'name' => 'Test edit',
            'address' => 'localhost',
            'age' => '23',
            'images'=>'',
        ]);
    	$data=[
    		'name'=>"dung",
    		'age'=>'124',
    		'address'=>'ha noi',
    	];
    	$reponse=$this->call('POST','edit/'.$member->id,$data);
    	$this->assertDatabaseMissing('members',[
    		'name'=>$data['name'],
    		'age'=>$data['age'],
    		]);
    }
    public function testValidateEditAdrress300char(){
        $member = factory(\App\Members::class)->create([
            'name' => 'Test edit',
            'address' => 'localhost',
            'age' => '23',
            'images'=>'',
        ]);
    	$data=[
    		'name'=>"Test edit",
    		'age'=>'12',
    		'address'=>'12345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789011234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890',
    	];
    	$reponse=$this->call('POST','edit/'.$member->id,$data);
    	$this->assertDatabaseMissing('members',[
    		'name'=>$data['name'],
    		'age'=>$data['age'],
    		'address'=>$data['address'],
    		]);
    }
    public function testValidateEditAdrress(){
        $member = factory(\App\Members::class)->create([
            'name' => 'Test edit',
            'address' => 'localhost',
            'age' => '23',
            'images'=>'',
        ]);
        $data=[
            'name'=>"Test edit",
            'age'=>'12',
            'address'=>'123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789011234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890112345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901',
        ];
        $reponse=$this->call('POST','edit/'.$member->id,$data);
        $this->assertDatabaseMissing('members',[
            'name'=>$data['name'],
            'age'=>$data['age'],
            'address'=>$data['address'],
            ]);
    }
    public function testValidateEditNameRequired(){
        $member = factory(\App\Members::class)->create([
            'name' => 'Test edit',
            'address' => 'localhost',
            'age' => '23',
            'images'=>'',
        ]);
    	$data=[
    		'name'=>"",
    		'age'=>'12',
    		'address'=>'ha noi',
    	];
    	$reponse=$this->call('POST','edit/'.$member->id,$data);
    	$this->assertDatabaseMissing('members',[
    		'name'=>$data['name'],
    		'age'=>$data['age'],
    		'address'=>$data['address'],
    		]);
    }
    public function testValidateEditAgeRequired(){
        $member = factory(\App\Members::class)->create([
            'name' => 'Test edit',
            'address' => 'localhost',
            'age' => '23',
            'images'=>'',
        ]);
    	$data=[
    		'name'=>"ok",
    		'age'=>'24',
    		'address'=>'ha noi',
    	];
    	$reponse=$this->call('POST','edit/'.$member->id,$data);
    	$this->assertDatabaseMissing('members',[
    		'name'=>$data['name'],
    		'age'=>$data['age'],
    		'address'=>$data['address'],
    		]);
    }
    public function testValidateEditAddressRequired(){
        $member = factory(\App\Members::class)->create([
            'name' => 'Test edit',
            'address' => 'localhost',
            'age' => '23',
            'images'=>'',
        ]);
    	$data=[
    		'name'=>"ok",
    		'age'=>'12',
    		'address'=>'',
    	];
    	$reponse=$this->call('POST','edit/'.$member->id,$data);
    	$this->assertDatabaseMissing('members',[
    		'name'=>$data['name'],
    		'age'=>$data['age'],
    		'address'=>$data['address'],
    		]);
    }
    public function testValidateEditAgeLessThan0(){
        $member = factory(\App\Members::class)->create([
            'name' => 'Test edit',
            'address' => 'localhost',
            'age' => '23',
            'images'=>'',
        ]);
        $data=[
            'name'=>"ok",
            'age'=>'-12',
            'address'=>'123',
        ];
        $reponse=$this->call('POST','edit/'.$member->id,$data);
        $this->assertDatabaseMissing('members',[
            'name'=>$data['name'],
            'age'=>$data['age'],
            'address'=>$data['address'],
            ]);
    }
    public function testValidateEditAgeOneNumber(){
        $member = factory(\App\Members::class)->create([
            'name' => 'Test edit',
            'address' => 'localhost',
            'age' => '23',
            'images'=>'',
        ]);
        $data=[
            'name'=>"ok",
            'age'=>'2',
            'address'=>'123',
        ];
        $reponse=$this->call('POST','edit/'.$member->id,$data);
        $this->assertDatabaseHas('members',[
            'name'=>$data['name'],
            'age'=>$data['age'],
            'address'=>$data['address'],
            ]);
    }
}
