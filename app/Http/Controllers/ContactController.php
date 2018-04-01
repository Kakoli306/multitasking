<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Purchases;
use App\Post;
use DB;
class ContactController extends Controller
{
    
    public function index(){
        return view('frontEnd.layouts.contact');
    }
    public function new(){
        return view('frontEnd.layouts.guide');
    }
    public function purchase($post_id)
    {
        $posts = Post::where('id', '=',$post_id)->get();
        $registerPost = Post::find($post_id);
        $registeruser = Purchases::where(['post_id' => $registerPost->id ])->count();
        return view('posts.purchase',['posts'=> $posts, 'id'=>$post_id, 'registeruser' => $registeruser ]);
    }
    public function adding( Request $request){

            // return $request->input('post_title');
            $this->validate($request, [
                'first_name' => 'required',
                'last_name' => 'required',
                'email' => 'required',
                'number' => 'required',
                'address' => 'required',
            ]);

        // return $request->all();
       // $purchase = purchases::all()

        $purchase = new Purchases();
        $purchase->first_name = $request->first_name;
        $purchase->last_name = $request->last_name;
        $purchase->email = $request->email;
        $purchase->number = $request->number;
        $purchase->address = $request->address;
        $purchase->permission_status = 0;
        $purchase->post_id = $request->post_id;


        $purchase->save();

        return redirect("purchase/$request->post_id")->with('message', 'Purchase info saved ');
    }

    public function publishedPurchase($id){

        DB::table('purchases')->where('id',$id)->update(['permission_status' => 1]);
        session()->flash('message', 'purchase info published');
        return redirect(route('admin.permission'));
    }
    public function unpublishedPurchase($id){
        DB::table('purchases')->where('id',$id)->update(['permission_status' => 0]);
        session()->flash('message', 'purchase info unpublished');
        return redirect(route('admin.permission'));
    }
}
