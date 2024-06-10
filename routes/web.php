<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\DrugController;
use App\Http\Controllers\SellingController;

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
    return view('index');
});
// Route::resource('agents', AgentController::class);
// Route::get('agents', [AgentController::class, 'index'])->name('agents.index');
// Route::get('agents/agents_add', [AgentController::class, 'create'])->name('agents.agents_add');
// Route::post('agents/agents_add', [AgentController::class, 'store'])->name('agents.store');
// Route::get('agents/agents_view', [AgentController::class, 'show'])->name('agents.show');
Route::resource('agents', AgentController::class);
Route::get('agents/{id}/delete', [AgentController::class, 'delete'])->name('agents.delete');


Route::resource('drugs', DrugController::class);
Route::get('drugs/{id}/delete', [DrugController::class, 'delete'])->name('drugs.delete');
Route::get('drugs/{id}/details', [DrugController::class, 'getDetails'])->name('drugs.details');


Route::resource('sellings', SellingController::class);