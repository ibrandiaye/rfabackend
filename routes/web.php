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

Route::get('/dashboard/{projet_id}', 'HomeController@dashboard')->name('dashboard');

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home.home');
Route::resource('projet', ProjetController::class);
Route::resource('indicateur', IndicateurController::class);
Route::resource('resultat', ResultatController::class);
Route::resource('region', RegionController::class);
Route::resource('departement', DepartementController::class);
Route::resource('commune', CommuneController::class);
Route::resource('activite', ActiviteController::class);
Route::resource('suiviActivite', SuiviActiviteController::class);
Route::resource('village', VillageController::class);
Route::resource('pays', PaysController::class);
Route::resource('axe', AxeController::class);
Route::resource('action', ActionController::class);
Route::resource('indicateura', IndicateuraController::class);
Route::resource('resultata', ResultataController::class);
Route::get('desagrege/by/indicateur/{indicateur_id}','ResultatController@getDesagregeByIndicateur');
Route::get('projet/indicateur/{projet_id}','IndicateurController@getIndicateurByProjet')->name('projet.indicateur');
Route::get('indicateur/resultat/{indicateur}/{projet}','ResultatController@getResultatByIndicateur')->name('indicateur.resultat');
Route::get('menu/projet/{projet_id}','HomeController@goToMenu')->name('go.menu');
Route::get('activite/projet/{projet_id}','ActiviteController@create')->name('activite.projet');
Route::get('liste/activite/projet/{id}','ActiviteController@getActiviteByprojet')->name('liste.activite.projet');
Route::get('indicateur/projet/{projet_id}','IndicateurController@create')->name('indicateur.projet');
Route::get('resultat/projet/{projet_id}','ResultatController@createByProject')->name('resultat.projet');
Route::get('fiche/indicateur/projet/{projet_id}','IndicateurController@getIndicateurAndResultat')->name('fiche.indicateur.projet');
Route::get('suiviactivite/by/projet/{projet_id}','SuiviActiviteController@getSuiviActiviteByProjet')->name('suiviactivite.projet');
Route::get('suiviactivite/create/{projet_id}','SuiviActiviteController@create')->name('suiviactivite1.create');
Route::get('suiviactivite/edit/{id}/{projet_id}','SuiviActiviteController@edit')->name('suiviactivite.edit');
Route::get('rappel','ActiviteController@rappel')->name('activite.rappe');
Route::post('search/resultat','IndicateurController@getIndicateurAndResultatAndAnne')->name('search.resultat');
Route::get('activite/indicateur/{id}','ActiviteController@getIndicateurByActivite');
Route::post('search/periode/indicateur','IndicateurController@getIndicateurAndResultatByPeriode')->name('search.periode.resultat');
Route::get('villages/commune/{commune_id}','VillageController@getByCommune')->name('villages.commune');
Route::post('search/resultat/by/region','IndicateurController@getIndicateurAndResultatByRegion')->name('search.resultat.region');
Route::get('galerie/activite/{projet}/{sv}','SuiviActiviteController@getImageByActivite')->name('galerie.suivi.activite');

Route::get('rapport/index/{projet_id}','RapportController@index')->name('rapport.index');
Route::get('rapport/{projet_id}','RapportController@create')->name('rapport.create');
Route::get('rapport/edit/{projet_id}','RapportController@edit')->name('rapport.edit');
Route::post('rapport/store','RapportController@store')->name('rapport.store');
Route::put('rapport/update','RapportController@update')->name('rapport.update');
Route::get('pays/region/{pays_id}','RegionController@getRegionByPays')->name('pays.region');

