<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Auth\LeadershipRegisterController;
use App\Http\Controllers\Auth\MemberRegisterController;
use App\Http\Controllers\Auth\MobilizerRegisterController;
use App\Http\Controllers\Frontend\DonationController;
use App\Http\Controllers\Frontend\DashboardController;
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

Route::get('/clear-cache', function() {
    Artisan::call('optimize:clear');
    return 'Application cache has been cleared';
});
Route::get('/storage-link', function () {
    Artisan::call('storage:link');
    return 'Storage Linked';
});

Route::get('/',[HomeController::class,'index'])->name('home');

Route::get('refer-member',[HomeController::class,'showReferMember'])->name('refer-member');
Route::post('search-member',[HomeController::class,'searchMemberToRefer'])->name('search-member');
Route::post('send-refer-member-mail',[HomeController::class,'sendReferMemberMail'])->name('send-refer-member-mail');
Route::get('event/{slug}',[HomeController::class,'eventDetails'])->name('event.details');
Route::get('product/{slug}',[HomeController::class,'eventDetails'])->name('event.details');
Route::get('program/{slug}',[HomeController::class,'programDetails'])->name('program.details');

Route::post('contact-us/save',[ContactController::class,'contactDataSave'])->name('contact-us.submit');
Route::post ('donate-now',[DonationController::class,'donateNow'])->name('donate-now');

Route::middleware(['auth:web'])->group(function(){
    Route::get('account', [DashboardController::class,'account'])->name('account');
    Route::get('profile', [DashboardController::class,'profile'])->name('profile');
    Route::get('education', [DashboardController::class,'education'])->name('education');

    Route::get('refer-program', [DashboardController::class,'referProgram'])->name('refer-program');
    Route::post('search-member/results', [DashboardController::class,'searchMember'])->name('search-member-result');

    Route::get('company-details', [DashboardController::class,'companyDetails'])->name('company-details');
    Route::get('members', [DashboardController::class,'memberList'])->name('members');
    Route::get('member-search-list', [DashboardController::class,'searchMemberList'])->name('member-search');

    Route::get('member-profile/{id}', [DashboardController::class,'showMemberProfile'])->name('member-profile');
    Route::get('edit-password', [DashboardController::class,'showEditPassword'])->name('edit-password');
    Route::post('update-password', [DashboardController::class,'updatePassword'])->name('update-password');


    Route::post('update-account', [DashboardController::class,'updateAccount'])->name('update-account');
    Route::post('update-profile', [DashboardController::class,'updateProfile'])->name('update-profile');
    Route::post('update-company-details', [DashboardController::class,'updateCompanyDetails'])->name('update-company-details');

    
    
    Route::post('send-refer-member-mail', [DashboardController::class,'sendReferMemberMail'])->name('send-refer-member-mail');

    Route::post('update-education', [DashboardController::class,'updateEducation'])->name('update-education');

});








// Register Section
/*Route::get('leadership/register',[LeadershipRegisterController::class,'showLeadershipRegister'])->name('leadership.show-register');
Route::post('leadership/register',[LeadershipRegisterController::class,'leadershipRegister'])->name('leadership.register');

Route::get('member/register',[MemberRegisterController::class,'showMemberRegister'])->name('member.show-register');
Route::post('member/register',[MemberRegisterController::class,'memberRegister'])->name('member.register');

Route::get('mobilizer/register',[MobilizerRegisterController::class,'showMobilizerRegister'])->name('mobilizer.show-register');
Route::post('mobilizer/register',[MobilizerRegisterController::class,'mobilizerRegister'])->name('mobilizer.register');*/


// Route::get('search-member-result',[HomeController::class,'searchMemberResult'])->name('search-member-result');
/*Route::get('refer-member',[HomeController::class,'showReferMember']);
Route::post('send-refer-member-mail',[HomeController::class,'sendReferMemberMail'])->name('send-refer-member-mail');*/


// Route::get('/', function () {
//     return view('frontend.layouts.master');
// });

Route::get('storage-link', function () {
    Artisan::call('storage:link');
    return ('Storage Linked!');
});

Route::get('cache-clear', function () {
    Artisan::call('optimize:clear');
    return ('Cache Cleared!');
});



Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');


