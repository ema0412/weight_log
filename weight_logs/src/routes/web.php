<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WeightController;
use App\Http\Controllers\AuthenticatedSessionController;
use App\Http\Controllers\RegisteredUserController;

Route::get('/weight_logs',[WeightController::class, 'log']);
Route::post('/weight_logs/create', [WeightController::class, 'postCreate']);
Route::get('/weight_logs/search',[WeightController::class, 'search']);

Route::post('/weight_logs/{weightLogId}/update', [WeightController::class, 'postUpdate']);
Route::post('/weight_logs/{:weightLogId}/deleate', [WeightController::class, 'postDelete']);
Route::get('/weight_logs/goal_setting', [WeightController::class, 'postGoal']);
Route::post('/goal', [WeightController::class, 'goal']);
Route::get('/weight_logs/{weightLogId}', [WeightController::class, 'getId']);


Route::post('/login', [AuthenticatedSessionController::class, 'store']);
Route::get('/register/step1', [RegisteredUserController::class, 'create']);
Route::post('/register', [RegisteredUserController::class, 'store']);

Route::get('/register/step2', [WeightController::class, 'weight']);
Route::post('/weight', [WeightController::class, 'storeWeight']);
