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



Route::get('/', 'PagesController@index');

Route::get('/about', 'PagesController@about');

Route::get('/executives', 'PagesController@executives');

Route::get('/members', 'PagesController@members');

Route::get('/events', 'PagesController@events');

Route::get('/meetings', 'PagesController@meetings');

Route::get('/gallery', 'PagesController@gallery');

Route::get('/login', 'PagesController@gallery')->name('login');

Route::get('/membership', 'PagesController@selectMembership')->name('selectmembership');

Route::get('/event', 'PagesController@event')->name('event');

Route::get('/thankyou', 'PagesController@thanks')->name('thanks');

Route::get('/home', 'HomeController@index')->name('home');



//Emails

Route::get('/verify/{token}', 'VerifyController@verify')->name('verify');

Route::get('/resend/{token}', 'VerifyController@resendEmail')->name('resend');

// Route::get('user/{id}', function($id){

//     return 'Hello ' .$id;

// });



//Personal info and membership
Route::resource("MembershipsController", "MembershipsController");
Route::get('/create/{id}', 'AddressesController@index')->name('index');

Route::post('/create/{id}', 'AddressesController@store')->name('address.store');

Route::get('/edit/{id}', 'AddressesController@index2')->name('index2');

Route::post('/edit/{id}', 'AddressesController@update')->name('address.update');

Route::post('/membership/50-{id}', 'MembershipsController@store50')->name('membership.store50');

Route::post('/membership/{id}', 'MembershipsController@store250')->name('membership.store250');

Route::post('/membership', 'MembershipsController@index')->name('membership.index');

Route::post('/event', 'MembershipsController@eventIndex')->name('membership.eventIndex');

//Route::post('/event/{kidsAmount}-{kids}/{amount}-{quantity}/{name}-{phone}/{vip}-{vipAmount}-{email}', 'MembershipsController@event')->name('membership.eventConfirm');
Route::post('/event{kidsAmount}-{kids}/{amount}-{quantity}/{name}-{phone}/{vip}-{vipAmount}-{email}', [
    'uses' => 'MembershipsController@eventConfirm'
  ]);
//   Route::get('/event{kidsAmount}-{kids}/{amount}-{quantity}/{name}-{phone}/{vip}-{vipAmount}-{email}', [
//     'uses' => 'PagesController@eventConfrim'
//   ]);
Route::get  ('/thanks', [
'uses' => 'PagesController@thanks'
]);
  //('/thanks', 'PagesController@thanks')->name('thanks');


//Route::post('/event/success/{$amount}/{$quantity}', 'MembershipsController@event')->name('membership.event');



Auth::routes();



//Route::get('/dashboard', 'DashboardController@index');





