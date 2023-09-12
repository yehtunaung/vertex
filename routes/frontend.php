<?php


Route::get('/locale/{locale}',function($locale){
    Session::put('locale',$locale);
   return redirect()->back();
});

Route::group(['prefix' => '/', 'namespace' => 'Frontend'], function ()  {

    // Home Page
    Route::get('/', 'FrontendController@index')->name('index');

    // About Page
    Route::get('/about', 'AboutController@index')->name('about');

    // Room Page
    Route::get('/room', 'RoomController@index')->name('room');

    // Contact Page
    Route::get('/contact', 'ContactController@index')->name('contact');

    // Reservation Page
    Route::get('/reservation', 'ReservationController@index')->name('reservation');

    // Service Page
    Route::get('/facilities', 'ServiceController@facilities')->name('facilities');
    Route::get('/testimonial', 'ServiceController@testimonial')->name('testimonial');
    Route::get('/404', 'ServiceController@notfound')->name('404');

});
