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



Route::group(['prefix' => 'admin','namespace' => 'admin','middleware' => 'auth.admin'],function(){
	Route::get('/','AdminController@index')->name('admin.dashboard');
	Route::group(['prefix' => 'collection'],function(){
		Route::get('/','CollectionController@index')->name('admin.collection.index');
		Route::post('/create','CollectionController@create')->name('admin.collection.create');
		Route::get('/edit/{id?}','CollectionController@getEdit')->name('admin.collection.edit');
		Route::post('/edit','CollectionController@edit')->name('admin.collection.edit');
		Route::delete('/delete/{id}','CollectionController@delete')->name('admin.collection.delete');
	});
	Route::group(['prefix' => 'products'],function(){
		Route::get('/','ProductController@index')->name('admin.products.index');
		Route::get('/create','ProductController@create')->name('admin.products.create');
		Route::post('/create','ProductController@postCreate')->name('admin.products.create');
		Route::get('/edit/{id?}','ProductController@edit')->name('admin.products.edit');
		Route::post('/edit/{id?}','ProductController@postEdit')->name('admin.products.edit');
		Route::delete('/delete/{id?}','ProductController@delete')->name('admin.products.delete');

		Route::get('/get_product','ProductController@get_product')->name('admin.products.get_product');
	});

	Route::group(['prefix' => 'color'],function(){
		Route::get('/','ColorController@index')->name('admin.color.index');
		Route::post('/create','ColorController@create')->name('admin.color.create');
		Route::delete('/delete/{id}','ColorController@delete')->name('admin.color.delete');
	});

	Route::group(['prefix' => 'users'],function(){
		Route::get('/','UserController@index')->name('admin.user.index');
		Route::post('/create','UserController@postCreate')->name('admin.user.create');
		Route::get('/get_user','UserController@getUser')->name('admin.user.get_user');
		Route::post('/edit','UserController@postEdit')->name('admin.user.edit');
		Route::delete('/delete/{id}','UserController@delete')->name('admin.user.delete');
	});


	Route::group(['prefix' => 'options'],function(){
		Route::get('/','OptionController@index')->name('admin.options.index');
		Route::post('/','OptionController@postIndex')->name('admin.options.index');
		Route::get('/footer','OptionController@footer')->name('admin.options.footer');
		Route::post('/footer','OptionController@postFooter')->name('admin.options.footer');
		Route::get('/menu','OptionController@menu')->name('admin.options.menu');
		Route::post('/menu','OptionController@postMenu')->name('admin.options.menu');
		Route::get('/megamenu','OptionController@megamenu')->name('admin.options.megamenu');
		Route::post('/megamenu','OptionController@postMegamenu')->name('admin.options.megamenu');

		Route::get('/home','OptionController@getHome')->name('admin.options.home');
		Route::post('/home','OptionController@postHome')->name('admin.options.home');
	});

	Route::group(['prefix' => 'pages'],function(){
		Route::get('/','PageController@index')->name('admin.pages.index');
		Route::get('/create','PageController@create')->name('admin.pages.create');
		Route::get('/edit/{id?}','PageController@edit')->name('admin.pages.edit');
		Route::delete('/delete/{id}','PageController@delete')->name('admin.pages.delete');

		Route::get('check_slug','PageController@check_slug')->name('admin.pages.check_slug');

		Route::get('get_teplate','PageController@get_template')->name('admin.pages.get_template');


		Route::post('apply_care','PageController@apply_care')->name('admin.pages.apply_care');
		Route::post('post_edit_apply_care','PageController@post_edit_apply_care')->name('admin.pages.post_edit_apply_care');

		Route::post('reward','PageController@reward')->name('admin.pages.reward');
		Route::post('post_edit_reward','PageController@post_edit_reward')->name('admin.pages.post_edit_reward');

		Route::post('program','PageController@program')->name('admin.pages.program');
		Route::post('post_edit_program','PageController@post_edit_program')->name('admin.pages.post_edit_program');


		Route::post('press','PageController@press')->name('admin.pages.press');
		Route::post('post_edit_press','PageController@post_edit_press')->name('admin.pages.post_edit_press');

		Route::post('retailer','PageController@retailer')->name('admin.pages.retailer');
		Route::post('post_edit_retailer','PageController@post_edit_retailer')->name('admin.pages.post_edit_retailer');

		Route::post('faq','PageController@faq')->name('admin.pages.faq');
		Route::post('post_edit_faq','PageController@post_edit_faq')->name('admin.pages.post_edit_faq');


	});

	Route::group(['prefix' => 'articles'],function(){
		Route::get('/','ArticleController@index')->name('admin.articles.index');
		Route::get('/create','ArticleController@create')->name('admin.articles.create');
		Route::post('/create','ArticleController@postCreate')->name('admin.articles.create');
		Route::get('/edit/{id?}','ArticleController@edit')->name('admin.articles.edit');
		Route::post('/edit/{id?}','ArticleController@postEdit')->name('admin.articles.edit');
		Route::delete('/delete/{id}','ArticleController@delete')->name('admin.articles.delete');

		Route::get('/check_slug','ArticleController@check_slug')->name('admin.articles.check_slug');
	});
	Route::group(['prefix' => 'forms'],function(){
		Route::get('/','FormController@index')->name('admin.forms.index');
	});

	Route::group(['prefix' => 'tier'],function(){
		Route::get('/','TierController@index')->name('admin.tier.index');

		Route::get('/create','TierController@create')->name('admin.tier.create');
		Route::post('/create','TierController@postCreate')->name('admin.tier.create');

		Route::get('/edit/{id?}','TierController@edit')->name('admin.tier.edit');
		Route::post('/edit/{id?}','TierController@postEdit')->name('admin.tier.edit');

		Route::delete('/delete/{id?}','TierController@delete')->name('admin.tier.delete');

		//Route::get('/get_product','ProductController@get_product')->name('admin.tier.get_product');
	});

	Route::group(['prefix' => 'earn_point'],function(){
		Route::get('/','EarnPointController@index')->name('admin.earn_point.index');

		Route::get('/create','EarnPointController@create')->name('admin.earn_point.create');
		Route::post('/create','EarnPointController@postCreate')->name('admin.earn_point.create');

		Route::get('/edit/{id?}','EarnPointController@edit')->name('admin.earn_point.edit');
		Route::post('/edit/{id?}','EarnPointController@postEdit')->name('admin.earn_point.edit');

		Route::delete('/delete/{id?}','EarnPointController@delete')->name('admin.earn_point.delete');

		//Route::get('/get_product','ProductController@get_product')->name('admin.tier.get_product');
	});

	Route::group(['prefix' => 'get_reward'],function(){
		Route::get('/','GetRewardController@index')->name('admin.get_reward.index');

		Route::get('/create','GetRewardController@create')->name('admin.get_reward.create');
		Route::post('/create','GetRewardController@postCreate')->name('admin.get_reward.create');

		Route::get('/edit/{id?}','GetRewardController@edit')->name('admin.get_reward.edit');
		Route::post('/edit/{id?}','GetRewardController@postEdit')->name('admin.get_reward.edit');

		Route::delete('/delete/{id?}','GetRewardController@delete')->name('admin.get_reward.delete');

		//Route::get('/get_product','ProductController@get_product')->name('admin.tier.get_product');
	});

});


