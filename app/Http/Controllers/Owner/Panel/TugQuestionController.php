<?php

namespace App\Http\Controllers\Owner\Panel;

use App\Http\Controllers\Controller;
use App\Models\TugQuestion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class TugQuestionController extends Controller
{
    /**
     * Daftar soal tarik tambang
     */
    public function index()
    {
        $questions = TugQuestion::orderBy('order', 'asc')
            ->paginate(10)
            ->withQueryString();

        return view(
            'owner.panel.tug-questions.index',
            compact('questions')
        );
    }

    /**
     * Form tambah soal
     */
 public function create()
{
    return view('owner.panel.tug-questions.create');
}

    /**
     * Simpan soal
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'assessment_id' => [
                'nullable',
            ],

            'questions' => [
                'required',
                'array',
                'min:1',
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
                'required',
                'integer',
                'min:1',
            ],

            'questions.*.pull_power' => [
                'required',
                'integer',
                'min:1',
                'max:100',
            ],

            'questions.*.wrong_pull_power' => [
                'required',
                'integer',
                'min:0',
                'max:100',
            ],

            'questions.*.question' => [
                'required',
                'string',
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

            'questions.*.image' => [
                'nullable',
                'file',
                'mimes:jpg,jpeg,png,webp,gif,pdf',
                'max:5120',
            ],
        ]);

        DB::transaction(function () use ($request, $validated) {

            foreach ($validated['questions'] as $question) {

                /*
                 * Untuk database lama:
                 *
                 * option_a
                 * option_b
                 * option_c
                 * option_d
                 *
                 * Kita ambil dari array options[].
                 */

                $options = $question['options'] ?? [];

                $optionA = $options[0] ?? '';
                $optionB = $options[1] ?? '';
                $optionC = $options[2] ?? '';
                $optionD = $options[3] ?? '';

                /*
                 * correct_answer dari JS berupa index:
                 *
                 * 0 = option_a
                 * 1 = option_b
                 * 2 = option_c
                 * 3 = option_d
                 */

                $correctAnswer = null;

                if (
                    $question['type'] === 'multiple_choice' &&
                    isset($question['correct_answer'])
                ) {
                    $correctIndex = (int) $question['correct_answer'];

                    $correctAnswer = match ($correctIndex) {
                        0 => 'option_a',
                        1 => 'option_b',
                        2 => 'option_c',
                        3 => 'option_d',
                        default => null,
                    };
                }

                /*
                 * Upload gambar/pdf
                 */
                $imagePath = null;

                if (
                    $request->hasFile(
                        'questions.' . array_search($question, $validated['questions'])
                        . '.image'
                    )
                ) {
                    $index = array_search(
                        $question,
                        $validated['questions']
                    );

                    $imagePath = $request
                        ->file("questions.$index.image")
                        ->store('tug-questions', 'public');
                }

                TugQuestion::create([
                    'question' => $question['question'],

                    'option_a' => $optionA,
                    'option_b' => $optionB,
                    'option_c' => $optionC,
                    'option_d' => $optionD,

                    'correct_answer' => $correctAnswer ?? 'option_a',

                    'order' => $question['order'],

                    'is_active' => true,

                    /*
                     * time_limit belum dikirim oleh form,
                     * jadi gunakan default 30 detik.
                     */
                    'time_limit' => 30,
                ]);
            }
        });

        return redirect()
            ->route('owner.tug-questions.index')
            ->with(
                'success',
                'Semua soal Tug Game berhasil ditambahkan.'
            );
    }

    /**
     * Game tarik tambang
     */
    public function game()
    {
        $questions = TugQuestion::where('is_active', true)
            ->orderBy('order', 'asc')
            ->get();

        $gameQuestions = $questions->map(function ($question) {
            return [
                'question' => $question->question,

                'answers' => [
                    $question->option_a,
                    $question->option_b,
                    $question->option_c,
                    $question->option_d,
                ],

                'correct' => $question->correct_answer,

                'time_limit' => $question->time_limit,
            ];
        })->values();

        return view(
            'owner.panel.tug-questions.game',
            compact(
                'questions',
                'gameQuestions'
            )
        );
    }
}