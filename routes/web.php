<?php

use App\Http\Controllers\FormController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test-form', function() {
    $page = \Statamic\Facades\Entry::find('ddd3407e-804b-4780-a900-4c9d4dfd35f5');

    return view('welcome', ['page' => $page]);
});

Route::controller(FormController::class)
    ->group(function () {
        Route::post('/ajaxforms/{formHandle}', 'submitStatamicForm')->name('submit-statamic-form');
    });
