<!DOCTYPE html>

<html lang="id">

<head>


<meta charset="UTF-8">

<meta
    name="viewport"
    content="width=device-width, initial-scale=1"
>

<title>
    {{ $assessment->title }}
</title>

<link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
    rel="stylesheet"
>

<style>

    * {
        box-sizing: border-box;
    }

    html,
    body {
        width: 100%;
        max-width: 100%;
        overflow-x: hidden;
    }

    body {
        margin: 0;
        padding: 0;
        background: #f5f6f8;
        color: #212529;
        font-family: Arial, Helvetica, sans-serif;
    }

    /* =========================================================
       MAIN WRAPPER
    ========================================================== */

    .page-wrapper {
        width: 100%;
        max-width: 100%;
        padding: 24px 12px 0;
    }

    .assessment-container {
        width: 100%;
        max-width: 520px;
        margin: 0 auto;
    }

    /* =========================================================
       HEADER
    ========================================================== */

    .assessment-header {
        width: 100%;
        margin-bottom: 12px;
    }

    .assessment-header-inner {
        width: 100%;
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        gap: 15px;
    }

    .assessment-header-left {
        min-width: 0;
        flex: 1;
    }

    .assessment-header-right {
        flex: 0 0 auto;
        text-align: right;
    }

    .assessment-title {
        font-size: 16px;
        font-weight: 700;
        line-height: 1.3;
        color: #212529;
        margin: 0 0 3px;
        overflow-wrap: anywhere;
    }

    .assessment-subtitle {
        font-size: 11px;
        color: #6c757d;
        line-height: 1.4;
    }

    .progress-label {
        font-size: 10px;
        color: #868e96;
        line-height: 1.3;
    }

    .progress-number {
        font-size: 12px;
        font-weight: 600;
        margin-top: 2px;
    }

    /* =========================================================
       PROGRESS
    ========================================================== */

    .assessment-progress {
        width: 100%;
        height: 4px;
        background: #e9ecef;
        border-radius: 20px;
        overflow: hidden;
        margin-bottom: 14px;
    }

    .assessment-progress .progress-bar {
        height: 100%;
        background: #212529;
        border-radius: 20px;
    }

    /* =========================================================
       ERROR
    ========================================================== */

    .error-box {
        width: 100%;
        font-size: 12px;
        border-radius: 7px;
        padding: 10px 12px;
        margin-bottom: 12px;
        overflow-wrap: anywhere;
    }

    .error-box ul {
        margin-bottom: 0;
    }

    /* =========================================================
       QUESTION CARD
    ========================================================== */

    .question-card {
        width: 100%;
        max-width: 100%;
        background: #fff;
        border: 1px solid #e1e4e8;
        border-radius: 8px;
        overflow: hidden;
    }

    .question-body {
        width: 100%;
        padding: 18px;
    }

    /* =========================================================
       QUESTION
    ========================================================== */

    .question-badge {
        display: inline-flex;
        align-items: center;
        max-width: 100%;
        padding: 4px 8px;
        border-radius: 5px;
        background: #212529;
        color: #fff;
        font-size: 9px;
        font-weight: 600;
        margin-bottom: 10px;
    }

    .question-text {
        width: 100%;
        max-width: 100%;
        font-size: 16px;
        line-height: 1.5;
        font-weight: 600;
        color: #212529;
        margin-bottom: 16px;
        white-space: pre-line;
        overflow-wrap: anywhere;
        word-break: break-word;
    }

    /* =========================================================
       QUESTION MEDIA
    ========================================================== */

    .question-media {
        width: 100%;
        max-width: 100%;
        margin-bottom: 16px;
        overflow: hidden;
    }

    .question-image {
        display: block;
        width: 100%;
        max-width: 100%;
        height: auto;
        max-height: 300px;
        object-fit: contain;
        border: 1px solid #e1e5e8;
        border-radius: 7px;
        background: #f8f9fa;
        padding: 4px;
    }

    /* =========================================================
       PDF
    ========================================================== */

    .pdf-box {
        width: 100%;
        max-width: 100%;
        border: 1px solid #dee2e6;
        border-radius: 7px;
        overflow: hidden;
        background: #f8f9fa;
    }

    .pdf-header {
        width: 100%;
        padding: 8px 10px;
        background: #fff;
        border-bottom: 1px solid #dee2e6;
        font-size: 11px;
        font-weight: 600;
    }

    .pdf-frame {
        display: block;
        width: 100%;
        max-width: 100%;
        height: 350px;
        border: 0;
    }

    .pdf-footer {
        width: 100%;
        padding: 8px;
        background: #fff;
        border-top: 1px solid #dee2e6;
    }

    .pdf-footer .btn {
        font-size: 11px;
        padding: 6px 10px;
    }

    /* =========================================================
       OPTIONS
    ========================================================== */

    .options-wrapper {
        width: 100%;
        max-width: 100%;
    }

    .option-item {
        position: relative;
        width: 100%;
        max-width: 100%;
        min-width: 0;

        display: flex;
        align-items: center;

        gap: 8px;

        padding: 9px 10px;
        margin-bottom: 7px;

        border: 1px solid #dfe3e7;
        border-radius: 7px;

        background: #fff;

        cursor: pointer;

        transition: .15s ease;

        overflow: hidden;
    }

    .option-item:hover {
        background: #f8f9fa;
        border-color: #adb5bd;
    }

    .option-item:has(input:checked) {
        background: #f8f9fa;
        border-color: #212529;
    }

    .option-radio {
        width: 15px;
        height: 15px;
        min-width: 15px;
        margin: 0;
        flex: 0 0 15px;
        cursor: pointer;
    }

    .option-label {
        width: 29px;
        height: 29px;
        min-width: 29px;

        display: flex;
        align-items: center;
        justify-content: center;

        border: 1px solid #dee2e6;
        border-radius: 5px;

        background: #f8f9fa;

        font-size: 10px;
        font-weight: 700;

        color: #495057;

        flex: 0 0 29px;
    }

    .option-text {
        flex: 1;
        min-width: 0;

        font-size: 12px;
        line-height: 1.45;

        color: #343a40;

        overflow-wrap: anywhere;
        word-break: break-word;
    }

    /* =========================================================
       FREE TEXT
    ========================================================== */

    .free-text {
        display: block;

        width: 100%;
        max-width: 100%;

        min-height: 150px;

        padding: 10px;

        border: 1px solid #dfe3e7;
        border-radius: 7px;

        resize: vertical;

        font-family: Arial, Helvetica, sans-serif;

        font-size: 13px;
        line-height: 1.5;

        color: #212529;

        overflow-wrap: anywhere;
    }

    .free-text:focus {
        outline: none;
        border-color: #adb5bd;
        box-shadow: 0 0 0 3px rgba(33, 37, 41, .06);
    }

    /* =========================================================
       NAVIGATION
    ========================================================== */

    .navigation {
        width: 100%;

        display: flex;
        justify-content: space-between;
        align-items: center;

        gap: 8px;

        border-top: 1px solid #edf0f2;

        margin-top: 17px;
        padding-top: 13px;
    }

    .navigation .btn {
        min-height: 36px;

        padding: 7px 11px;

        border-radius: 6px;

        font-size: 11px;
        font-weight: 500;

        white-space: nowrap;
    }

    /* =========================================================
       FOOTER
    ========================================================== */

    .assessment-footer {
        width: 100%;

        text-align: center;

        font-size: 10px;
        color: #9ca3af;

        padding: 14px 0 24px;
    }

    /* =========================================================
       MOBILE
    ========================================================== */

    @media (max-width: 600px) {

        body {
            background: #f5f6f8;
        }

        .page-wrapper {
            padding: 12px 8px 0;
        }

        .assessment-container {
            width: 100%;
            max-width: 100%;
        }

        .assessment-header {
            margin-bottom: 10px;
        }

        .assessment-header-inner {
            gap: 10px;
        }

        .assessment-title {
            font-size: 14px;
        }

        .assessment-subtitle {
            font-size: 10px;
        }

        .progress-label {
            font-size: 9px;
        }

        .progress-number {
            font-size: 11px;
        }

        .assessment-progress {
            height: 3px;
            margin-bottom: 10px;
        }

        .question-card {
            border-radius: 7px;
        }

        .question-body {
            padding: 13px;
        }

        .question-badge {
            font-size: 8px;
            padding: 4px 7px;
            margin-bottom: 8px;
        }

        .question-text {
            font-size: 14px;
            line-height: 1.5;
            margin-bottom: 13px;
        }

        .question-image {
            max-height: 240px;
        }

        .pdf-frame {
            height: 280px;
        }

        .option-item {
            gap: 7px;
            padding: 8px;
            margin-bottom: 6px;
        }

        .option-radio {
            width: 14px;
            height: 14px;
            min-width: 14px;
            flex-basis: 14px;
        }

        .option-label {
            width: 27px;
            height: 27px;
            min-width: 27px;
            flex-basis: 27px;
            font-size: 9px;
        }

        .option-text {
            font-size: 11px;
            line-height: 1.4;
        }

        .free-text {
            min-height: 130px;
            font-size: 12px;
            padding: 9px;
        }

        .navigation {
            margin-top: 13px;
            padding-top: 11px;
        }

        .navigation .btn {
            min-height: 34px;
            padding: 6px 9px;
            font-size: 10px;
        }

        .assessment-footer {
            padding: 12px 0 18px;
        }
    }

    /* =========================================================
       EXTRA SMALL SCREEN
    ========================================================== */

    @media (max-width: 380px) {

        .page-wrapper {
            padding-left: 6px;
            padding-right: 6px;
        }

        .question-body {
            padding: 11px;
        }

        .assessment-header-inner {
            gap: 7px;
        }

        .assessment-title {
            font-size: 13px;
        }

        .question-text {
            font-size: 13px;
        }

        .option-item {
            padding: 7px;
        }

        .option-text {
            font-size: 10.5px;
        }

        .navigation .btn {
            font-size: 9px;
            padding: 6px 8px;
        }

        .pdf-frame {
            height: 240px;
        }
    }
