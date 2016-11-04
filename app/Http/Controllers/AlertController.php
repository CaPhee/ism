<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


use App\Alert;
use App\User;
use App\Role;

class AlertController extends Controller
{
    public function index(){
    	$alert = Alert::all();
    	return view('pages.alert.list',['alert' => $alert]);
    }

    public function detail($id){
        $content = Alert::where('id',$id)->first()->toArray();
        $manager = User::where('id',$content['role_id'])->first()->toArray();
        return view('pages.alert.detail',['content' =>$content,'manager'=>$manager]);
    }

    public function getCreate(){        
        $roles = Role::all();
    	return view('pages.alert.create',['roles'=>$roles]);
    }

    public function postCreate(Request $req){
    	$alert = new Alert;
    	//$role_id = DB::table('role_user')->select('role_id')->where('user_id','=',$req->user_id)->get();
        //$userRole = DB::table('role_user')->where('user_id', '=',$req->user_id)->pluck('role_id');

        $alert->role_id = $req->input('role');
    	$alert->title = $req->input('title');
    	$alert->content = $req->input('content');
    	$alert->type = $req->input('type');
    	$alert->save();
    	return redirect()->route('user.alert.list')->with('success','Add successfully');
    }

    public function edit($id){
        $alert = Alert::where('id',$id)->first()->toArray();
        $roles = Role::all();
        return view('pages.alert.edit',['alert'=>$alert,'roles'=>$roles]);
    }

    public function update($id,Request $req){
        Alert::where('id',$id)->update([
                'role_id' => $req->input('role'),
                'title' => $req->input('title'),
                'content' => $req->input('content'),
                'type' =>    $req->input('type')
            ]);
        return redirect()->route('user.alert.list')->with('success','Edit successfully');
    }

    public function destroy($id){
        $alert = Alert::findOrFail($id)->toArray();
        $alert->delete($id);
        return redirect()->route('user.alert.list')->with('success','Delete successfully');
    }
}
