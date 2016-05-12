<?php

namespace App\Http\Controllers;
use DB;

use Illuminate\Http\Request;
use App\Http\Requests\ClassRequest;
use App\Repositories\ClassRepository;

class ClassController extends Controller {

    public function __construct()
	{
	}
	/*** to convert array to json ***/
	public function ar_to_js($ar)
	{
		$json=json_encode($ar,true);
		return $json;
	}
	/*** to list all values ***/
	public function index()
	{
		$class=DB::table('class')->get();
		return $this->ar_to_js($class);
	}
	/*** to insert a record ***/
	public function store()
	{
		DB::table('contacts')->insert(
    		['name' => $_POST['name'], 'email' => $_POST['email'],'text'=>$_POST['text']]
		);
	}
	/*** to update a record ***/
	public function update($id)
	{
		DB::table('contacts') ->where('id', $id)->update(
    		['name' => $_POST['name'], 'email' => $_POST['email'],'text'=>$_POST['text']]
		);
	}
	/*** to update a record ***/
	public function edit($id)
	{
		DB::table('contacts') ->where('id', $id)->update(
    		['name' => $_REQUEST['name'], 'email' => $_REQUEST['email'],'text'=>$_REQUEST['text']]
		);
	}
	/*** to list a singole record ***/
	public function show($id)
	{
		$contact=DB::table('contacts')->where('id', $id)->first();
		return $this->ar_to_js($contact);
	}
	/*** to list a delete record ***/
	public function destroy($id)
	{
		$contact=DB::table('contacts')->where('id', $id)->delete();;
	}


}
