@extends('dashboard')

@section('content')

<style>

    /* =====================================================
       QUESTION DETAIL PAGE
    ====================================================== */

    .question-detail-page {
        --page-text: #111827;
        --page-muted: #6b7280;
        --page-soft: #f8fafc;
        --page-border: #e5e7eb;
        --page-radius: 16px;

        padding-bottom: 35px;
    }


    /* =====================================================
       HEADER
    ====================================================== */

    .question-detail-header {
        margin-bottom: 30px;
    }

    .question-detail-eyebrow {
        display: flex;
        align-items: center;
        gap: 8px;

        margin-bottom: 7px;

        color: #9ca3af;
        font-size: 11px;
        font-weight: 700;
        letter-spacing: .08em;
        text-transform: uppercase;
    }

    .question-detail-eyebrow span {
        width: 6px;
        height: 6px;

        border-radius: 50%;
        background: #059669;

        box-shadow:
            0 0 0 4px rgba(5, 150, 105, .08);
    }

    .question-detail-title {
        margin: 0;

        color: var(--page-text);
        font-size: 28px;
        line-height: 1.2;
        font-weight: 750;
        letter-spacing: -.035em;
    }

    .question-detail-description {
        margin: 7px 0 0;

        color: var(--page-muted);
        font-size: 13px;
    }


    /* =====================================================
       HEADER ACTIONS
    ====================================================== */

    .question-detail-actions {
        display: flex;
        align-items: center;
        gap: 7px;
    }

    .question-detail-action {
        width: 34px;
        height: 34px;

        display: inline-flex;
        align-items: center;
        justify-content: center;

        border: 1px solid var(--page-border);
        border-radius: 9px;

        background: #fff;
        color: #6b7280;

        font-size: 13px;
        text-decoration: none;

        transition: all .15s ease;
    }

    .question-detail-action:hover {
        background: #f9fafb;
        border-color: #d1d5db;
        color: #111827;
    }

    .question-detail-action.edit:hover {
        background: #eff6ff;
        border-color: #bfdbfe;
        color: #2563eb;
    }


    /* =====================================================
       MAIN CARD
    ====================================================== */

    .question-detail-card {
        background: #fff;
        border: 1px solid var(--page-border);
        border-radius: var(--page-radius);
        overflow: hidden;
    }


    /* =====================================================
       CARD HEADER
    ====================================================== */

    .question-card-header {
        display: flex;
        align-items: center;
        justify-content: space-between;

        padding: 20px 22px;

        border-bottom: 1px solid var(--page-border);
    }

    .question-card-heading {
        display: flex;
        align-items: center;
        gap: 11px;
    }

    .question-card-icon {
        width: 36px;
        height: 36px;

        display: flex;
        align-items: center;
        justify-content: center;

        border-radius: 10px;

        background: #f3f4f6;
        color: #374151;

        font-size: 15px;
    }

    .question-card-title {
        margin: 0;

        color: var(--page-text);
        font-size: 14px;
        font-weight: 700;
    }

    .question-card-description {
        margin: 3px 0 0;

        color: #9ca3af;
        font-size: 11px;
    }


    /* =====================================================
       TYPE BADGE
    ====================================================== */

    .question-type-badge {
        display: inline-flex;
        align-items: center;
        gap: 6px;

        padding: 5px 9px;

        border-radius: 20px;

        background: #f8fafc;
        border: 1px solid #eef0f3;

        color: #6b7280;

        font-size: 10px;
        font-weight: 700;
    }

    .question-type-badge i {
        font-size: 10px;
    }


    /* =====================================================
       QUESTION CONTENT
    ====================================================== */

    .question-content {
        padding: 24px 22px;
    }

    .question-label {
        margin-bottom: 9px;

        color: #9ca3af;
        font-size: 10px;
        font-weight: 700;

        letter-spacing: .07em;
        text-transform: uppercase;
    }

    .question-text {
        margin: 0;

        color: #111827;

        font-size: 16px;
        line-height: 1.65;
        font-weight: 600;
    }


    /* =====================================================
       OPTIONS
    ====================================================== */

    .question-options {
        margin-top: 26px;
    }

    .question-option {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 15px;

        padding: 14px 16px;

        margin-bottom: 8px;

        border: 1px solid #e5e7eb;
        border-radius: 11px;

        background: #fff;

        color: #374151;

        transition: all .15s ease;
    }

    .question-option:last-child {
        margin-bottom: 0;
    }

    .question-option:hover {
        background: #fafafa;
        border-color: #d1d5db;
    }

    .question-option.correct {
        background: #f0fdf4;
        border-color: #bbf7d0;
    }

    .question-option-left {
        display: flex;
        align-items: flex-start;
        gap: 12px;

        min-width: 0;
    }

    .question-option-key {
        width: 28px;
        height: 28px;

        flex: 0 0 28px;

        display: flex;
        align-items: center;
        justify-content: center;

        border-radius: 8px;

        background: #f3f4f6;
        color: #4b5563;

        font-size: 11px;
        font-weight: 700;
    }

    .question-option.correct .question-option-key {
        background: #dcfce7;
        color: #047857;
    }

    .question-option-text {
        padding-top: 4px;

        color: #374151;

        font-size: 13px;
        line-height: 1.5;
    }

    .question-correct {
        display: inline-flex;
        align-items: center;
        gap: 5px;

        padding: 5px 9px;

        border-radius: 20px;

        background: #dcfce7;
        color: #047857;

        font-size: 10px;
        font-weight: 700;

        white-space: nowrap;
    }

    .question-correct i {
        font-size: 10px;
    }


    /* =====================================================
       FREE TEXT
    ====================================================== */

    .question-free-text {
        margin-top: 26px;

        padding: 18px;

        border: 1px solid #e5e7eb;
        border-radius: 11px;

        background: #fafafa;
    }

    .question-free-text-icon {
        width: 34px;
        height: 34px;

        display: flex;
        align-items: center;
        justify-content: center;

        margin-bottom: 10px;

        border-radius: 9px;

        background: #f3f4f6;
        color: #6b7280;

        font-size: 14px;
    }

    .question-free-text-title {
        margin-bottom: 3px;

        color: #111827;
        font-size: 12px;
        font-weight: 700;
    }

    .question-free-text-description {
        margin: 0;

        color: #9ca3af;
        font-size: 11px;
    }


    /* =====================================================
       META INFORMATION
    ====================================================== */

    .question-meta {
        display: grid;
        grid-template-columns: repeat(3, 1fr);

        border-top: 1px solid var(--page-border);
    }

    .question-meta-item {
        padding: 18px 22px;

        border-right: 1px solid var(--page-border);
    }

    .question-meta-item:last-child {
        border-right: 0;
    }

    .question-meta-label {
        margin-bottom: 5px;

        color: #9ca3af;

        font-size: 10px;
        font-weight: 700;

        letter-spacing: .06em;
        text-transform: uppercase;
    }

    .question-meta-value {
        color: #111827;

        font-size: 13px;
        font-weight: 650;
    }

    .question-meta-value.muted {
        color: #6b7280;
    }


    /* =====================================================
       BACK BUTTON
    ====================================================== */

    .btn-back-question {
        display: inline-flex;
        align-items: center;
        gap: 7px;

        padding: 9px 13px;

        border: 1px solid var(--page-border);
        border-radius: 9px;

        background: #fff;
        color: #4b5563;

        font-size: 11px;
        font-weight: 650;

        text-decoration: none;

        transition: all .15s ease;
    }

    .btn-back-question:hover {
        background: #f9fafb;
        border-color: #d1d5db;
        color: #111827;
    }


    /* =====================================================
       RESPONSIVE
    ====================================================== */

    @media (max-width: 768px) {

        .question-detail-header {
            align-items: flex-start !important;
            flex-direction: column;
            gap: 15px;
        }

        .question-detail-title {
            font-size: 25px;
        }

        .question-detail-actions {
            width: 100%;
        }

        .btn-back-question {
            flex: 1;
            justify-content: center;
        }

        .question-detail-action {
            width: 36px;
            height: 36px;
        }

        .question-card-header {
            align-items: flex-start;
            flex-direction: column;
            gap: 12px;
        }

        .question-content {
            padding: 20px 16px;
        }

        .question-meta {
            grid-template-columns: 1fr;
        }

        .question-meta-item {
            border-right: 0;
            border-bottom: 1px solid var(--page-border);
        }

        .question-meta-item:last-child {
            border-bottom: 0;
        }

        .question-option {
            align-items: flex-start;
            flex-direction: column;
        }

        .question-correct {
            margin-left: 40px;
        }
    }

