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
use App\Http\Controllers\AssessmentParticipantController;
use App\Http\Controllers\Owner\Panel\ProfileController;

/*
|--------------------------------------------------------------------------
| HOME
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('home');
})->name('home');


/*
|--------------------------------------------------------------------------
| BLOG
|--------------------------------------------------------------------------
*/

Route::prefix('blog')->group(function () {

    Route::get('/', [
        BlogController::class,
        'index'
    ])->name('blog');

    Route::get('/search', [
        BlogController::class,
        'search'
    ])->name('blog.search');

    Route::get('/category/{slug}', [
        BlogController::class,
        'category'
    ])->name('blog.category');

    Route::get('/tag/{tag}', [
        BlogController::class,
        'tag'
    ])->name('blog.tag');

    Route::post('/{id}/comment', [
        BlogController::class,
        'comment'
    ])
        ->middleware('auth')
        ->name('blog.comment');

    Route::get('/{slug}', [
        BlogController::class,
        'show'
    ])->name('blog.detail');

});


/*
|--------------------------------------------------------------------------
| AUTHENTICATION
|--------------------------------------------------------------------------
*/

Route::get('/login', [
    AuthController::class,
    'showLogin'
])->name('login');


Route::post('/login', [
    AuthController::class,
    'login'
])->name('login.process');


Route::post('/logout', [
    AuthController::class,
    'logout'
])
    ->middleware('auth')
    ->name('logout');


Route::get('/register', [
    RegisterController::class,
    'create'
])->name('register');


Route::post('/register', [
    RegisterController::class,
    'store'
])->name('register.store');


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

})
    ->middleware('auth')
    ->name('dashboard');


/*
|--------------------------------------------------------------------------
| ADMIN PANEL
|--------------------------------------------------------------------------
*/

Route::middleware([
    'auth',
    'role:superadmin'
])
    ->prefix('admin/panel')
    ->name('admin.')
    ->group(function () {

        /*
        |--------------------------------------------------------------------------
        | Dashboard
        |--------------------------------------------------------------------------
        */

        Route::get('/dashboard', function () {
            return view('admin.panel.dashboard');
        })->name('dashboard');


        /*
        |--------------------------------------------------------------------------
        | Roles
        |--------------------------------------------------------------------------
        */

        Route::resource(
            'roles',
            RoleController::class
        );


        /*
        |--------------------------------------------------------------------------
        | Users
        |--------------------------------------------------------------------------
        */

        Route::resource(
            'users',
            UserController::class
        );


        /*
        |--------------------------------------------------------------------------
        | Posts
        |--------------------------------------------------------------------------
        */

        Route::resource(
            'posts',
            AdminPostController::class
        );


        /*
        |--------------------------------------------------------------------------
        | Categories
        |--------------------------------------------------------------------------
        */

        Route::resource(
            'categories',
            CategoryController::class
        );


        /*
        |--------------------------------------------------------------------------
        | Tags
        |--------------------------------------------------------------------------
        */

        Route::resource(
            'tags',
            TagController::class
        );


        /*
        |--------------------------------------------------------------------------
        | Comments
        |--------------------------------------------------------------------------
        */

        Route::resource(
            'comments',
            CommentController::class
        );

    });


/*
|--------------------------------------------------------------------------
| OWNER PANEL
|--------------------------------------------------------------------------
*/

Route::middleware([
    'auth',
    'role:owner'
])
    ->prefix('owner/panel')
    ->name('owner.')
    ->group(function () {

        /*
        |--------------------------------------------------------------------------
        | Dashboard
        |--------------------------------------------------------------------------
        */

        Route::get(
            '/dashboard',
            [
                DashboardController::class,
                'index'
            ]
        )->name('dashboard');


        /*
        |--------------------------------------------------------------------------
        | Assessments
        |--------------------------------------------------------------------------
        */

        Route::resource(
            'assessments',
            AssessmentController::class
        );


        /*
        |--------------------------------------------------------------------------
        | Assessment PIN
        |--------------------------------------------------------------------------
        |
        | Membuat ulang PIN assessment.
        |
        */

        Route::post(
            '/assessments/{assessment}/regenerate-pin',
            [
                AssessmentController::class,
                'regeneratePin'
            ]
        )->name(
            'assessments.regenerate-pin'
        );


        /*
        |--------------------------------------------------------------------------
        | Questions
        |--------------------------------------------------------------------------
        */

        Route::resource(
            'questions',
            QuestionController::class
        );


        /*
        |--------------------------------------------------------------------------
        | Assessment Categories
        |--------------------------------------------------------------------------
        */

        Route::get(
            '/assessment-categories',
            function () {

                return view(
                    'owner.panel.assessment-categories.index'
                );

            }
        )->name(
            'assessment-categories.index'
        );


        /*
        |--------------------------------------------------------------------------
        | Participants
        |--------------------------------------------------------------------------
        */

Route::get(
    '/participants',
    [
        ParticipantController::class,
        'index'
    ]
)->name(
    'participants.index'
);


        Route::get(
            '/participants/create',
            function () {

                return view(
                    'owner.panel.participants.create'
                );

            }
        )->name(
            'participants.create'
        );


     /*
|--------------------------------------------------------------------------
| Results
|--------------------------------------------------------------------------
*/

Route::get(
    '/results',
    [
        ResultController::class,
        'index'
    ]
)->name(
    'results.index'
);


Route::get(
    '/results/{result}',
    [
        ResultController::class,
        'show'
    ]
)->name(
    'results.show'
);


        /*
        |--------------------------------------------------------------------------
        | Analytics
        |--------------------------------------------------------------------------
        */

        Route::get(
            '/analytics',
            function () {

                return view(
                    'owner.panel.analytics.index'
                );

            }
        )->name(
            'analytics.index'
        );


        /*
        |--------------------------------------------------------------------------
        | Ranking
        |--------------------------------------------------------------------------
        */

        Route::get(
    '/ranking',
    [
        DashboardController::class,
        'ranking'
    ]
)->name(
    'ranking.index'
);

        /*
        |--------------------------------------------------------------------------
        | Settings
        |--------------------------------------------------------------------------
        */

        Route::get(
            '/settings',
            function () {

                return view(
                    'owner.panel.settings.index'
                );

            }
        )->name(
            'settings.index'
        );


        /*
        |--------------------------------------------------------------------------
        | Profile
        |--------------------------------------------------------------------------
        */

        Route::get(
            '/profile',
            [
                ProfileController::class,
                'index'
            ]
        )->name(
            'profile.index'
        );

        Route::put(
            '/profile',
            [
                ProfileController::class,
                'update'
            ]
        )->name(
            'profile.update'
        );

    });


