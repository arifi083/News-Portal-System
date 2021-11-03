<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DeleteController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\SubcategoryController;
use App\Http\Controllers\Backend\DistrictController;
use App\Http\Controllers\Backend\SubDistrictController;
use App\Http\Controllers\Backend\PostController;
use App\Http\Controllers\Backend\SettingController;
use App\Http\Controllers\Backend\GalleryController;
use App\Http\Controllers\Backend\AdsController;
use App\Http\Controllers\Backend\RoleController;
use App\Http\Controllers\Backend\WebsiteSettingController;


use App\Http\Controllers\Frontend\IndexController;



Route::get('/', function () {
    return view('frontend.index');
});
Route::get('/delete',[DeleteController::class,'OnDelete']);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('admin.index');
})->name('dashboard');


Route::get('/admin/logout',[AdminController::class,'AdminLogout'])->name('admin.logout');


//admin all categories
Route::prefix('category')->group(function(){

    Route::get('/view', [CategoryController::class, 'CategoryView'])->name('all.category');
    Route::get('/add', [CategoryController::class, 'AddCategory'])->name('add.category');
    Route::post('/store', [CategoryController::class, 'CategoryStore'])->name('category.store');
    Route::get('/edit/{id}', [CategoryController::class, 'CategoryEdit'])->name('category.edit');
    Route::post('/update/{id}', [CategoryController::class, 'CategoryUpdate'])->name('update.category');
    Route::get('/delete/{id}', [CategoryController::class, 'CategoryDelete'])->name('category.delete');
     
 });


 //admin all subcategories
Route::prefix('subcategory')->group(function(){

    Route::get('/view', [SubcategoryController::class, 'SubcategoryView'])->name('all.subcategory');
    Route::get('/add', [SubcategoryController::class, 'AddSubcategory'])->name('add.subcategory');
    Route::post('/store', [SubcategoryController::class, 'SubcategoryStore'])->name('subcategory.store');
    Route::get('/edit/{id}', [SubcategoryController::class, 'SubCategoryEdit'])->name('subcategory.edit');
    Route::post('/update/{id}', [SubcategoryController::class, 'SubCategoryUpdate'])->name('update.subcategory');
    Route::get('/delete/{id}', [SubcategoryController::class, 'SubCategoryDelete'])->name('subcategory.delete');
      
 });

 
 //admin all districts
Route::prefix('district')->group(function(){

    Route::get('/view', [DistrictController::class, 'DistrictView'])->name('all.district');
    Route::get('/add', [DistrictController::class, 'AddDistrict'])->name('add.district');
    Route::post('/store', [DistrictController::class, 'DistrictStore'])->name('district.store');
    Route::get('/edit/{id}', [DistrictController::class, 'DistrictEdit'])->name('district.edit');
    Route::post('/update/{id}', [DistrictController::class, 'DistrictUpdate'])->name('update.district');
    Route::get('/delete/{id}', [DistrictController::class, 'DistrictDelete'])->name('district.delete');   
 });


  //admin all subdistricts
Route::prefix('subdistrict')->group(function(){

    Route::get('/view', [SubDistrictController::class, 'SubDistrictView'])->name('all.subdistrict');
    Route::get('/add', [SubDistrictController::class, 'AddSubDistrict'])->name('add.subdistrict');
    Route::post('/store', [SubDistrictController::class, 'SubDistrictStore'])->name('subdistrict.store');
    Route::get('/edit/{id}', [SubDistrictController::class, 'SubDistrictEdit'])->name('subdistrict.edit');
    Route::post('/update/{id}', [SubDistrictController::class, 'SubDistrictUpdate'])->name('update.subdistrict');
    Route::get('/delete/{id}', [SubDistrictController::class, 'SubDistrictDelete'])->name('subdistrict.delete'); 
     
 });


 //admin all post
 Route::prefix('post')->group(function(){

    Route::get('/add', [PostController::class, 'AddPost'])->name('add.post');
    Route::post('/store', [PostController::class, 'PostStore'])->name('post.store');
    Route::get('/all', [PostController::class, 'PostView'])->name('all.post');
    Route::get('/edit/{id}', [PostController::class, 'PostEdit'])->name('post.edit');
    Route::post('/update/{id}', [PostController::class, 'PostUpdate'])->name('update.post');
    Route::get('/delete/{id}', [PostController::class, 'PostDelete'])->name('post.delete'); 
 });


 // Json Data for Category and District

 Route::get('/get/subcategory/{category_id}', [PostController::class, 'GetSubCategory']);
 Route::get('/get/subdistrict/{district_id}', [PostController::class, 'GetSubDistrict']);


