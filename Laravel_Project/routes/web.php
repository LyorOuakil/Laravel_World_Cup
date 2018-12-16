<?php
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


Route::get('admin/ListUsers/edit/{id}', 'UsersController@edit');

Route::post('admin/ListUsers/edit/{id}','usersController@update')->name('update');

Route::get('admin/ListUsers/{id}', 'usersController@destroy')->name('destroy');

Route::get('/teams', 'CountriesController@getCountries');

Route::post('/teams/createteam', 'CountriesController@createTeam');

Route::get('/teams/createteam', 'CountriesController@index');

Route::get('admin/teams/createteam', 'CountriesController@index');

Route::get('/teams/createUser', 'UsersController@index');

Route::post('/teams/createUser', 'UsersController@create')->name('Users');

Route::get('players/{id}', 'PlayerController@getPlayerById');


Route::get('/', function () {
    return view('auth/login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin', 'AdminController@admin')
    ->middleware('is_admin')
    ->name('admin');

Route::get('/admin/ListUsers', 'AdminController@getUsers', '')->name('ListUsers');

Route::get('/admin', 'CountriesController@getCountries');


Route::get('players', 'PlayerController@getPlayers');

Route::get('admin/players', 'PlayerController@getPlayers')->name('player');


// Route::get('players/createplayer', function(){
//     // return view('Players/playersCreate');
// });

Route::get('player/CreatePlayer' ,'PlayerController@index');


Route::post('players/createplayer', 'PlayerController@createPlayer')->name('samy');

// Route::get('players', 'PlayerController@getPlayers');

 Route::get('players/showsingleteam', 'PlayerController@index');

Route::get('Players/showsingleplayer/{id}', 'StatsController@showStat');

Route::get('admin/countries/edit/{id}', 'CountriesController@edit');

Route::post('admin/countries/edit/{id}', 'CountriesController@update')->name('updateCountry');

Route::get('admin/countries/{id}', 'CountriesController@destroy')->name('destroyCountry');

Route::get('admin/players/edit/{id}', 'PlayerController@edit');

Route::post('admin/players/edit/{id}', 'PlayerController@update')->name('updatePlayer');

Route::get('admin/players/{id}', 'PlayerController@destroy')->name('destroyPlayer');


// ----- *** Match *** ----- //

Route::get('Match/match', 'MatchController@getMatchs');

Route::get('Match/creatematch', 'MatchController@index');

Route::post('Match/creatematch', 'MatchController@createMatch');

// ----- ****** -----//



// -----  PARIS SPORTIF ----//

Route::get('Match/bet', 'BetController@index');
Route::post('Match/bet/{id}', 'BetController@bet')->name('Bet');

// ----- ******* ------ ///


Route::get('Teams/rank', 'CountriesController@getRank');
