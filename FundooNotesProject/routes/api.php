<?php

use App\Http\Controllers\LabelController;
use App\Http\Controllers\NoteController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('register', [UserController::class, 'register']);
Route::post('login', [UserController::class, 'login']);
Route::post('forgotPassword', [UserController::class, 'forgotPassword']);

Route::group(['middleware' => ['jwt.verify']], function () {
    Route::post('logout', [UserController::class, 'logout']);
    Route::get('getUser', [UserController::class, 'getUser']);
    Route::post('resetPassword', [UserController::class, 'resetPassword']);
    Route::post('createNote', [NoteController::class, 'createNote']);
    Route::post('getNoteById', [NoteController::class, 'getNoteById']);
    Route::get('getAllNotes', [NoteController::class, 'getAllNotes']);
    Route::post('updateNoteById', [NoteController::class, 'updateNoteById']);
    Route::delete('deleteNoteById', [NoteController::class, 'deleteNoteById']);
        Route::post('createLabel', [LabelController::class, 'createLabel']);
        Route::post('getLableById', [LabelController::class, 'getLableById']);
        Route::post('getAllLabel', [LabelController::class, 'getAllLabel']);
        Route::post('updateLabelById', [LabelController::class, 'updateLabelById']);
        Route::post('deleteLabelById', [LabelController::class, 'deleteLabelById']);
        Route::post('addNoteLabel', [NoteController::class, 'addNoteLabel']);
        Route::post('searchNotes', [NoteController::class, 'searchNotes']);
        Route::post('verifyMail', [UserController::class, 'verifyMail']);
});

