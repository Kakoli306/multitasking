<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use DB;
class PostController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        return view('posts.addPost');
    }

    public function view($post_id)
    {
        $posts = Post::where('id', '=',$post_id)->get();
        return view('posts.view',['posts'=> $posts]);
    }

    public function postFormValidation($request)
    {
        $this->validate($request, [
            'post_title' => 'required|max:100',
            'post_body' => 'required',
            'post_image' => 'required',
            'post_file' => 'required',
            'amount' => 'required',
            // 'post_file' => 'required',
        ]);
    }
    public function postImageUpload( $request)
    {
        //return $request->post_image;
        //return $request->post_file;
        $postImage = $request->file('post_image');
       // dd($postImage);
        $uploadPath = 'post_image/';
        $fileExtension =  $postImage->getClientOriginalExtension();
       // $imageExtension = $postImage->getClientOriginalExtension();
        $imageName = $request->post_title.'.'. $fileExtension;
         $postImage->move($uploadPath, $imageName);
        $imageUrl = $uploadPath . $imageName;

        return $imageUrl;

        // return $postImage->getClientOriginalExtension();
    }

    public function postFileUpload($request)
    {
        $postFile = $request->file('post_file');
        $uploadPath = 'post_file/';
        $fileExtension = $postFile->getClientOriginalExtension();
        $fileName = $request->post_title.'.'. $fileExtension;
        $postFile->move($uploadPath, $fileName);
        $fileUrl = $uploadPath. $fileName;

        return $fileUrl;
    }

    public function savePostBasicInfo($request, $imageUrl,$fileUrl ) {
        $post = new Post();
        $post->post_title = $request->post_title;
        $post->post_body = $request->post_body;
        $post->post_image = $imageUrl;
        $post->post_file = $fileUrl;
        $post->amount = $request->amount;
        $post->status = 0;
        //   $post->post_file = $request->post_file;
        $post->save();
    }
    public function savePost(Request $request){
        $this->postFormValidation($request);
        $imageUrl = $this->postImageUpload($request);
        $fileUrl = $this->postFileUpload($request);
        $this->savepostBasicInfo($request, $imageUrl, $fileUrl );
        return redirect('post/add')->with('message', 'Post info saved ');
    }
    public function pendingPost($id) {
        //$postById = Post::find($request->post_id);
       // $postById->status = 0;
        //$postById->save();
        DB::table('posts')->where('id',$id)->update(['status' => 0]);
        return redirect('/admin')->with('message', 'post info pending');
    }
    public function acceptPost($id) {
        //$postById = Post::find($request->post_id);
       // $postById->status = 1;
        //$postById->save();
        DB::table('posts')->where('id',$id)->update(['status' => 1]);
        return redirect('/admin')->with('message','post info accepted');
    }
    public function rejectPost($id) {
       // $postById = Post::find($request->post_id);
       // $postById->status = 2;
       // $postById->save();
        DB::table('posts')->where('id',$id)->update(['status' => 2]);
        return redirect('/admin')->with('message', 'post info reject');
    }
   
    public function managePost(){
        $posts = Post::all();
       // dd($posts);
        return view('posts.managePost',['posts'=> $posts]);
    }

    public function editPost(Request $request){
       $postById = Post::find($request->post_id);

        return view('posts.editPost',['postById'=> $postById]);
    }

    public function updatePost(Request $request){
    
        ////ssreturn $request->all();
     
       $imageurl=$this->postImageUpload($request);


        $post = Post::find($request->post_id);
        $post->post_title = $request->post_title;
        $post->post_body = $request->post_body;
        $post->amount = $request->amount;
        $post->post_image=$imageurl;
        $post->update();
        return redirect('/post/manage')->with('message', 'this info updated successfully')->send();
    }

    public function deletePost(Request $request){

         $postById = Post::find($request->post_id);
        // dd($postById);
        unlink($postById->post_image);
        $postById -> delete();
        return redirect('/post/manage')->with('message','this info deleted successfully');
    }



}