Route::group(['prefix' => 'account'],function(){
	
	Route::get('/login','AccountController@getLogin')->name('login');
	Route::post('/login','AccountController@postLogin')->name('login');
	Route::post('/logout','AccountController@logout')->name('logout');

	Route::get('/register','AccountController@getRegister')->name('register');
	Route::post('/register','AccountController@postRegister')->name('register');

	Route::get('/forgot_password','AccountController@getForgot')->name('forgot_password');
	Route::post('/forgot_password','AccountController@postForgot')->name('forgot_password');

	Route::group(['middleware' => 'auth'],function(){
		Route::get('/','AccountController@index')->name('client.account.index');
		Route::get('/reward','AccountController@reward')->name('client.account.reward');
	});

	Route::get('/profile','AccountController@getProfile')->name('client.account.profile');
	Route::post('/profile','AccountController@postProfile')->name('client.account.profile');

	Route::get('rewards-account','AccountController@getReward')->name('client.account.getreward');
	Route::post('getreward.json','AccountController@postReward')->name('client.account.getreward');

	Route::post('model.json','AccountController@postDataEarn')->name('client.account.modelearn');
});

Route::get('thanh-toan','CartController@checkout')->middleware('auth')->name('client.checkout');

Route::get('/page/{slug?}','PageController@index')->name('client.page.index');

Route::get('/product/get_rate','ProductController@get_rate')->name('client.product.get_rate');

Route::get('/product/{slug?}','ProductController@index')->name('client.product.index');

Route::get('/add-to-cart','CartController@add_to_cart')->name('client.add_to_cart');

Route::get('/cart_update','CartController@cart_update')->name('client.cart.update');

Route::delete('/cart_remove','CartController@cart_remove')->name('client.cart.remove');

Route::get('/gio-hang','CartController@index')->name('client.cart.index');

Route::get('collection/{slug}','HomeController@getCollection')->name('client.collection.index');

Route::get('search','HomeController@getSearch')->name('client.search');

Route::get('/news','ArticleCOntroller@archive')->name('client.articles.archive');

Route::get('/post/{slug?}','ArticleController@article')->name('client.articles.single');

Route::get('/lien-he',function(){
	return view('client.page.contact');
})->name('client.page.contact');

Route::post('/formdata','FormController@formdata')->name('client.form.data');

Route::get('/','HomeController@index')->name('home');
