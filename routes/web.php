<?php

use App\Http\Controllers\BalanceController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InvestmentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\WithdrawalController;
use App\Http\Controllers\OpenTradeController;
use App\Http\Controllers\AgentController;
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

Route::get('/', function () {
    return view('welcome');
    //return redirect()->route('login');
});

Auth::routes(['verify' => true]);

Route::middleware(['auth', 'verified'])->group(function () {
	Route::get('/user/verify', [UserController::class, 'userVerify'])->name('user.verify');
});

Route::middleware(['auth', 'verified', 'user.confirmed'])->group(function () {

	Route::prefix('datatable')->group(function () {
		Route::get('users', [UserController::class, 'usersApiDataTable']);
	});

	Route::get('inicio', [HomeController::class, 'index'])->name('home');
	Route::resource('usuario', UserController::class)->names('user')->except('show', 'destroy');
	Route::get('cambiar-contraseña', [UserController::class, 'changeUserPassword'])->name('password.change');
	Route::put('actualiza-contraseña/{user}', [UserController::class, 'updateUserPassword'])->name('password.user.update');
	Route::put('actualiza-contraseña-agente/{user}', [AgentController::class, 'updateAgentPassword'])->name('password.agent.update');
	Route::get('administrar-usuarios', [UserController::class, 'adminUsers'])->name('admin.users');
	Route::post('aprueba-usuario/{user}', [UserController::class, 'approveUser'])->name('approve.user');
	Route::post('aprueba-usuario-email/{user}', [UserController::class, 'approveUserEmail']);
	Route::get('datos-de-usuario/{user}', [UserController::class, 'informationUser']);

});

/*
|--------------------------------------------------------------------------
| Store Web Routes
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return view('store.home');
})->name('home');

Route::get('/product-list', function () {
    return view('store.productList');
})->name('product.list');

Route::get('/product-detail', function () {
    return view('store.productDetail');
})->name('product.detail');

Route::get('/cart', function () {
    return view('store.cart');
})->name('cart');

Route::get('/checkout', function () {
    return view('store.checkout');
})->name('checkout');

Route::get('/my-account', function () {
    return view('store.myAccount');
})->name('my.account');

Route::get('/wishlist', function () {
    return view('store.wishlist');
})->name('wishlist');

Route::get('/sesion', function () {
    return view('store.login');
})->name('sesion');

Route::get('/contact', function () {
    return view('store.contact');
})->name('contact');



