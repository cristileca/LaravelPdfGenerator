<?php

use App\Http\Controllers\ResumeController;
use Illuminate\Support\Facades\Route;

Route::post('/generate-resume', [ResumeController::class, 'generateResume']);
