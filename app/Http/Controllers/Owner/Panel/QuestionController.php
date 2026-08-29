<?php

namespace App\Http\Controllers\Owner\Panel;

use App\Http\Controllers\Controller;
use App\Models\Assessment;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class QuestionController extends Controller
{
    /**
     * ==========================================================
     * LIST SOAL
     * ==========================================================
     * Hanya soal dari assessment milik owner yang sedang login.
     */
    public function index()
    {
        $ownerId = Auth::id();

        $questions = Question::with([
            'assessment',
            'options'
        ])
            ->whereHas('assessment', function ($query) use ($ownerId) {
                $query->where('user_id', $ownerId);
            })
            ->orderBy('assessment_id')
            ->orderBy('order')
            ->paginate(10);

        return view(
            'owner.panel.questions.index',
            compact('questions')
        );
    }


    /**
     * ==========================================================
     * FORM TAMBAH SOAL
     * ==========================================================
     * Hanya menampilkan assessment milik owner.
     */
    public function create()
    {
        $ownerId = Auth::id();

        $assessments = Assessment::where(
            'user_id',
            $ownerId
        )
            ->orderBy('title')
            ->get();

        return view(
            'owner.panel.questions.create',
            compact('assessments')
        );
    }


    /**
     * ==========================================================
     * SIMPAN SOAL
     * ==========================================================
     */
    public function store(Request $request)
{
    $validated = $request->validate([
        'assessment_id' => [
            'required',
            'exists:assessments,id',
        ],

        'questions' => [
            'required',
            'array',
            'min:1',
        ],

        'questions.*.question' => [
            'required',
            'string',
        ],

        'questions.*.image' => [
            'nullable',
            'file',
            'mimes:jpg,jpeg,png,webp,gif,pdf',
            'max:5120',
        ],

        'questions.*.type' => [
            'required',
            'in:multiple_choice,free_text',
        ],

        'questions.*.score' => [
            'required',
            'integer',
            'min:1',
        ],

        'questions.*.order' => [
            'nullable',
            'integer',
            'min:0',
        ],

        'questions.*.options' => [
            'nullable',
            'array',
        ],

        'questions.*.options.*' => [
            'nullable',
            'string',
        ],

        'questions.*.correct_answer' => [
            'nullable',
        ],
    ]);

    foreach ($validated['questions'] as $index => $data) {

        $imagePath = null;

        if (
            isset($data['image']) &&
            $data['image'] instanceof \Illuminate\Http\UploadedFile
        ) {
            $imagePath = $data['image']->store(
                'questions',
                'public'
            );
        }

        $question = Question::create([
            'assessment_id' => $validated['assessment_id'],

            'question' => $data['question'],

            'image' => $imagePath,

            'type' => $data['type'],

            'score' => $data['score'],

            'order' => $data['order']
                ?? ($index + 1),

            'correct_answer' => $data['correct_answer']
                ?? null,
        ]);

        if (
            $data['type'] === 'multiple_choice' &&
            !empty($data['options'])
        ) {

            foreach (
                $data['options'] as $optionIndex => $optionText
            ) {

                if (
                    trim($optionText) === ''
                ) {
                    continue;
                }

                $question->options()->create([
                    'label' => chr(65 + $optionIndex),

                    'option_text' => $optionText,

                    'is_correct' =>
                        isset($data['correct_answer']) &&
                        $data['correct_answer'] == $optionIndex,

                    'order' => $optionIndex,
                ]);
            }
        }
    }

    return redirect()
        ->route('owner.questions.index')
        ->with(
            'success',
            'Semua soal berhasil dibuat.'
        );
}


    /**
     * ==========================================================
     * DETAIL SOAL
     * ==========================================================
     */
    public function show(Question $question)
    {
        $ownerId = Auth::id();

        /*
        |--------------------------------------------------------------------------
        | Pastikan question berasal dari assessment milik owner
        |--------------------------------------------------------------------------
        */

        $question->load([
            'assessment',
            'options'
        ]);

        abort_unless(
            $question->assessment
                &&
            $question->assessment->user_id == $ownerId,
            403
        );


        return view(
            'owner.panel.questions.show',
            compact('question')
        );
    }


    /**
     * ==========================================================
     * FORM EDIT
     * ==========================================================
     */
    public function edit(Question $question)
    {
        $ownerId = Auth::id();

        /*
        |--------------------------------------------------------------------------
        | Pastikan soal milik owner
        |--------------------------------------------------------------------------
        */

        $question->load('assessment');

        abort_unless(
            $question->assessment
                &&
            $question->assessment->user_id == $ownerId,
            403
        );


        /*
        |--------------------------------------------------------------------------
        | Assessment hanya milik owner
        |--------------------------------------------------------------------------
        */

        $assessments = Assessment::where(
            'user_id',
            $ownerId
        )
            ->orderBy('title')
            ->get();


        $question->load('options');


        return view(
            'owner.panel.questions.edit',
            compact(
                'question',
                'assessments'
            )
        );
    }


    /**
     * ==========================================================
     * UPDATE SOAL
     * ==========================================================
     */
    public function update(
        Request $request,
        Question $question
    ) {

        $ownerId = Auth::id();


        /*
        |--------------------------------------------------------------------------
        | CEK QUESTION MILIK OWNER
        |--------------------------------------------------------------------------
        */

        $question->load('assessment');

        abort_unless(
            $question->assessment
                &&
            $question->assessment->user_id == $ownerId,
            403
        );


        /*
        |--------------------------------------------------------------------------
        | VALIDASI
        |--------------------------------------------------------------------------
        */

        $validated = $request->validate([

            'assessment_id' => [
                'required',
                'exists:assessments,id',
            ],

            'type' => [
                'required',
                'in:multiple_choice,free_text',
            ],

            'question' => [
                'required',
                'string',
            ],

            'score' => [
                'required',
                'integer',
                'min:1',
            ],

            'order' => [
                'nullable',
                'integer',
                'min:0',
            ],

            'options' => [
                'nullable',
                'array',
            ],

            'options.*' => [
                'nullable',
                'string',
            ],

            'correct_answer' => [
                'nullable',
                'integer',
            ],
        ]);


        /*
        |--------------------------------------------------------------------------
        | CEK ASSESSMENT BARU
        |
        | Jangan sampai owner memindahkan soal ke assessment
        | milik owner lain.
        |--------------------------------------------------------------------------
        */

        $assessment = Assessment::where(
            'id',
            $validated['assessment_id']
        )
            ->where(
                'user_id',
                $ownerId
            )
            ->firstOrFail();


        /*
        |--------------------------------------------------------------------------
        | MULTIPLE CHOICE HARUS PUNYA OPSI
        |--------------------------------------------------------------------------
        */

        if (
            $validated['type'] === 'multiple_choice'
            &&
            empty($validated['options'])
        ) {

            return back()
                ->withInput()
                ->withErrors([
                    'options' =>
                        'Minimal harus ada 1 pilihan jawaban.'
                ]);
        }


        /*
        |--------------------------------------------------------------------------
        | UPDATE
        |--------------------------------------------------------------------------
        */

        DB::transaction(function () use (
            $validated,
            $question,
            $assessment
        ) {

            $question->update([

                'assessment_id' =>
                    $assessment->id,

                'type' =>
                    $validated['type'],

                'question' =>
                    $validated['question'],

                'score' =>
                    $validated['score'],

                'order' =>
                    $validated['order'] ?? 0,

                'correct_answer' =>
                    $validated['correct_answer']
                    ?? null,
            ]);


            /*
            |--------------------------------------------------------------------------
            | Hapus opsi lama
            |--------------------------------------------------------------------------
            */

            $question->options()->delete();


            /*
            |--------------------------------------------------------------------------
            | Buat opsi baru
            |--------------------------------------------------------------------------
            */

            if (
                $validated['type']
                === 'multiple_choice'
            ) {

                foreach (
                    $validated['options']
                    as $index => $optionText
                ) {

                    if (
                        trim($optionText) === ''
                    ) {
                        continue;
                    }


                    $question->options()->create([

                        'label' =>
                            $this->generateLabel(
                                $index
                            ),

                        'option_text' =>
                            $optionText,

                        'is_correct' =>
                            isset(
                                $validated['correct_answer']
                            )
                            &&
                            $validated['correct_answer']
                            == $index,

                        'order' =>
                            $index,
                    ]);
                }
            }
        });


        return redirect()
            ->route('owner.questions.index')
            ->with(
                'success',
                'Soal berhasil diperbarui.'
            );
    }


    /**
     * ==========================================================
     * HAPUS SOAL
     * ==========================================================
     */
    public function destroy(
        Question $question
    ) {

        $ownerId = Auth::id();


        /*
        |--------------------------------------------------------------------------
        | CEK PEMILIK
        |--------------------------------------------------------------------------
        */

        $question->load('assessment');

        abort_unless(
            $question->assessment
                &&
            $question->assessment->user_id == $ownerId,
            403
        );


        $question->delete();


        return redirect()
            ->route('owner.questions.index')
            ->with(
                'success',
                'Soal berhasil dihapus.'
            );
    }


    /**
     * ==========================================================
     * LABEL A-Z
     * ==========================================================
     */
    private function generateLabel(
        int $index
    ): string {

        $label = '';

        do {

            $label =
                chr(
                    65 + ($index % 26)
                )
                . $label;

            $index =
                intdiv(
                    $index,
                    26
                ) - 1;

        } while (
            $index >= 0
        );


        return $label;
    }
}

