<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NotesController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });


Route::controller(NotesController::class)->group(function () {
    Route::get('/', 'index')->name('note.index');
    Route::get('/create', 'create')->name('note.create');
    Route::get('/important', 'importantNotes')->name('note.imortant');
    Route::get('/deleted', 'deletedNotes')->name('note.deleted');
    Route::get('/{note}', 'edit')->name('note.edit');
    Route::post('/store', 'store')->name('note.store');
    Route::patch('/{note}', 'update')->name('note.update');
    Route::patch('/restore/{note}', 'restoreNote')->name('note.restore');
    Route::delete('/{note}', 'softDestroy')->name('note.softdestroy');
    Route::delete('/deleted/{note}', 'forceDelete')->name('note.forcedelete');
    Route::post('/notes/search', 'searchNote')->name('note.search');
});
