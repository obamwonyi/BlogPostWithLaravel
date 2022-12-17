<?php

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use League\CommonMark\Extension\FrontMatter\Data\LibYamlFrontMatterParser;
use Spatie\YamlFrontMatter\YamlFrontMatter;
use Symfony\Component\Routing\Loader\YamlFileLoader;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {


    return view('posts', 
    [
        'posts' => Post::latest( )->with("category","author")->get()
    ]);

});


Route::get('post/{post:slug}', function(Post $post)
{
    return view('post', 
    [
        "post" => $post 
    ]);
});

Route::get("categories/{category:name}",function(Category $category)
{
    return view("categories",
    [
        "posts" => $category->post
    ]);
});

Route::get('authors/{author:username}',
function(User $author)
{

    return view('posts',  
    [
        'posts' => $author->post
    ]);

});