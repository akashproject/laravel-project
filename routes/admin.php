<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\LoginController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\SiteSettingController;
use App\Http\Controllers\Backend\MembershipPlanController;
use App\Http\Controllers\Backend\PageController;
use App\Http\Controllers\Backend\BannerController;
use App\Http\Controllers\Backend\TeamController;
use App\Http\Controllers\Backend\FaqController;
use App\Http\Controllers\Backend\MenuController;
use App\Http\Controllers\Backend\EventController;
use App\Http\Controllers\Backend\BlogController;
use App\Http\Controllers\Backend\ProgramController;
use App\Http\Controllers\Backend\MemberShipController;
use App\Http\Controllers\Backend\CoreValueController;
use App\Http\Controllers\Backend\StrategicPriorityController;
use App\Http\Controllers\Backend\FundRaiserController;
use App\Http\Controllers\Backend\WidgetController;
use App\Http\Controllers\Backend\MailTemplateController;
use App\Http\Controllers\Backend\ContactListController;
use App\Http\Controllers\Backend\ServiceAreaController;
use App\Http\Controllers\Backend\DonationListController;

use App\Http\Controllers\Frontend\FrontPageController;

Route::group(['prefix'=>'admin','as'=>'admin.'], function(){
    Route::get('/',[LoginController::class,'showLoginForm'])->name('login');
    Route::get('login',[LoginController::class,'showLoginForm'])->name('login');
    Route::post('login',[LoginController::class,'login']);

    Route::middleware(['auth:admin'])->group(function(){
        Route::get('dashboard',[DashboardController::class,'dashboard'])->name('dashboard');
        Route::post('logout', [LoginController::class,'logout'])->name('logout');
        // Route::get('profile', [LoginController::class,'editProfile'])->name('profile');
        Route::get('settings', [SiteSettingController::class,'adminAccountSettings'])->name('settings');
        Route::post('update-profile/{user}',[ProfileController::class,'updateProfile'])->name('update_profile');
        Route::post('update-password/{user}',[ProfileController::class,'updatePassword'])->name('update_password');
        Route::post('site-setting/update',[SiteSettingController::class,'updateSiteSetting'])->name('site-setting.update');

        Route::resource('membership-plans', MembershipPlanController::class);
        Route::post('membership-pan/status',[MembershipPlanController::class,'status'])->name('membership-pan.status');

        Route::resource('page', PageController::class);
        Route::resource('banner', BannerController::class);
        Route::resource('team', TeamController::class);
        Route::resource('faq', FaqController::class);
        Route::resource('event', EventController::class);
        Route::resource('blog', BlogController::class);
        Route::resource('program', ProgramController::class);
        // Route::resource('membership', MemberShipController::class);
        Route::resource('core-value', CoreValueController::class);
        

        //Ecommerce
        Route::resource('product-category', CoreValueController::class);

        Route::resource('strategic-priority', StrategicPriorityController::class);
        Route::resource('fund-raiser', FundRaiserController::class);
        Route::resource('widget', WidgetController::class);
        Route::resource('mail-template', MailTemplateController::class);
        Route::resource('service-area', ServiceAreaController::class);

        ////// Start Contact \\\\\\
        Route::get('contact',[ContactListController::class,'index'])->name('contact.index');
        Route::delete('contact/delete/{contact}',[ContactListController::class,'destroy'])->name('contact.destroy');
        Route::get('contact/{contact}',[ContactListController::class,'showContactDetails'])->name('contact.details');

        Route::get('donation',[DonationListController::class,'index'])->name('donation.index');
        Route::delete('donation/delete/{donation}',[DonationListController::class,'destroy'])->name('donation.destroy');


        Route::get('menu',[MenuController::class,'menu'])->name('menu');

    });
});

Route::get('{slug}',[FrontPageController::class,'showDynamicPages'])->name('showDynamicPage');