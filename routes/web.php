<?php


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
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('projet', ProjetController::class);
Route::resource('indicateur', IndicateurController::class);
Route::resource('resultat', ResultatController::class);
Route::get('desagrege/by/indicateur/{indicateur_id}','ResultatController@getDesagregeByIndicateur');
Route::get('projet/indicateur/{projet_id}','IndicateurController@getIndicateurByProjet')->name('projet.indicateur');
Route::get('indicateur/resultat/{indicateur}','ResultatController@getResultatByIndicateur')->name('indicateur.resultat');
