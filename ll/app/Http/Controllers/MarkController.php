<?php

namespace App\Http\Controllers;
use DB;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Repositories\ContactRepository;

class MarkController extends Controller {

    public function __construct()
	{
		/*$this->middleware('admin', ['except' => ['create', 'store']]);*/
		/*$this->middleware('ajax', ['only' => 'update']);*/
	}

	public function ar_to_js($ar)
	{
		$json=json_encode($ar,true);
		return $json;
	}
	public function index()
	{
		$mark=DB::table('mark')->get();
		return $this->ar_to_js($mark);
	}
}
