<?php

header('Access-Control-Allow-Origin: *');
header( 'Access-Control-Allow-Headers: Authorization, Content-Type' );

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

// Authentication Routes...
use App\Domain\Users\User;
use Illuminate\Database\Eloquent\Factory as EloquentFactory;

Route::get('login', '\App\Domain\Auth\LoginController@showLoginForm');
Route::post('login', '\App\Domain\Auth\LoginController@login');
Route::get('logout', '\App\Domain\Auth\LoginController@logout');

// Password Reset Routes...
Route::get('password/reset/{token?}', '\App\Domain\Auth\ResetPasswordController@showResetForm');
Route::get('password/email', '\App\Domain\Auth\ForgotPasswordController@showLinkRequestForm');
Route::post('password/email', '\App\Domain\Auth\ForgotPasswordController@sendResetLinkEmail');
Route::get('password/reset', '\App\Domain\Auth\ResetPasswordController@showResetForm');
Route::post('password/reset', '\App\Domain\Auth\ResetPasswordController@reset');

// Route admin api...
// Principais servicos...
Route::post('/login-app',  '\App\Domain\Users\UsersController@loginApp'); // ok
// criar usuario...
// alterar usuario...
Route::post('/clients-store', '\App\Domain\Clients\ClientsController@store'); // ok
Route::post('/clients-update', '\App\Domain\Clients\ClientsController@update'); // ok
Route::post('/projects-store', '\App\Domain\Projects\ProjectsController@store');
Route::post('/updateCompletedProject', '\App\Domain\Projects\ProjectsController@updateCompleted');
Route::post('/updateCompleteProjectsSteps', '\App\Domain\ProjectsSteps\ProjectsStepsController@updateComplete');
Route::get('/allClients', '\App\Domain\Clients\ClientsController@allClients'); // ok
Route::post('/updateDaysSteps', '\App\Domain\Steps\StepsController@updateDays');
Route::get('/allProjects', '\App\Domain\Projects\ProjectsController@allProjects'); // ok
Route::post('/updateCurrentStep', '\App\Domain\Projects\ProjectsController@updateCurrentStep');
Route::get('/projectsSteps', '\App\Domain\Projects\ProjectsController@projectsSteps'); // ok
Route::post('/justifications-store', '\App\Domain\Justifications\JustificationsController@store');
Route::get('/allJustifications', '\App\Domain\Justifications\JustificationsController@allJustifications'); // ok
// Servicos extras...
Route::get('/allUser', '\App\Domain\Users\UsersController@allUser'); // ok
Route::get('/allSteps', '\App\Domain\Steps\StepsController@allSteps'); // ok
Route::post('/projects-update', '\App\Domain\Projects\ProjectsController@update');
Route::post('/justifications-update', '\App\Domain\Justifications\JustificationsController@update');

//Auth::routes();
Route::get('/', function() {
    return redirect('/admin');
});

//Route::post('/', function(\Illuminate\Http\Request $request) {
////    $disk = \Illuminate\Support\Facades\Storage::disk('public');
//    $disk = \Illuminate\Support\Facades\Storage::allFiles('/public/assets/admin/fonts');
//    dd($disk);
//});

Route::get('/home', function() {
    return redirect('/admin');
});

//Route::any('push-notification', function () {
//
//    return [
//        'push-notification' => \App\Domain\_Classes\DefaultService::pushNotification('channel_admin', 'event', [
//            'title' => str_random('5') . str_random('5'),
//            'message' => str_random('15'),
//            'time' => '5 mins',
//            'src' => '/assets/site/img/no-photo.gif',
//            'href' => 'javascript:void(0);'
//        ])
//    ];
//
//});

/*
|--------------------------------------------------------------------------
| Domain Routes
|--------------------------------------------------------------------------
*/

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {

    Route::get('/', '\App\Domain\Dashboard\DashboardController@index');

    Route::resource('users', '\App\Domain\Users\UsersController', ['only' => ['index', 'create', 'edit', 'store', 'update']]);

    Route::resource('roles', '\App\Domain\Roles\RolesController', ['only' => ['index', 'create', 'edit', 'store', 'update']]);

    Route::resource('permissions', '\App\Domain\Permissions\PermissionsController', ['only' => ['index', 'create', 'edit', 'store', 'update']]);

});
