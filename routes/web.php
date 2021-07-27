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
        Route::resource('files', File\FileController::class);
        
        // Beneficiary
        Route::resource('beneficiaries', Beneficiary\BeneficiaryController::class);
        Route::get('searchbeneficiaries', [Beneficiary\BeneficiaryController::class, 'search']);


        // Benefits
        Route::resource('benefits', BenefitController::class);

        // Individuals
        //Route::prefix('individuals')->group( function () {
            
            //Route::resource('/psscases', Supervisor\PssCaseController::class);
            //Route::resource('/statistics', Supervisor\StatisticController::class);
        //});




        Route::get('/individuals/create/{id}', 'Individual\IndividualController@create')->name('individuals.create');
        Route::resource('/individuals', 'Individual\IndividualController', ['except' => ['create']], ['names' => 'individuals']);

        //Route::resource('individuals', Individual\IndividualController::class, ['names' => 'individuals']);
        Route::get('search', 'Individual\SearchController@index')->name('individuals.search');


        // Home (Dashboard)
        Route::get('/', 'HomeController@index')->name('dashboard');

        // Referrals
        Route::resource('referrals', ReferralController::class);

        // PSS Cases
        Route::resource('psscases', PssCaseController::class);

        // Employees
        Route::resource('employees', Employee\EmployeeController::class);

        // Teams
        Route::namespace('Team')->group(function () {
            Route::resource('teams', 'TeamController');
        });



        // Statistics
        Route::prefix('statistics')->name('statistics.')->group( function () {
        });



        //PSW
        Route::prefix('psw')->name('psw.')->group( function () {
            Route::get('/psscases/create/{id}', 'Psw\PssCaseController@create')->name('psscases.create');
            Route::resource('/psscases', Psw\PssCaseController::class, ['except' => ['create']]);
        });

        //PSW
        Route::get('psscases/create/{id}', 'PssCaseController@create')->name('psscases.create');
        Route::resource('psscases', PssCaseController::class, ['except' => ['create']]);



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


        //==============================Case Types============================
        Route::namespace('CaseTypes')->group(function () {
            Route::resource('casetypes', 'CaseTypeController');
        });

        //==============================Follow Ups============================
        Route::namespace('FollowUp')->group(function () {
            Route::resource('followups', 'FollowUpController');
        });






        //==============================Surveys============================
        Route::namespace('Surveys')->group(function () {
            Route::resource('surveys', 'SurveyController');
        });
});




