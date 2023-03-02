<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Home\AboutController;
use App\Http\Controllers\Home\HomeSliderController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\Home\PortfolioController;

Route::get('/', function () {
    return view('frontend.index');
});

Route::controller(homeController::class)->group( function(){
    Route::get('home', 'index')->name('home');

});

//  -----  Admin Controller  -----

Route::controller(AdminController::class)->group(function () {
    Route::get('admin/logout', 'destroy')->name('admin.logout');
    Route::get('admin/profile', 'profile')->name('admin.profile');
    Route::get('edit/edit.profile', 'EditProfile')->name('admin.edit.profile');
    Route::post('store/profile', 'StoreProfile')->name('store.profile');

    Route::get('change/password', 'changePassword')->name('change.password');
    Route::post('update/password', 'updatePassword')->name('update.password');
});


//  -----  Home Controller  -----

Route::controller(HomeSliderController::class )->group(function () {
    Route::get('home/slide', 'HomeSlider')->name('home.slide');
    Route::post('update/slider', 'UpdateSlider')->name('update.slider');

});


//  -----  َAbout Controller  -----

Route::controller(AboutController::class )->group(function () {
    Route::get('about/page', 'AboutPage')->name('about.page');
    Route::post('update.about', 'UpdateAbout')->name('update.about');
    Route::get('about', 'HomeAbout')->name('home.about');


    Route::get('about/multi/image', 'AboutMultiImage')->name('about.multi.image');
    Route::post('store/multi/image', 'StoreMultiImage')->name('store.multi.image');
    Route::get('all/multi/image', 'AllMultiImage')->name('all.multi.image');
    Route::get('edit/multi_image/{id}', 'EditMultiImage')->name('edit.multi_image');
    Route::post('update/multi/image', 'UpdateMultiImage')->name('update.multi.image');
    Route::get('delete/multi_image/{id}', 'DeleteMultiImage')->name('delete.multi_image');

});

  //  ------------- Portfolio Controller ---------------

Route::controller(PortfolioController::class )->group(function () {
    Route::get('all/portfolio', 'AllPortfolio')->name('all.portfolio');
    Route::get('add/portfolio', 'AddPortfolio')->name('add.portfolio');
    Route::post('store/portfolio', 'StorePortfolio')->name('store.portfolio');
    Route::get('edit/portfolio/{id}', 'EditProfile')->name('edit.portfolio');
    Route::post('update/portfolio', 'UpdateProfile')->name('update.portfolio');
    Route::get('delete/portfolio/{id}', 'DeleteProfile')->name('delete.portfolio');


});


  //  ------------- End Portfolio Controller ---------------




Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
