<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    // return view('welcome');

    $posts = Post::all();
    // dd($posts);
    return view('posts', ['posts' => $posts]);
});



Route::get('posts/{slug}', function ($slug) {
    $post = Post::find($slug);

    if (!$post) {
        abort(404, 'Post not found');
    }

    return view('post', [
        'post' => $post
    ]);
})->name('posts.show');
