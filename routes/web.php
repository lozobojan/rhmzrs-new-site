<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.welcome');
});

Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Auth::routes(['register' => false]);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Link
    Route::delete('links/destroy', 'LinkController@massDestroy')->name('links.massDestroy');
    Route::resource('links', 'LinkController');

    // Page
    Route::delete('pages/destroy', 'PageController@massDestroy')->name('pages.massDestroy');
    Route::resource('pages', 'PageController');

    // Post
    Route::delete('posts/destroy', 'PostController@massDestroy')->name('posts.massDestroy');
    Route::post('posts/media', 'PostController@storeMedia')->name('posts.storeMedia');
    Route::post('posts/ckmedia', 'PostController@storeCKEditorImages')->name('posts.storeCKEditorImages');
    Route::resource('posts', 'PostController');

    // Public Competition
    Route::delete('public-competitions/destroy', 'PublicCompetitionController@massDestroy')->name('public-competitions.massDestroy');
    Route::post('public-competitions/media', 'PublicCompetitionController@storeMedia')->name('public-competitions.storeMedia');
    Route::post('public-competitions/ckmedia', 'PublicCompetitionController@storeCKEditorImages')->name('public-competitions.storeCKEditorImages');
    Route::resource('public-competitions', 'PublicCompetitionController');

    // Public Purchase
    Route::delete('public-purchases/destroy', 'PublicPurchaseController@massDestroy')->name('public-purchases.massDestroy');
    Route::post('public-purchases/media', 'PublicPurchaseController@storeMedia')->name('public-purchases.storeMedia');
    Route::post('public-purchases/ckmedia', 'PublicPurchaseController@storeCKEditorImages')->name('public-purchases.storeCKEditorImages');
    Route::resource('public-purchases', 'PublicPurchaseController');

    // Project
    Route::delete('projects/destroy', 'ProjectController@massDestroy')->name('projects.massDestroy');
    Route::post('projects/media', 'ProjectController@storeMedia')->name('projects.storeMedia');
    Route::post('projects/ckmedia', 'ProjectController@storeCKEditorImages')->name('projects.storeCKEditorImages');
    Route::resource('projects', 'ProjectController');

    // Questionnaire
    Route::delete('questionnaires/destroy', 'QuestionnaireController@massDestroy')->name('questionnaires.massDestroy');
    Route::post('questionnaires/media', 'QuestionnaireController@storeMedia')->name('questionnaires.storeMedia');
    Route::post('questionnaires/ckmedia', 'QuestionnaireController@storeCKEditorImages')->name('questionnaires.storeCKEditorImages');
    Route::resource('questionnaires', 'QuestionnaireController');

    // Question
    Route::delete('questions/destroy', 'QuestionController@massDestroy')->name('questions.massDestroy');
    Route::resource('questions', 'QuestionController');

    // Answer
    Route::delete('answers/destroy', 'AnswerController@massDestroy')->name('answers.massDestroy');
    Route::resource('answers', 'AnswerController');
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    }
});

// test CMS
Route::get('hidrologija/mapa-stanica', function (){

})
    ->name('hidrologija.mapa-stanica');
