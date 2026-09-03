<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TrackingController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Admin\Panel\PostController as AdminPostController;
use App\Http\Controllers\Admin\Panel\CategoryController;
use App\Http\Controllers\Admin\Panel\TagController;
use App\Http\Controllers\Admin\Panel\CommentController;
use App\Http\Controllers\Owner\Panel\DashboardController;
use App\Http\Controllers\Owner\Panel\AssessmentController;
use App\Http\Controllers\Owner\Panel\QuestionController;
use App\Http\Controllers\Owner\Panel\ParticipantController;
use App\Http\Controllers\Owner\Panel\ResultController;
use App\Http\Controllers\Owner\Panel\ProfileController;
use App\Http\Controllers\AssessmentParticipantController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\Owner\Panel\TugQuestionController;
/*
|--------------------------------------------------------------------------
| HOME
|--------------------------------------------------------------------------
*/

Route::get('/', fn () => view('home'))->name('home');

/*
|--------------------------------------------------------------------------
| SUBSCRIPTION
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    Route::get(
        '/subscription',
        [SubscriptionController::class, 'index']
    )->name('subscription.index');

    Route::get(
        '/subscription/{slug}/checkout',
        [SubscriptionController::class, 'checkout']
    )->name('subscription.checkout');

    Route::post(
        '/subscription/{slug}/subscribe',
        [SubscriptionController::class, 'subscribe']
    )->name('subscription.subscribe');

    Route::get(
        '/subscription/payment/qris/{transaction}',
        [SubscriptionController::class, 'qris']
    )->name('subscription.qris');
});

/*
|--------------------------------------------------------------------------
| BLOG
|--------------------------------------------------------------------------
*/

Route::prefix('blog')->group(function () {
    Route::get('/', [BlogController::class, 'index'])->name('blog');
    Route::get('/search', [BlogController::class, 'search'])->name('blog.search');
    Route::get('/category/{slug}', [BlogController::class, 'category'])->name('blog.category');
    Route::get('/tag/{tag}', [BlogController::class, 'tag'])->name('blog.tag');

    Route::post('/{id}/comment', [BlogController::class, 'comment'])
        ->middleware('auth')
        ->name('blog.comment');

    Route::get('/{slug}', [BlogController::class, 'show'])->name('blog.detail');
});

/*
|--------------------------------------------------------------------------
| AUTHENTICATION
|--------------------------------------------------------------------------
*/

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.process');

Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

Route::get('/register', [RegisterController::class, 'create'])->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

/*
|--------------------------------------------------------------------------
| USER DASHBOARD
|--------------------------------------------------------------------------
*/

Route::get('/dashboard', function () {
    $user = auth()->user();

    if ($user->hasRole('superadmin')) {
        return redirect()->route('admin.dashboard');
    }

    if ($user->hasRole('owner')) {
        return redirect()->route('owner.dashboard');
    }

    return view('dashboard');
})->middleware('auth')->name('dashboard');

/*
|--------------------------------------------------------------------------
| ADMIN PANEL
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:superadmin'])
    ->prefix('admin/panel')
    ->name('admin.')
    ->group(function () {
        Route::get('/dashboard', fn () => view('admin.panel.dashboard'))->name('dashboard');

        Route::resource('roles', RoleController::class);
        Route::resource('users', UserController::class);
        Route::resource('posts', AdminPostController::class);
        Route::resource('categories', CategoryController::class);
        Route::resource('tags', TagController::class);
        Route::resource('comments', CommentController::class);
    });

/*
|--------------------------------------------------------------------------
| OWNER PANEL
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:owner'])
    ->prefix('owner/panel')
    ->name('owner.')
    ->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        Route::resource('assessments', AssessmentController::class);

        Route::post(
            '/assessments/{assessment}/regenerate-pin',
            [AssessmentController::class, 'regeneratePin']
        )->name('assessments.regenerate-pin');

        Route::resource('questions', QuestionController::class);
 Route::resource(
            'tug-questions',
            TugQuestionController::class
        );

        Route::get(
            '/tug-game',
            [TugQuestionController::class, 'game']
        )->name('tug-game');
        Route::get(
            '/assessment-categories',
            fn () => view('owner.panel.assessment-categories.index')
        )->name('assessment-categories.index');

        Route::get('/participants', [ParticipantController::class, 'index'])
            ->name('participants.index');

        Route::get(
            '/participants/create',
            fn () => view('owner.panel.participants.create')
        )->name('participants.create');

        Route::get('/results', [ResultController::class, 'index'])
            ->name('results.index');

        Route::get('/results/{result}', [ResultController::class, 'show'])
            ->name('results.show');

        Route::get(
            '/analytics',
            fn () => view('owner.panel.analytics.index')
        )->name('analytics.index');

        Route::get('/ranking', [DashboardController::class, 'ranking'])
            ->name('ranking.index');

        Route::get(
            '/settings',
            fn () => view('owner.panel.settings.index')
        )->name('settings.index');

        Route::get('/profile', [ProfileController::class, 'index'])
            ->name('profile.index');

        Route::put('/profile', [ProfileController::class, 'update'])
            ->name('profile.update');
    });

/*
|--------------------------------------------------------------------------
| PARTICIPANT - ASSESSMENT
|--------------------------------------------------------------------------
*/

Route::get('/assessment/{assessment}', [AssessmentParticipantController::class, 'show'])
    ->name('assessment.participant.show');

Route::get('/assessment/{assessment}/start', [AssessmentParticipantController::class, 'start'])
    ->name('assessment.participant.start');

Route::post('/assessment/{assessment}/pin', [AssessmentParticipantController::class, 'verifyPin'])
    ->name('assessment.verify-pin');

Route::get(
    '/assessment/{assessment}/question/{question}',
    [AssessmentParticipantController::class, 'question']
)->name('assessment.question');

Route::post(
    '/assessment/{assessment}/question/{question}/answer',
    [AssessmentParticipantController::class, 'answer']
)->name('assessment.answer');

Route::get('/assessment/{assessment}/finish', [AssessmentParticipantController::class, 'finish'])
    ->name('assessment.finish');

Route::post('/assessment/{assessment}/submit', [AssessmentParticipantController::class, 'submit'])
    ->name('assessment.submit');

Route::get('/assessment/result/{result}', [AssessmentParticipantController::class, 'result'])
    ->name('assessment.participant.result');

/*
|--------------------------------------------------------------------------
| STATIC PAGES
|--------------------------------------------------------------------------
*/

Route::view('/about', 'about')->name('about');
Route::view('/contact', 'contact')->name('contact');

/*
|--------------------------------------------------------------------------
| TRACKING
|--------------------------------------------------------------------------
*/

Route::post('/tracking', [TrackingController::class, 'search'])
    ->name('tracking.search');

Route::get('/tracking/{awb}', [TrackingController::class, 'show'])
    ->name('tracking.show');

Route::post('/midtrans/notification', [
    PaymentController::class,
    'notification'
])->name('midtrans.notification');