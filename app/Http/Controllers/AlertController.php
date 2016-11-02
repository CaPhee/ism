<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


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

    public function postCreate(Request $req){
    	$alert = new Alert;
    	$role_id = DB::table('role_user')->select('role_id')->where('user_id','=',$req->user_id)->get();
    	$alert->role_id =(string) $role_id[0];
    	$alert->title = $req->title;
    	$alert->content = $req->content;
    	$alert->type = $req->type;

    	$alert->save();
    	return redirect()->route('user.alert.list');
    }
}
