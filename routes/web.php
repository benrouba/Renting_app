<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\authmanager;

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

Route::get('/', [authmanager::class ,'home'])->name('home');
// Route::get('/', function () {
//     return view('welcome');
// })->middleware(['auth', 'verified'])->name('home');
Route::get('/login', [authmanager::class ,'login'])->name('login');
Route::post('/login', [authmanager::class , 'loginpost'])->name('login.post');
Route::get('/register', [authmanager::class , 'register'])->name('register');
Route::post('/register', [authmanager::class , 'registerpost'])->name('register.post');
Route::get('/logout', [authmanager::class , 'logout'])->name('logout');
Route::get('/adminpage', [authmanager::class , 'adminpage'])->name('adminpage')->middleware(['auth', 'admin']);
// define clients as a child route of adminpage
// so the
// clients page is inside the admin page

Route::get('/adminpage/clients', [authmanager::class , 'clients'])->name('clients');
Route::get('/myProperties', [authmanager::class , 'ownerproperties'])->name('myProperties');
// add route to delete a client
Route::get('/adminpage/clients/delete/{id}', [authmanager::class , 'deleteclient'])->name('deleteclient');
Route::get('/rent', [authmanager::class ,'rent'])->name('rent');
Route::get('/buy', [authmanager::class ,'buy'])->name('buy');
// make a guard for the add property page
Route::get('/add-property', [authmanager::class ,'addproperty'])->name('add-property')->middleware(['auth', 'authguard']);
// Route::get('/add-property', [authmanager::class ,'addproperty'])->name('add-property');
Route::post('/add-property', [authmanager::class ,'postproperty'])->name('postproperty');
Route::get('/property/{id}', [authmanager::class ,'property'])->name('property');
Route::post('/delete-client/{id}', [authmanager::class ,'deleteClient'])->name('deleteClient');
Route::post('/delete-property/{id}', [authmanager::class ,'deleteProperty'])->name('deleteproperty');
Route::get('/clients', [authmanager::class ,'clients_json'])->name('clients');
Route::get('/owners', [authmanager::class ,'owners'])->name('clients');
Route::get('/properties', [authmanager::class ,'properties'])->name('properties');
Route::post('/edit-client/{id}', [authmanager::class ,'editClient'])->name('editclient');
Route::post('/edit-property/{id}', [authmanager::class ,'editProperty'])->name('editProperty');
Route::post('/update-property/{id}', [authmanager::class ,'updateProperty'])->name('updateProperty');


