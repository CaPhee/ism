<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Alert;


class AlertController extends Controller
{
    public function index(){
    	$alert = Alert::all();
    	return view('pages.alert.list',['alert' => $alert]);
    }

    public function getCreate(){
    	return view('pages.alert.create');
    }
}
