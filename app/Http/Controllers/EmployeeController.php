<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Employment;

class EmployeeController extends Controller
{
    public function index(){
    	$emp = Employment::all();
    	return view('pages.employment.list',['emp' => $emp]);
    }
}
