<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\BlogsController;
use App\Http\Controllers\BackupController;

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

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::view('/', 'welcome');
Route::get('/', [PagesController::class, 'home']);

// Route::get('/pages/contact', [PagesController::class, 'contact'])->name('user.contact');
// Route::get('/pages/about', [PagesController::class, 'about'])->name('user.about');
// Route::get('/pages/service', [PagesController::class, 'service'])->name('user.service');

Route::group(['prefix'=>'pages', 'as'=>'user.'], function(){
    Route::get('/contact', [PagesController::class, 'contact'])->name('contact');
    Route::get('/about', [PagesController::class, 'about'])->name('about');
    Route::get('/service', [PagesController::class, 'service'])->name('service');
});



//Route::get('/pages/{name}', [PagesController::class, 'filename'])->where('name', '[A-Za-z]+');
// Route::get('/pages/{name}', [PagesController::class, 'filename']);


// Route::get('/profile/{name}/{age}', function($name, $age){
//     return "Your name is ".$name." and you are ".$age." years old";
// })->where('name', '[A-Za-z]+')->where('age', '[0-9]+');

// Route::get('/profile/{name}', function($name){
//     return "Your name is ".$name ;
// })->where('name', '[A-Za-z]+');

Route::get('/test', [PagesController::class, 'test']);


Route::get('/inc', [PagesController::class, 'inc']);


Route::view('/test2', 'pages.test2');


//Route::resource('/blogs', [BlogsController::class]);

Route::get('/blogs', [BlogsController::class, 'index'])->name('blog.index');
Route::get('/blog/create', [BlogsController::class, 'create'])->name('blog.create');
Route::post('/blog', [BlogsController::class, 'store'])->name('blog.store');
Route::get('/blog/{id}', [BlogsController::class, 'show'])->name('blog.show')->where('id', '[0-9]+');
Route::delete('/blog/{id}', [BlogsController::class, 'destroy'])->name('blog.destroy');
Route::get('/blog/{id}/edit', [BlogsController::class, 'edit'])->name('blog.edit');
Route::put('/blog/{id}', [BlogsController::class, 'update'])->name('blog.update');

//Trashed Blogs
Route::get('/blog/trash/all', [BackupController::class, 'trash_all'])->name('blog.trash');
Route::get('/blog/{id}/restore', [BackupController::class, 'blog_restore'])->name('blog.restore');






