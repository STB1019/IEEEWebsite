<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\FrontController;
use \App\Http\Controllers\FormController;
use \App\Http\Controllers\AuthController;
use \App\Http\Controllers\LangController;

// Handles an AJAX request to check if the email address is already taken.
Route::get('/ajaxEmail', [AuthController::class, 'ajaxEmail']);

//=======================================
// User Authentication Routes
//=======================================
Route::group(['middleware' => ['startSession','authCustom']], function() {
    Route::get('/user/logout', [AuthController::class, 'logout'])->name('user.logout');
});

//=======================================
// Member Routes (also Admin and Web.)
//=======================================
Route::group(['middleware' => ['startSession','isAtLeastMember']], function() {
    Route::get('panel', [FrontController::class, 'getPanel'])->name('panel');

    // Handles an AJAX request to check if the old password is correct.
    Route::get('/ajaxPassword', [\App\Http\Controllers\UserController::class, 'ajaxOldPassword']);
    
    Route::resource('user', \App\Http\Controllers\UserController::class,[
        'only' => ['edit','update']
    ]);
});

//=======================================
// WebMaster Routes (also Admin)
//=======================================
Route::group(['middleware' => ['startSession','isAtLeastWebMaster']], function() {

    Route::get('/project/editlist', [FormController::class, 'getProjectEditListForm'])->name('project.editlist');
    Route::get('/event/editlist', [FormController::class, 'getEventEditListForm'])->name('event.editlist');
    Route::get('/news/editlist', [FormController::class, 'getNewsEditListForm'])->name('news.editlist');

    Route::get('/project/deletelist', [FormController::class, 'getProjectDeleteListForm'])->name('project.deletelist');
    Route::get('/event/deletelist', [FormController::class, 'getEventDeleteListForm'])->name('event.deletelist');
    Route::get('/news/deletelist', [FormController::class, 'getNewsDeleteListForm'])->name('news.deletelist');

    //Note: index is not included because also not members can view the list of projects, events, news.
    Route::resource('project', \App\Http\Controllers\ProjectController::class,[
        'except' => ['index','show']
    ]);
    Route::resource('news', \App\Http\Controllers\NewsController::class,[
        'except' => ['index','show']
    ]);
    Route::resource('event', \App\Http\Controllers\EventController::class,[
        'except' => ['index','show']
    ]);
});

//=======================================
// Admin Routes
//=======================================
Route::group(['middleware' => ['startSession','isAdmin']], function() {
    Route::get('/user/editlist', [FormController::class, 'getUserEditListForm'])->name('user.editlist');
    Route::get('/user/deletelist', [FormController::class, 'getUserDeleteListForm'])->name('user.deletelist');
    Route::resource('user', \App\Http\Controllers\UserController::class,[
        'only' => ['delete']
    ]);
});

//=======================================
// General Routes
//=======================================
Route::group(['middleware' => ['startSession']], function() {
    Route::get('/', [FrontController::class, 'getHome'])->name('home')->middleware(['lang']);

    Route::get('eventspage', [FrontController::class, 'getEvents'])->name('eventspage');
    Route::get('faq', [FrontController::class, 'getFaq'])->name('faq');
    Route::get('members', [FrontController::class, 'getMembers'])->name('members');
    Route::get('text/{id}/{layout}/{type}', [FrontController::class, 'getText'])->name('text');


    Route::get('login', [AuthController::class, 'getLogin'])->name('login');
    Route::get('register', [AuthController::class, 'getRegistration'])->name('register');
    Route::get('about', [FrontController::class, 'getAbout'])->name('about');

    Route::get('/lang/{lang}', [LangController::class, 'changeLanguage'])->name('setLang');

    Route::post('/user/login', [AuthController::class, 'login'])->name('user.login');
    Route::post('/user/register', [AuthController::class, 'registration'])->name('user.register');

    Route::get('error', [FrontController::class, 'notFound'])->name('error');

    Route::resource('project', \App\Http\Controllers\ProjectController::class,[
        'only' => ['index','show']
    ]);
    Route::resource('news', \App\Http\Controllers\NewsController::class,[
        'only' => ['index','show']
    ]);
    Route::resource('event', \App\Http\Controllers\EventController::class,[
        'only' => ['index','show']
    ]);

    Route::resource('user', \App\Http\Controllers\UserController::class,[
        'except' => ['delete','edit','update']
    ]);

    Route::fallback([FrontController::class, 'notFound']);
});