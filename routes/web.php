<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes([
    'register' => false,
    'verify'=>true
]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group([
    'prefix' => 'admins',
    'as' => 'admin.',
    'namespace' => 'App\Http\Controllers\Admin',
    'middleware' => ['auth', 'verified']
], function () {
    //Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');
});

Route::group([
    'prefix' => 'profile',
    'as' => 'profile.',
    'namespace' => 'App\Http\Controllers\Auth',
    'middleware' => ['auth', 'verified']
], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
    }

});

Route::group([
    'prefix' => 'crm',
    'as' => 'crm.',
    'namespace' => 'App\Http\Controllers\CRM',
    'middleware' => ['auth', 'verified']
], function () {
    //companies
    Route::delete('companies/destroy', 'CompaniesController@massDestroy')->name('companies.massDestroy');
    Route::post('companies/media', 'CompaniesController@storeMedia')->name('companies.storeMedia');
    Route::resource('companies', 'CompaniesController');

    //employees
    Route::delete('employees/destroy', 'EmployeesController@massDestroy')->name('employees.massDestroy');
    Route::resource('employees', 'EmployeesController');
});
