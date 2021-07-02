<?php

use App\Http\Controllers\BeneficiaryController;
use App\Models\Beneficiary;
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



 //==============================Translate all pages============================
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth']
    ], function () {

        // users and roles
        Route::resource('users', UserController::class);
        Route::resource('roles', RoleController::class);

        // File Search
        Route::resource('files', FileController::class);

        // Serice Records
        Route::resource('servicerecords', ServiceRecordController::class);

        // Individuals
        Route::get('/individuals/create/{id}', 'IndividualController@create')->name('individuals.create');
        Route::resource('/individuals', 'IndividualController', ['except' => ['create']]);

        // Home (Dashboard)
        Route::get('/', 'HomeController@index')->name('dashboard');

        // Referrals
        Route::resource('referrals', ReferralController::class);

        // Employees
        Route::resource('employees', Employee\EmployeeController::class);

        // Teams
        Route::namespace('Team')->group(function () {
            Route::resource('teams', 'TeamController');
        });

        // Statistics
        Route::prefix('statistics')->name('statistics.')->group( function () {
        });

        // Supervisor
        Route::prefix('supervisor')->name('supervisor.')->group( function () {
            Route::resource('/psscases', Supervisor\PssCaseController::class);
            Route::resource('/statistics', Supervisor\StatisticController::class);
        });

        //PSW
        Route::prefix('psw')->name('psw.')->group( function () {
            Route::get('/psscases/create/{id}', 'Psw\PssCaseController@create')->name('psscases.create');
            Route::resource('/psscases', Psw\PssCaseController::class, ['except' => ['create']]);

        });


        //PSS Cases
        Route::prefix('psscases')->name('psscases.')->group( function () {
            Route::resource('/', PssCase\PssCaseController::class);
        });

        // PS Cases Activities
        Route::namespace('PsCaseActivities')->group(function () {
            Route::resource('pscaseactivities', 'PsCaseActivityController');
        });





        // PS-Worker-Related Routes
        Route::prefix('psworker')->name('psworker.')->group( function () {
            Route::resource('/profile', PsWorkers\PsWorkerController::class);
            Route::resource('/cases', PsWorkers\CaseController::class);
        });


        //for now, create the CaseController inside the PSWorkers controllers namespace
        //then check how to add cases using the adim user (I think admin shouldn't add cases for workers)



        //==============================Identity Cards============================
        Route::group(['namespace' => 'IdentityCards'], function () {
            Route::resource('identitycards', 'IdentityCardController');
        });

        //==============================Nationality============================
        Route::namespace('Nationality')->group(function () {
            Route::resource('nationalities', 'NationalityController');
        });

        //==============================Referral Sources============================
        Route::namespace('ReferralSources')->group(function () {
            Route::resource('referralsources', 'ReferralSourceController');
        });

        //============================== statuses============================
        Route::namespace('Statuses')->group(function () {
            Route::resource('statuses', 'StatusController');
        });

        //==============================Case Types============================
        Route::namespace('CaseTypes')->group(function () {
            Route::resource('casetypes', 'CaseTypeController');
        });

        //==============================Visits============================
        Route::namespace('Visits')->group(function () {
            Route::resource('visits', 'VisitController');
        });

        //==============================PS Workers============================
        Route::namespace('PsWorkers')->group(function () {
            Route::resource('psworkers', 'PsWorkerController');
        });





        //==============================Surveys============================
        Route::namespace('Surveys')->group(function () {
            Route::resource('surveys', 'SurveyController');
        });
});




