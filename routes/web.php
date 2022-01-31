<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// Admin route 

Route::prefix('admin')->name('admin.')->group(
    function () {
        Route::middleware(['guest:admin'])->group(function () {
            Route::get('/login', [App\Http\Controllers\Admin\AdminController::class, 'showLoginForm'])->name('login');
            Route::post('/check', [App\Http\Controllers\Admin\AdminController::class, 'login'])->name('check');
        });
        Route::middleware(['auth:admin'])->group(
            function () {
                Route::get('/', [App\Http\Controllers\Admin\AdminController::class, 'index'])->name('dashboard');
                Route::post('/logout', [App\Http\Controllers\Admin\AdminController::class, 'logout'])->name('logout');
                // profile
                Route::get('/profile', [App\Http\Controllers\Admin\AdminController::class, 'profile'])->name('profile');
                Route::post('/profile/update', [App\Http\Controllers\Admin\AdminController::class, 'profileUpdate'])->name('profile.update');
                // plans
                Route::get('/plans', [App\Http\Controllers\Admin\PlanController::class, 'plans'])->name('plans');
                Route::get('/create/plan', [App\Http\Controllers\Admin\PlanController::class, 'create'])->name('plan.create');
                Route::post('/store/plan', [App\Http\Controllers\Admin\PlanController::class, 'store'])->name('plan.store');
                Route::get('/show/plan/{id}', [App\Http\Controllers\Admin\PlanController::class, 'show'])->name('plan.show');
                Route::get('/edit/plan/{id}', [App\Http\Controllers\Admin\PlanController::class, 'edit'])->name('plan.edit');
                Route::post('/update/plan', [App\Http\Controllers\Admin\PlanController::class, 'update'])->name('plan.update');
                Route::get('/delete/plan/{id}', [App\Http\Controllers\Admin\PlanController::class, 'delete'])->name('plan.delete');
                // users 
                Route::get('/users', [App\Http\Controllers\Admin\UserController::class, 'users'])->name('users');
                Route::get('/show/user/{id}', [App\Http\Controllers\Admin\UserController::class, 'show'])->name('user.show');
                Route::get('/ban/user/{id}', [App\Http\Controllers\Admin\UserController::class, 'banUser'])->name('user.ban');
                Route::get('/unban/user/{id}', [App\Http\Controllers\Admin\UserController::class, 'unbanUser'])->name('user.unban');
                Route::get('/delete/user/{id}', [App\Http\Controllers\Admin\UserController::class, 'deleteUser'])->name('user.delete');
                // withdrawals
                Route::get('/withdrawals', [App\Http\Controllers\Admin\WithdrawalController::class, 'withdrawals'])->name('withdrawals');
                Route::post('/change/withdrawal/status', [App\Http\Controllers\Admin\WithdrawalController::class, 'changeStatus'])->name('change.withdrawal.status');

                // plan purchase request
                Route::get('/plan/requests', [App\Http\Controllers\Admin\RequestController::class, 'requests'])->name('plan.requests');
                Route::post('/change/plan/status', [App\Http\Controllers\Admin\RequestController::class, 'changeStatus'])->name('change.plan.status');
                Route::get('/plan/request/detail/{id}', [App\Http\Controllers\Admin\RequestController::class, 'show'])->name('plan.request.show');

                // setting
                Route::get('/setting', [App\Http\Controllers\Admin\SettingController::class, 'setting'])->name('setting');
                Route::post('/setting/update', [App\Http\Controllers\Admin\SettingController::class, 'settingUpdate'])->name('setting.update');
            }
        );
    }
);



// User Route 
Route::get('/', [App\Http\Controllers\User\UserController::class, 'home'])->name('index');
Route::prefix('user')->name('user.')->group(function () {
    Route::middleware(['guest:web',])->group(function () {
        Route::get('/login', [App\Http\Controllers\User\UserController::class, 'showLoginForm'])->name('login');
        Route::post('/check', [App\Http\Controllers\User\UserController::class, 'check'])->name('check');
        Route::get('/register', [App\Http\Controllers\User\UserController::class, 'showRegisterForm'])->name('register');
        Route::post('/signup', [App\Http\Controllers\User\UserController::class, 'signup'])->name('signup');
    });
    Route::middleware(['auth:web',])->group(function () {
        Route::get('/email/verify', [App\Http\Controllers\User\UserController::class, 'emailVerify'])->name('email.varify');
        Route::post('/check/email/verify', [App\Http\Controllers\User\UserController::class, 'checkEmailVerify'])->name('check.email.verify');
        Route::get('/phone/verify', [App\Http\Controllers\User\UserController::class, 'phoneVerify'])->name('phone.varify');
        Route::post('/check/phone/verify', [App\Http\Controllers\User\UserController::class, 'checkPhoneVerify'])->name('check.phone.verify');
        Route::get('/dashboard', [App\Http\Controllers\User\UserController::class, 'dashboard'])->name('dashboard');
        Route::post('/logout', [App\Http\Controllers\User\UserController::class, 'logout'])->name('logout');
        // profile
        Route::get('/profile', [App\Http\Controllers\User\UserController::class, 'profile'])->name('profile');
        Route::post('/profile/update', [App\Http\Controllers\User\UserController::class, 'profileUpdate'])->name('profile.update');
        // withdrawal 
        Route::post('/withdrawal/store', [App\Http\Controllers\User\ClientController::class, 'withdrawalStore'])->name('withdrawal.store');
        // clent area
        Route::get('/client/area', [App\Http\Controllers\User\ClientController::class, 'clientArea'])->name('client.area');
        Route::get('/client/withdrawal', [App\Http\Controllers\User\ClientController::class, 'withdrawal'])->name('client.withdrawal');
        // plans 
        ROute::get('/plans', [App\Http\Controllers\User\PlanController::class, 'plans'])->name('plans');
        Route::get('/purchase/plan/{id}', [App\Http\Controllers\User\PlanController::class, 'purchase'])->name('purchase.plan');
        Route::post('/purchase/plan/store', [App\Http\Controllers\User\PlanController::class, 'purchaseStore'])->name('plan.purchase.store');
        Route::get('/plan/purchase/success}', [App\Http\Controllers\User\PlanController::class, 'planPurchaseSuccess'])->name('plan.purchase.success');
    });
});




// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
