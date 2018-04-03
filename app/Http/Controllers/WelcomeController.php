<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
class WelcomeController extends Controller
{
    public function index1(){
        $posts = DB::table('posts')
            ->where('status', 1)
            ->get();

        // $posts = Post::all();
        return view('frontEnd.homeContent',['posts'=> $posts]);
    }
    public function register()
    {
        return view('frontEnd.homeContent');
    }
    public function welcome($id)
    {
        DB::table('users')->where('id',$id)->update(['register_status' => 1]);
        session()->flash('message', 'register user welcome by admin');
        return redirect(route('new-register'));
    }
    public function dismiss($id){
        DB::table('users')->where('id', $id)->update(['register_status' => 0]);
        session()->flash('message', 'Sorry! new register');
            return redirect(route('new-register'));
    }

};