</style>

<div class="container-fluid question-detail-page">


{{-- =====================================================
     HEADER
====================================================== --}}

<div class="question-detail-header d-flex justify-content-between align-items-center">

    <div>

        <div class="question-detail-eyebrow">

            <span></span>

            Assessment Management

        </div>

        <h1 class="question-detail-title">

            Detail Soal

        </h1>

        <p class="question-detail-description">

            {{ $question->assessment?->title ?? 'Assessment' }}

        </p>

    </div>


    <div class="question-detail-actions">

        {{-- BACK --}}

        <a
            href="{{ route('owner.questions.index') }}"
            class="btn-back-question"
            title="Kembali"
        >

            <i class="bi bi-arrow-left"></i>

            <span>Kembali</span>

        </a>


        {{-- EDIT --}}

        <a
            href="{{ route('owner.questions.edit', $question) }}"
            class="question-detail-action edit"
            title="Edit soal"
        >

            <i class="bi bi-pencil"></i>

        </a>

    </div>

</div>


{{-- =====================================================
     MAIN CARD
====================================================== --}}

<div class="question-detail-card">


    {{-- =================================================
         CARD HEADER
    ================================================== --}}

    <div class="question-card-header">

        <div class="question-card-heading">

            <div class="question-card-icon">

                <i class="bi bi-question-lg"></i>

            </div>

            <div>

                <h2 class="question-card-title">

                    Pertanyaan

                </h2>

                <p class="question-card-description">

                    Detail pertanyaan assessment

                </p>

            </div>

        </div>


        {{-- TYPE --}}

        @if($question->type === 'multiple_choice')

            <span class="question-type-badge">

                <i class="bi bi-list-check"></i>

                Pilihan Ganda

            </span>

        @else

            <span class="question-type-badge">

                <i class="bi bi-chat-left-text"></i>

                Free Text

            </span>

        @endif

    </div>


    {{-- =================================================
         QUESTION
    ================================================== --}}

    <div class="question-content">

        <div class="question-label">

            Pertanyaan

        </div>

        <p class="question-text">

            {{ $question->question }}

        </p>


        {{-- =================================================
             MULTIPLE CHOICE OPTIONS
        ================================================== --}}

        @if($question->type === 'multiple_choice')

            <div class="question-options">

                <div class="question-label">

                    Pilihan Jawaban

                </div>


                @foreach([
                    'A' => $question->option_a,
                    'B' => $question->option_b,
                    'C' => $question->option_c,
                    'D' => $question->option_d,
                ] as $key => $option)

                    @if($option !== null && $option !== '')

                        <div
                            class="question-option
                            {{ $question->correct_answer === $key ? 'correct' : '' }}"
                        >

                            <div class="question-option-left">

                                <div class="question-option-key">

                                    {{ $key }}

                                </div>

                                <div class="question-option-text">

                                    {{ $option }}

                                </div>

                            </div>


                            @if($question->correct_answer === $key)

                                <span class="question-correct">

                                    <i class="bi bi-check-circle-fill"></i>

                                    Jawaban Benar

                                </span>

                            @endif

                        </div>

                    @endif

                @endforeach

            </div>

        @else

            {{-- =================================================
                 FREE TEXT
            ================================================== --}}

            <div class="question-free-text">

                <div class="question-free-text-icon">

                    <i class="bi bi-chat-left-text"></i>

                </div>

                <div class="question-free-text-title">

                    Jawaban Free Text

                </div>

                <p class="question-free-text-description">

                    Peserta akan memberikan jawaban dalam bentuk teks.

                </p>

            </div>

        @endif

    </div>


    {{-- =================================================
         META
    ================================================== --}}

    <div class="question-meta">

        {{-- ASSESSMENT --}}

        <div class="question-meta-item">

            <div class="question-meta-label">

                Assessment

            </div>

            <div class="question-meta-value">

                {{ $question->assessment?->title ?? '—' }}

            </div>

        </div>


        {{-- TYPE --}}

        <div class="question-meta-item">

            <div class="question-meta-label">

                Tipe Soal

            </div>

            <div class="question-meta-value muted">

                @if($question->type === 'multiple_choice')

                    Pilihan Ganda

                @else

                    Free Text

                @endif

            </div>

        </div>


        {{-- SCORE --}}

        <div class="question-meta-item">

            <div class="question-meta-label">

                Nilai

            </div>

            <div class="question-meta-value">

                {{ $question->points ?? $question->score ?? 0 }}

                poin

            </div>

        </div>

    </div>

</div>


</div>

{{-- =====================================================
BOOTSTRAP ICONS
====================================================== --}}

<link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
>

@endsection
