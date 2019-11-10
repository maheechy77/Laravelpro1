<?php

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

Route::get('/','PostController@Index');

Route::get('welcome','FirstController@loginplease');
Route::get('contact','FirstController@contactUs');


//Category Crud
Route::get('add/category','CategoryController@AddCategory')->name('add.category');
Route::post('store/category','CategoryController@StoreCategory')->name('store.category');
Route::get('view/categories','CategoryController@AllCategory')->name('all.category');
Route::get('view/category/{id}','CategoryController@ViewCategory');
Route::get('edit/category/{id}','CategoryController@ViewUpdateCategory');
Route::post('storeupdate/category/{id}','CategoryController@StoreUpdateCategory');
Route::get('delete/category/{id}','CategoryController@DeleteCategory');


//Post Curd  
Route::post('store/post','PostController@StorePost')->name('store.posts');
Route::get('give/post','PostController@GivePost')->name('give.post');
Route::get('view/post','PostController@AllPost')->name('all.posts');
Route::get('view/post/{id}','PostController@ViewPost');
Route::get('edit/post/{id}','PostController@EditPost');
Route::post('update/post/{id}','PostController@UpdatePost');
Route::get('delete/post/{id}','PostController@DeletePost');


//student crud eloquent
Route::get('add/student','StudentsController@AddStudent')->name('add.student');
Route::post('store/student','StudentsController@StoreStudent')->name('store.students');
Route::get('view/students','StudentsController@AllStudent')->name('all.students');
Route::get('view/student/{id}','StudentsController@ViewStudent');
Route::get('edit/student/{id}','StudentsController@EditStudent');
Route::post('update/student/{id}','StudentsController@UpdateStudent');
Route::get('delete/student/{id}','StudentsController@DeleteStudent');


Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/register', function () {
    return view('register');
})->middleware('register');
