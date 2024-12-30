<?php

use App\Http\Controllers\TournamentController;
use Illuminate\Support\Facades\Route;

Route::redirect("/", "/tournaments/create");
Route::resource('tournaments', TournamentController::class)->only('create', 'show', 'store');
