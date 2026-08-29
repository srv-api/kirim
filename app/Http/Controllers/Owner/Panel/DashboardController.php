<?php

namespace App\Http\Controllers\Owner\Panel;

use App\Http\Controllers\Controller;
use App\Models\Assessment;
use App\Models\Question;
use App\Models\Participant;
use App\Models\AssessmentResult;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class DashboardController extends Controller
{
    /**
     * Dashboard Owner
     */
    public function index()
    {
        $ownerId = Auth::id();

        // =====================================================
        // ASSESSMENT MILIK OWNER
        // =====================================================

        $ownerAssessments = Assessment::where(
            'user_id',
            $ownerId
        );

        // =====================================================
        // ASSESSMENT
        // =====================================================

        $totalAssessments = (clone $ownerAssessments)
            ->count();

        $activeAssessments = 0;
        $draftAssessments = 0;
        $completedAssessments = 0;

        if (Schema::hasColumn('assessments', 'status')) {

            $activeAssessments = (clone $ownerAssessments)
                ->where('status', 'active')
                ->count();

            $draftAssessments = (clone $ownerAssessments)
                ->where('status', 'draft')
                ->count();

            $completedAssessments = (clone $ownerAssessments)
                ->where('status', 'completed')
                ->count();
        }

        // =====================================================
        // QUESTIONS
        // =====================================================

        $totalQuestions = 0;

        if (Schema::hasTable('questions')) {

            $totalQuestions = Question::whereHas(
                'assessment',
                function ($query) use ($ownerId) {
                    $query->where(
                        'user_id',
                        $ownerId
                    );
                }
            )->count();
        }

        // =====================================================
        // PARTICIPANTS
        // =====================================================
        //
        // Participant tidak memiliki assessment_id.
        //
        // Relasi:
        // Participant
        //      ↓
        // AssessmentResult
        //      ↓
        // Assessment
        //      ↓
        // Owner
        //
        // =====================================================

        $totalParticipants = 0;

        if (
            Schema::hasTable('participants') &&
            Schema::hasTable('assessment_results')
        ) {

            $totalParticipants = Participant::whereHas(
                'results.assessment',
                function ($query) use ($ownerId) {

                    $query->where(
                        'user_id',
                        $ownerId
                    );

                }
            )
            ->distinct()
            ->count('participants.id');
        }

        // =====================================================
        // RESULTS
        // =====================================================

        $totalResults = 0;

        if (Schema::hasTable('assessment_results')) {

            $totalResults = AssessmentResult::whereHas(
                'assessment',
                function ($query) use ($ownerId) {

                    $query->where(
                        'user_id',
                        $ownerId
                    );

                }
            )->count();
        }

        // =====================================================
        // TODAY
        // =====================================================

        $todayParticipants = 0;
        $todayResults = 0;

        // -----------------------------------------------------
        // TODAY PARTICIPANTS
        // -----------------------------------------------------

        if (
            Schema::hasTable('participants') &&
            Schema::hasTable('assessment_results')
        ) {

            $todayParticipants = Participant::whereDate(
                'participants.created_at',
                today()
            )
            ->whereHas(
                'results.assessment',
                function ($query) use ($ownerId) {

                    $query->where(
                        'user_id',
                        $ownerId
                    );

                }
            )
            ->distinct()
            ->count('participants.id');
        }

        // -----------------------------------------------------
        // TODAY RESULTS
        // -----------------------------------------------------

        if (Schema::hasTable('assessment_results')) {

            $todayResults = AssessmentResult::whereDate(
                'created_at',
                today()
            )
            ->whereHas(
                'assessment',
                function ($query) use ($ownerId) {

                    $query->where(
                        'user_id',
                        $ownerId
                    );

                }
            )
            ->count();
        }

        // =====================================================
        // MONTH
        // =====================================================

        $monthParticipants = 0;
        $monthResults = 0;

        // -----------------------------------------------------
        // MONTH PARTICIPANTS
        // -----------------------------------------------------

        if (
            Schema::hasTable('participants') &&
            Schema::hasTable('assessment_results')
        ) {

            $monthParticipants = Participant::whereYear(
                'participants.created_at',
                now()->year
            )
            ->whereMonth(
                'participants.created_at',
                now()->month
            )
            ->whereHas(
                'results.assessment',
                function ($query) use ($ownerId) {

                    $query->where(
                        'user_id',
                        $ownerId
                    );

                }
            )
            ->distinct()
            ->count('participants.id');
        }

        // -----------------------------------------------------
        // MONTH RESULTS
        // -----------------------------------------------------

        if (Schema::hasTable('assessment_results')) {

            $monthResults = AssessmentResult::whereYear(
                'created_at',
                now()->year
            )
            ->whereMonth(
                'created_at',
                now()->month
            )
            ->whereHas(
                'assessment',
                function ($query) use ($ownerId) {

                    $query->where(
                        'user_id',
                        $ownerId
                    );

                }
            )
            ->count();
        }

        // =====================================================
        // MONTHLY PARTICIPANTS
        // =====================================================

        $monthlyParticipants = [];

        for ($month = 1; $month <= 12; $month++) {

            if (
                Schema::hasTable('participants') &&
                Schema::hasTable('assessment_results')
            ) {

                $monthlyParticipants[] = Participant::whereYear(
                    'participants.created_at',
                    now()->year
                )
                ->whereMonth(
                    'participants.created_at',
                    $month
                )
                ->whereHas(
                    'results.assessment',
                    function ($query) use ($ownerId) {

                        $query->where(
                            'user_id',
                            $ownerId
                        );

                    }
                )
                ->distinct()
                ->count('participants.id');

            } else {

                $monthlyParticipants[] = 0;
            }
        }

        // =====================================================
        // MONTHLY RESULTS
        // =====================================================

        $monthlyResults = [];

        for ($month = 1; $month <= 12; $month++) {

            if (Schema::hasTable('assessment_results')) {

                $monthlyResults[] = AssessmentResult::whereYear(
                    'created_at',
                    now()->year
                )
                ->whereMonth(
                    'created_at',
                    $month
                )
                ->whereHas(
                    'assessment',
                    function ($query) use ($ownerId) {

                        $query->where(
                            'user_id',
                            $ownerId
                        );

                    }
                )
                ->count();

            } else {

                $monthlyResults[] = 0;
            }
        }

        // =====================================================
        // RECENT ASSESSMENTS
        // =====================================================

        $recentAssessments = Assessment::where(
            'user_id',
            $ownerId
        )
        ->latest()
        ->limit(10)
        ->get();

        // =====================================================
        // RECENT RESULTS
        // =====================================================

        $recentResults = collect();

        if (Schema::hasTable('assessment_results')) {

            $recentResults = AssessmentResult::with([
                'participant',
                'assessment',
            ])
            ->whereHas(
                'assessment',
                function ($query) use ($ownerId) {

                    $query->where(
                        'user_id',
                        $ownerId
                    );

                }
            )
            ->latest()
            ->limit(10)
            ->get();
        }

        // =====================================================
        // CURRENT DATE
        // =====================================================

        $currentMonth = Carbon::now()
            ->locale('id')
            ->translatedFormat('F');

        $currentYear = now()->year;

        // =====================================================
        // RETURN DASHBOARD
        // =====================================================

        return view(
            'owner.panel.dashboard',
            compact(

                // Assessment
                'totalAssessments',
                'activeAssessments',
                'draftAssessments',
                'completedAssessments',

                // Questions
                'totalQuestions',

                // Participants
                'totalParticipants',
                'todayParticipants',
                'monthParticipants',

                // Results
                'totalResults',
                'todayResults',
                'monthResults',

                // Charts
                'monthlyParticipants',
                'monthlyResults',

                // Recent
                'recentAssessments',
                'recentResults',

                // Date
                'currentMonth',
                'currentYear'
            )
        );
    }

    // =========================================================
    // RANKING
    // =========================================================

    public function ranking()
    {
        $ownerId = Auth::id();

        $rankings = AssessmentResult::with([
            'participant',
            'assessment',
        ])
        ->whereHas(
            'assessment',
            function ($query) use ($ownerId) {

                $query->where(
                    'user_id',
                    $ownerId
                );

            }
        )
        ->orderByDesc('score')
        ->orderByDesc('correct_answers')
        ->orderBy('created_at')
        ->paginate(20);

        return view(
            'owner.panel.ranking.index',
            compact('rankings')
        );
    }
}