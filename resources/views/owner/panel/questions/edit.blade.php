{{-- =====================================================
ASSESSMENT SELECT
====================================================== --}}

<div class="question-form-group">

```
<label for="assessment_id" class="question-form-label">
    Assessment
</label>

<div class="question-form-select-wrap">

    <i class="bi bi-clipboard-check question-form-select-icon"></i>

    <select
        id="assessment_id"
        name="assessment_id"
        class="form-select question-form-select"
        required
    >

        <option value="">
            Pilih Assessment
        </option>

        @foreach($assessments as $assessment)

            <option
                value="{{ $assessment->id }}"
                {{ old('assessment_id', $question->assessment_id ?? '') == $assessment->id ? 'selected' : '' }}
            >
                {{ $assessment->title }}
            </option>

        @endforeach

    </select>

</div>
```

</div>

<style>

    /* =====================================================
       QUESTION FORM
    ====================================================== */

    .question-form-group {
        margin-bottom: 20px;
    }

    .question-form-label {
        display: block;

        margin-bottom: 7px;

        color: #374151;

        font-size: 11px;
        font-weight: 700;

        letter-spacing: .05em;
        text-transform: uppercase;
    }

    .question-form-select-wrap {
        position: relative;
    }

    .question-form-select-icon {
        position: absolute;

        top: 50%;
        left: 13px;

        z-index: 2;

        transform: translateY(-50%);

        color: #9ca3af;

        font-size: 13px;

        pointer-events: none;
    }

    .question-form-select {
        min-height: 42px;

        padding-left: 38px;
        padding-right: 38px;

        border: 1px solid #e5e7eb;
        border-radius: 10px;

        background-color: #fff;

        color: #374151;

        font-size: 13px;

        box-shadow: none;

        transition:
            border-color .15s ease,
            box-shadow .15s ease;
    }

    .question-form-select:hover {
        border-color: #d1d5db;
    }

    .question-form-select:focus {
        border-color: #9ca3af;

        box-shadow:
            0 0 0 3px rgba(17, 24, 39, .05);

        outline: none;
    }

    .question-form-select option {
        color: #374151;
        background: #fff;
    }

</style>
