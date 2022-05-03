<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArtController;
use App\Http\Controllers\ActorActressController;
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
/*
Route::get('/', function () {
    return view('welcome');
});*/
//art
Route::resource('/', ArtController::class)->names('arts');
Route::get('/arts/{art}', [ArtController::class, 'show'])->name('arts.show');

//actor / actress
Route::get('/actors-actresses', [ActorActressController::class, 'index'])->name('actors-actresses.index');
Route::get('/actors-actresses/create', [ActorActressController::class, 'create'])->name('actors-actresses.create');
Route::post('/actors-actresses', [ActorActressController::class, 'store'])->name('actors-actresses.store');
Route::delete('/actors-actresses/{actor_actress}', [ActorActressController::class, 'destroy'])->name('actors-actresses.destroy');
Route::get('/actors-actresses/{actor_actress}', [ActorActressController::class, 'edit'])->name('actors-actresses.edit');
Route::put('/actors-actresses/{actor_actress}', [ActorActressController::class, 'update'])->name('actors-actresses.update');

Route::get('/actors-actresses/{actor_actress}/add-to-art', [ActorActressController::class, 'addToArt'])->name('actors-actresses.addToArt');
Route::post('/actors-actresses/{actor_actress}/add-to-art', [ActorActressController::class, 'addToArtStore'])->name('actors-actresses.addToArtStore');
Route::get('/actors-actresses/{actor_actress}/remove-from-art', [ActorActressController::class, 'removeFromArt'])->name('actors-actresses.removeFromArt');
Route::post('/actors-actresses/{actor_actress}/remove-from-art', [ActorActressController::class, 'removeFromArtDestroy'])->name('actors-actresses.removeFromArtDestroy');


//Dashboasrd.
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
