<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Post;
use App\Purchases;
use Illuminate\Support\Facades\DB;
class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = DB::table('posts')
            ->where('status', 0)
            ->get();
      //  $posts = Post::all();
        return view('home1',['posts'=> $posts]);

    }
    public function permission(){
        $purchases = DB::table('purchases')
            ->where('permission_status', 0)
            ->get();
        //$purchases = Purchases::all();
        return view ('newhome',['purchases' =>$purchases]);
    }

    public function accounts(){

      $posts = Post::all();
        return view('posts.accounts',['posts'=> $posts]);
    }

    public function newregister(){

        $user = DB::table('users')
            ->where('register_status',0)
            ->get();
        //$user = User::all();
        return view('newregister',['users' => $user]);
    }
}
