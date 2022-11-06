<?php

use App\Http\Controllers\PublicWebsiteController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.welcome', compact([
        []
    ]));
})->name('home-screen');

// za dinamicke stranice koje se prave preko WYSIWYG
Route::get('page/{slug}', [PublicWebsiteController::class, 'displayPage'])->name('display-page');

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
    Route::post('pages/media', 'PageController@storeMedia')->name('pages.storeMedia');
    Route::post('pages/ckmedia', 'PageController@storeCKEditorImages')->name('pages.storeCKEditorImages');
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

    // Document And Regulation
    Route::delete('document-and-regulations/destroy', 'DocumentAndRegulationController@massDestroy')->name('document-and-regulations.massDestroy');
    Route::post('document-and-regulations/media', 'DocumentAndRegulationController@storeMedia')->name('document-and-regulations.storeMedia');
    Route::post('document-and-regulations/ckmedia', 'DocumentAndRegulationController@storeCKEditorImages')->name('document-and-regulations.storeCKEditorImages');
    Route::resource('document-and-regulations', 'DocumentAndRegulationController');

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

    // River Basin
    Route::delete('river-basins/destroy', 'RiverBasinController@massDestroy')->name('river-basins.massDestroy');
    Route::post('river-basins/media', 'RiverBasinController@storeMedia')->name('river-basins.storeMedia');
    Route::post('river-basins/ckmedia', 'RiverBasinController@storeCKEditorImages')->name('river-basins.storeCKEditorImages');
    Route::resource('river-basins', 'RiverBasinController');

    // Flood Defense Point
    Route::delete('flood-defense-points/destroy', 'FloodDefensePointController@massDestroy')->name('flood-defense-points.massDestroy');
    Route::resource('flood-defense-points', 'FloodDefensePointController');

    // Gas Emission
    Route::delete('gas-emissions/destroy', 'GasEmissionController@massDestroy')->name('gas-emissions.massDestroy');
    Route::resource('gas-emissions', 'GasEmissionController');

    // Earthquake
    Route::delete('earthquakes/destroy', 'EarthquakeController@massDestroy')->name('earthquakes.massDestroy');
    Route::resource('earthquakes', 'EarthquakeController');
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
Route::get('hidrologija/mapa-stanica', function () {
    return view('pages.hidrologija.mapa-stanica');
})->name('hidrologija.mapa-stanica');

Route::get('uslovi-koriscenja', function () {
    return view('pages.terms');
})->name('terms');
Route::get('pristup-informacijama', function () {
    return view('pages.information-access');
})->name('information-access');

// Public competition
Route::get('javni-konkursi', [\App\Http\Controllers\WebsiteController::class, 'publicCompetitions'])->name('public-competitions');
Route::get('javni-konkursi/{public_competition}', [\App\Http\Controllers\WebsiteController::class, 'publicCompetition'])->name('public-competition');

// Media download
Route::get('download/{media}', [\App\Http\Controllers\WebsiteController::class, 'downloadMedia'])->name('download-media');

// Public purchases
Route::get('javne-nabavke', [\App\Http\Controllers\WebsiteController::class, 'publicPurchases'])->name('public-purchases');
Route::get('javne-nabavke/{public_purchase}', [\App\Http\Controllers\WebsiteController::class, 'publicPurchase'])->name('public-purchase');

// Public purchases
Route::get('dokumenti-i-propisi', [\App\Http\Controllers\WebsiteController::class, 'documents'])->name('document-and-regulations');
Route::get('dokumenti-i-propisi/{document_and_regulation}', [\App\Http\Controllers\WebsiteController::class, 'document'])->name('document-and-regulations.view');

Route::get('kontakt', [\App\Http\Controllers\WebsiteController::class, 'contact'])->name('contact');
Route::post('kontakt', [\App\Http\Controllers\WebsiteController::class, 'saveContact'])->name('contact.post');


Route::get('post/{post}', [\App\Http\Controllers\WebsiteController::class, 'post'])->name('post.view');


// Routes for questionnaires
Route::get('ankete', [\App\Http\Controllers\WebsiteController::class, 'questionnaires'])->name('questionnaires');
Route::get('ankete/{questionnaire}', [\App\Http\Controllers\WebsiteController::class, 'questionnaire'])->name('questionnaire.view');
