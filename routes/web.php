<?php

use Cviebrock\EloquentTaggable\Models\Tag;

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




Route::get('user/profile','User\ProfileController@profile')->name('user.profile');
Route::get('user/post/article','User\ProfileController@PostArticle');
Route::get('posts/{slug}','User\HomeController@singlepost');
Route::get('user/@{slug}','User\ProfileController@UsersProfile');
Route::get('services',function(){
    return view('frontend.services');
}); 
Route::get('/search',function(){
    $query=null;
    return view('frontend.search')->with('query',$query);
});
Route::get('/searchresults','User\HomeController@search')->name('search.everything');
Route::get('/','User\HomeController@index')->name('home');
Route::post('user/post/article','User\ProfileController@SaveUserArticle');

Route::post('/savearticle','User\ProfileController@SaveArticle');
Route::post('/savejob','User\ProfileController@SaveJob');
Route::post('/saveevent','User\ProfileController@SaveEvent');
Route::post('/saveopportunity','User\ProfileController@SaveJob');
Route::post('/editprofile','User\ProfileController@EditProfile');
Route::post('/likearticle','User\ProfileController@LikeArticle');
Route::get('/events','User\HomeController@events')->name('events');
Route::post('user/changepicture','User\ProfileController@ChangePicture')->name('change.picture');

Route::get('/events/{slug}','User\HomeController@singleevents')->name('single.events');

Route::get('/opportunities','User\HomeController@opportunities');
Route::get('/opportunities/category/{slug}','User\HomeController@SortOpportunities');
Route::get('/opportunities/{slug}','User\HomeController@singleopportunities')->name('single.opportunities');
//tag routes
Route::get('posts/tags/{tag}','User\HomeController@PostTags');
Route::get('events/tags/{tag}','User\HomeController@EventsTags');
Route::get('opportunities/tags/{tag}','User\HomeController@OpportunitiesTags');
Route::get('posts/category/{slug}','User\HomeController@SortPosts');
Route::get('category/{slug}','User\HomeController@HomeCategory');




// Route::post('/subscribe','HomeController@subscribe')->name('subscribe');
// Route::get('unsubscribe/{token}','HomeController@unsubscribe')->name('unsubscribe');
// Route::post('unsubscribe/{token}','HomeController@unsubscribed')->name('unsubscribed');

Auth::routes();

