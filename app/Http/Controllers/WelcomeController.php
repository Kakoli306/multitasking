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

};
