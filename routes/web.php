<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
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

Route::get('/', [PostController::class,'index']);

Route::get('post/{post:slug}', [PostController::class,'show']);

//for routing to the register view for user input 
Route::get('register',[RegisterController::class,'create'])->middleware('guest');
//for routing to the register user post submit
Route::post('register',[RegisterController::class,'store'])->middleware('guest');

Route::get('login',[SessionsController::class,'index'])->middleware('guest');
Route::post('login',[SessionsController::class,'login'])->middleware('guest');
Route::post('logout',[SessionsController::class,'destroy'])->middleware('auth');



Route::get("categories/{category:slug}",function(Category $category)
{
    return view("posts",
    [
        "posts" => $category->post,
        "currentCategory" => $category,
        'categories' => Category::all()
    ]);
});

Route::get('authors/{author:username}',
function(User $author)
{

    return view('posts',  
    [
        'posts' => $author->post,
        'categories' => Category::all()
    ]);

});  