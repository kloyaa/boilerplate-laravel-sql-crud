<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CourseMajorController;
use App\Http\Controllers\CourseApiController;
use App\Http\Controllers\DepartmentsController;
use App\Http\Controllers\SchoolYearController;
use App\Http\Controllers\SemesterApiController;
use App\Http\Controllers\UserApiController;
use App\Http\Controllers\YearLevelApiController;

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

Route::apiResource("courseapi", CourseApiController::class);

Route::apiResource("department", DepartmentsController::class);

Route::apiResource("schoolyear", SchoolYearController::class);

Route::apiResource("semisterapi", SemesterApiController::class);

Route::apiResource("userapi", UserApiController::class);

Route::apiResource("yearlevelapi", YearLevelApiController::class);
