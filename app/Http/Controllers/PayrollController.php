<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Payroll;

class PayrollController extends Controller
{
    public function index(){
    	$pr = Payroll::all();
    	return view('pages.payroll.list',['pr' => $pr]);
    }

}