// Social Settings 
 Route::get('/social/setting', [SettingController::class, 'SocialSetting'])->name('social.setting');
 Route::post('/social/update/{id}', [SettingController::class, 'SocialUpdate'])->name('update.social');

 // Seo Settings 
 Route::get('/seo/setting', [SettingController::class, 'SeoSetting'])->name('seo.setting');
 Route::post('/seo/update/{id}', [SettingController::class, 'SeoUpdate'])->name('update.seo');

 // Prayer Settings
 Route::get('/prayer/setting', [SettingController::class, 'PrayerSetting'])->name('prayer.setting');
 Route::post('/prayer/update/{id}', [SettingController::class, 'PrayerUpdate'])->name('update.prayer');

//live tv setting
Route::get('/livetv/setting', [SettingController::class, 'LiveTvSetting'])->name('livetv.setting');
Route::post('/livetv/update/{id}', [SettingController::class, 'LiveTvUpdate'])->name('update.livetv');
Route::get('/livetv/active/{id}', [SettingController::class, 'ActiveSetting'])->name('active.livetv');
Route::get('/livetv/inactive/{id}', [SettingController::class, 'InActiveSetting'])->name('inactive.livetv');

//Notice setting
Route::get('/notice/setting', [SettingController::class, 'NoticeSetting'])->name('notice.setting');
Route::post('/notice/update/{id}', [SettingController::class, 'NoticeUpdate'])->name('update.notice');
Route::get('/notice/active/{id}', [SettingController::class, 'ActiveNoticeSetting'])->name('active.notice');
Route::get('/notice/deactive/{id}', [SettingController::class, 'DeActiveNoticeSetting'])->name('deactive.notice');

//website link
Route::get('/website/setting', [SettingController::class, 'WebsiteSetting'])->name('all.website');
Route::get('/add/website', [SettingController::class, 'AddWebsite'])->name('add.website');
Route::post('/store/website', [SettingController::class, 'StoreWebsite'])->name('website.store');


//photo gallery
Route::get('/photo/gallery', [GalleryController::class, 'PhotoGallery'])->name('photo.gallery');
Route::get('/add/photo', [GalleryController::class, 'AddPhoto'])->name('add.photo');
Route::post('/photo/store', [GalleryController::class, 'PhotoStore'])->name('photo.store');


Route::get('/video/gallery', [GalleryController::class, 'VideoGallery'])->name('video.gallery');
Route::get('/add/video', [GalleryController::class, 'AddVideo'])->name('add.video');
Route::post('/video/store', [GalleryController::class, 'VideoStore'])->name('video.store');


//Multi language route

Route::get('/language/bangla/', [IndexController::class, 'Bangla'])->name('bangla.language');
Route::get('/language/english/', [IndexController::class, 'English'])->name('english.language');

//single post
Route::get('/view/post/{id}', [IndexController::class, 'SinglePost']);

//categorywise post
Route::get('/categorypost/{id}/{category_en}', [IndexController::class, 'CategoywisePost']);


//sub categorywise post
Route::get('/subcategorypost/{id}/{subcategory_en}', [IndexController::class, 'SubCategoywisePost']);

//search district wise post
Route::get('/search/district', [IndexController::class, 'SearchDistrict'])->name('search-by-district');

//ads route admin
Route::get('/ads/list', [AdsController::class, 'AdsList'])->name('ads.list');
Route::get('/add/ads', [AdsController::class, 'AddAds'])->name('ads.add');
Route::post('/ads/store', [AdsController::class, 'AdsStore'])->name('ads.store');

//user role
Route::get('/add/writer', [RoleController::class, 'AddWriter'])->name('add.writer');
Route::post('/writer/store', [RoleController::class, 'WriterStore'])->name('write.store');
Route::get('/all/writer', [RoleController::class, 'AllWriter'])->name('all.writer');
Route::get('/edit/writer/{id}', [RoleController::class, 'EditWriter'])->name('writer.edit');
Route::post('/update/writer/{id}', [RoleController::class, 'UpdateWriter'])->name('update.writer');


//website setting route
Route::get('/web/settings', [WebsiteSettingController::class, 'MainWebsetting'])->name('website.setting');
Route::post('/update/websetting/{id}', [WebsiteSettingController::class, 'UpdateWebSetting'])->name('update.websetting');


// Account Setting Routes 
Route::get('/account/setting', [AdminController::class, 'AccountSetting'])->name('account.setting');
Route::get('/profile/edit', [AdminController::class, 'ProfileEdit'])->name('profile.edit');
Route::post('/profile/store', [AdminController::class, 'ProfileStore'])->name('profile.store');

/// Change Password 

Route::get('/show/password', [AdminController::class, 'ShowPassword'])->name('show.password');
Route::post('/change/password', [AdminController::class, 'ChangePassword'])->name('change.password');