/* =========================================================
   FINISH CONFIRMATION MODAL
========================================================= */

.finish-modal {
    position: fixed;
    inset: 0;
    z-index: 9999;

    display: none;
    align-items: center;
    justify-content: center;

    padding: 16px;

    background: rgba(17, 24, 39, .45);

    opacity: 0;
    transition: opacity .2s ease;
}

.finish-modal.show {
    display: flex;
    opacity: 1;
}

.finish-modal-box {
    width: 100%;
    max-width: 380px;

    background: #fff;

    border-radius: 12px;

    padding: 24px;

    box-shadow:
        0 20px 60px rgba(0, 0, 0, .18);

    transform: translateY(10px) scale(.98);
    transition: .2s ease;
}

.finish-modal.show .finish-modal-box {
    transform: translateY(0) scale(1);
}

.finish-modal-title {
    margin: 0 0 7px;

    font-size: 17px;
    font-weight: 700;

    color: #212529;
}

.finish-modal-text {
    margin: 0;

    font-size: 12px;
    line-height: 1.6;

    color: #6c757d;
}

.finish-modal-actions {
    display: flex;
    justify-content: flex-end;

    gap: 8px;

    margin-top: 22px;
}

.finish-modal-actions button {
    border-radius: 6px;

    padding: 8px 13px;

    font-size: 11px;
    font-weight: 600;

    cursor: pointer;
}

