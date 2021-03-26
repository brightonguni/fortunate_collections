<?php

    Route::group(['prefix' => 'notifications/'] , function (){
        Route::get('','NotificationsController@index')->name('notifications.index')->middleware('permission:notification_list'); # index
        Route::post('/store', 'NotificationsController@store')->name('notifications.store')->middleware('permission:notification_create');
        Route::get('/create', 'NotificationsController@create')->name('notifications.create')->middleware('permission:notification_create');
        Route::get('/{id}/edit','NotificationsController@edit')->name('notifications.edit')->middleware('permission:notification_update'); # edit
        Route::put('/{id}','NotificationsController@update')->name('notifications.update')->middleware('permission:notification_update'); # update
        Route::get('/{id}','NotificationsController@show')->name('notifications.show')->middleware('permission:notification_read'); # show
    });