Route::prefix('admin')->group(function(){
    Route::get('/login','Admin\Auth\LoginController@showLoginForm')->name('admin_login');
	Route::post('/login','Admin\Auth\LoginController@login');
	Route::post('/logout','Admin\Auth\LoginController@logout')->name('admin_logout');
	Route::post('/password/email','Admin\Auth\ForgotPasswordController@sendResetLinkEmail')->name('admin_password.email');
	Route::post('/password/reset','Admin\Auth\ResetPasswordController@reset');
	Route::get('/password/reset','Admin\Auth\ForgotPasswordController@showLinkRequestForm')->name('admin_password.request');
	Route::get('/password/reset/{token}','Admin\Auth\ResetPasswordController@showResetForm')->name('admin_password.reset');
    
    Route::get('profile','Admin\ProfileController@index')->name('profile');
    Route::post('profile/changePassword','Admin\ProfileController@changePassword')->name('profile.changePassword');
    Route::post('profile/changeName','Admin\ProfileController@updateName')->name('profile.updateName');

    Route::post('albums/{id}/addImages','Admin\AlbumController@addImages')->name('albums.addImages');
    Route::delete('albums/{album_id}/deleteImage/{image_id}','Admin\AlbumController@deleteImage')->name('albums.deleteImage');
    Route::resource('albums', 'Admin\AlbumController',['except' => ['create','edit']]);

    Route::get('settings','Admin\SettingsController@index')->name('admin.settings');
    Route::post('settings/addImage','Admin\SettingsController@addImage')->name('admin.settings.addImage');
    Route::delete('settings/removeImage/{id}','Admin\SettingsController@removeImage')->name('admin.settings.removeImage');
    Route::post('settings/contactUpdate','Admin\SettingsController@contactUpdate')->name('admin.settings.contactUpdate');
    Route::post('settings/aboutUpdate','Admin\SettingsController@aboutUpdate')->name('admin.settings.aboutUpdate');
    
    Route::get('newsletter','Admin\NewsletterController@newsletter')->name('newsletter');
    Route::post('newsletter/send','Admin\NewsletterController@newsletterSend')->name('newsletterSend');

    Route::get('contact-us-messages/unseen','Admin\ContactUsMessageController@unseenMsg')->name('contact-us-messages.unseen');    
    Route::get('contact-us-messages/reply/{id}','Admin\ContactUsMessageController@reply')->name('contact-us-messages.reply');
    Route::post('contact-us-messages/reply/{id}','Admin\ContactUsMessageController@replySend')->name('contact-us-messages.replySend');
    Route::resource('contact-us-messages', 'Admin\ContactUsMessageController',['only' => ['show','destroy','index']]);
    Route::get('getUnseenMsgCount','Admin\ContactUsMessageController@getUnseenMsgCount')->name('getUnseenMsgCount');
    Route::get('getUnseenMsg','Admin\ContactUsMessageController@getUnseenMsg')->name('getUnseenMsg');

    Route::resource('testimonials', 'Admin\TestimonialController',['except' => ['create','show']]);

    Route::get('dashboard','Admin\AdminController@index')->name('admin_dashboard');

    Route::get('/','Admin\AdminController@index');

    //category routes
    Route::post('category','Admin\CategoryController@create')->name('category.add');
    Route::post('category/delete','Admin\CategoryController@destroy')->name('category.delete');
    Route::post('category/update','Admin\CategoryController@update')->name('category.update');
    Route::get('categories','Admin\CategoryController@index')->name('category.index');
    //opportunities Category
    Route::post('opportunitiescategory','Admin\CategoryController@OppoCreate')->name('oppocategory.add');
    Route::post('opportunitiescategory/update','Admin\CategoryController@OppoUpdate')->name('oppocategory.update');
    Route::post('opportunitiescategory/delete','Admin\CategoryController@OppoDestroy')->name('oppocategory.delete');
    //posts
    Route::get('posts','Admin\PostsController@index')->name('posts.index');
    Route::post('posts','Admin\PostsController@store')->name('posts.store');
    Route::get('posts/edit/{id}','Admin\PostsController@edit')->name('posts.edit');
    Route::post('posts/update','Admin\PostsController@update')->name('posts.update');
    Route::post('posts/destroy','Admin\PostsController@destroy')->name('posts.destroy');
    Route::get('postsearch','Admin\PostsController@search')->name('posts.search');
    Route::get('posts/view/{id}','Admin\PostsController@view')->name('posts.view');

    //events routes
    Route::get('events','Admin\EventController@index')->name('events.index');
    Route::post('events','Admin\EventController@store')->name('events.store');
    Route::get('events/edit/{id}','Admin\EventController@edit')->name('events.edit');
    Route::post('events/update','Admin\EventController@update')->name('events.update');
    Route::post('events/destroy','Admin\EventController@destroy')->name('events.destroy');
    Route::get('eventsearch','Admin\EventController@search')->name('events.search');
    Route::get('event/view/{id}','Admin\EventController@view')->name('events.view');

    //opportunities
    Route::get('opportunities','Admin\OpportunityController@index')->name('opportunities.index');
    Route::post('opportunities','Admin\OpportunityController@store')->name('opportunities.store');
    Route::get('opportunities/edit/{id}','Admin\OpportunityController@edit')->name('opportunities.edit');
    Route::post('opportunities/update','Admin\OpportunityController@update')->name('opportunities.update');
    Route::post('opportunities/destroy','Admin\OpportunityController@destroy')->name('opportunities.destroy');
    Route::get('opportunitiessearch','Admin\OpportunityController@search')->name('opportunities.search');
    Route::get('opportunities/view/{id}','Admin\OpportunityController@view')->name('opportunities.view');
   //user post approval
   Route::get('users/posts/verify','Admin\UserPostVerifyController@UserPostList');
   Route::get('users/post/{id}','Admin\UserPostVerifyController@UserPost')->name('admin.userspost.view');
   Route::get('users/posts/approve/{id}','Admin\UserPostVerifyController@EditUserPost')->name('admin.userposts.edit');
   Route::post('users/posts/approved','Admin\UserPostVerifyController@ApproveUserPost')->name('admin.approve.post');
   Route::post('users/posts/delete','Admin\UserPostVerifyController@DeletePost')->name('userposts.destroy');
    
   //feature article
   Route::post('featurearticle','Admin\PostsController@FeatureArticle');


   //Poem Controller
    Route::get('poems','Admin\PoemController@index')->name('poem.index');
    
});

Route::get('/assets/{source}/{img}/{h}/{w}',function($source,$img, $h, $w){
    return \Image::make(public_path("/".$source."/".$img))->resize($h, $w)->response('jpg');
})->name('asset');
Route::get('/assets/{source}/{source2}/{img}/{h}/{w}',function($source,$source2,$img, $h, $w){
   
    return \Image::make(public_path("/".$source."/".$source2."/".$img))->resize($h, $w)->response('jpg');
})->name('asset1');
Route::get('/asset/{source}/{img}/{ext}/{h}/{w}',function($source,$img,$ext, $h, $w){
    return \Image::make(public_path("/".$source."/".$img))->resize($h, $w)->response($ext);
})->name('asset2');

Route::get('signin/{provider}', 'Auth\LoginController@loginProviderUrl');
Route::get('signin/{provider}/callback', 'Auth\LoginController@handleProviderCallback');
Route::get('confirm/resend','Auth\RegisterController@resendConfirmation')->name('resend_confirmation');
Route::get('confirm/user/{token}','Auth\LoginController@confirmEmail')->name('confirmEmail');
Route::post('signup/getEmail','Auth\LoginController@setEmail')->name('set_email');
