<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('hello');
});


Route::get('/catalog/{category_id}', function($category_id){
	$items =  Item::where('category_id', '=', $category_id)->orderBy('id')->get(); 
	
	//return View::make('catalog'); 
	return $items; 
}); 


Route::get('/setcookie', array('after' => 'cookiemaster', function(){

	return View::make('catalog'); 

}));



Route::get('/getcookie', function(){
	return Cookie::get('thecookie');
});



Route::get('/{category}', function($category_id)
{
	
	$items = Item::where('category_id', '=', $category_id)->get();
	
	return $items; 	




});

Route::get('/{category}/product/{product_id}', function($category, $product_id)
{
	return $category . " : " . $product_id ; 
});
