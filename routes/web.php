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
Route::resource('region', RegionController::class);
Route::resource('departement', DepartementController::class);
Route::resource('commune', CommuneController::class);
Route::resource('activite', ActiviteController::class);
Route::get('desagrege/by/indicateur/{indicateur_id}','ResultatController@getDesagregeByIndicateur');
Route::get('projet/indicateur/{projet_id}','IndicateurController@getIndicateurByProjet')->name('projet.indicateur');
Route::get('indicateur/resultat/{indicateur}','ResultatController@getResultatByIndicateur')->name('indicateur.resultat');
Route::get('menu/projet/{projet_id}','HomeController@goToMenu')->name('go.menu');
Route::get('activite/projet/{projet_id}','ActiviteController@create')->name('activite.projet');
Route::get('liste/activite/projet/{id}','ActiviteController@getActiviteByprojet')->name('liste.activite.projet');
Route::get('indicateur/projet/{projet_id}','IndicateurController@create')->name('indicateur.projet');
Route::get('resultat/projet/{projet_id}','ResultatController@createByProject')->name('resultat.projet');
Route::get('fiche/indicateur/projet/{projet_id}','IndicateurController@getIndicateurAndResultat')->name('fiche.indicateur.projet');

