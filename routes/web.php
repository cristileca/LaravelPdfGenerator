<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ResumeController;

Route::get('/resume-form', function () {
    return view('resume-form');
});
Route::get('/generate-resume', [ResumeController::class, 'generateResume']);
