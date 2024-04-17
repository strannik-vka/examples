<?php

use App\Http\Controllers\Course\CertificateController;
use App\Http\Controllers\Course\CourseController;
use App\Http\Controllers\Course\OpinionAnswerController;
use App\Http\Controllers\Course\OpinionController;
use App\Http\Controllers\Course\TestAnswerController;
use App\Http\Controllers\EvaluationController;
use App\Http\Controllers\LeadersCompetitionController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\MeetingController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\Profile\SettingsController;
use App\Http\Controllers\OpinionsController;
use App\Http\Controllers\RecommendationController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SubscribeController;
use Illuminate\Support\Facades\Route;

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

Route::get('/plug', function () {
    return view('plug');
})->name('plug');

Route::get('/', function () {
    return view('index');
})->name('index');

Route::get('/auth/confirm-profile', function () {
    return view('auth.confirm-profile');
})->name('auth.confirm-profile');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/leadership-contest', function () {
    return view('leadership-contest');
})->name('leadership.contest');

Route::get('/leadership-contest-result', function () {
    dd('Итоги конкурса');
})->name('leadership.contest.result');

// agreement
Route::get('/agreement/data', function () {
    return view('/agreement/data');
})->name('agreement.data');
Route::get('/agreement/offer', function () {
    return view('/agreement/offer');
})->name('agreement.offer');
Route::get('/agreement/user', function () {
    return view('/agreement/user');
})->name('agreement.user');

Route::group([
    'prefix' => 'course/',
    'as' => 'course.',
    'middleware' => 'auth'
], function () {
    Route::get('/', [CourseController::class, 'index'])->name('index');
    Route::get('/{id}', [CourseController::class, 'show'])->name('show');
    Route::get('/{id}/certificate', [CertificateController::class, 'show'])->name('certificate.show');
    Route::post('/testAnswer/store', [TestAnswerController::class, 'store'])->name('test.answer.store');
    Route::post('/setPassed', [CourseController::class, 'setPassed']);
    Route::post('/opinion/store', [OpinionAnswerController::class, 'store'])->name('opinion.store');
    Route::get('/opinion/{id}', [OpinionController::class, 'show'])->name('opinion.show');
    Route::get('/{id}/accessDownload', [CertificateController::class, 'accessDownload'])->name('certificate.accessDownload');
});

Route::get('/posts', [PostController::class, 'index'])->name('post.index');
Route::get('/posts/{id}', [PostController::class, 'show'])->name('post.show');
Route::post('postAddVoicePoll/{id}', [PostController::class, 'addVoicePoll'])->name('post.add.voice.poll');

Route::group([
    'prefix' => 'evaluation/',
    'as' => 'evaluation.',
    'middleware' => 'expert'
], function () {
    Route::get('/', [EvaluationController::class, 'index'])->name('index');
    Route::get('/projects', [EvaluationController::class, 'projects'])->name('projects');
    Route::post('update/{id}', [EvaluationController::class, 'update'])->name('update');
    Route::get('/process', [EvaluationController::class, 'process'])->name('process');
});

Route::post('/subscribe/store', [SubscribeController::class, 'store'])->name('subscribe.store');

Route::get('/unsubscribe', [SubscribeController::class, 'unsubscribe'])->name('mailing.unsubscribe');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [SettingsController::class, 'index'])
        ->name('profile.settings');

    Route::post('/profile/settings/update', [SettingsController::class, 'update'])
        ->name('profile.settings.update');

    Route::get('/profile/leaders-competition', [LeadersCompetitionController::class, 'form'])
        ->name('profile.leaders.competition');

    Route::post('/leaders-competition/store', [LeadersCompetitionController::class, 'store'])
        ->name('leaders.competition.store');

    Route::post('/leaders-competition/update', [LeadersCompetitionController::class, 'update'])
        ->name('leaders.competition.update');

    Route::get('/profile/recommendations', function () {
        return view('profile.recommendations');
    })->name('profile.recommendations');
});

Route::middleware('auth')->group(
    function () {
        Route::get('/meeting', [MeetingController::class, 'index'])->name('meeting.index');
        Route::get('/meeting/{id}', [MeetingController::class, 'show'])->name('meeting.show');
    }
);

Route::get('/faq', function () {
    return view('faq.index');
})->name('faq.index');

Route::get('/courses/list/{id}', function ($id) {
    return view('course.static.list.course-' . $id);
})->where('id', '[0-9]+')->name('courses.list.item');

Route::middleware('auth')->group(function () {
    Route::get('/notifications', [
        NotificationController::class, 'index'
    ])->name('notifications.index');

    Route::get('/notifications/new', [
        NotificationController::class, 'new'
    ])->name('notifications.new');

    Route::post('/notifications/read', [
        NotificationController::class, 'read'
    ])->name('notifications.read');
});

Route::get('/search', [SearchController::class, 'index'])
    ->name('search.index');

Route::get('/recommendation/show', [RecommendationController::class, 'show'])->name('recommendation.show');
Route::get('/opinions/show', [OpinionsController::class, 'show'])->name('opinions.show');

require __DIR__ . '/auth.php';
require __DIR__ . '/admin.php';