.finish-cancel {
    background: #fff;
    color: #495057;

    border: 1px solid #dee2e6;
}

.finish-cancel:hover {
    background: #f8f9fa;
}

.finish-confirm {
    background: #212529;
    color: #fff;

    border: 1px solid #212529;
}

.finish-confirm:hover {
    background: #000;
}

@media (max-width: 600px) {

    .finish-modal-box {
        max-width: 100%;
        padding: 20px;
    }

    .finish-modal-title {
        font-size: 16px;
    }

    .finish-modal-text {
        font-size: 11px;
    }

}
</style>


</head>

<body>

<div class="page-wrapper">


<div class="assessment-container">

    {{-- =====================================================
         HEADER
    ====================================================== --}}

    <div class="assessment-header">

        <div class="assessment-header-inner">

            <div class="assessment-header-left">

                <div class="assessment-title">
                    {{ $assessment->title }}
                </div>

                <div class="assessment-subtitle">
                    Soal
                    {{ $questionNumber }}
                    dari
                    {{ $totalQuestions }}
                </div>

            </div>

            <div class="assessment-header-right">

                <div class="progress-label">
                    Progress
                </div>

                <div class="progress-number">
                    {{ $questionNumber }}
                    /
                    {{ $totalQuestions }}
                </div>

            </div>

        </div>

    </div>


    {{-- =====================================================
         PROGRESS
    ====================================================== --}}

    <div class="assessment-progress">

        <div
            class="progress-bar"
            role="progressbar"
            style="width: {{
                $totalQuestions > 0
                    ? (($questionNumber / $totalQuestions) * 100)
                    : 0
            }}%;"
        ></div>

    </div>


    {{-- =====================================================
         ERROR
    ====================================================== --}}

    @if($errors->any())

        <div class="alert alert-danger error-box">

            <div class="fw-semibold mb-1">
                Terdapat kesalahan:
            </div>

            <ul class="mb-0 ps-3">

                @foreach($errors->all() as $error)

                    <li>
                        {{ $error }}
                    </li>

                @endforeach

            </ul>

        </div>

    @endif


    {{-- =====================================================
         QUESTION CARD
    ====================================================== --}}

    <div class="question-card">

        <div class="question-body">


            {{-- =================================================
                 QUESTION TEXT
            ================================================== --}}

            <div>

                <span class="question-badge">
                    Soal {{ $questionNumber }}
                </span>

                <div class="question-text">
                    {{ $question->question }}
                </div>

            </div>


            {{-- =================================================
                 QUESTION FILE / IMAGE
            ================================================== --}}

            @if($question->image)

                @php

                    $fileUrl = asset(
                        'storage/' . $question->image
                    );

                    $extension = strtolower(
                        pathinfo(
                            $question->image,
                            PATHINFO_EXTENSION
                        )
                    );

                @endphp


                <div class="question-media">


                    {{-- IMAGE --}}

                    @if(
                        in_array(
                            $extension,
                            [
                                'jpg',
                                'jpeg',
                                'png',
                                'webp',
                                'gif'
                            ]
                        )
                    )

                        <img
                            src="{{ $fileUrl }}"
                            alt="Gambar soal"
                            class="question-image"
                        >


                    {{-- PDF --}}

                    @elseif($extension === 'pdf')

                        <div class="pdf-box">

                            <div class="pdf-header">
                                📄 File Soal
                            </div>

                            <iframe
                                src="{{ $fileUrl }}"
                                class="pdf-frame"
                                title="PDF Soal"
                            ></iframe>

                            <div class="pdf-footer">

                                <a
                                    href="{{ $fileUrl }}"
                                    target="_blank"
                                    class="btn btn-sm btn-outline-dark"
                                >
                                    Buka PDF
                                </a>

                            </div>

                        </div>

                    @endif

                </div>

            @endif


            {{-- =================================================
                 ANSWER FORM
            ================================================== --}}

            <form
                method="POST"
                action="{{ route(
                    'assessment.answer',
                    [
                        'assessment' => $assessment->id,
                        'question' => $question->id,
                    ]
                ) }}"
            >

                @csrf


                {{-- =================================================
                     MULTIPLE CHOICE
                ================================================== --}}

                @if($question->type === 'multiple_choice')

                    <div class="options-wrapper">

                        @forelse($question->options as $option)

                            <label class="option-item">

                                <input
                                    type="radio"
                                    name="answer"
                                    value="{{ $option->id }}"
                                    class="form-check-input option-radio"

                                    @if(
                                        isset($savedAnswer)
                                        &&
                                        (string) $savedAnswer ===
                                        (string) $option->id
                                    )
                                        checked
                                    @endif

                                    required
                                >

                                <span class="option-label">
                                    {{ $option->label }}
                                </span>

                                <span class="option-text">
                                    {{ $option->option_text }}
                                </span>

                            </label>

                        @empty

                            <div class="alert alert-warning mb-0">
                                Belum ada pilihan jawaban untuk soal ini.
                            </div>

                        @endforelse

                    </div>


                {{-- =================================================
                     FREE TEXT
                ================================================== --}}

                @elseif(
                    $question->type === 'free_text'
                    ||
                    $question->type === 'text'
                )

                    <textarea
                        name="answer"
                        class="free-text"
                        placeholder="Tulis jawaban Anda di sini..."
                        required
                    >{{ old('answer', $savedAnswer ?? '') }}</textarea>


                {{-- =================================================
                     UNKNOWN TYPE
                ================================================== --}}

                @else

                    <div class="alert alert-warning mb-0">

                        Tipe soal tidak dikenali.

                    </div>

                @endif


                {{-- =================================================
                     ANSWER ERROR
                ================================================== --}}

                @error('answer')

                    <div class="alert alert-danger mt-3 mb-0">

                        {{ $message }}

                    </div>

                @enderror


                {{-- =================================================
                     NAVIGATION
                ================================================== --}}

                <div class="navigation">


                    {{-- PREVIOUS --}}

                    @if($currentIndex > 0)

                        @php

                            $previousQuestion =
                                $questions->get(
                                    $currentIndex - 1
                                );

                        @endphp


                        @if($previousQuestion)

                            <a
                                href="{{ route(
                                    'assessment.question',
                                    [
                                        'assessment' =>
                                            $assessment->slug,

                                        'question' =>
                                            $previousQuestion->id,
                                    ]
                                ) }}"
                                class="btn btn-outline-secondary"
                            >
                                ← Sebelumnya
                            </a>

                        @else

                            <div></div>

                        @endif

                    @else

                        <div></div>

                    @endif


                    {{-- NEXT / FINISH --}}

                    @if(
                        $question->type === 'multiple_choice'
                        ||
                        $question->type === 'free_text'
                        ||
                        $question->type === 'text'
                    )

                        <button
                            type="submit"
                            class="btn btn-dark"
                        >

                            @if(
                                $questionNumber ===
                                $totalQuestions
                            )

                                Selesaikan ✓

                            @else

                                Berikutnya →

                            @endif

                        </button>

                    @endif

                </div>

            </form>

        </div>

    </div>


    {{-- =====================================================
         FOOTER
    ====================================================== --}}

    <div class="assessment-footer">

        Assessment System

    </div>

