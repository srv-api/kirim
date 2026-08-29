<?php

namespace App\Http\Controllers\Owner\Panel;

use App\Http\Controllers\Controller;
use App\Models\Assessment;
use App\Models\AssessmentResult;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ParticipantController extends Controller
{
    /**
     * Data peserta assessment
     *
     * Hanya peserta yang mengerjakan assessment
     * milik owner yang sedang login.
     */
    public function index(Request $request)
    {
        $ownerId = Auth::id();

        /*
        |--------------------------------------------------------------------------
        | QUERY HASIL ASSESSMENT MILIK OWNER
        |--------------------------------------------------------------------------
        */

        $query = AssessmentResult::with([
            'participant',
            'assessment',
        ])
        ->whereHas('assessment', function ($q) use ($ownerId) {

            $q->where(
                'user_id',
                $ownerId
            );

        })
        ->latest();


        /*
        |--------------------------------------------------------------------------
        | SEARCH PESERTA
        |--------------------------------------------------------------------------
        */

        if ($request->filled('search')) {

            $search = $request->search;

            $query->whereHas(
                'participant',
                function ($q) use ($search) {

                    $q->where(
                        'name',
                        'like',
                        '%' . $search . '%'
                    );

                }
            );
        }


        /*
        |--------------------------------------------------------------------------
        | FILTER ASSESSMENT
        |--------------------------------------------------------------------------
        |
        | Tetap aman karena query utama sudah dibatasi
        | berdasarkan owner.
        |
        */

        if ($request->filled('assessment')) {

            $query->where(
                'assessment_id',
                $request->assessment
            );
        }


        /*
        |--------------------------------------------------------------------------
        | PAGINATION
        |--------------------------------------------------------------------------
        */

        $participants = $query
            ->paginate(10)
            ->withQueryString();


        /*
        |--------------------------------------------------------------------------
        | ASSESSMENT UNTUK FILTER
        |--------------------------------------------------------------------------
        |
        | Hanya assessment milik owner.
        |
        */

        $assessments = Assessment::where(
            'user_id',
            $ownerId
        )
        ->orderBy('title')
        ->get();


        return view(
            'owner.panel.participants.index',
            compact(
                'participants',
                'assessments'
            )
        );
    }
}
