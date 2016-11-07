<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Payroll;
use App\Person;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $year = date('Y');
        $month = 5;

        $countPerson = Person::whereYear('Hire_Date',$year)->whereMonth('Hire_Date', $month)->count();
        $sumBenefit = Payroll::sum('Pay Amount');
        $totalearning = $sumBenefit/$countPerson;
        return view('home',['totalearning'=>$totalearning]);
    }
}
