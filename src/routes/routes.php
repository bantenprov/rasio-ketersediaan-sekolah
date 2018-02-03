<?php

Route::group(['prefix' => 'rk-sekolah-sd-mi', 'middleware' => ['web']], function() {

    $controllers = (object) [
        'index'     => 'Bantenprov\RKSekolahSDMI\Http\Controllers\RKSekolahSDMIController@index',
        'create'     => 'Bantenprov\RKSekolahSDMI\Http\Controllers\RKSekolahSDMIController@create',
        'store'     => 'Bantenprov\RKSekolahSDMI\Http\Controllers\RKSekolahSDMIController@store',
        'show'      => 'Bantenprov\RKSekolahSDMI\Http\Controllers\RKSekolahSDMIController@show',
        'update'    => 'Bantenprov\RKSekolahSDMI\Http\Controllers\RKSekolahSDMIController@update',
        'destroy'   => 'Bantenprov\RKSekolahSDMI\Http\Controllers\RKSekolahSDMIController@destroy',
    ];

    Route::get('/',$controllers->index)->name('rk-sekolah-sd-mi.index');
    Route::get('/create',$controllers->create)->name('rk-sekolah-sd-mi.create');
    Route::post('/store',$controllers->store)->name('rk-sekolah-sd-mi.store');
    Route::get('/{id}',$controllers->show)->name('rk-sekolah-sd-mi.show');
    Route::put('/{id}/update',$controllers->update)->name('rk-sekolah-sd-mi.update');
    Route::post('/{id}/delete',$controllers->destroy)->name('rk-sekolah-sd-mi.destroy');

});

