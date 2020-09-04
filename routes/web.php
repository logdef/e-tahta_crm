<?php

use Barryvdh\DomPDF\PDF;
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

Route::get('/pdf/{id}', 'PDFController@pdf')->name('pdf.pdf');



Route::get('index/class/teacher', 'Backend\ClassController@teacher')->name('class.teacher');
Route::get('index/class/department', 'Backend\ClassController@department')->name('class.department');



Route::prefix('index')->group(function () {
    Route::namespace('Backend')->group(function () {

        Route::resource('/', 'DefaultController');
        Route::resource('/lesson', 'LectureController');
        Route::resource('/lassign', 'LassignController');
        Route::resource('/teacher', 'TeacherController');
        Route::resource('/product', 'LessonsbasketController');
        Route::resource('/lessonspackage', 'LessonspackageController');
        Route::resource('/studentassign', 'StudentAssignController');
        Route::resource('/studentlessons', 'StudentLessonsController');
        Route::resource('/studentpackage', 'StudentPackageController');
        Route::resource('/users', 'UsersController');
        Route::resource('/departments', 'DepartmentsController');


        Route::resource('/class', 'ClassController');
        Route::resource('/classinfo', 'ClassinfoController');

        Route::resource('/lassigndepartment', 'LassignsDepartmentontroller');
        Route::resource('/payment','PaymentController');
        Route::resource('/odemetablo','PaymentController');
        Route::resource('/odemeler','PayingController');
        Route::post('/odemetablo/list', 'PaymentController@list')->name('odemetablo.list');
        Route::resource('/odemetablo/list/edit', 'PaymentController@destroy');
    });
});


Route::prefix('index/lessonspackage')->group(function () {
    Route::namespace('Backend')->group(function () {

        Route::post('/ekle', 'LessonspackageController@ekle')->name('lessonspackage.ekle');
        Route::post('/guncelle', 'LessonspackageController@guncelle')->name('lessonspackage.guncelle');
        Route::delete('/kaldir/{rowId}', 'LessonspackageController@kaldir')->name('lessonspackage.kaldir');
        Route::delete('/productkaldir/{rowId}', 'LessonspackageController@productkaldir')->name('lessonspackage.productkaldir');




    });
});

