<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CourseMajorController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\DepartmentsController;
use App\Http\Controllers\SchoolYearController;
use App\Http\Controllers\SemesterController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\YearLevelController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource("post", PostController::class);

Route::apiResource("coursemajor", CourseMajorController::class);

Route::apiResource("course", CourseController::class);

Route::apiResource("department", DepartmentsController::class);

Route::apiResource("schoolyear", SchoolYearController::class);

Route::apiResource("semester", SemesterController::class);

Route::apiResource("users", UserController::class);

Route::apiResource("yearlevel", YearLevelController::class);
