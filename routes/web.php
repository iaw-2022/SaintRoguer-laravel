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
Route::get('/arts/create', [ArtController::class, 'create'])->middleware('can:arts.create')->name('arts.create');
Route::post('/arts', [ArtController::class, 'store'])->middleware('can:arts.create')->name('arts.store');
Route::get('/arts/{art}', [ArtController::class, 'show'])->name('arts.show');
Route::delete('/{art}', [ArtController::class, 'destroy'])->middleware('can:arts.destroy')->name('arts.destroy');
Route::get('/arts/{art}/edit', [ArtController::class, 'edit'])->middleware('can:arts.edit')->name('arts.edit');
Route::put('/arts/{art}', [ArtController::class, 'update'])->middleware('can:arts.edit')->name('arts.update');

//API ROUTES
Route::get('/arts/api/search', [ArtController::class, 'apiSearch'])->middleware('can:arts.create')->name('arts.api-search');
Route::post('/arts/api/searching', [ArtController::class, 'apiSearching'])->middleware('can:arts.create')->name('arts.api-searching');
Route::get('/arts/api/select', [ArtController::class, 'apiSelect'])->middleware('can:arts.create')->name('arts.api-select');
Route::post('/arts/api/select', [ArtController::class, 'apiSave'])->middleware('can:arts.create')->name('arts.api-save');


//actor / actress
Route::get('/actors-actresses', [ActorActressController::class, 'index'])->middleware('can:actors-actresses.index')->name('actors-actresses.index');
Route::get('/actors-actresses/create', [ActorActressController::class, 'create'])->middleware('can:actors-actresses.create')->name('actors-actresses.create');
Route::post('/actors-actresses', [ActorActressController::class, 'store'])->middleware('can:actors-actresses.create')->name('actors-actresses.store');
Route::delete('/actors-actresses/{actor_actress}', [ActorActressController::class, 'destroy'])->middleware('can:actors-actresses.destroy')->name('actors-actresses.destroy');
Route::get('/actors-actresses/{actor_actress}', [ActorActressController::class, 'edit'])->middleware('can:actors-actresses.edit')->name('actors-actresses.edit');
Route::put('/actors-actresses/{actor_actress}', [ActorActressController::class, 'update'])->middleware('can:actors-actresses.edit')->name('actors-actresses.update');

Route::get('/actors-actresses/{actor_actress}/add-to-art', [ActorActressController::class, 'addToArt'])->middleware('can:actors-actresses.addToArt')->name('actors-actresses.addToArt');
Route::post('/actors-actresses/{actor_actress}/add-to-art', [ActorActressController::class, 'addToArtStore'])->middleware('can:actors-actresses.addToArt')->name('actors-actresses.addToArtStore');
Route::get('/actors-actresses/{actor_actress}/remove-from-art', [ActorActressController::class, 'removeFromArt'])->middleware('can:actors-actresses.removeFromArt')->name('actors-actresses.removeFromArt');
Route::post('/actors-actresses/{actor_actress}/remove-from-art', [ActorActressController::class, 'removeFromArtDestroy'])->middleware('can:actors-actresses.removeFromArt')->name('actors-actresses.removeFromArtDestroy');

//Critic
Route::get('/critics/create', [CriticController::class, 'create'])->middleware('can:critics.create')->name('critics.create');
Route::post('/critics', [CriticController::class, 'store'])->middleware('can:critics.create')->name('critics.store');
Route::get('/critics/{critic}/edit', [CriticController::class, 'edit'])->middleware('can:critics.edit')->name('critics.edit');
Route::put('/critics/{critic}', [CriticController::class, 'update'])->middleware('can:critics.edit')->name('critics.update');
Route::delete('/critics/{critic}', [CriticController::class, 'destroy'])->middleware('can:critics.destroy')->name('critics.destroy');

//Favorite
Route::get('/favorites', [FavoriteController::class, 'index'])->middleware(['auth','verified'])->name('favorites.index');
Route::get('/favorites/editFavorite', [FavoriteController::class, 'edit'])->middleware(['auth','verified'])->name('favorites.edit');
Route::put('/favorites/{favorite}', [FavoriteController::class, 'update'])->middleware(['auth','verified'])->name('favorites.update');


Route::post('/favorites/Add', [FavoriteController::class, 'store'])->middleware(['auth','verified'])->name('favorites.store');
Route::post('/favorites/{favorite}/Delete', [FavoriteController::class, 'destroy'])->middleware(['auth','verified'])->name('favorites.destroy');

//Tags
Route::get('/tags', [TagController::class, 'index'])->middleware('can:tags.index')->name('tags.index');
Route::get('/tags/create', [TagController::class, 'create'])->middleware('can:tags.create')->name('tags.create');
Route::post('/tags', [TagController::class, 'store'])->middleware('can:tags.create')->name('tags.store');
Route::get('/tags/{tag}', [TagController::class, 'edit'])->middleware('can:tags.edit')->name('tags.edit');
Route::put('/tags/{tag}', [TagController::class, 'update'])->middleware('can:tags.edit')->name('tags.update');
Route::delete('/tags/{tag}', [TagController::class, 'destroy'])->middleware('can:tags.destroy')->name('tags.destroy');
Route::get('/tags/manage/{art}',[TagController::class, 'manage'])->middleware('can:tags.manage')->name('tags.manage');
Route::get('/tags/manage/{art}/add',[TagController::class, 'add'])->middleware('can:tags.add')->name('tags.add');


Route::post('/tags/manage/{art}/add',[TagController::class, 'addStore'])->middleware('can:tags.add')->name('tags.addStore');
Route::post('/tags/manage/{art}/remove',[TagController::class, 'remove'])->middleware('can:tags.remove')->name('tags.remove');

//Info
Route::view('us','us')->name('us');