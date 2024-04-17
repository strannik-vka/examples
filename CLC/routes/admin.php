<?php

use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => 'admin',
    'namespace' => 'App\Http\Controllers\Admin',
    'as' => 'admin.',
    'middleware' => 'role:admin,applicationModer,expertModer'
], function () {
    Route::get('/', function () {
        return view('admin');
    });
    Route::get('middleware', function () {
        return request()->user()->getGroup('slug');
    });
    Route::get('user_info', function () {
        return request()->user();
    });
    Route::group([
        'middleware' => 'admin'
    ], function () {
        Route::resource('course', 'CourseController');
        Route::resource('lesson', 'LessonController');
        Route::resource('test', 'TestController');
        Route::resource('TestAnswer', 'TestAnswerController');
        Route::resource('opinion', 'OpinionController');
        Route::resource('LessonAnalyticGroup', 'LessonAnalyticGroupController');
        Route::resource('LessonAnalytic', 'LessonAnalyticController');
        Route::resource('PartnerCategory', 'PartnerCategoryController');
        Route::resource('partner', 'PartnerController');
        Route::resource('mailing', 'MailingController');
        Route::resource('category', 'CategoryController');
        Route::resource('user', 'UserController');
        Route::resource('BlockExpert', 'BlockExpertController');
        Route::resource('BlockProfessional', 'BlockProfessionalController');
        Route::resource('OpinionAnswer', 'OpinionAnswerController');
    });
    Route::group([
        'middleware' => 'role:admin,applicationModer'
    ], function () {
        Route::resource('application', 'ApplicationController');
        Route::resource('evaluation', 'EvaluationController');
        Route::resource('post', 'PostController');
        Route::resource('meeting', 'MeetingController');
        Route::post('delete', 'DeleteController@delete');
    });
    Route::group([
        'middleware' => 'role:admin,applicationModer,expertModer'
    ], function () {
        Route::resource('expert', 'ExpertController');
    });
});
