<?php

    // api/support/notifications

    Route::group(['prefix' => 'notifications/'] , function (){
        // Route::get('','NotificationsController@index')->name('notifications.index'); # index
        // Route::get('/{id}/edit','NotificationsController@edit')->name('notifications.edit'); # edit
        //Route::put('/{id}','NotificationsController@update')->name('notifications.update'); # update
        Route::get('/type/{type}','NotificationsController@showByType')->name('notifications.showByType'); # showByType
        Route::get('/{id}','NotificationsController@show')->name('notifications.show'); # show
    });
