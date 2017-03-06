<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

//// Route admin api...
//// Principais servicos...
//Route::post('/login-app',  '\App\Domain\Users\UsersController@loginApp')->middleware('*');
//// criar usuario...
//// alterar usuario...
//Route::post('/clients-store', '\App\Domain\Clients\ClientsController@store');
//Route::post('/clients-update', '\App\Domain\Clients\ClientsController@update');
//Route::post('/projects-store', '\App\Domain\Projects\ProjectsController@store');
//Route::post('/updateCompletedProject', '\App\Domain\Projects\ProjectsController@updateCompleted');
//Route::post('/updateCompleteProjectsSteps', '\App\Domain\ProjectsSteps\ProjectsStepsController@updateComplete');
//Route::get('/allClients', '\App\Domain\Clients\ClientsController@allClients');
//Route::post('/updateDaysSteps', '\App\Domain\Steps\StepsController@updateDays');
//Route::get('/allProjects', '\App\Domain\Projects\ProjectsController@allProjects');
//Route::post('/updateCurretStep', '\App\Domain\Projects\ProjectsController@updateCurretStep');
//Route::get('/projectsSteps', '\App\Domain\Projects\ProjectsController@projectsSteps');
//Route::post('/justifications-store', '\App\Domain\Justifications\JustificationsController@store');
//Route::get('/allJustifications', '\App\Domain\Justifications\JustificationsController@allJustifications');
//// Servicos extras...
//Route::get('/allUser', '\App\Domain\Users\UsersController@allUser');
//Route::get('/allSteps', '\App\Domain\Steps\StepsController@allSteps');
//Route::post('/projects-update', '\App\Domain\Projects\ProjectsController@update');
//Route::post('/justifications-update', '\App\Domain\Justifications\JustificationsController@update');

