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

Route::get('/', 'PublicController@index')->name('index');

Route::get('/search', 'PublicController@search')->name('search');
Route::post('/search-result', 'PublicController@searchResult')->name('searchResult');

// Route::get('/ip', 'PublicController@getIp')->name('getIp');
// Route::get('/send', 'PublicController@sendSms');

Route::get('/about', 'PublicController@about')->name('about');
Route::post('/about/message', 'PublicController@contact_message')->name('contactmessage');


Route::get('/blog', 'PublicController@blog')->name('blog');
Route::get('/blog/post/{id}', 'PublicController@singlePost')->name('singlePost');

Route::get('/faq', 'PublicController@faq')->name('faq');

Route::get('/emergency', 'PublicController@emergency')->name('emergency');

Route::get('/register/findArea','PublicController@findArea');

Auth::routes();

Route::get('/verify', 'VerifyController@getVerify');
Route::post('/verify', 'VerifyController@postVerify')->name('verify');
Route::post('/resendVerify/{phone}', 'VerifyController@resendVerify')->name('resendVerify');

Route::post('/reset/password', 'VerifyController@resetPassword')->name('resetPassword');
Route::get('passwords/verify', 'VerifyController@verifyPhone')->name('verifyPhone');
Route::post('passwords/verify', 'VerifyController@verifyToken')->name('verifyToken');
Route::get('/reset', 'VerifyController@resetPhone')->name('resetPhone');

Route::post('/reset', 'VerifyController@resetPasswordPassword')->name('resetPasswordPassword');


Route::get('/user/profile/', 'UserController@profile')->name('UserProfile');
Route::post('/user/profileUpdate/{id}', 'UserController@profileUpdate')->name('userpersonalinfoupdate');
Route::post('/user/emergency_contact/{id}', 'UserController@emergency_contact')->name('useremergencycontact');
Route::post('/user/desable_search/{id}', 'UserController@desable_search')->name('userdisablesearch');

Route::post('/user/change-password/{id}', 'UserController@changePassword')->name('userChangePassword');


Route::post('/user/donation_date/', 'UserController@donation_date')->name('userdonationdate');
Route::post('/user/donation_date/', 'UserController@donation_date')->name('userdonationdate');
Route::get('/user/deleteDonationDate/{id}', 'UserController@deleteDonationDate')->name('userdeleteDonationDate');


Route::post('/total_donated/{id}', 'UserController@storeTotalDonated')->name('totalDonated');


Route::post('/no_donated/{id}', 'UserController@storeTotalDonatedNo')->name('no_donated');


Route::get('/posts', 'PostController@all_posts')->name('posts');

Route::prefix('admin')->group(function(){

	Route::get('login', 'Admin\LoginController@showLoginForm')->name('admin.login');
	Route::post('login', 'Admin\LoginController@login')->name('admin.login.submit');
	Route::post('logout', 'Admin\LoginController@logout')->name('admin.logout');

	Route::get('/', 'AdminController@index')->name('dashboard');
	Route::get('/all-users', 'AdminController@allUsers')->name('allUsers');
	Route::get('/all-users/action', 'AdminController@action')->name('live_search.action');

	Route::get('/online-users', 'AdminController@onlineUsers')->name('onlineUsers');
	Route::get('/active-donors', 'AdminController@activeDonors')->name('activeDonors');
	Route::get('/emergency-donors', 'AdminController@emergencyDonors')->name('emergencyDonors');

	Route::get('/delete-donors/{id}', 'AdminController@deleteUser')->name('deleteUser');
	Route::get('/block-donors/{id}', 'AdminController@blockUser')->name('blockUser');

	Route::get('/all-districts/', 'AdminController@allDistricts')->name('allDistricts');
	Route::get('/all-areas/', 'AdminController@allAreas')->name('allAreas');
	Route::get('/add-address/', 'AdminController@addAddress')->name('addAddress');
	Route::post('/add-address/store', 'AdminController@addAddressStore')->name('addAddressStore');

	Route::get('/add-post/', 'AdminController@addPost')->name('addPost');
	Route::post('/add-post/store', 'AdminController@addPostStore')->name('addPostStore');

	Route::get('/all-posts/', 'AdminController@allPosts')->name('allPosts');


	Route::get('/all-posts/edit/{id}', 'AdminController@editPost')->name('editPost');
	Route::post('/all-posts/edit/{id}', 'AdminController@editPostStore')->name('editPostStore');


	Route::get('/all-posts/delete/{id}', 'AdminController@deletePost')->name('deletePost');


	Route::get('/post-categories/', 'AdminController@categories')->name('categories');
	Route::post('/add-categories/', 'AdminController@addCategory')->name('addCategory');

	Route::get('/delete-category/{id}', 'AdminController@deleteCategory')->name('deleteCategory');
	Route::get('/block-category/{id}', 'AdminController@blockCategory')->name('blockCategory');

	Route::get('/faq/', 'AdminController@faqs')->name('faqs');
	Route::get('/add-faq/', 'AdminController@addFaqs')->name('addFaqs');
	Route::post('/add-faq/', 'AdminController@addFaqStore')->name('addFaqStore');

	Route::post('/edit-faq/{id}', 'AdminController@editFaq')->name('editFaq');

	Route::get('/delete-faq/{id}', 'AdminController@deleteFaq')->name('deleteFaq');


	Route::get('/emergencies/', 'AdminController@emergencyCon')->name('emergencyContact');
	
	Route::post('/emergencies/add', 'AdminController@AddEmergencyContact')->name('AddEmergencyContact');

	Route::post('/emergencies/edit/{id}', 'AdminController@EditEmergencyContact')->name('EditEmergencyContact');

	Route::get('/delete-emergency/{id}', 'AdminController@deleteEmergencyContact')->name('deleteEmergencyContact');

});

