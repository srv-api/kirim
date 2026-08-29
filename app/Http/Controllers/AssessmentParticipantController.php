<?php

namespace App\Http\Controllers;

use App\Models\Assessment;
use App\Models\Question;
use App\Models\Participant;
use App\Models\AssessmentResult;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AssessmentParticipantController extends Controller
{
    /**
     * Halaman detail assessment peserta
     */
    public function show(Assessment $assessment)
    {
        return view(
            'assessment.show',
            compact('assessment')
        );
    }


    /**
     * Mulai assessment
     */
    public function start(Assessment $assessment)
    {
        /*
        |--------------------------------------------------------------------------
        | Cek status assessment
        |--------------------------------------------------------------------------
        */

        if ($assessment->status !== 'active') {

            return back()->with(
                'error',
                'Assessment belum aktif.'
            );
        }


        /*
        |--------------------------------------------------------------------------
        | Cek waktu mulai
        |--------------------------------------------------------------------------
        */

        $now = Carbon::now('UTC');

        if ($assessment->start_at) {

            $startAt = Carbon::parse(
                $assessment->start_at
            )->utc();

            if ($now->lt($startAt)) {

                return back()->with(
                    'error',
                    'Assessment belum dimulai.'
                );
            }
        }


        /*
        |--------------------------------------------------------------------------
        | Cek waktu berakhir
        |--------------------------------------------------------------------------
        */

        if ($assessment->end_at) {

            $endAt = Carbon::parse(
                $assessment->end_at
            )->utc();

            if ($now->gt($endAt)) {

                return back()->with(
                    'error',
                    'Assessment sudah berakhir.'
                );
            }
        }


        /*
        |--------------------------------------------------------------------------
        | Cek akses PIN
        |--------------------------------------------------------------------------
        */

        if (
            !session(
                'assessment_access.' .
                $assessment->id
            )
        ) {

            return view(
                'assessment.pin',
                compact('assessment')
            );
        }


        /*
        |--------------------------------------------------------------------------
        | Ambil soal
        |--------------------------------------------------------------------------
        */

        $questions = Question::where(
            'assessment_id',
            $assessment->id
        )
        ->with('options')
        ->orderBy('id')
        ->get();


        if ($questions->isEmpty()) {

            return back()->with(
                'error',
                'Assessment belum memiliki soal.'
            );
        }


        /*
        |--------------------------------------------------------------------------
        | Masuk ke soal pertama
        |--------------------------------------------------------------------------
        |
        | PENTING:
        | Gunakan ID assessment, BUKAN slug.
        |
        */

        return redirect()->route(
            'assessment.question',
            [
                'assessment' =>
                    $assessment->id,

                'question' =>
                    $questions->first()->id,
            ]
        );
    }


    /**
     * Verifikasi PIN peserta
     */
    public function verifyPin(
        Request $request,
        Assessment $assessment
    ) {

        /*
        |--------------------------------------------------------------------------
        | Validasi PIN
        |--------------------------------------------------------------------------
        */

        $request->validate([

            'pin' => [
                'required',
                'digits:6',
            ],

        ], [

            'pin.required' =>
                'PIN wajib diisi.',

            'pin.digits' =>
                'PIN harus terdiri dari 6 angka.',

        ]);


        /*
        |--------------------------------------------------------------------------
        | Cek PIN
        |--------------------------------------------------------------------------
        */

        if (
            !$assessment->pin ||
            (string) $request->pin !==
            (string) $assessment->pin
        ) {

            return back()
                ->withErrors([
                    'pin' =>
                        'PIN assessment salah.',
                ])
                ->withInput();
        }


        /*
        |--------------------------------------------------------------------------
        | Simpan akses assessment
        |--------------------------------------------------------------------------
        */

        session([
            'assessment_access.' .
            $assessment->id => true,

            'assessment_answers.' .
            $assessment->id => [],
        ]);


        /*
        |--------------------------------------------------------------------------
        | Ambil soal pertama
        |--------------------------------------------------------------------------
        */

        $question = Question::where(
            'assessment_id',
            $assessment->id
        )
        ->orderBy('id')
        ->first();


        if (!$question) {

            return back()->with(
                'error',
                'Assessment belum memiliki soal.'
            );
        }


        /*
        |--------------------------------------------------------------------------
        | Redirect ke soal pertama
        |--------------------------------------------------------------------------
        |
        | PENTING:
        | assessment = ID
        |
        */

        return redirect()->route(
            'assessment.question',
            [
                'assessment' =>
                    $assessment->id,

                'question' =>
                    $question->id,
            ]
        );
    }


    /**
     * Menampilkan soal
     */
    public function question(
        Assessment $assessment,
        Question $question
    ) {

        /*
        |--------------------------------------------------------------------------
        | Cek akses
        |--------------------------------------------------------------------------
        */

        if (
            !session(
                'assessment_access.' .
                $assessment->id
            )
        ) {

            return redirect()->route(
                'assessment.participant.start',
                [
                    'assessment' =>
                        $assessment->id
                ]
            );
        }


        /*
        |--------------------------------------------------------------------------
        | Pastikan soal milik assessment
        |--------------------------------------------------------------------------
        */

        if (
            $question->assessment_id !==
            $assessment->id
        ) {

            abort(404);
        }


        /*
        |--------------------------------------------------------------------------
        | Cek waktu
        |--------------------------------------------------------------------------
        */

        $now = Carbon::now('UTC');


        if ($assessment->start_at) {

            $startAt = Carbon::parse(
                $assessment->start_at
            )->utc();

            if ($now->lt($startAt)) {

                return redirect()
                    ->route(
                        'assessment.participant.start',
                        [
                            'assessment' =>
                                $assessment->id
                        ]
                    )
                    ->with(
                        'error',
                        'Assessment belum dimulai.'
                    );
            }
        }


        if ($assessment->end_at) {

            $endAt = Carbon::parse(
                $assessment->end_at
            )->utc();

            if ($now->gt($endAt)) {

                return redirect()
                    ->route(
                        'assessment.participant.start',
                        [
                            'assessment' =>
                                $assessment->id
                        ]
                    )
                    ->with(
                        'error',
                        'Assessment sudah berakhir.'
                    );
            }
        }


        /*
        |--------------------------------------------------------------------------
        | Ambil semua soal
        |--------------------------------------------------------------------------
        */

        $questions = Question::where(
            'assessment_id',
            $assessment->id
        )
        ->with('options')
        ->orderBy('id')
        ->get();


        /*
        |--------------------------------------------------------------------------
        | Cari posisi soal
        |--------------------------------------------------------------------------
        */

        $currentIndex = $questions->search(
            function ($item) use ($question) {

                return (string) $item->id ===
                    (string) $question->id;
            }
        );


        if ($currentIndex === false) {

            abort(404);
        }


        $questionNumber =
            $currentIndex + 1;


        $totalQuestions =
            $questions->count();


        /*
        |--------------------------------------------------------------------------
        | Ambil jawaban tersimpan
        |--------------------------------------------------------------------------
        */

        $savedAnswers = session(
            'assessment_answers.' .
            $assessment->id,
            []
        );


        $savedAnswer =
            $savedAnswers[$question->id]
            ?? null;


        /*
        |--------------------------------------------------------------------------
        | Tampilkan soal
        |--------------------------------------------------------------------------
        */

        return view(
            'assessment.question',
            compact(
                'assessment',
                'question',
                'questions',
                'currentIndex',
                'questionNumber',
                'totalQuestions',
                'savedAnswer'
            )
        );
    }


    /**
     * Simpan jawaban
     */
    public function answer(
        Request $request,
        Assessment $assessment,
        Question $question
    ) {

        /*
        |--------------------------------------------------------------------------
        | Cek akses
        |--------------------------------------------------------------------------
        */

        if (
            !session(
                'assessment_access.' .
                $assessment->id
            )
        ) {

            return redirect()->route(
                'assessment.participant.start',
                [
                    'assessment' =>
                        $assessment->id
                ]
            );
        }


        /*
        |--------------------------------------------------------------------------
        | Pastikan soal milik assessment
        |--------------------------------------------------------------------------
        */

        if (
            $question->assessment_id !==
            $assessment->id
        ) {

            abort(404);
        }


        /*
        |--------------------------------------------------------------------------
        | Cek waktu
        |--------------------------------------------------------------------------
        */

        $now = Carbon::now('UTC');


        if ($assessment->end_at) {

            $endAt = Carbon::parse(
                $assessment->end_at
            )->utc();

            if ($now->gt($endAt)) {

                return redirect()
                    ->route(
                        'assessment.participant.start',
                        [
                            'assessment' =>
                                $assessment->id
                        ]
                    )
                    ->with(
                        'error',
                        'Waktu assessment sudah berakhir.'
                    );
            }
        }


        /*
        |--------------------------------------------------------------------------
        | Validasi jawaban
        |--------------------------------------------------------------------------
        */

        $request->validate([

            'answer' => [
                'required',
            ],

        ]);


        /*
        |--------------------------------------------------------------------------
        | Ambil jawaban session
        |--------------------------------------------------------------------------
        */

        $answers = session(
            'assessment_answers.' .
            $assessment->id,
            []
        );


        /*
        |--------------------------------------------------------------------------
        | Simpan jawaban
        |--------------------------------------------------------------------------
        */

        $answers[$question->id] =
            $request->input('answer');


        session([
            'assessment_answers.' .
            $assessment->id => $answers
        ]);


        /*
        |--------------------------------------------------------------------------
        | Ambil semua soal
        |--------------------------------------------------------------------------
        */

        $questions = Question::where(
            'assessment_id',
            $assessment->id
        )
        ->orderBy('id')
        ->get();


        $currentIndex = $questions->search(
            function ($item) use ($question) {

                return (string) $item->id ===
                    (string) $question->id;
            }
        );


        /*
        |--------------------------------------------------------------------------
        | Jika soal terakhir
        |--------------------------------------------------------------------------
        */

        if (
            $currentIndex ===
            $questions->count() - 1
        ) {

            return redirect()->route(
                'assessment.finish',
                [
                    'assessment' =>
                        $assessment->id
                ]
            );
        }


        /*
        |--------------------------------------------------------------------------
        | Soal berikutnya
        |--------------------------------------------------------------------------
        */

        $nextQuestion =
            $questions->get(
                $currentIndex + 1
            );


        return redirect()->route(
            'assessment.question',
            [
                'assessment' =>
                    $assessment->id,

                'question' =>
                    $nextQuestion->id,
            ]
        );
    }


    /**
     * Halaman selesai assessment
     */
    public function finish(
        Assessment $assessment
    ) {

        /*
        |--------------------------------------------------------------------------
        | Cek akses
        |--------------------------------------------------------------------------
        */

        if (
            !session(
                'assessment_access.' .
                $assessment->id
            )
        ) {

            return redirect()->route(
                'assessment.participant.start',
                [
                    'assessment' =>
                        $assessment->id
                ]
            );
        }


        /*
        |--------------------------------------------------------------------------
        | Ambil soal
        |--------------------------------------------------------------------------
        */

        $questions = Question::where(
            'assessment_id',
            $assessment->id
        )
        ->with('options')
        ->orderBy('id')
        ->get();


        /*
        |--------------------------------------------------------------------------
        | Ambil jawaban
        |--------------------------------------------------------------------------
        */

        $answers = session(
            'assessment_answers.' .
            $assessment->id,
            []
        );


        return view(
            'assessment.finish',
            compact(
                'assessment',
                'questions',
                'answers'
            )
        );
    }


    /**
     * Submit assessment
     */
    public function submit(
        Request $request,
        Assessment $assessment
    ) {

        /*
        |--------------------------------------------------------------------------
        | Cek akses
        |--------------------------------------------------------------------------
        */

        if (
            !session(
                'assessment_access.' .
                $assessment->id
            )
        ) {

            abort(403);
        }


        /*
        |--------------------------------------------------------------------------
        | Validasi nama
        |--------------------------------------------------------------------------
        */

        $validated = $request->validate([

            'name' => [
                'required',
                'string',
                'max:255',
            ],

        ], [

            'name.required' =>
                'Nama lengkap wajib diisi.',

        ]);


        /*
        |--------------------------------------------------------------------------
        | Ambil soal
        |--------------------------------------------------------------------------
        */

        $questions = Question::where(
            'assessment_id',
            $assessment->id
        )
        ->orderBy('id')
        ->get();


        /*
        |--------------------------------------------------------------------------
        | Ambil jawaban session
        |--------------------------------------------------------------------------
        */

        $answers = session(
            'assessment_answers.' .
            $assessment->id,
            []
        );


        /*
        |--------------------------------------------------------------------------
        | Hitung soal
        |--------------------------------------------------------------------------
        */

        $totalQuestions =
            $questions->count();


        /*
        |--------------------------------------------------------------------------
        | Hitung jawaban benar
        |--------------------------------------------------------------------------
        */

        $correctAnswers = 0;


        foreach ($questions as $question) {

            $answer =
                $answers[$question->id]
                ?? null;


            if (
                $answer !== null &&
                (string) $answer ===
                (string) $question->correct_answer
            ) {

                $correctAnswers++;
            }
        }


        /*
        |--------------------------------------------------------------------------
        | Hitung nilai
        |--------------------------------------------------------------------------
        */

        $score = 0;


        if ($totalQuestions > 0) {

            $score = round(
                (
                    $correctAnswers /
                    $totalQuestions
                ) * 100,
                2
            );
        }


        /*
        |--------------------------------------------------------------------------
        | Passing score
        |--------------------------------------------------------------------------
        */

        $passingScore =
            $assessment->passing_score ?? 0;


        /*
        |--------------------------------------------------------------------------
        | Status
        |--------------------------------------------------------------------------
        */

        $status =
            $score >= $passingScore
                ? 'passed'
                : 'failed';


        /*
        |--------------------------------------------------------------------------
        | Simpan peserta
        |--------------------------------------------------------------------------
        */

        $participant =
            Participant::create([

                'name' =>
                    $validated['name'],

            ]);


        /*
        |--------------------------------------------------------------------------
        | Simpan hasil
        |--------------------------------------------------------------------------
        */

        $result =
            AssessmentResult::create([

                'assessment_id' =>
                    $assessment->id,

                'participant_id' =>
                    $participant->id,

                'score' =>
                    $score,

                'total_questions' =>
                    $totalQuestions,

                'correct_answers' =>
                    $correctAnswers,

                'status' =>
                    $status,

            ]);


        /*
        |--------------------------------------------------------------------------
        | Bersihkan session
        |--------------------------------------------------------------------------
        */

        session()->forget(
            'assessment_access.' .
            $assessment->id
        );


        session()->forget(
            'assessment_answers.' .
            $assessment->id
        );


        /*
        |--------------------------------------------------------------------------
        | Redirect hasil
        |--------------------------------------------------------------------------
        */

        return redirect()->route(
            'assessment.participant.result',
            [
                'result' =>
                    $result->id
            ]
        );
    }


    /**
     * Hasil assessment
     */
    public function result(
        AssessmentResult $result
    ) {

        $result->load([
            'assessment',
            'participant',
        ]);


        return view(
            'assessment.result',
            compact('result')
        );
    }
}