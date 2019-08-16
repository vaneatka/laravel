<?php

/*
Rutele administrative
*/

Route::get('/', function () {
    return view('admin.dashboard');
});

Route::get('/test', function () {
    return 'Test normal';
});



