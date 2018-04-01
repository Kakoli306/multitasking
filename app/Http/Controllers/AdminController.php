<?php

namespace App\Http\Controllers;

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
        $purchases = Purchases::all();
        return view ('newhome',['purchases' =>$purchases]);
    }

    public function accounts(){

      $posts = Post::all();
        return view('posts.accounts',['posts'=> $posts]);
    }
}
