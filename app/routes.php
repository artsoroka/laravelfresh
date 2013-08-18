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

Route::get('/', function(){

	$items = Item::all(); 

	return View::make('sitepages.mainpage', array('items' => $items)); 

}); 


Route::get('/catalog/{item_id}', function($item_id){

	$item = Item::find($item_id); 

	if($item) {
		return View::make('sitepages.item', array('item' => $item)); 
	} else {
		return "Item not found"; 
	}
}); 


Route::get('/setcookie', array('after' => 'cookiemaster', function(){

	return View::make('catalog'); 

}));



Route::get('/getcookie', function(){
	return Cookie::get('thecookie');
});



Route::get('/category/{category}', function($category_id)
{
	
	$items = Item::where('category_id', '=', $category_id)->get();
	
	return $items; 	




});

Route::get('/item/{item_id}/edit', function($item_id){
	$item = Item::find($item_id); 
	if($item){
		$title = Input::has('update_title') ? Input::get('update_title') : $item->title; 
		$item->title = $title; 
		$item->save();
	}
}); 

Route::get('/item/{item_id}/delete', function($item_id){
	return  Item::find($item_id);
});

Route::get('/item/{item_id}', function($item_id){
	$item = Item::find($item_id); 
	return $item; 
});

Route::get('/{category}/product/{product_id}', function($category, $product_id)
{
	return $category . " : " . $product_id ; 
});


Route::get('/login', function(){
	return View::make('login', array('error' => false)); 
});

Route::get('/logout', function() {
    Auth::logout();
    return Redirect::to('login');
});


Route::post('/login', function(){
		
	$credentials = array(
			'status' => 'active',
			'email' => Input::get('email'),
			'password' => Input::get('password')
		);

	if(Auth::attempt($credentials)){
		return Redirect::to('admin');  
	} else {
		return View::make('login', array('error' => true)); 
	} 
});





Route::get('/admin', array('before'=>'auth', function(){
	return View::make('adminpages.index', array('items' => Item::all())); 
}));

