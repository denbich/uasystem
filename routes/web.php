<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\shop\SHomeController;
use App\Http\Controllers\admin\AHomeController;
use App\Http\Controllers\admin\AUserController;
use App\Http\Controllers\shop\SUkrainianController;

Route::get('language/{locale}', function($locale) { session(['locale' => $locale]); App::setLocale($locale); return back(); })->name('language');

Route::middleware('setlocale')->group(function(){
    Route::domain(env('APP_LINK'))->group(function () {
        Route::get('/', [HomeController::class, 'home'])->name('home');
    });


    Route::domain('rybnik.'.env('APP_LINK'))->group(function () {
        Route::redirect('/', '/login');
        //Route::get('/migrate', function () { $code = Artisan::call('migrate', [ '--force' => true]); echo $code; });

    Route::get('/home', function(){
        switch(Auth::user()->role)
        {
            case('admin'):
                return redirect()->route('a.dashboard');
                break;
            case('shop'):
                return redirect()->route('s.dashboard');
                break;
            case('organisation'):
                return redirect()->route('home');
                break;
        }
    })->name('redirect');

    Route::middleware('auth')->group(function() {
        Route::prefix('/admin')->middleware('admincheck')->group(function() {
            Route::prefix('command')->group(function () {
                Route::get('/migrate', function () { $code = Artisan::call('migrate', [ '--force' => true]); echo $code; });
                Route::get('/migrate-rollback', function () { $code = Artisan::call('migrate:rollback', [ '--force' => true]); echo $code; });
                Route::get('/storage-link', function () { $code = Artisan::call('storage:link', [ '--force' => true]); echo $code; });
            });
            Route::controller(AHomeController::class)->group(function(){
                Route::get('/', 'dashboard')->name('a.dashboard');
                Route::get('/profile', 'profile')->name('a.profile');
                Route::post('/profile', 'save_profile');
                Route::get('/settings', 'settings')->name('a.settings');
                Route::post('/settings', 'save_settings');
            });
            Route::get('/users/search', [AUserController::class, 'search'])->name('a.user.search');
            Route::get('/users/search-user', [AUserController::class, 'search_engine'])->name('a.user.searchuser');
            Route::resource('/users', AUserController::class, ['names' => [
                'index' => 'a.user.list', 'create' => 'a.user.create', 'store' => 'a.user.store', 'show' => 'a.user.show',
                'edit' => 'a.user.edit', 'update' => 'a.user.update', 'destroy' => 'a.user.destroy',
            ]]);

        });
        Route::prefix('/shop')->middleware('shopcheck')->group(function() {
            Route::controller(SHomeController::class)->group(function(){
                Route::get('/', 'dashboard')->name('s.dashboard');
                Route::get('/profile', 'profile')->name('s.profile');
                Route::post('/profile', 'save_profile');
                Route::get('/settings', 'settings')->name('s.settings');
                Route::post('/settings', 'save_settings');

                Route::prefix('/help-centre')->group(function() {
                    Route::get('/', 'help_centre')->name('s.help_centre');
                });

                Route::get('/excel', 'excel');
                Route::post('/excel', 'exceldo');

                Route::get('/visits', 'visits');
                Route::post('/visits', 'visitsdo');
            });
            Route::get('/ukrainian/search', [SUkrainianController::class, 'search'])->name('s.ukrainian.search');
            Route::get('/ukrainian/search-ukrainian', [SUkrainianController::class, 'search_engine'])->name('s.ukrainian.searchukrainian');
            Route::post('/ukrainian/add-visit/{ukrainian_id}', [SUkrainianController::class, 'add_visit'])->name('s.ukrainian.addvisit');
            Route::post('/ukrainian/visit', [SUkrainianController::class, 'visit'])->name('s.ukrainian.visit');
            Route::post('/ukrainian/digital/{id}', [SUkrainianController::class, 'digital'])->name('s.ukrainian.digital');
            Route::resource('/ukrainian', SUkrainianController::class, ['names' => [
                'index' => 's.ukrainian.list', 'create' => 's.ukrainian.create', 'store' => 's.ukrainian.store', 'show' => 's.ukrainian.show',
                'edit' => 's.ukrainian.edit', 'update' => 's.ukrainian.update', 'destroy' => 's.ukrainian.destroy',
            ]]);
        });
        Route::prefix('/organisation')->middleware('setlocale', 'organisationcheck')->group(function() {

        });
    });

    Auth::routes(['register' => false]);
    });


});

