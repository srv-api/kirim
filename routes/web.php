<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| CONTROLLERS
|--------------------------------------------------------------------------
*/

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
| SUBSCRIPTION
|--------------------------------------------------------------------------
|
| Checkout tetap tersedia sebagai route.
| Tetapi tombol Upgrade pada sidebar membuka modal,
| jadi sidebar TIDAK memanggil route checkout ini.
|
*/

/*
|--------------------------------------------------------------------------
| Subscription Checkout
|--------------------------------------------------------------------------
|
| GET /subscription/plus/checkout
|
| Route name:
| subscription.checkout
|
*/

Route::get(
    '/subscription/{slug}/checkout',
    [
        SubscriptionController::class,
        'checkout'
    ]
)->name('subscription.checkout');


/*
|--------------------------------------------------------------------------
| Subscription Subscribe
|--------------------------------------------------------------------------
|
| POST /subscription/plus/subscribe
|
| Route name:
| subscription.subscribe
|
*/

Route::post(
    '/subscription/{slug}/subscribe',
    [
        SubscriptionController::class,
        'subscribe'
    ]
)
    ->middleware('auth')
    ->name('subscription.subscribe');


/*
|--------------------------------------------------------------------------
| BLOG
|--------------------------------------------------------------------------
*/

Route::prefix('blog')->group(function () {

    /*
    |--------------------------------------------------------------------------
    | Blog Index
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/',
        [
            BlogController::class,
            'index'
        ]
    )->name('blog');


    /*
    |--------------------------------------------------------------------------
    | Blog Search
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/search',
        [
            BlogController::class,
            'search'
        ]
    )->name('blog.search');


    /*
    |--------------------------------------------------------------------------
    | Blog Category
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/category/{slug}',
        [
            BlogController::class,
            'category'
        ]
    )->name('blog.category');


    /*
    |--------------------------------------------------------------------------
    | Blog Tag
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/tag/{tag}',
        [
            BlogController::class,
            'tag'
        ]
    )->name('blog.tag');


    /*
    |--------------------------------------------------------------------------
    | Blog Comment
    |--------------------------------------------------------------------------
    */

    Route::post(
        '/{id}/comment',
        [
            BlogController::class,
            'comment'
        ]
    )
        ->middleware('auth')
        ->name('blog.comment');


    /*
    |--------------------------------------------------------------------------
    | Blog Detail
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/{slug}',
        [
            BlogController::class,
            'show'
        ]
    )->name('blog.detail');

});


/*
|--------------------------------------------------------------------------
| AUTHENTICATION
|--------------------------------------------------------------------------
*/


/*
|--------------------------------------------------------------------------
| Login
|--------------------------------------------------------------------------
*/

Route::get(
    '/login',
    [
        AuthController::class,
        'showLogin'
    ]
)->name('login');


/*
|--------------------------------------------------------------------------
| Login Process
|--------------------------------------------------------------------------
*/

Route::post(
    '/login',
    [
        AuthController::class,
        'login'
    ]
)->name('login.process');


/*
|--------------------------------------------------------------------------
| Logout
|--------------------------------------------------------------------------
*/

Route::post(
    '/logout',
    [
        AuthController::class,
        'logout'
    ]
)
    ->middleware('auth')
    ->name('logout');


/*
|--------------------------------------------------------------------------
| Register
|--------------------------------------------------------------------------
*/

Route::get(
    '/register',
    [
        RegisterController::class,
        'create'
    ]
)->name('register');


/*
|--------------------------------------------------------------------------
| Register Process
|--------------------------------------------------------------------------
*/

Route::post(
    '/register',
    [
        RegisterController::class,
        'store'
    ]
)->name('register.store');


/*
|--------------------------------------------------------------------------
| USER DASHBOARD
|--------------------------------------------------------------------------
*/

Route::get(
    '/dashboard',
    function () {

        $user = auth()->user();

        /*
        |--------------------------------------------------------------------------
        | Superadmin
        |--------------------------------------------------------------------------
        */

        if ($user->hasRole('superadmin')) {

            return redirect()->route(
                'admin.dashboard'
            );

        }


        /*
        |--------------------------------------------------------------------------
        | Owner
        |--------------------------------------------------------------------------
        */

        if ($user->hasRole('owner')) {

            return redirect()->route(
                'owner.dashboard'
            );

        }


        /*
        |--------------------------------------------------------------------------
        | Default User
        |--------------------------------------------------------------------------
        */

        return view('dashboard');

    }
)
    ->middleware('auth')
    ->name('dashboard');


/*
|--------------------------------------------------------------------------
| ADMIN PANEL
|--------------------------------------------------------------------------
|
| URL:
| /admin/panel/...
|
| Route prefix:
| admin.
|
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
        | ADMIN DASHBOARD
        |--------------------------------------------------------------------------
        */

        Route::get(
            '/dashboard',
            function () {

                return view(
                    'admin.panel.dashboard'
                );

            }
        )->name('dashboard');


        /*
        |--------------------------------------------------------------------------
        | ROLES
        |--------------------------------------------------------------------------
        */

        Route::resource(
            'roles',
            RoleController::class
        );


        /*
        |--------------------------------------------------------------------------
        | USERS
        |--------------------------------------------------------------------------
        */

        Route::resource(
            'users',
            UserController::class
        );


        /*
        |--------------------------------------------------------------------------
        | POSTS
        |--------------------------------------------------------------------------
        */

        Route::resource(
            'posts',
            AdminPostController::class
        );


        /*
        |--------------------------------------------------------------------------
        | CATEGORIES
        |--------------------------------------------------------------------------
        */

        Route::resource(
            'categories',
            CategoryController::class
        );


        /*
        |--------------------------------------------------------------------------
        | TAGS
        |--------------------------------------------------------------------------
        */

        Route::resource(
            'tags',
            TagController::class
        );


        /*
        |--------------------------------------------------------------------------
        | COMMENTS
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
|
| URL:
| /owner/panel/...
|
| Route prefix:
| owner.
|
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
        | DASHBOARD
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
        | ASSESSMENTS
        |--------------------------------------------------------------------------
        */

        Route::resource(
            'assessments',
            AssessmentController::class
        );


        /*
        |--------------------------------------------------------------------------
        | REGENERATE ASSESSMENT PIN
        |--------------------------------------------------------------------------
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
        | QUESTIONS
        |--------------------------------------------------------------------------
        */

        Route::resource(
            'questions',
            QuestionController::class
        );


        /*
        |--------------------------------------------------------------------------
        | ASSESSMENT CATEGORIES
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
        | PARTICIPANTS
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


        /*
        |--------------------------------------------------------------------------
        | CREATE PARTICIPANT
        |--------------------------------------------------------------------------
        */

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
        | RESULTS
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


        /*
        |--------------------------------------------------------------------------
        | RESULT DETAIL
        |--------------------------------------------------------------------------
        */

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
        | ANALYTICS
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
        | RANKING
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
        | SETTINGS
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
        | PROFILE
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


        /*
        |--------------------------------------------------------------------------
        | UPDATE PROFILE
        |--------------------------------------------------------------------------
        */

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
| POST:
| /assessment/{assessment}/pin
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
| POST:
| /assessment/{assessment}/question/{question}/answer
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


/*
|--------------------------------------------------------------------------
| Tracking Search
|--------------------------------------------------------------------------
*/

Route::post(
    '/tracking',
    [
        TrackingController::class,
        'search'
    ]
)->name('tracking.search');


/*
|--------------------------------------------------------------------------
| Tracking Detail
|--------------------------------------------------------------------------
*/

Route::get(
    '/tracking/{awb}',
    [
        TrackingController::class,
        'show'
    ]
)->name('tracking.show');