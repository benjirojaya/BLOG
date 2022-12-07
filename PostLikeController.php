<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostLikeController extends Controller
{
    //

    public function _construct()
    {
        $this->middleware(['auth']);
    }



    public function store(Post $post,Request $request){


        //dd($post);
       if ($post->likedBy($request->user())){

            return response(null,409);
       }
        $post->likes()->create([
            'user_id'=>$request->user()->id,
        ]);

        return back();
    }
    
    public function destroy(Post $post,Request $request)
    {
       // dd($post);

       $request->user()->likes()->where('post_id',$post->id)->delete();


       return back();
    }

}
