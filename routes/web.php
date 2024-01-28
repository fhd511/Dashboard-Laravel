<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemsController;
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

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

#route::get('/cpanel', function () {
    #return view('dashboard.controlpanel');
#})->name('contolpanel');

route::get('/',[ItemsController::class,'ShowItemGroup'])->name('welcome');
route::get('/showproduct/{id}',[ItemsController::class,'Showproduct'])->name('showproduct');
route::get('/addtocart/{id}',[ItemsController::class,'AddtoCart'])->name('addtocart');
route::get('/checkout',[ItemsController::class,'Checkout'])->name('checkout')->middleware('auth');

route::get('/del/{x}',[ItemsController::class,"del"])->name('del');
route::get('/del2/{x}',[ItemsController::class,"del2"])->name('del2');
route::get('/edit/{x}',[ItemsController::class,'Edit'])->name('edit');
route::post('/update',[ItemsController::class,"update"])->name('update');
route::get('/edit2/{x}',[ItemsController::class,'Edit2'])->name('edit2');

route::post('/update2',[ItemsController::class,"update2"])->name('update2');


route::get('/items',[ItemsController::class,'GetItems'])->name('items');
route::post('saveitems',[ItemsController::class,'SaveItems'])->name('saveitems');
route::get('/cpanel',[ItemsController::class,'DisplayItems'])->name('controlpanel')->middleware('auth');
route::get('/addgritem',[ItemsController::class,'displayadditemsgroup'])->name('addgritem')->middleware('auth');
route::get('/additems',[ItemsController::class,'displayadditems'])->name('additems')->middleware('auth');

route::get('logout',[ItemsController::class,'logout'])->name('logout');

route::get('/itemgroup',[ItemsController::class,'GetItemGroup'])->name('itemgroup');
route::post('save',[ItemsController::class,'SaveGroupsItems'])->name('save');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');