</div>


</div>

{{-- =============================================================
JAVASCRIPT
============================================================= --}}
{{-- =============================================================
     FINISH CONFIRMATION MODAL
============================================================= --}}

<div
    class="finish-modal"
    id="finishModal"
>

    <div
        class="finish-modal-box"
        role="dialog"
        aria-modal="true"
    >

        <h3 class="finish-modal-title">
          ✓   Selesaikan Assessment?
        </h3>

        <p class="finish-modal-text">
            Pastikan semua jawaban Anda sudah benar.
            Setelah assessment diselesaikan, jawaban tidak dapat diubah kembali.
        </p>

        <div class="finish-modal-actions">

            <button
                type="button"
                class="finish-cancel"
                id="cancelFinish"
            >
                Periksa Lagi
            </button>

            <button
                type="button"
                class="finish-confirm"
                id="confirmFinish"
            >
                Ya, Selesaikan
            </button>

        </div>

    </div>

</div>
<script>

document.addEventListener(
    'DOMContentLoaded',
    function () {

        /*
        |--------------------------------------------------------------------------
        | PILIH OPSI
        |--------------------------------------------------------------------------
        */

        const options =
            document.querySelectorAll(
                '.option-item'
            );


        options.forEach(
            function (option) {

                option.addEventListener(
                    'click',
                    function () {

                        const radio =
                            option.querySelector(
                                'input[type="radio"]'
                            );

                        if (radio) {

                            radio.checked = true;

                        }

                    }
                );

            }
        );


        /*
        |--------------------------------------------------------------------------
        | KONFIRMASI SELESAI
        |--------------------------------------------------------------------------
        */

        const form =
            document.querySelector(
                '.question-card form'
            );


        const finishModal =
            document.getElementById(
                'finishModal'
            );


        const cancelFinish =
            document.getElementById(
                'cancelFinish'
            );


        const confirmFinish =
            document.getElementById(
                'confirmFinish'
            );


        if (!form) {
            return;
        }


        const submitButton =
            form.querySelector(
                'button[type="submit"]'
            );


        let allowSubmit = false;


        if (
            submitButton &&
            submitButton.textContent
                .trim()
                .includes('Selesaikan')
        ) {

            form.addEventListener(
                'submit',
                function (event) {

                    if (allowSubmit) {
                        return;
                    }


                    event.preventDefault();


                    finishModal.classList.add(
                        'show'
                    );

                }
            );

        }


        /*
        |--------------------------------------------------------------------------
        | BATAL
        |--------------------------------------------------------------------------
        */

        if (cancelFinish) {

            cancelFinish.addEventListener(
                'click',
                function () {

                    finishModal.classList.remove(
                        'show'
                    );

                }
            );

        }


        /*
        |--------------------------------------------------------------------------
        | KONFIRMASI SELESAI
        |--------------------------------------------------------------------------
        */

        if (confirmFinish) {

            confirmFinish.addEventListener(
                'click',
                function () {

                    allowSubmit = true;

                    confirmFinish.disabled = true;

                    confirmFinish.innerHTML =
                        'Menyelesaikan...';


                    form.submit();

                }
            );

        }


        /*
        |--------------------------------------------------------------------------
        | KLIK BACKDROP UNTUK MENUTUP
        |--------------------------------------------------------------------------
        */

        if (finishModal) {

            finishModal.addEventListener(
                'click',
                function (event) {

                    if (
                        event.target === finishModal
                    ) {

                        finishModal.classList.remove(
                            'show'
                        );

                    }

                }
            );

        }


        /*
        |--------------------------------------------------------------------------
        | ESC UNTUK MENUTUP
        |--------------------------------------------------------------------------
        */

        document.addEventListener(
            'keydown',
            function (event) {

                if (
                    event.key === 'Escape' &&
                    finishModal &&
                    finishModal.classList.contains(
                        'show'
                    )
                ) {

                    finishModal.classList.remove(
                        'show'
                    );

                }

            }
        );

    }
);



</script>

</body>

</html>
