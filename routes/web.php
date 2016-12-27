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

Route::get('/', function () {
    // return view('welcome');
    return 'Hello' ;
});

// Route::get('aboutme', 'PagesController@aboutme') ;

// Route::get('about', 'PagesController@about') ;
// Route::get('contact', 'PagesController@contact') ;
Route::get('login', 'LoginController@getLogin') ;
Route::post('login', 'LoginController@postLogin') ;

Route::get('MyRequest', 'MyController@getURL') ;

//Database
Route::get('database', function() {
    // Schema::create('loaisanpham', function($table) {
    //     $table->increments('id');
    //     $table->string('ten', 200);
    // });

    Schema::create('theloai', function($table) {
        $table->increments('id');
        $table->string('ten', 200)->nullable();
        $table->string('nsx')->default('HP');
    });
    echo "thanh cong ";
});

Route::get('lienketbang', function() {
    Schema::create('sanpham', function($table){
        $table->increments('id');
        $table->string('ten');
        $table->float('gia');
        $table->integer('soluong')->default(0);
        $table->integer('id_loaisanpham')->unsigned();
        $table->foreign('id_loaisanpham')->references('id')->on('loaisanpham');
    });
    echo "thanh cong";
});

Route::get('suabang', function(){
    Schema::table('theloai', function($table){
        // $table->dropColumn('nsx');
        $table->string('Email');
    });
    echo "thanh cong";
});

Route::get('drop-col', function () {
    Schema::table('theloai', function ($table) {        
        // Xoa nhieu cot
        // $table->dropColumn(['ten', 'email']) ;

        $table->dropColumn('id') ;
    });
});

Route::get('create/cate', function () {
    Schema::create('category', function($table) {
        $table->increments('id') ;
        $table->string('name') ;
        $table->timestamps() ;
    }) ;
});

Route::get('create/product', function () {
    Schema::create('product', function($table) {
        $table->increments('id') ;
        $table->string('name') ;
        $table->integer('price') ;
        $table->integer('cate_id')->unsigned() ;
        $table->foreign('cate_id')->references('id')->on('category')->onDelete('cascade');
        $table->timestamps() ;
    }) ;
});