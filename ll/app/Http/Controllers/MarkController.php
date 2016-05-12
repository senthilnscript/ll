<?php

namespace App\Http\Controllers;
use DB;

use Illuminate\Http\Request;
use App\Http\Requests\MarkRequest;
use App\Repositories\MarkRepository;

class MarkController extends Controller {

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
		$class=DB::table('mark')->join('student', 'mark.student_id', '=', 'student.id')->join('subject', 'mark.subject_id', '=', 'subject.id')->select('mark.*', 'subject.name as subject_name', 'student.name as student_name')->get();
		return $this->ar_to_js(array('data'=>$class));
	}

	/*** to insert a record ***/
	public function store()
	{
		$result=array("status"=>false,"message"=>"Provide All Values");
		if(isset($_POST['mark'],$_POST['student_id'],$_POST['subject_id'])&&$_POST['mark']!='')
		{
			{
				$cl=DB::table('mark')->insert(['mark' => $_POST['mark'],'student_id' => $_POST['student_id'],'subject_id' => $_POST['subject_id'],'created_at'=>date("Y-m-d H:i:s"),'updated_at'=>date("Y-m-d H:i:s")]);
				$result=array("status"=>true,"message"=>"success");
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
		if(isset($dat['mark'],$dat['student_id'],$dat['subject_id'])&&$dat['mark']!='')
		{
			$contact=DB::table('mark')->where('id', $id)->get();
			if(isset($contact[0])&&!empty($contact[0]))
			{
					$cl=DB::table('mark')->where('id', $id)->update(['mark' => $dat['mark'],'student_id' => $dat['student_id'],'subject_id' => $dat['subject_id'],'updated_at'=>date("Y-m-d H:i:s")]);
					$result=array("status"=>true,"message"=>"success");
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
		$contact=DB::table('mark')->join('student', 'mark.student_id', '=', 'student.id')->join('subject', 'mark.subject_id', '=', 'subject.id')->select('mark.*', 'subject.name as subject_name', 'student.name as student_name')->where('mark.id', $id)->first();
		return $this->ar_to_js($contact);
	}

	/*** to list a delete record ***/
	public function destroy($id)
	{
		$contact=DB::table('mark')->where('id', $id)->delete();;
	}


}
