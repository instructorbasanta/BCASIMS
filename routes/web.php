<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\DeviceTypeController;
use App\Http\Controllers\Backend\DeviceModelController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\MasterProductController;
use App\Http\Controllers\Backend\SpecificationDetailTypeController;
use App\Http\Controllers\Backend\SaleQuesetionController;
use App\Http\Controllers\Backend\SaleQuestionSetController;
use App\Http\Controllers\Backend\SettingController;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\Backend\BlogController;
use App\Http\Controllers\Backend\ContactController;

Route::get('/clear-cache', function () {
    Artisan::call('cache:clear');
    Artisan::call('route:clear');
    return "Cache cleared successfully";
});

/*use App\Http\Controllers\Backend\SubcategoryController;
use App\Http\Controllers\Backend\RoleController;
use App\Http\Controllers\Backend\PermissionController;
use App\Http\Controllers\Backend\ModuleController;
use App\Http\Controllers\Backend\SettingController;
use App\Http\Controllers\Backend\ProductLineController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\TagController;
*/
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
/*Route::get('/change-locale/{locale}', function ($locale){
    \Illuminate\Support\Facades\App::setLocale($locale);
    if (session()->get('locale') != null){
        session()->put('locale',$locale);
    } else {
        session()->put('locale','en');
    }
    return redirect()->route('frontend.home');
})->name('change_locale');
*/
Auth::routes();
Route::middleware(['auth'])->group(function (){
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    //setting route
    Route::get('backend/setting/trash',[SettingController::class,'trash'])->name('backend.setting.trash');
    Route::resource('backend/setting',SettingController::class)->names('backend.setting');
    Route::get('backend/setting/restore/{id}',[SettingController::class,'restore'])->name('backend.setting.restore');
    Route::post('backend/setting/force-delete/{id}',[SettingController::class,'forceDelete'])->name('backend.setting.force-delete');

    //Blog route
    Route::get('backend/blog/trash',[BlogController::class,'trash'])->name('backend.blog.trash');
    Route::resource('backend/blog',BlogController::class)->names('backend.blog');
    Route::get('backend/blog/restore/{id}',[BlogController::class,'restore'])->name('backend.blog.restore');
    Route::post('backend/blog/force-delete/{id}',[BlogController::class,'forceDelete'])->name('backend.blog.force-delete');

    //Blog route
    Route::get('backend/contact/trash',[ContactController::class,'trash'])->name('backend.contact.trash');
    Route::resource('backend/contact',ContactController::class)->names('backend.contact')->except('create');
    Route::get('backend/contact/restore/{id}',[ContactController::class,'restore'])->name('backend.contact.restore');
    Route::post('backend/contact/force-delete/{id}',[ContactController::class,'forceDelete'])->name('backend.contact.force-delete');

    /*  //subcategory route
    Route::get('backend/subcategory/trash',[SubcategoryController::class,'trash'])->name('backend.subcategory.trash');
    Route::post('backend/subcategory/permanent_delete/{id}',[SubcategoryController::class,'permanentDelete'])->name('backend.subcategory.permanent_delete');
    Route::get('backend/subcategory/restore/{id}',[SubcategoryController::class,'restore'])->name('backend.subcategory.restore');
    Route::resource('backend/subcategory',SubcategoryController::class)->names('backend.subcategory');
    */

  });

//Route::post('backend/deleteProductImage',[ProductController::class,'deleteProductImage'])->name('backend.deleteProductImage');

