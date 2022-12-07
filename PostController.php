<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Likes;

use Illuminate\Http\Request;

class PostController extends Controller
{
    //

    public function __construct()
{
    
        $this->middleware(['auth']);

    }

    public function index(){

       $posts=Post::orderBy('created_at','desc')->paginate(10); // or latest() model can be used to sort asc or desc


        return view('posts',[
            'posts'=>$posts]);

    }


    public function store(Request $request){

       // dd('ok');

       $this->validate($request, [
           'body'=>'required']);
       
       //Post::Create([
         //  'user_id'=>auth()->id(),
           //'body'=>$request->body()

         //  $request->user()->posts()->create([
        //       'body'=>$request->body
   // ]);

    //auth(->user()->posts()->create();

    $request->user()->posts()->create([
        'body'=>$request->body]);

        return back();
    }

    public function destroy(Post $post){

      // dd($post->id);

       $post->delete(); 


       return back();   
     }
 
}
