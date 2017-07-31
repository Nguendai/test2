<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Members;
class MembersControll extends Controller
{
  public function getList(){
    return Members::orderBy('id','DESC')->get();
  }
  public function postAdd(Request $req){
    // return $req->name;

    if($req->file('file')){ 
	    $file=$req->file;
      $this->validate($req,[
        'name' =>'required|max:100',
        'age'=>'required|digits_between:1,2|numeric',
        'address'=>'required|max:300',
        'file' =>'nullable|mimes:png,gif,jpg,jpeg|max:10000',
      ]);
      // $this->validate($req,[
      //   'file' =>'nullable|mimes:png,gif,jpg,jpeg|max:10000',
      // ]);
      $path = 'upload/images';
      $fileName = time()."-".$file->getClientOriginalName();
      $file->move($path , $fileName); 
      $file = $fileName;
      $members= new Members();
      $members->name=$req->name;
      $members->age=$req->age;
      $members->address=$req->address;
      $members->images=$file;
      $members->save();
    }else{
       $this->validate($req,[
        'name' =>'required|max:100',
        'age'=>'required|digits_between:1,2|numeric',
        'address'=>'required|max:300',
        ]);
      $members= new Members();
      $members->name=$req->name;
      $members->age=$req->age;
      $members->address=$req->address;
      $members->images="zalo20.jpg";
      $members->save();
    } 
    	return Members::orderBy('id','DESC')->get();
  }
  public function getEdit($id){
    $member= Members::find($id);
    return $member;
  }
  public function postEdit(Request $req, $id){
    $member=Members::find($id);
      $this->validate($req,[
      'name' =>'required|max:100',
      'age'=>'required|digits_between:1,2|numeric',
      'address'=>'required|max:300',
    ]);
    if($req->file('file')){
       $file=$req->file;
      $this->validate($req,[
        'file' =>'required|mimes:png,gif,jpg,jpeg|max:10000',
      ]);
       $path = 'upload/images';
       $fileName = time()."-".$file->getClientOriginalName();
       $file->move($path , $fileName); 
       $file = $fileName;
       $member->name=$req->name;
       $member->age=$req->age;
       $member->address=$req->address;
       $member->images=$file;
       $member->save();
     }else{
       $member->name=$req->name;
       $member->age=$req->age;
       $member->address=$req->address;
       $member->save();
     }
     return Members::orderBy('id','DESC')->get();
  }
  public function postDelete($id){
    $member=Members::find($id);
    $member->delete();
    return Members::orderBy('id','DESC')->get();
  }
}
