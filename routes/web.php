<?php

use Illuminate\Support\Facades\URL;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;




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
    return view('welcome');
});


//Route::resource('rest', 'RestTestController')->names('restTest');


Route::group(['namespace' => 'Blog', 'prefix' => 'blog'], function () {

    Route::resource('posts', 'PostController')->names('blog.posts');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

$groupData = [
    'prefix' => 'admin/blog',
    'namespace' => 'Blog\Admin',
];

Route::group($groupData, function () {
    $methods = ['index', 'edit', 'update', 'create', 'store',];
    Route::resource('categories', 'CategoryController')->only($methods)->names('blog.admin.categories');
});



Route::group(['namespace'=>'Blog\Admin','prefix'=>'admin/blog'],function(){
    Route::resource('posts','BlogPostController')->except('show')->names('admin.blog.posts');
});


// 13 урок в конце о глазах
// В блог постах админки нумератор странный
// Дебаг бар и IDE helper может шутить(кто его знает )
//Lesson 36 time 22:00
