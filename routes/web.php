<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

use App\Post;
use App\Tag;
use App\Video;

Route::get('/', function () {
    return view('welcome');
});



Route::get('/create', function (){
    $post = Post::create(['name'=>'My first post']);
    $tag1 = Tag::find(1);
    $post->tags()->save($tag1);

    $video = Video::create(['name'=>'video.mov']);
    $tag2 = Tag::find(2);
    $video->tags()->save($tag2);

});



Route::get('/read', function (){
    $post = Post::findOrFail(1);

    foreach ($post->tags as $tag){
        echo $tag;
    }
});



Route::get('/update', function (){
    $post = Post::findOrFail(1);

    foreach ($post->tags as $tag){
        return $tag->whereName('PHP')->update(['name'=>'PHP update']);
    }


//    $post = Post::findOrFail(1);
//    $tag = Tag::find(2);
//    $post->tags()->save($tag);


//    $post = Post::findOrFail(1);
//    $tag = Tag::find(3);
//    $post->tags()->attach($tag);


//    $post = Post::findOrFail(1);
//    $tag = Tag::find(3);
//    $post->tags()->sync([1,2,3]);

});



Route::get('/delete', function (){
    $post = Post::find(1);

    foreach ($post->tags as $tag){
        $tag->whereId(1)->delete();
    }
});
