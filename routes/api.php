<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('contacts', [App\Http\Controllers\ContactController::class, 'contacts']);

Route::get('get_contact/{id}', [App\Http\Controllers\ContactController::class, 'getContact']);

Route::post('save_contact', [App\Http\Controllers\ContactController::class, 'saveContact']);

Route::delete('delete_contact/{id}', [App\Http\Controllers\ContactController::class, 'deleteContact']);

Route::post('update_contact/{id}', [App\Http\Controllers\ContactController::class, 'updateContact']);

