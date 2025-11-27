<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $users = User::withTrashed()->get();
        return view('admin.users.index', compact('users'));
    }

    public function destroy(int $id){
        User::destroy($id);
        return redirect()->route('users.index');
    }

    public function restore(int $id){
        $user = User::withTrashed()->find($id);
        $user->restore();
        return redirect()->route('users.index');

    }

}
