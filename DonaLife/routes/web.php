<?php

use App\Http\Controllers\Admin\BarangCampaignController;
use App\Http\Controllers\Admin\BeritaCampaignBarangController;
use App\Http\Controllers\Admin\BeritaCampaignUangController;
use App\Http\Controllers\CampaignRequestController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PaketController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\UangCampaignController;
use App\Http\Controllers\Admin\UserRequestController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BeritaDonasiController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController as UserProfileController;
use App\Http\Controllers\PaketDonasiController;
use App\Http\Controllers\UangDonasiController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\ProvinceController;
use App\Http\Controllers\SubdistrictController;
use Illuminate\Support\Facades\Route;




Route::redirect('', 'home', 301);
Route::get('home',[HomeController::class, 'index'])->name('home');
Route::prefix('auth/')->name('auth.')->group(function(){
    Route::get('',[AuthController::class, 'index'])->name('index');
    Route::post('login',[AuthController::class, 'do_login'])->name('login');
    Route::post('register',[AuthController::class, 'do_register'])->name('register');
});
Route::get('berita-donasi',[BeritaDonasiController::class, 'index'])->name('berita-donasi.index');
Route::get('barang-campaign/{barang_campaign}',[BarangCampaignController::class, 'show'])->name('barang-campaign.show');
Route::get('uang-campaign/{uang_campaign}',[UangCampaignController::class, 'show'])->name('uang-campaign.show');
Route::resource('campaign-request',CampaignRequestController::class);


Route::get('province/list',[ProvinceController::class, 'list'])->name('province.get');
Route::get('city/list',[CityController::class, 'list'])->name('city.get');
Route::get('subdistrict/list',[SubdistrictController::class, 'list'])->name('subdistrict.get');

Route::post('city/get_list',[CityController::class, 'get_list'])->name('city.get_list');
Route::post('subdistrict/get_list',[SubdistrictController::class, 'get_list'])->name('subdistrict.get_list');    

Route::group(['middleware' => ['auth']], function () {
    Route::get('logout',[AuthController::class, 'do_logout'])->name('auth.logout');
    Route::get('uang-donasi/{campaign}', [UangDonasiController::class, 'create'])->name('uang-donasi.create');
    Route::post('uang-donasi/{campaign}/store', [UangDonasiController::class, 'store'])->name('uang-donasi.store');
    Route::get('paket-donasi/{campaign}', [PaketDonasiController::class, 'create'])->name('paket-donasi.create');
    Route::post('paket-donasi/{campaign}/store', [PaketDonasiController::class, 'store'])->name('paket-donasi.store');
    Route::prefix('profile/')->name('profile.')->group(function(){
        Route::get('',[UserProfileController::class, 'profile'])->name('auth');
        Route::get('{user:id}/edit',[UserProfileController::class, 'edit_profile'])->name('edit');
        Route::post('{user}/update',[UserProfileController::class, 'update_profile'])->name('update');
    });
});


Route::redirect('admin', 'admin/auth', 301);
Route::prefix('admin/')->name('admin.')->group(function(){
    Route::prefix('auth/')->name('auth.')->group(function(){
        Route::get('',[AdminAuthController::class, 'index'])->name('index');
        Route::post('login',[AdminAuthController::class, 'do_login'])->name('login');
        Route::post('register',[AdminAuthController::class, 'do_register'])->name('register');
    });
    
    Route::prefix('uang-campaign/')->name('uang-campaign.')->group(function(){
        Route::post('',[UangCampaignController::class, 'store'])->name('store');
        Route::get('',[UangCampaignController::class, 'index'])->name('index');
        Route::get('create',[UangCampaignController::class, 'create'])->name('create');
        Route::patch('{uang_campaign}',[UangCampaignController::class, 'update'])->name('update');
        Route::delete('{uang_campaign}',[UangCampaignController::class, 'destroy'])->name('destroy');
        Route::get('{uang_campaign}/edit',[UangCampaignController::class, 'edit'])->name('edit');
    });

    Route::prefix('barang-campaign/')->name('barang-campaign.')->group(function(){
        Route::post('',[BarangCampaignController::class, 'store'])->name('store');
        Route::get('',[BarangCampaignController::class, 'index'])->name('index');
        Route::get('create',[BarangCampaignController::class, 'create'])->name('create');
        Route::patch('{barang_campaign}',[BarangCampaignController::class, 'update'])->name('update');
        Route::delete('{barang_campaign}',[BarangCampaignController::class, 'destroy'])->name('destroy');
        Route::get('{barang_campaign}/edit',[BarangCampaignController::class, 'edit'])->name('edit');
    });
        
    Route::group(['middleware' => ['auth']], function () {
        Route::prefix('profile')->name('profile.')->group(function(){
            Route::get('', [ProfileController::class, 'index'])->name('index');
            Route::get('edit', [ProfileController::class, 'edit'])->name('edit');
            Route::post('cpassword', [ProfileController::class, 'cpassword'])->name('cpassword');
            Route::post('save', [ProfileController::class, 'save'])->name('save');
        });

        Route::prefix('user-request/')->name('user-request.')->group(function(){
            Route::patch('acc/{userRequest}',[UserRequestController::class, 'acc'])->name('acc');
            Route::patch('dec/{userRequest}',[UserRequestController::class, 'dec'])->name('dec');
            Route::get('',[UserRequestController::class, 'index'])->name('index');
            Route::delete('{userRequest}',[UserRequestController::class, 'destroy'])->name('destroy');
        });
        Route::resource('berita-campaignBarang', BeritaCampaignBarangController::class);
        Route::resource('berita-campaignUang', BeritaCampaignUangController::class);
        Route::resource('paket', PaketController::class);
        Route::get('user', [DashboardController::class, 'user'])->name('user');
        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('logout',[AdminAuthController::class, 'do_logout'])->name('logout');
    });
});