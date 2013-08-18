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

Route::get('/user/{user_id}', function($user_id){
	return User::find($user_id); 

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
	$item = Item::find($item_id); 
	if($item) $item->delete(); 

	return "item deleted"; 
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
		
		if(Auth::user()->role == 'manager'){
			return Redirect::to('admin');  	
		} else {
			return Redirect::to('home'); 
		}
		
	} else {
		return View::make('login', array('error' => true)); 
	} 
});


Route::get('/home', function(){
	$user = Auth::user();
	return View::make('userpages.index'); 
}); 

Route::get('/home/company', function(){
	$user = Auth::user(); 

	$companies = Company::where('user_id', '=', $user->id)->get(); 

	return View::make('userpages.companies', array('companies' => $companies)); 

}); 


Route::get('/home/company/new', function(){
	
	$user = Auth::user(); 

	return View::make('userpages.new_company'); 

}); 


Route::post('/home/company/new', function(){
	
	$user = Auth::user(); 
	$file = Input::file('file'); 
	$filename = uniqid(); 
	$name = Input::file('file')->getClientOriginalName();

	$extention = explode(".", $name); 

	$extention = array_pop($extention);  


	$filename .= "." . $extention;

	$file->move('public/img/upload', $filename); 
	return Input::get('filename'); 
}); 



Route::get('/admin', array('before'=>'auth|admin', function(){

	return View::make('adminpages.index', array('items' => Item::all())); 

})); 