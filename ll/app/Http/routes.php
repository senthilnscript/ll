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


/*** for class function **/
/******************************


Verb		Path					Action		Route Name
GET			/class					index		class.index
POST		/class					store		class.store
GET			/class/{id}				show		class.show
PUT/PATCH	/class/{id}				update		class.update
DELETE		/class/{id}				destroy		class.destroy 

******************************/

Route::resource('class', 'ClassController');

/** end of class routes ***/


/*** for subject function **/
/******************************


Verb		Path						Action		Route Name
GET			/subject					index		subject.index
POST		/subject					store		subject.store
GET			/subject/{id}				show		subject.show
PUT/PATCH	/subject/{id}				update		subject.update
DELETE		/subject/{id}				destroy		subject.destroy 

******************************/

Route::resource('subject', 'SubjectController');

/** end of subject routes ***/


/*** for student function **/
/******************************


Verb		Path						Action		Route Name
GET			/student					index		student.index
POST		/student					store		student.store
GET			/student/{id}				show		student.show
PUT/PATCH	/student/{id}				update		student.update
DELETE		/student/{id}				destroy		student.destroy 

******************************/

Route::resource('student', 'StudentController');

/** end of subject routes ***/
