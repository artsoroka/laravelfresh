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


/*
|--------------------------------------------------------------------------
| Login / Logout  
|--------------------------------------------------------------------------
|
| Authentication is based on Laravel's Eloquent auth driver 
| using Users table 
|
*/

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


/*
|--------------------------------------------------------------------------
| Home 
|--------------------------------------------------------------------------
|
| Home directory is for authenticated users
|
*/

Route::group(array('before' => 'auth'), function(){

	Route::get('/home', function(){
		$user = Auth::user();
		return View::make('userpages.index'); 
	}); 



/*
|--------------------------------------------------------------------------
| HOME Company 
|--------------------------------------------------------------------------
|
| List, create, update and delete Companies 
|
*/

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

		$company_title 			= Input::get('company_title'); 	
		$company_description	= Input::get('company_description'); 


		$validation = Validator::make(
	    	array('title' => $company_title),
	    	array('title' => array('required', 'unique:companies'))
		);

		if($validation->fails()){
			return $validation->errors();
		} else {
			
			$company = new Company;

			$company->title 		= $company_title; 
			$company->description 	= $company_description;
			$company->user_id		= $user->id; 

			$company->save(); 

			return Redirect::to('/home/company'); 

		}

	}); 

	Route::get('/home/company/{company_id}/delete', function($company_id){
		$user 	 = Auth::user();  
		$company = Company::find($company_id); 

		if( ! $company ) return "company not found"; 

		//if( $company->user_id != $user->id ) return "can't touch this"; 
		if($company->belongs_to($user)){
			$company->delete(); 
			return Redirect::to('/home/company'); 
		} else{
			return "can't touch this"; 
		}

	});

	Route::get('home/company/{company_id}/edit', function($company_id){
		$user 		= Auth::user(); 
		$company 	= Company::find($company_id); 

		if( ! $company ) return "company not found"; 

		if($company->belongs_to($user)){
			return View::make('userpages.edit_company', array('company' => $company)); 
		} else{
			return "can't touch this"; 
		}


	});


	Route::post('home/company/{company_id}/edit', function($company_id){
		$user 		= Auth::user(); 
		$company 	= Company::find($company_id); 

		if( ! $company ) return "company not found"; 

		if($company->belongs_to($user)){


			$company_title 			= Input::get('company_title'); 	
			$company_description	= Input::get('company_description'); 


			$validation = Validator::make(
		    	array('title' => $company_title),
		    	array('title' => array('required'))
			);

			if($validation->fails()){
				return $validation->errors();
			} else {
				
				
				$company->title 		= $company_title; 
				$company->description 	= $company_description;
				
				$company->save(); 

				return Redirect::to('/home/company/' . $company->id . '/edit'); 

			}

		} else{
			return "can't touch this"; 
		}

	});


/*
|--------------------------------------------------------------------------
| HOME Certificate 
|--------------------------------------------------------------------------
|
| List, create, update and delete Companies 
|
*/

Route::get('/home/certificate', function(){
	$user = Auth::user(); 
	$items = DB::select('SELECT * FROM items WHERE company_id in (SELECT id FROM companies WHERE user_id = ' . $user->id .' )'); 

	return View::make('userpages.certificates', array('items' => $items)); 

});


Route::get('/home/certificate/pending', function(){
	$user = Auth::user(); 
	$all_items = DB::select('SELECT * FROM items WHERE company_id in (SELECT id FROM companies WHERE user_id = ' . $user->id .' )'); 
	$items = array(); 
	foreach ($all_items as $item) {
		if($item->status == 'pending') array_push($items, $item); 
	}

	return View::make('userpages.certificates', array('items' => $items)); 

});

Route::get('/home/certificate/new', function(){
	$user = Auth::user(); 
	$companies = Company::where('user_id', '=', $user->id)->get(); 
	
	return View::make('userpages.new_certificate', array('companies' => $companies)); 


});


Route::post('/home/certificate/new', function(){
	$user = Auth::user(); 
	
	$certificate_title 			= Input::get('certificate_title');
	$certificate_description 	= Input::get('certificate_description');
	$company_id 				= Input::get('company_id');
	$file 						= Input::file('file');

	$item = new Item; 

	$item->title 		= $certificate_title; 
	$item->description 	= $certificate_description; 
	$item->company_id	= $company_id; 

	$item->status 		= 'pending'; 

	if($file){

		$filename = uniqid(); 
		$name = Input::file('file')->getClientOriginalName();

		$extention = explode(".", $name); 

		$extention = array_pop($extention);  


		$filename .= "." . $extention;

		$file->move('public/img/upload', $filename); 

		$item->image 		= $filename; 

	}

	$item->save(); 

	return Redirect::to('/home/certificate'); 

});

Route::get('/home/certificate/{item_id}/delete', function($item_id){
	$user = Auth::user(); 
	
	$items = DB::select('SELECT i.*, u.id as user_id FROM items AS i JOIN  companies AS c ON (i.company_id = c.id) JOIN users AS u ON (c.user_id = u.id) WHERE i.id = ' . $item_id); 
	
	if( count($items) == 0) return 'item not found'; 

	if( $user->id != $items[0]->user_id ) return "Can't touch this";  

	$item = Item::find($item_id); 
	$item->delete(); 

	return Redirect::to('/home/certificate'); 

});


}); 



Route::get('/admin', array('before'=>'auth|admin', function(){
	return View::make('adminpages.index', array('items' => Item::where('status', '=', 'pending')->get())); 

})); 