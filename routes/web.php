<?php

use App\Http\Controllers\CctvMonitorController;
use App\Http\Controllers\resultController;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard', [CctvMonitorController::class, 'showForm'])->name('monitoring-form');
Route::get('/result-page', [ResultController::class, 'showLogs'])->name('result-page');
Route::post('/ping-ip', [CctvMonitorController::class, 'handlePingIp'])->name('handlePingIp');
Route::post('/ping-port', [CctvMonitorController::class, 'handlePingPort'])->name('handlePingPort');
