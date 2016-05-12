<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::resource('mark', 'MarkController');

/*** for class function **/
/******************************


Verb		Path					Action		Route Name
GET			/class					index		class.index
GET			/class/create			create		class.create
POST		/class					store		class.store
GET			/class/{id}				show		class.show
GET			/class/{id}/edit		edit		class.edit
PUT/PATCH	/class/{id}				update		class.update
DELETE		/class/{id}				destroy		class.destroy 

******************************/

Route::resource('class', 'ClassController');

/** end of class routes ***/
