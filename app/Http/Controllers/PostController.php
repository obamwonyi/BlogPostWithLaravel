<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use PharIo\Manifest\Author;

class PostController extends Controller
{
    //

    public function index()
    {

        return view('posts', 
        [
            //this will return the post that has been filtered by the search  
            'posts' => Post::latest()->filter(request(['search']))->paginate(6),
            'categories' => Category::all(),
        ]);
    }


    //this will handle the individual post route 
    public function show(Post $post)
    {
        return view('post', 
        [
            "post" => $post 
        ]);
    }
}
