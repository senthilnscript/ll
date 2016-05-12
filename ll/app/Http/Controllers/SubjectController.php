<?php

namespace App\Http\Controllers;
use DB;

use Illuminate\Http\Request;
use App\Http\Requests\SubjectRequest;
use App\Repositories\SubjectRepository;

class SubjectController extends Controller {

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
		$class=DB::table('subject')->get();
		return $this->ar_to_js(array('data'=>$class));
	}

	/*** to insert a record ***/
	public function store()
	{
		$result=array("status"=>false,"message"=>"Provide All Values");
		if(isset($_POST['name'],$_POST['description'])&&$_POST['name']!='')
		{
			$class=DB::table('subject')->where('name', $_POST['name'])->get();
			if(empty($class))
			{
				$cl=DB::table('subject')->insert(['name' => $_POST['name'], 'description' => $_POST['description'],'created_at'=>date("Y-m-d H:i:s"),'updated_at'=>date("Y-m-d H:i:s")]);
				$result=array("status"=>true,"message"=>"success");
			}
			else
			{
				$result=array("status"=>false,"message"=>"Data Already Exists");
			}
		}
		return $this->ar_to_js($result);
		
	}

	/*** to update a record ***/
	public function update($id)
	{
		$values=urldecode(file_get_contents("php://input"));
		$vales=explode("&",$values);
		$dat=array();
		foreach($vales as $vl)
		{
			$v=explode("=",$vl);
			$dat[$v[0]]=$v[1];
		}
		$result=array("status"=>false,"message"=>"Provide All Values");
		if(isset($dat['name'],$dat['description'])&&$dat['name']!='')
		{
			$contact=DB::table('subject')->where('id', $id)->get();
			if(isset($contact[0])&&!empty($contact[0]))
			{
				$class=DB::table('subject')->where('name', $dat['name']) ->whereNotIn('id', [$id])->get();
				if(empty($class))
				{
					$cl=DB::table('subject')->where('id', $id)->update(['name' => $dat['name'], 'description' => $dat['description'],'updated_at'=>date("Y-m-d H:i:s")]);
					$result=array("status"=>true,"message"=>"success");
				}
				else
				{
					$result=array("status"=>false,"message"=>"Data Already Exists");
				}
			}
			else
			{
				$result=array("status"=>false,"message"=>"Id Not Available");
			}
		}
		return $this->ar_to_js($result);
	}

	/*** to list a singole record ***/
	public function show($id)
	{
		$contact=DB::table('subject')->where('id', $id)->first();
		return $this->ar_to_js($contact);
	}

	/*** to list a delete record ***/
	public function destroy($id)
	{
		$contact=DB::table('subject')->where('id', $id)->delete();;
	}


}
