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



 //==============================Translate all pages============================
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth']
    ], function () {

        // users and roles
        Route::resource('users', UserController::class);
        Route::resource('roles', RoleController::class);

        // Files
        Route::resource('files', FileController::class);

        // Referrals
        Route::resource('referrals', ReferralController::class);

        // PSS
        Route::resource('pss', PssController::class);

        // Employees
        Route::resource('employees', Employee\EmployeeController::class);

        // Teams
        Route::namespace('Team')->group(function () {
            Route::resource('teams', 'TeamController');
        });

        //PSS Cases
        Route::prefix('psscases')->name('psscases.')->group( function () {
            Route::resource('/mycases', Employee\PsCaseController::class);
            Route::resource('/teamcases', Team\PsCaseController::class);
            Route::resource('/allcases', PssCase\PssCaseController::class);
        });

        //PSW
        Route::prefix('psw')->name('psw.')->group( function () {
            Route::resource('/psscases', Psw\PssCaseController::class);
        });


        //PSS Cases
        Route::prefix('psscases')->name('psscases.')->group( function () {
            Route::resource('/all', PssCase\PssCaseController::class);
        });

        // PS Cases Activities
        Route::namespace('PsCaseActivities')->group(function () {
            Route::resource('pscaseactivities', 'PsCaseActivityController');
        });


        // Home (Dashboard)
        Route::get('/', 'HomeController@index')->name('dashboard');


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

        //==============================Case Statuses============================
        Route::namespace('CaseStatuses')->group(function () {
            Route::resource('casestatuses', 'CaseStatusController');
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




