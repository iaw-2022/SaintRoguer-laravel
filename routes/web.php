<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArtController;
use App\Http\Controllers\ActorActressController;
use App\Http\Controllers\CriticController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\AddDeleteFavController;
use App\Http\Controllers\TagController;

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
Route::get('/', [ArtController::class, 'index'])->name('arts.index');
Route::get('/arts/create', [ArtController::class, 'create'])->name('arts.create');
Route::post('/arts', [ArtController::class, 'store'])->name('arts.store');
Route::get('/arts/{art}', [ArtController::class, 'show'])->name('arts.show');
Route::delete('/{art}', [ArtController::class, 'destroy'])->name('arts.destroy');
Route::get('/arts/{art}/edit', [ArtController::class, 'edit'])->name('arts.edit');
Route::put('/arts/{art}', [ArtController::class, 'update'])->name('arts.update');

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

//Critic
Route::get('/critics/create', [CriticController::class, 'create'])->name('critics.create');
Route::post('/critics', [CriticController::class, 'store'])->name('critics.store');
Route::get('/critics/{critic}/edit', [CriticController::class, 'edit'])->name('critics.edit');
Route::put('/critics/{critic}', [CriticController::class, 'update'])->name('critics.update');
Route::delete('/critics/{critic}', [CriticController::class, 'destroy'])->name('critics.destroy');

//Favorite
Route::get('/favorites', [FavoriteController::class, 'index'])->name('favorites.index');
Route::get('/favorites/editFavorite', [FavoriteController::class, 'edit'])->name('favorites.edit');
Route::put('/favorites/{favorite}', [FavoriteController::class, 'update'])->name('favorites.update');


Route::post('/favorites/Add', [FavoriteController::class, 'store'])->name('favorites.store');
Route::post('/favorites/{favorite}/Delete', [FavoriteController::class, 'destroy'])->name('favorites.destroy');

//Tags
Route::get('/tags', [TagController::class, 'index'])->name('tags.index');
Route::get('/tags/create', [TagController::class, 'create'])->name('tags.create');
Route::post('/tags', [TagController::class, 'store'])->name('tags.store');
Route::get('/tags/{tag}', [TagController::class, 'edit'])->name('tags.edit');
Route::put('/tags/{tag}', [TagController::class, 'update'])->name('tags.update');
Route::delete('/tags/{tag}', [TagController::class, 'destroy'])->name('tags.destroy');
Route::get('/tags/manage/{art}',[TagController::class, 'manage'])->name('tags.manage');
Route::get('/tags/manage/{art}/add',[TagController::class, 'add'])->name('tags.add');


Route::post('/tags/manage/{art}/add',[TagController::class, 'addStore'])->name('tags.addStore');
Route::post('/tags/manage/{art}/remove',[TagController::class, 'remove'])->name('tags.remove');

//Dashboasrd.
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