/*
|--------------------------------------------------------------------------
| PARTICIPANT - ASSESSMENT
|--------------------------------------------------------------------------
|
| URL:
| /assessment/{assessment}
|
| {assessment} = ID assessment
|
*/

Route::get(
    '/assessment/{assessment}',
    [
        AssessmentParticipantController::class,
        'show'
    ]
)->name(
    'assessment.participant.show'
);


/*
|--------------------------------------------------------------------------
| PARTICIPANT - START ASSESSMENT
|--------------------------------------------------------------------------
|
| URL:
| /assessment/{assessment}/start
|
*/

Route::get(
    '/assessment/{assessment}/start',
    [
        AssessmentParticipantController::class,
        'start'
    ]
)->name(
    'assessment.participant.start'
);


/*
|--------------------------------------------------------------------------
| VERIFY PIN
|--------------------------------------------------------------------------
|
| URL:
| POST /assessment/{assessment}/pin
|
*/

Route::post(
    '/assessment/{assessment}/pin',
    [
        AssessmentParticipantController::class,
        'verifyPin'
    ]
)->name(
    'assessment.verify-pin'
);


/*
|--------------------------------------------------------------------------
| QUESTION
|--------------------------------------------------------------------------
|
| URL:
| /assessment/{assessment}/question/{question}
|
| Contoh:
| /assessment/CKYY35NPGL/question/T0X4J5
|
*/

Route::get(
    '/assessment/{assessment}/question/{question}',
    [
        AssessmentParticipantController::class,
        'question'
    ]
)->name(
    'assessment.question'
);


/*
|--------------------------------------------------------------------------
| ANSWER
|--------------------------------------------------------------------------
|
| URL:
| POST /assessment/{assessment}/question/{question}/answer
|
*/

Route::post(
    '/assessment/{assessment}/question/{question}/answer',
    [
        AssessmentParticipantController::class,
        'answer'
    ]
)->name(
    'assessment.answer'
);


/*
|--------------------------------------------------------------------------
| FINISH
|--------------------------------------------------------------------------
*/

Route::get(
    '/assessment/{assessment}/finish',
    [
        AssessmentParticipantController::class,
        'finish'
    ]
)->name(
    'assessment.finish'
);


/*
|--------------------------------------------------------------------------
| SUBMIT ASSESSMENT
|--------------------------------------------------------------------------
*/

Route::post(
    '/assessment/{assessment}/submit',
    [
        AssessmentParticipantController::class,
        'submit'
    ]
)->name(
    'assessment.submit'
);


/*
|--------------------------------------------------------------------------
| RESULT
|--------------------------------------------------------------------------
|
| URL:
| /assessment/result/{result}
|
*/

Route::get(
    '/assessment/result/{result}',
    [
        AssessmentParticipantController::class,
        'result'
    ]
)->name(
    'assessment.participant.result'
);

/*
|--------------------------------------------------------------------------
| ABOUT
|--------------------------------------------------------------------------
*/

Route::view(
    '/about',
    'about'
)->name('about');


/*
|--------------------------------------------------------------------------
| CONTACT
|--------------------------------------------------------------------------
*/

Route::view(
    '/contact',
    'contact'
)->name('contact');


/*
|--------------------------------------------------------------------------
| TRACKING
|--------------------------------------------------------------------------
*/

Route::post(
    '/tracking',
    [
        TrackingController::class,
        'search'
    ]
)->name('tracking.search');


Route::get(
    '/tracking/{awb}',
    [
        TrackingController::class,
        'show'
    ]
)->name('tracking.show');

