<?php
 
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;

use App\Http\Controllers\CaisseController;
use App\Http\Controllers\CommandeController;

use App\Http\Controllers\ServerController;
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



Route::middleware('guest')->group(function () {

   /* Route::get('/', function () {
        return view('login');
    });*/

   // return redirect(route('login'));
});
/*
Route::get('/', function () {
    return view('auth.login');
});*/
Route::middleware('auth')->group(function () {
// manage  serveurs
    Route::get('serveur', [ServerController::class, 'index'])->name('serveurs.index');
    Route::get('serveur/create', [ServerController::class, 'create'])->name('serveurs.create');
    Route::post('serveur', [ServerController::class, 'store'])->name('serveurs.store');
    Route::delete('serveur/{serveur}', [ServerController::class, 'destroy'])->name('serveurs.destroy');

    Route::get('/', function () {
        return redirect(route('caisse.index'));
    });
    Route::resource('products', ProductController::class);
    Route::get('category/{name}/products', [ProductController::class, 'index'])->name('products.category');
    Route::get('get_ajax_data', [ProductController::class, 'get_ajax_data'])->name('products.ajax_data');
    
    Route::resource('categories', CategoryController::class);
    
    /*route caisse*/
    Route::get('caisse', [CaisseController::class, 'index'])->name('caisse.index');
    Route::get('caisse/{name}/products', [CaisseController::class, 'productsByCategory'])->name('caisse.productsByCategory');
    Route::get('caisse/products_ajax', [CaisseController::class, 'products_ajax'])->name('caisse.products_ajax');
    Route::get('caisse/categories_ajax', [CaisseController::class, 'categories_ajax'])->name('caisse.categories');
    
    /*route recette [commande]*/
     Route::get('recette', [CommandeController::class, 'index'])->name('commandes.index');
     Route::get('recette/search/date/{date}', [CommandeController::class, 'recherche_date'])->name('recette.search_date');
     Route::get('recette/search/user-date/{user}/{date}', [CommandeController::class, 'recherche_date_user'])->name('recette.search_user_date');
    
     //get commande 
     Route::get('commandes/{Commande}', [CommandeController::class, 'show'])->name('commandes.show');
     Route::get('commandes/ajaxshow/{Commande}', [CommandeController::class, 'showAjax'])->name('commandes.showAjax');
     // save commandes
     Route::post('commandes', [CommandeController::class, 'store'])->name('commandes.save');
    
Route::get('/logout', function () {

    return abort(404);
} );
 
});
  




/*
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');
*/
require __DIR__.'/auth.php';
