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

        Route::resource('employees', EmployeeController::class);

        // PS Cases
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




    //==============================grades============================
        Route::group(['namespace' => 'Grades'], function () {
            Route::resource('Grades', 'GradeController');
        });

        //==============================Classrooms============================
        Route::group(['namespace' => 'Classrooms'], function () {
            Route::resource('Classrooms', 'ClassroomController');
            Route::post('delete_all', 'ClassroomController@delete_all')->name('delete_all');

            Route::post('Filter_Classes', 'ClassroomController@Filter_Classes')->name('Filter_Classes');

        });


        //==============================Sections============================

        Route::group(['namespace' => 'Sections'], function () {

            Route::resource('Sections', 'SectionController');

            Route::get('/classes/{id}', 'SectionController@getclasses');

        });

        //==============================parents============================

        Route::view('add_parent','livewire.show_Form');

        //==============================Teachers============================
        Route::group(['namespace' => 'Teachers'], function () {
            Route::resource('Teachers', 'TeacherController');
        });

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
        Route::namespace('PsTeams')->group(function () {
            Route::resource('psteams', 'PsTeamController');
        });

        //==============================PS Workers============================
        Route::namespace('PsWorkers')->group(function () {
            Route::resource('psworkers', 'PsWorkerController');
        });

        //==============================PsCase============================
        Route::namespace('PsCases')->group(function () {
            Route::resource('pscases', 'PsCaseController');
        });



        //==============================Surveys============================
        Route::namespace('Surveys')->group(function () {
            Route::resource('surveys', 'SurveyController');
        });
});




