<?php

namespace App\Http\Controllers\Owner\Panel;

use App\Http\Controllers\Controller;
use App\Models\TugQuestion;
use Illuminate\Http\Request;

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
        return view(
            'owner.panel.tug-questions.create'
        );
    }

    /**
     * Simpan soal
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'question' => ['required', 'string'],
            'option_a' => ['required', 'string'],
            'option_b' => ['required', 'string'],
            'option_c' => ['required', 'string'],
            'option_d' => ['required', 'string'],
            'correct_answer' => ['required', 'string'],
            'order' => ['nullable', 'integer'],
            'is_active' => ['nullable', 'boolean'],
        ]);

        TugQuestion::create([
            'question' => $validated['question'],
            'option_a' => $validated['option_a'],
            'option_b' => $validated['option_b'],
            'option_c' => $validated['option_c'],
            'option_d' => $validated['option_d'],
            'correct_answer' => $validated['correct_answer'],
            'order' => $validated['order'] ?? 0,
            'is_active' => $request->boolean('is_active'),
        ]);

        return redirect()
            ->route('owner.tug-questions.index')
            ->with('success', 'Soal berhasil ditambahkan.');
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
            ];
        })->values();

        return view(
            'owner.panel.tug-questions.game',
            compact('questions', 'gameQuestions')
        );
    }
}