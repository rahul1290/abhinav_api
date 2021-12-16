<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\user as userModel;

class user extends Controller
{
    function list($id=null){
        return $id?userModel::find($id):userModel::all();
    }

    function create(Request $req){
        $user = new userModel;

        $user->uname = $req->uname;
        $user->email = $req->email;
        $user->contact_no = $req->contact_no;
        $user->fname = $req->fname;
        $user->lname = $req->lname;
        $user->password = $req->password;
        $user->user_type = $req->utype;
        $user->created_by = 1;
        $user->created_at = date('Y-m-d H:i:s');

        $result = $user->save();
        if($result){
            return ["msg"=>'User created.'];
        } else {
            return ["msg"=>'Operation failed.'];
        }
    }
}
