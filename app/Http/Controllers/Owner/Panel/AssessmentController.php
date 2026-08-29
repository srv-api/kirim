<?php

namespace App\Http\Controllers\Owner\Panel;

use App\Http\Controllers\Controller;
use App\Models\Assessment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class AssessmentController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | INDEX
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        // Hanya tampilkan assessment milik owner yang sedang login
        $assessments = Assessment::where(
            'user_id',
            Auth::id()
        )
            ->latest()
            ->paginate(10);

        return view(
            'owner.panel.assessments.index',
            compact('assessments')
        );
    }


    /*
    |--------------------------------------------------------------------------
    | CREATE
    |--------------------------------------------------------------------------
    */

    public function create()
    {
        return view(
            'owner.panel.assessments.create'
        );
    }


    /*
    |--------------------------------------------------------------------------
    | STORE
    |--------------------------------------------------------------------------
    */

    public function store(Request $request)
    {
        $validated = $request->validate([

            'title' => [
                'required',
                'string',
                'max:255',
            ],

            'description' => [
                'nullable',
                'string',
            ],

            'category' => [
                'nullable',
                'string',
                'max:255',
            ],

            'duration' => [
                'required',
                'integer',
                'min:1',
            ],

            'passing_score' => [
                'required',
                'numeric',
                'min:0',
                'max:100',
            ],

            'status' => [
                'required',
                'in:draft,active,inactive',
            ],

            'start_at' => [
                'nullable',
                'date',
            ],

            'end_at' => [
                'nullable',
                'date',
                'after_or_equal:start_at',
            ],

        ]);


        /*
        |--------------------------------------------------------------------------
        | PEMILIK ASSESSMENT
        |--------------------------------------------------------------------------
        |
        | Jangan mengambil user_id dari form.
        | Selalu gunakan user yang sedang login.
        |
        */

        $validated['user_id'] = Auth::id();


        /*
        |--------------------------------------------------------------------------
        | RANDOM ID ASSESSMENT
        |--------------------------------------------------------------------------
        */

        $validated['id'] =
            $this->generateAssessmentId();


        /*
        |--------------------------------------------------------------------------
        | SLUG
        |--------------------------------------------------------------------------
        */

        $validated['slug'] =
            $this->generateUniqueSlug(
                $validated['title']
            );


        /*
        |--------------------------------------------------------------------------
        | PIN
        |--------------------------------------------------------------------------
        */

        $validated['pin'] =
            $this->generatePin();


        Assessment::create($validated);


        return redirect()
            ->route('owner.assessments.index')
            ->with(
                'success',
                'Assessment berhasil dibuat dengan PIN: '
                . $validated['pin']
            );
    }


    /*
    |--------------------------------------------------------------------------
    | SHOW
    |--------------------------------------------------------------------------
    */

    public function show(Assessment $assessment)
    {
        /*
        |--------------------------------------------------------------------------
        | SECURITY
        |--------------------------------------------------------------------------
        |
        | Owner hanya boleh melihat assessment miliknya sendiri.
        |
        */

        $this->authorizeOwner($assessment);


        $questions = $assessment
            ->questions()
            ->with('options')
            ->orderBy('order')
            ->get();


        return view(
            'owner.panel.assessments.show',
            compact(
                'assessment',
                'questions'
            )
        );
    }


    /*
    |--------------------------------------------------------------------------
    | EDIT
    |--------------------------------------------------------------------------
    */

    public function edit(Assessment $assessment)
    {
        $this->authorizeOwner($assessment);


        return view(
            'owner.panel.assessments.edit',
            compact('assessment')
        );
    }


    /*
    |--------------------------------------------------------------------------
    | UPDATE
    |--------------------------------------------------------------------------
    */

    public function update(
        Request $request,
        Assessment $assessment
    ) {

        $this->authorizeOwner($assessment);


        $validated = $request->validate([

            'title' => [
                'required',
                'string',
                'max:255',
            ],

            'description' => [
                'nullable',
                'string',
            ],

            'category' => [
                'nullable',
                'string',
                'max:255',
            ],

            'duration' => [
                'required',
                'integer',
                'min:1',
            ],

            'passing_score' => [
                'required',
                'numeric',
                'min:0',
                'max:100',
            ],

            'status' => [
                'required',
                'in:draft,active,inactive',
            ],

            'start_at' => [
                'nullable',
                'date',
            ],

            'end_at' => [
                'nullable',
                'date',
                'after_or_equal:start_at',
            ],
        ]);


        /*
        |--------------------------------------------------------------------------
        | UPDATE SLUG
        |--------------------------------------------------------------------------
        */

        if (
            $assessment->title !==
            $validated['title']
        ) {

            $validated['slug'] =
                $this->generateUniqueSlug(
                    $validated['title'],
                    $assessment->id
                );
        }


        /*
        |--------------------------------------------------------------------------
        | USER_ID TIDAK BOLEH BERUBAH
        |--------------------------------------------------------------------------
        */

        unset($validated['user_id']);


        $assessment->update($validated);


        return redirect()
            ->route(
                'owner.assessments.show',
                $assessment
            )
            ->with(
                'success',
                'Assessment berhasil diperbarui.'
            );
    }


    /*
    |--------------------------------------------------------------------------
    | DESTROY
    |--------------------------------------------------------------------------
    */

    public function destroy(
        Assessment $assessment
    ) {

        $this->authorizeOwner($assessment);


        $assessment->delete();


        return redirect()
            ->route(
                'owner.assessments.index'
            )
            ->with(
                'success',
                'Assessment berhasil dihapus.'
            );
    }


    /*
    |--------------------------------------------------------------------------
    | REGENERATE PIN
    |--------------------------------------------------------------------------
    */

    public function regeneratePin(
        Assessment $assessment
    ) {

        $this->authorizeOwner($assessment);


        $pin =
            $this->generatePin();


        $assessment->update([
            'pin' => $pin,
        ]);


        return redirect()
            ->route(
                'owner.assessments.show',
                $assessment
            )
            ->with(
                'success',
                'PIN berhasil dibuat ulang.'
            )
            ->with(
                'generated_pin',
                $pin
            );
    }


    /*
    |--------------------------------------------------------------------------
    | CEK PEMILIK ASSESSMENT
    |--------------------------------------------------------------------------
    */

    private function authorizeOwner(
        Assessment $assessment
    ): void {

        if (
            $assessment->user_id !==
            Auth::id()
        ) {

            abort(403);
        }
    }


    /*
    |--------------------------------------------------------------------------
    | RANDOM ID ASSESSMENT
    |--------------------------------------------------------------------------
    */

    private function generateAssessmentId(): string
    {
        do {

            $id = strtoupper(
                Str::random(10)
            );

        } while (
            Assessment::where(
                'id',
                $id
            )->exists()
        );


        return $id;
    }


    /*
    |--------------------------------------------------------------------------
    | PIN 6 DIGIT
    |--------------------------------------------------------------------------
    */

    private function generatePin(): string
    {
        return str_pad(
            (string) random_int(
                0,
                999999
            ),
            6,
            '0',
            STR_PAD_LEFT
        );
    }


    /*
    |--------------------------------------------------------------------------
    | UNIQUE SLUG
    |--------------------------------------------------------------------------
    */

    private function generateUniqueSlug(
        string $title,
        ?string $ignoreId = null
    ): string {

        $slug =
            Str::slug($title);


        $originalSlug =
            $slug;


        $counter = 1;


        while (
            Assessment::where(
                'slug',
                $slug
            )
            ->when(
                $ignoreId,
                function ($query)
                use ($ignoreId) {

                    $query->where(
                        'id',
                        '!=',
                        $ignoreId
                    );
                }
            )
            ->exists()
        ) {

            $slug =
                $originalSlug
                . '-'
                . $counter;


            $counter++;
        }


        return $slug;
    }
}
