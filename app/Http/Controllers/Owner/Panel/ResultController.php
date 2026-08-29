<?php

namespace App\Http\Controllers\Owner\Panel;

use App\Http\Controllers\Controller;
use App\Models\Assessment;
use App\Models\AssessmentResult;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ResultController extends Controller
{
    /**
     * ==========================================================
     * DAFTAR HASIL ASSESSMENT
     * ==========================================================
     */
    public function index(Request $request)
    {
        $ownerId = Auth::id();


        /*
        |--------------------------------------------------------------------------
        | QUERY UTAMA
        |--------------------------------------------------------------------------
        |
        | HANYA hasil dari assessment milik owner login.
        |
        */

        $query = AssessmentResult::with([
            'participant',
            'assessment',
        ])
        ->whereHas(
            'assessment',
            function ($q) use ($ownerId) {

                $q->where(
                    'user_id',
                    $ownerId
                );

            }
        )
        ->latest();


        /*
        |--------------------------------------------------------------------------
        | SEARCH
        |--------------------------------------------------------------------------
        */

        if ($request->filled('search')) {

            $search = $request->search;

            $query->where(function ($q) use ($search) {

                /*
                |--------------------------------------------------------------
                | Search peserta
                |--------------------------------------------------------------
                */

                $q->whereHas(
                    'participant',
                    function ($participantQuery) use ($search) {

                        $participantQuery->where(
                            'name',
                            'like',
                            '%' . $search . '%'
                        );

                    }
                )


                /*
                |--------------------------------------------------------------
                | Search assessment
                |--------------------------------------------------------------
                */

                ->orWhereHas(
                    'assessment',
                    function ($assessmentQuery) use ($search) {

                        $assessmentQuery->where(
                            'title',
                            'like',
                            '%' . $search . '%'
                        );

                    }
                );

            });
        }


        /*
        |--------------------------------------------------------------------------
        | FILTER STATUS
        |--------------------------------------------------------------------------
        */

        if ($request->filled('status')) {

            $query->where(
                'status',
                $request->status
            );
        }


        /*
        |--------------------------------------------------------------------------
        | FILTER ASSESSMENT
        |--------------------------------------------------------------------------
        */

        if ($request->filled('assessment_id')) {

            $query->where(
                'assessment_id',
                $request->assessment_id
            );
        }


        /*
        |--------------------------------------------------------------------------
        | PAGINATION
        |--------------------------------------------------------------------------
        */

        $results = $query
            ->paginate(10)
            ->withQueryString();


        /*
        |--------------------------------------------------------------------------
        | ASSESSMENT FILTER
        |--------------------------------------------------------------------------
        |
        | Hanya assessment milik owner login.
        |
        */

        $assessments = Assessment::where(
            'user_id',
            $ownerId
        )
        ->orderBy('title')
        ->get();


        /*
        |--------------------------------------------------------------------------
        | SUMMARY
        |--------------------------------------------------------------------------
        |
        | Jangan menggunakan AssessmentResult::count()
        | karena itu menghitung seluruh owner.
        |
        */

        $totalResults = (clone $query)
            ->count();


        $passedResults = (clone $query)
            ->where(
                'status',
                'passed'
            )
            ->count();


        $failedResults = (clone $query)
            ->where(
                'status',
                'failed'
            )
            ->count();


        /*
        |--------------------------------------------------------------------------
        | RETURN VIEW
        |--------------------------------------------------------------------------
        */

        return view(
            'owner.panel.results.index',
            compact(
                'results',
                'assessments',
                'totalResults',
                'passedResults',
                'failedResults'
            )
        );
    }


    /**
     * ==========================================================
     * DETAIL HASIL
     * ==========================================================
     */
    public function show(
        AssessmentResult $result
    ) {

        $ownerId = Auth::id();


        /*
        |--------------------------------------------------------------------------
        | LOAD ASSESSMENT
        |--------------------------------------------------------------------------
        */

        $result->load([
            'participant',
            'assessment',
        ]);


        /*
        |--------------------------------------------------------------------------
        | SECURITY CHECK
        |--------------------------------------------------------------------------
        |
        | Owner hanya boleh melihat hasil assessment
        | miliknya sendiri.
        |
        */

        abort_unless(
            $result->assessment
            &&
            $result->assessment->user_id == $ownerId,
            403
        );


        return view(
            'owner.panel.results.show',
            compact('result')
        );
    }
}
