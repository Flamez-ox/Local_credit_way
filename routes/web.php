<?php

use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\Admin\AdminProfileController;
use App\Http\Controllers\Frontend\FrontendHomeController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\User\UserLoginController;
use App\Http\Controllers\User\UserTransactionController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// })->name('home');

// Home
Route::get('/', [FrontendHomeController::class, 'index'])->name('home');


// Admin
Route::get('/admin-dashboard',[AdminHomeController::class, 'index'])->name('admin_dashboard')->middleware('admin:admin');
Route::get('/admin-login',[AdminLoginController::class, 'index'])->name('admin_login');
Route::get('/admin-logout',[AdminLoginController::class, 'admin_logout'])->name('admin_logout');
Route::get('/admin-forgot-password',[AdminLoginController::class, 'forget_password'])->name('forgot_password');
Route::post('/admin-login-submit',[AdminLoginController::class, 'login_submit'])->name('admin_login_submit');
Route::post('/admin/forgot-password-submit',[AdminLoginController::class, 'forgot_password_submit'])->name('forgot_password_submit');
Route::get('/admin/reset-password/{token}/{email}',[AdminLoginController::class, 'reset_password'])->name('reset_password');
Route::post('/admin/reset-password-submit',[AdminLoginController::class, 'reset_password_submit'])->name('reset_password_submit');

Route::get('/admin/edit-profile', [AdminProfileController::class, 'index'])->name('admin_edit_profile')->middleware('admin:admin');
Route::post('/admin/edit-profile-submit', [AdminProfileController::class, 'profile_submit'])->name('admin_profile_submit')->middleware('admin:admin');


Route::get('/admin/Users-show', [AdminHomeController::class, 'show_users'])->name('show_users')->middleware('admin:admin');
Route::get('/admin/User-edit/{id}', [AdminHomeController::class, 'edit_users'])->name('edit_users')->middleware('admin:admin');
Route::post('/admin/User-update/{id}', [AdminHomeController::class, 'update_user_submit'])->name('update_user_submit')->middleware('admin:admin');
Route::get('/admin/User-delete/{id}', [AdminHomeController::class, 'delete_users'])->name('delete_users')->middleware('admin:admin');
Route::get('/admin/local-transactions', [AdminHomeController::class, 'local_transactions'])->name('local_transactions')->middleware('admin:admin');
Route::get('/admin/edit-local-transactions/{id}', [AdminHomeController::class, 'edit_local_transaction'])->name('edit_local_transaction')->middleware('admin:admin');
Route::post('/admin/update-local-transactions/{id}', [AdminHomeController::class, 'update_local_transaction'])->name('update_local_transaction')->middleware('admin:admin');
Route::get('/admin/delete-local-transactions/{id}', [AdminHomeController::class, 'delete_local_transaction'])->name('delete_local_transaction')->middleware('admin:admin');
Route::get('/admin/wire-transactions', [AdminHomeController::class, 'wire_transactions'])->name('wire_transactions')->middleware('admin:admin');
Route::get('/admin/edit-wire-transactions/{id}', [AdminHomeController::class, 'edit_wire_transaction'])->name('edit_wire_transaction')->middleware('admin:admin');
Route::post('/admin/update-wire-transactions/{id}', [AdminHomeController::class, 'update_wire_transaction'])->name('update_wire_transaction')->middleware('admin:admin');
Route::get('/admin/delete-wire-transactions/{id}', [AdminHomeController::class, 'delete_wire_transaction'])->name('delete_wire_transaction')->middleware('admin:admin');
Route::get('/admin/pins', [AdminHomeController::class, 'pin'])->name('pins')->middleware('admin:admin');
Route::get('/admin/delete-all-pins', [AdminHomeController::class, 'delete_pin_all'])->name('delete_pin_all')->middleware('admin:admin');
Route::get('/admin/pin-delete/{id}', [AdminHomeController::class, 'delete_pin'])->name('delete_pin')->middleware('admin:admin');
Route::get('/admin/support', [AdminHomeController::class, 'support'])->name('support')->middleware('admin:admin');
Route::get('/admin/reply-user/{email}', [AdminHomeController::class, 'reply_users'])->name('reply_users')->middleware('admin:admin');
Route::post('/admin/send-user-message', [AdminHomeController::class, 'send_user_message'])->name('send_user_message')->middleware('admin:admin');
Route::get('/admin/complaint-delete/{id}', [AdminHomeController::class, 'delete_complaint'])->name('delete_complaint')->middleware('admin:admin');
Route::get('/admin/delete-all-complaints', [AdminHomeController::class, 'delete_complaint_all'])->name('delete_complaint_all')->middleware('admin:admin');
Route::get('/admin/email-all-users', [AdminHomeController::class, 'email_all_users'])->name('email_all_users')->middleware('admin:admin');
Route::post('/admin/email-all-users-submit', [AdminHomeController::class, 'email_all_users_submit'])->name('email_all_users_submit')->middleware('admin:admin');

