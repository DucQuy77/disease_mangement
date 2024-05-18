<?php


use App\Http\Controllers\Admin\User\MainController;
use App\Http\Controllers\Admin\User\LoginController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\AccountController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProductController;
use App\Models\Account;
use Illuminate\Routing\RouteUrlGenerator;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group that
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('admin/users/login', [LoginController::class, 'index'])-> name('login');
Route::post('admin/users/login/store', [LoginController::class, 'store']);

Route::middleware(['auth'])-> group(function(){

    route::prefix('admin')->group(function(){

        route::get('/', [MainController::class, 'index']) -> name('admin') ;
        route::get('main', [MainController::class, 'index'])->name('main') ;
        route::get('/updateInfoAdmin/{id}', [MainController::class, 'updateInfoAdmin'])->name('updateAdmin');
        route::post('/updateInfoAdmin/{id}', [MainController::class, 'handleUpdateAdmin'])->name('updateHandleAdmin');
        route::post('/logout', [MainController::class, 'logout'])->name('logout');
        #Menu
        route::prefix('menus')-> group(function () {
            route::get('add', [MenuController::class, 'create']);
            route::get('filter-by-season', [MenuController::class, 'filterBySeason'])->name('filterBySeason');
            route::get('filter-by-object', [MenuController::class, 'filterByObject'])->name('filterByObject');
            route::get('search-by-disease-name', [MenuController::class, 'searchByDiseaseName'])->name('searchByDiseaseName');
            route::post('add', [MenuController::class, 'store']);
            route::get('list', [MenuController::class, 'index'])->name('index');
            route::get('edit/{disease}', [MenuController::class, 'show'])->name('menuForm');
            route::post('edit/{disease}', [MenuController::class, 'update'])->name('handleUpdateMenu');
            route::delete('destroy/{disease}', [MenuController::class, 'delete'])->name('deleteMenuItem');
        });

        #Season
        route::prefix('managements')->group(function (){
            route::get('seasons', [\App\Http\Controllers\Admin\ManagementController::class, 'listSeason'])->name('season');
            route::get('season/add', [\App\Http\Controllers\Admin\ManagementController::class, 'addSeasonForm'])->name('addSeasonForm');
            route::post('season/add', [\App\Http\Controllers\Admin\ManagementController::class, 'handleAddSeasonForm'])->name('handleAddSeasonForm');

            route::delete('season/delete/{season}', [\App\Http\Controllers\Admin\ManagementController::class, 'deleteSeason'])->name('deleteSeason');


            route::get('objects', [\App\Http\Controllers\Admin\ManagementController::class, 'listObject'])->name('object');
            route::get('object/add', [\App\Http\Controllers\Admin\ManagementController::class, 'addObjectForm'])->name('addObjectForm');
            route::post('object/add', [\App\Http\Controllers\Admin\ManagementController::class, 'handleAddObject'])->name('handleAddObject');

            route::delete('object/delete/{object}', [\App\Http\Controllers\Admin\ManagementController::class, 'deleteObject'])->name('deleteObject');
        });

        #Account
        route::prefix('accounts')->group(function(){
            route::get('add', [AccountController::class, 'create']);
            route::post('add', [AccountController::class, 'store']);
            route::get('list', [AccountController::class, 'index'])->name('listAccount');
            route::get('edit/{account}', [AccountController::class, 'show'])->name('showUpdate');
            route::post('edit/{account}', [AccountController::class, 'update'])->name('handleUpdate');
            route::delete('destroy/{account}', [AccountController::class, 'delete'])->name('deleteAccount');
            route::get('/change-password/{account}', [AccountController::class, 'showChangePasswordForm'])->name('showChange');
            route::post('/change-password/{account}', [AccountController::class, 'changePassword'])->name('handleChange');
        });
    });
});
Route::get('/register', [\App\Http\Controllers\User\UserController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [\App\Http\Controllers\User\UserController::class, 'register'])->name('handleRegister');
Route::get('/login', [\App\Http\Controllers\User\UserController::class, 'showLoginForm'])->name('login');
Route::post('/login', [\App\Http\Controllers\User\UserController::class, 'login'])->name('handleLogin');
Route::post('/logout', [\App\Http\Controllers\User\UserController::class, 'logout'])->name('logout');
Route::get('/', [\App\Http\Controllers\User\UserController::class, 'index'])->name('userInterface');
Route::get('/seasons/{id}', [\App\Http\Controllers\User\UserController::class, 'showDiseaseBySeason'])->name('categorySeason');
Route::get('/objects/{id}', [\App\Http\Controllers\User\UserController::class, 'showDiseaseByObject'])->name('categoryObject');
Route::get('/seasons/detailPost/{id}', [\App\Http\Controllers\User\UserController::class, 'detailPostSeason'])->name('detailPostSeason');
Route::get('/objects/detailPost/{id}', [\App\Http\Controllers\User\UserController::class, 'detailPostObject'])->name('detailPostObject');
Route::get('/search', [\App\Http\Controllers\User\UserController::class, 'search'])->name('search');
Route::post('/like', [\App\Http\Controllers\User\UserController::class, 'likes'])->name('likes');
Route::post('/comment', [\App\Http\Controllers\User\UserController::class, 'comments'])->name('comments');