// User
Route::get('/user-register', [UserLoginController::class, 'register_user'])->name('register_user');
Route::post('/user-register/submit', [UserLoginController::class, 'register_user_submit'])->name('register_user_submit');
Route::get('/user-register', [UserLoginController::class, 'register_user'])->name('register_user');
Route::get('/user-login', [UserLoginController::class, 'index'])->name('user_login');
Route::post('/user-login-submit',[UserLoginController::class, 'login_submit'])->name('user_login_submit');
Route::get('/user-logout',[UserLoginController::class, 'user_logout'])->name('user_logout');
Route::get('/user-reset-password',[UserLoginController::class, 'reset_pasword'])->name('reset_pasword');
Route::post('/user-reset-password-submit',[UserLoginController::class, 'reset_pasword_submit'])->name('reset_pasword_submit');
Route::get('/user/change-password/{token}/{email}',[UserLoginController::class, 'change_password'])->name('change_password');
Route::post('/user/change-password-submit',[UserLoginController::class, 'change_password_submit'])->name('change_password_submit');
Route::get('/user-dashboard',[UserController::class, 'user_dashboard'])->name('user_dashboard')->middleware('auth:web');


// User Transations
Route::get('/send-money',[UserTransactionController::class, 'send_money'])->name('send_money')->middleware('auth:web');
Route::get('/wire-money',[UserTransactionController::class, 'wire_money'])->name('wire_money')->middleware('auth:web');
Route::get('/view-pin/{id}',[UserTransactionController::class, 'view_pin'])->name('view_pin')->middleware('auth:web');
Route::post('/send-money/submit',[UserTransactionController::class, 'send_money_submit'])->name('send_money_submit')->middleware('auth:web');
Route::post('/wire-money/submit',[UserTransactionController::class, 'wire_money_submit'])->name('wire_money_submit')->middleware('auth:web');
Route::post('/pin-verification',[UserTransactionController::class, 'verify_pin'])->name('verify_pin')->middleware('auth:web');
Route::get('/transactions',[UserTransactionController::class, 'transactions'])->name('transactions')->middleware('auth:web');
Route::get('/transaction-history/{id}',[UserTransactionController::class, 'transaction_history'])->name('transaction_history')->middleware('auth:web');
Route::get('/wire-transactions',[UserTransactionController::class, 'wire_transaction'])->name('wire_transaction')->middleware('auth:web');
Route::get('/wire-transaction-history/{id}',[UserTransactionController::class, 'wire_transaction_history'])->name('wire_transaction_history')->middleware('auth:web');
Route::get('/monthly-statement',[UserTransactionController::class, 'transaction_statement'])->name('transaction_statement')->middleware('auth:web');
Route::get('/notification',[UserController::class, 'notification'])->name('notification')->middleware('auth:web');
Route::get('/notification-delete/{id}',[UserController::class, 'delete_notification'])->name('delete_notification')->middleware('auth:web');
Route::get('/notification-delete',[UserController::class, 'all_notification'])->name('all_notification')->middleware('auth:web');
Route::get('/profile-setting',[UserController::class, 'user_setting'])->name('profile_setting')->middleware('auth:web');
Route::post('/profile-setting-submit',[UserController::class, 'user_setting_submit'])->name('user_setting_submit')->middleware('auth:web');
Route::get('/billing-info',[UserController::class, 'billing_info'])->name('billing_info')->middleware('auth:web');
Route::get('/customer-support',[UserController::class, 'customer_support'])->name('customer_support')->middleware('auth:web');
Route::post('/customer-support-submit',[UserController::class, 'customer_support_submit'])->name('customer_support_submit')->middleware('auth:web');
Route::get('/exchange',[UserController::class, 'exchange'])->name('exchange')->middleware('auth:web');
Route::post('/currency',[UserController::class, 'exchangeCurrency'])->name('exchangeCurrency')->middleware('auth:web');
Route::get('/loans',[UserController::class, 'loans'])->name('loans')->middleware('auth:web');


