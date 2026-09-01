@extends('dashboard')

@section('content')

<style>
/* =====================================================
   TUG GAME QUESTION BUILDER
===================================================== */

.tug-builder-page {
    --page-text: #111827;
    --page-muted: #6b7280;
    --page-border: #e5e7eb;
    --page-soft: #f8fafc;
    --page-radius: 16px;

    padding-bottom: 40px;
}

/* =====================================================
   HEADER
===================================================== */

.builder-header {
    margin-bottom: 28px;
}

.builder-eyebrow {
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

.builder-eyebrow span {
    width: 6px;
    height: 6px;
    border-radius: 50%;
    background: #059669;
    box-shadow: 0 0 0 4px rgba(5, 150, 105, .08);
}

.builder-title {
    margin: 0;

    color: var(--page-text);
    font-size: 28px;
    line-height: 1.2;
    font-weight: 750;
    letter-spacing: -.035em;
}

.builder-description {
    margin: 7px 0 0;

    color: var(--page-muted);
    font-size: 13px;
}

/* =====================================================
   ALERT
===================================================== */

.builder-alert {
    display: flex;
    align-items: flex-start;
    gap: 10px;

    margin-bottom: 20px;
    padding: 12px 14px;

    border: 1px solid #e5e7eb;
    border-radius: 10px;

    background: #fafafa;
    color: #6b7280;

    font-size: 11px;
    line-height: 1.5;
}

.builder-alert-danger {
    border-color: #fecaca;
    background: #fffafa;
    color: #b91c1c;
}

.builder-alert-success {
    border-color: #bbf7d0;
    background: #f7fff9;
    color: #166534;
}

.builder-alert-icon {
    width: 28px;
    height: 28px;
    flex: 0 0 28px;

    display: flex;
    align-items: center;
    justify-content: center;

    border-radius: 8px;

    background: #f3f4f6;
    color: #374151;

    font-size: 13px;
}

.builder-alert-danger .builder-alert-icon {
    background: #fee2e2;
    color: #dc2626;
}

.builder-alert-success .builder-alert-icon {
    background: #dcfce7;
    color: #16a34a;
}

.builder-alert ul {
    margin: 4px 0 0;
    padding-left: 17px;
}

/* =====================================================
   MAIN CARD
===================================================== */

.builder-card {
    background: #fff;
    border: 1px solid var(--page-border);
    border-radius: var(--page-radius);
    overflow: hidden;
}

/* =====================================================
   CARD HEADER
===================================================== */

.builder-card-header {
    display: flex;
    align-items: center;
    gap: 12px;

    padding: 20px 24px;

    border-bottom: 1px solid var(--page-border);
}

.builder-card-icon {
    width: 38px;
    height: 38px;

    display: flex;
    align-items: center;
    justify-content: center;

    border-radius: 10px;

    background: #f3f4f6;
    color: #374151;

    font-size: 16px;
}

.builder-card-title {
    margin: 0;

    color: var(--page-text);
    font-size: 14px;
    font-weight: 700;
}

.builder-card-description {
    margin: 3px 0 0;

    color: #9ca3af;
    font-size: 11px;
}

/* =====================================================
   FORM BODY
===================================================== */

.builder-card-body {
    padding: 26px 24px;
}

/* =====================================================
   FORM
===================================================== */

.builder-label {
    display: block;
    margin-bottom: 7px;

    color: #374151;
    font-size: 12px;
    font-weight: 650;
}

.required-mark {
    color: #dc2626;
    margin-left: 2px;
}

.builder-input,
.builder-select,
.builder-textarea {
    width: 100%;

    border: 1px solid #dfe3e8;
    border-radius: 9px;

    background: #fff;
    color: #111827;

    font-size: 13px;

    transition:
        border-color .15s ease,
        box-shadow .15s ease,
        background .15s ease;
}

.builder-input,
.builder-select {
    min-height: 42px;
    padding: 9px 12px;
}

.builder-textarea {
    min-height: 120px;
    padding: 11px 12px;

    resize: vertical;
    line-height: 1.6;
}

.builder-input:hover,
.builder-select:hover,
.builder-textarea:hover {
    border-color: #cbd0d7;
}

.builder-input:focus,
.builder-select:focus,
.builder-textarea:focus {
    border-color: #9ca3af;
    background: #fff;

    box-shadow:
        0 0 0 3px rgba(17, 24, 39, .05);

    outline: none;
}

/* =====================================================
   TUG GAME SETTINGS
===================================================== */

.tug-settings {
    margin-top: 20px;
    padding: 17px;

    border: 1px solid #e5e7eb;
    border-radius: 11px;

    background: #fafafa;
}

.tug-settings-header {
    display: flex;
    align-items: center;
    gap: 8px;

    margin-bottom: 15px;

    color: #374151;
    font-size: 11px;
    font-weight: 700;
}

.tug-settings-header i {
    color: #6b7280;
}

.tug-setting-box {
    padding: 13px;

    border: 1px solid #e5e7eb;
    border-radius: 9px;

    background: #fff;
}

.tug-setting-icon {
    width: 28px;
    height: 28px;

    display: flex;
    align-items: center;
    justify-content: center;

    margin-bottom: 9px;

    border-radius: 7px;

    background: #f3f4f6;
    color: #374151;

    font-size: 12px;
}

.tug-setting-help {
    margin-top: 6px;

    color: #9ca3af;
    font-size: 10px;
    line-height: 1.5;
}

/* =====================================================
   QUESTION CARD
===================================================== */

.question-card {
    margin-bottom: 20px;

    border: 1px solid var(--page-border);
    border-radius: 14px;

    background: #fff;
    overflow: hidden;
}

.question-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 15px;

    padding: 16px 20px;

    border-bottom: 1px solid var(--page-border);

    background: #fafafa;
}

.question-heading {
    display: flex;
    align-items: center;
    gap: 11px;
}

.question-number {
    width: 34px;
    height: 34px;
    flex: 0 0 34px;

    display: flex;
    align-items: center;
    justify-content: center;

    border-radius: 9px;

    background: #111827;
    color: #fff;

    font-size: 12px;
    font-weight: 700;
}

.question-title {
    margin: 0;

    color: #111827;
    font-size: 13px;
    font-weight: 700;
}

.question-meta {
    margin-top: 2px;

    color: #9ca3af;
    font-size: 10px;
}

.remove-question {
    min-height: 34px;

    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 6px;

    padding: 7px 11px;

    border: 1px solid #e5e7eb;
    border-radius: 8px;

    background: #fff;
    color: #6b7280;

    font-size: 11px;
    font-weight: 600;

    transition: all .18s ease;
}

.remove-question:hover {
    border-color: #fecaca;
    background: #fffafa;
    color: #dc2626;
}

.question-body {
    padding: 24px 20px;
}

/* =====================================================
   OPTION SECTION
===================================================== */

.option-section {
    margin-top: 25px;
    padding-top: 22px;

    border-top: 1px solid #f1f5f9;
}

.option-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 15px;

    margin-bottom: 13px;
}

.option-heading {
    display: flex;
    align-items: center;
    gap: 9px;
}

.option-icon {
    width: 30px;
    height: 30px;

    display: flex;
    align-items: center;
    justify-content: center;

    border-radius: 8px;

    background: #f3f4f6;
    color: #4b5563;

    font-size: 12px;
}

.option-title {
    margin: 0;

    color: #374151;
    font-size: 12px;
    font-weight: 700;
}

.option-help {
    margin-top: 2px;

    color: #9ca3af;
    font-size: 10px;
}

.add-option {
    min-height: 34px;

    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 6px;

    padding: 7px 11px;

    border: 1px solid #e5e7eb;
    border-radius: 8px;

    background: #fff;
    color: #4b5563;

    font-size: 11px;
    font-weight: 600;

    transition: all .18s ease;
}

.add-option:hover {
    border-color: #d1d5db;
    background: #f9fafb;
    color: #111827;
}

.options-container {
    display: flex;
    flex-direction: column;
    gap: 8px;
}

.option-item {
    display: grid;

    grid-template-columns:
        32px
        minmax(0, 1fr)
        auto
        34px;

    align-items: center;
    gap: 9px;

    padding: 7px;

    border: 1px solid #e5e7eb;
    border-radius: 9px;

    background: #fff;
}

.option-label {
    width: 32px;
    height: 32px;

    display: flex;
    align-items: center;
    justify-content: center;

    border-radius: 7px;

    background: #f3f4f6;
    color: #4b5563;

    font-size: 11px;
    font-weight: 700;
}

.option-item .builder-input {
    min-height: 36px;

    border-color: transparent;
    background: #f9fafb;
}

.option-item .builder-input:focus {
    border-color: #d1d5db;
    background: #fff;
    box-shadow: none;
}

.correct-answer {
    display: inline-flex;
    align-items: center;
    gap: 6px;

    min-height: 32px;
    padding: 0 9px;

    border: 1px solid #e5e7eb;
    border-radius: 7px;

    background: #fafafa;
    color: #6b7280;

    font-size: 10px;
    font-weight: 600;

    cursor: pointer;
    white-space: nowrap;
}

.correct-answer:has(input:checked) {
    border-color: #bbf7d0;
    background: #f0fdf4;
    color: #166534;
}

.correct-answer input {
    width: 13px;
    height: 13px;

    margin: 0;

    accent-color: #059669;
    cursor: pointer;
}

.remove-option {
    width: 32px;
    height: 32px;

    display: flex;
    align-items: center;
    justify-content: center;

    border: 1px solid transparent;
    border-radius: 7px;

    background: transparent;
    color: #9ca3af;

    font-size: 15px;

    transition: all .18s ease;
}

.remove-option:hover {
    border-color: #fecaca;
    background: #fffafa;
    color: #dc2626;
}

/* =====================================================
   FILE
===================================================== */

.file-section {
    margin-top: 20px;
}

.file-help {
    display: flex;
    align-items: flex-start;
    gap: 5px;

    margin-top: 6px;

    color: #9ca3af;
    font-size: 10px;
    line-height: 1.5;
}

.file-preview {
    display: none;

    margin-top: 10px;
    padding: 10px;

    border: 1px solid #e5e7eb;
    border-radius: 9px;

    background: #fafafa;
}

.file-preview img {
    max-width: 200px;
    max-height: 130px;

    object-fit: cover;
    border-radius: 7px;
}

.file-info {
    margin-top: 6px;

    color: #6b7280;
    font-size: 10px;
}

/* =====================================================
   ADD QUESTION
===================================================== */

.add-question-box {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;

    min-height: 110px;

    margin-bottom: 24px;
    padding: 20px;

    border: 1px dashed #d1d5db;
    border-radius: 12px;

    background: #fafafa;
}

.add-question-button {
    min-height: 38px;

    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 7px;

    padding: 8px 15px;

    border: 1px solid #e5e7eb;
    border-radius: 9px;

    background: #fff;
    color: #374151;

    font-size: 12px;
    font-weight: 650;

    transition: all .18s ease;
}

.add-question-button:hover {
    border-color: #d1d5db;
    background: #f9fafb;
    color: #111827;
}

.question-count-help {
    margin-top: 7px;

    color: #9ca3af;
    font-size: 10px;
}

/* =====================================================
   FOOTER
===================================================== */

.builder-footer {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 15px;

    padding: 18px 24px;

    border-top: 1px solid var(--page-border);

    background: #fafafa;
}

.builder-total {
    display: flex;
    align-items: center;
    gap: 7px;

    color: #6b7280;
    font-size: 11px;
}

.total-badge {
    min-width: 25px;
    height: 25px;

    padding: 0 7px;

    display: inline-flex;
    align-items: center;
    justify-content: center;

    border-radius: 7px;

    background: #f3f4f6;
    color: #111827;

    font-size: 11px;
    font-weight: 700;
}

.builder-actions {
    display: flex;
    align-items: center;
    gap: 8px;
}

.btn-builder-cancel,
.btn-builder-save {
    min-height: 39px;

    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 7px;

    padding: 8px 14px;

    border-radius: 9px;

    font-size: 12px;
    font-weight: 650;

    text-decoration: none;

    transition: all .18s ease;
}

.btn-builder-cancel {
    border: 1px solid #e5e7eb;

    background: #fff;
    color: #6b7280;
}

.btn-builder-cancel:hover {
    color: #111827;
    background: #f9fafb;
    border-color: #d1d5db;
}

.btn-builder-save {
    border: 1px solid #111827;

    background: #111827;
    color: #fff;
}

.btn-builder-save:hover {
    background: #000;
    border-color: #000;
    color: #fff;

    transform: translateY(-1px);

    box-shadow:
        0 7px 18px rgba(15, 23, 42, .12);
}

.btn-builder-save:disabled {
    opacity: .65;
    cursor: not-allowed;

    transform: none;
    box-shadow: none;
}

/* =====================================================
   RESPONSIVE
===================================================== */

@media (max-width: 768px) {

    .builder-title {
        font-size: 25px;
    }

    .builder-card-header,
    .builder-card-body,
    .builder-footer {
        padding-left: 18px;
        padding-right: 18px;
    }

    .question-header {
        padding: 14px 15px;
    }

    .question-body {
        padding: 18px 15px;
    }

    .option-header {
        align-items: flex-start;
        flex-direction: column;
    }

    .add-option {
        width: 100%;
    }

    .option-item {
        grid-template-columns:
            30px
            minmax(0, 1fr)
            32px;
    }

    .option-item .builder-input {
        grid-column: 2 / 3;
    }

    .correct-answer {
        grid-column: 2 / 3;
        justify-self: start;
    }

    .remove-option {
        grid-column: 3 / 4;
        grid-row: 1;
    }

    .builder-footer {
        align-items: stretch;
        flex-direction: column;
    }

    .builder-total {
        justify-content: center;
    }

    .builder-actions {
        width: 100%;
    }

    .btn-builder-cancel,
    .btn-builder-save {
        flex: 1;
    }
}

@media (max-width: 480px) {

    .question-title {
        font-size: 12px;
    }

    .question-meta {
        display: none;
    }

    .remove-question {
        padding: 7px 9px;
    }

    .remove-question span {
        display: none;
    }
}
</style>

<div class="container-fluid tug-builder-page">


{{-- =====================================================
     HEADER
====================================================== --}}

<div class="builder-header">

    <div class="builder-eyebrow">
        <span></span>
        Tug Game Builder
    </div>

    <h1 class="builder-title">
        Tambah Soal Tug Game
    </h1>

    <p class="builder-description">
        Buat beberapa soal untuk permainan tarik tambang.
        Jawaban benar dan salah akan menentukan arah tarikan tali.
    </p>

</div>


{{-- =====================================================
     ALERT ERROR
====================================================== --}}

@if ($errors->any())

    <div class="builder-alert builder-alert-danger">

        <div class="builder-alert-icon">
            <i class="bi bi-exclamation-lg"></i>
        </div>

        <div>

            <strong>Terdapat kesalahan</strong>

            <ul>

                @foreach ($errors->all() as $error)

                    <li>
                        {{ $error }}
                    </li>

                @endforeach

            </ul>

        </div>

    </div>

@endif


{{-- =====================================================
     SUCCESS
====================================================== --}}

@if (session('success'))

    <div class="builder-alert builder-alert-success">

        <div class="builder-alert-icon">
            <i class="bi bi-check-lg"></i>
        </div>

        <div>
            {{ session('success') }}
        </div>

    </div>

@endif


{{-- =====================================================
     MAIN CARD
====================================================== --}}

<div class="builder-card">


    {{-- =================================================
         CARD HEADER
    ================================================== --}}

    <div class="builder-card-header">

        <div class="builder-card-icon">
            <i class="bi bi-trophy"></i>
        </div>

        <div>

            <h2 class="builder-card-title">
                Tug Game Question Builder
            </h2>

            <p class="builder-card-description">
                Buat soal dan tentukan kekuatan tarikan untuk setiap jawaban.
            </p>

        </div>

    </div>


    {{-- =================================================
         FORM
    ================================================== --}}

    <form
        method="POST"
        action="{{ route('owner.questions.store') }}"
        enctype="multipart/form-data"
        id="questionForm"
    >

        @csrf


        <div class="builder-card-body">


            {{-- =================================================
                 QUESTIONS
            ================================================== --}}

            <div id="questionsContainer"></div>


            {{-- =================================================
                 ADD QUESTION
            ================================================== --}}

            <div class="add-question-box">

                <button
                    type="button"
                    id="addQuestion"
                    class="add-question-button"
                >
                    <i class="bi bi-plus-lg"></i>
                    Tambah Soal
                </button>

                <div class="question-count-help">
                    Tambahkan soal berikutnya tanpa meninggalkan halaman.
                </div>

            </div>


        </div>


        {{-- =================================================
             FOOTER
        ================================================== --}}

        <div class="builder-footer">

            <div class="builder-total">

                <i class="bi bi-list-check"></i>

                Total soal

                <strong
                    id="questionCount"
                    class="total-badge"
                >
                    0
                </strong>

            </div>


            <div class="builder-actions">

                <a
                    href="{{ route('owner.questions.index') }}"
                    class="btn-builder-cancel"
                >
                    <i class="bi bi-arrow-left"></i>
                    Batal
                </a>

                <button
                    type="submit"
                    class="btn-builder-save"
                    id="submitButton"
                >
                    <i class="bi bi-check-lg"></i>
                    Simpan Semua Soal
                </button>

            </div>

        </div>

    </form>

</div>


</div>

{{-- =====================================================
BOOTSTRAP ICONS
===================================================== --}}

<link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
>

<script>

document.addEventListener('DOMContentLoaded', function () {

    const container =
        document.getElementById('questionsContainer');

    const addQuestionButton =
        document.getElementById('addQuestion');

    const questionCount =
        document.getElementById('questionCount');

    const questionForm =
        document.getElementById('questionForm');

    const submitButton =
        document.getElementById('submitButton');


    let questionIndex = 0;


    /* =====================================================
       LABEL PILIHAN
    ====================================================== */

    function getLabel(index) {

        let label = '';

        do {

            label =
                String.fromCharCode(
                    65 + (index % 26)
                ) + label;

            index =
                Math.floor(index / 26) - 1;

        } while (index >= 0);

        return label;
    }


    /* =====================================================
       UPDATE JUMLAH SOAL
    ====================================================== */

    function updateQuestionCount() {

        const total =
            container.querySelectorAll(
                '.question-card'
            ).length;

        questionCount.innerText = total;
    }


    /* =====================================================
       TAMBAH SOAL
    ====================================================== */

    function addQuestion() {

        const index = questionIndex;

        const html = `

            <div
                class="question-card"
                data-index="${index}"
            >

                <div class="question-header">

                    <div class="question-heading">

                        <span class="question-number">
                            ${index + 1}
                        </span>

                        <div>

                            <h3 class="question-title">
                                Pertanyaan Tug Game
                            </h3>

                            <div class="question-meta">
                                Soal ${index + 1}
                            </div>

                        </div>

                    </div>


                    <button
                        type="button"
                        class="remove-question"
                    >

                        <i class="bi bi-trash3"></i>

                        <span>
                            Hapus
                        </span>

                    </button>

                </div>


                <div class="question-body">


                    {{-- PERTANYAAN --}}

                    <div>

                        <label class="builder-label">

                            Pertanyaan

                            <span class="required-mark">
                                *
                            </span>

                        </label>

                        <textarea
                            name="questions[${index}][question]"
                            class="builder-textarea question-textarea"
                            placeholder="Tulis pertanyaan di sini..."
                            required
                        ></textarea>


                </div>


                {{-- TUG GAME SETTINGS --}}

                <div class="tug-settings">

                    <div class="tug-settings-header">

                        <i class="bi bi-arrows-left-right"></i>

                        Pengaturan Tarik Tambang

                    </div>


                    <div class="row g-3">


                        {{-- TARIKAN BENAR --}}

                        <div class="col-md-6">

                            <div class="tug-setting-box">

                                <div class="tug-setting-icon">

                                    <i class="bi bi-arrow-right"></i>

                                </div>


                                <label class="builder-label">

                                    Kekuatan Tarikan Benar

                                    <span class="required-mark">
                                        *
                                    </span>

                                </label>


                                <input
                                    type="number"
                                    name="questions[${index}][pull_power]"
                                    class="builder-input"
                                    value="10"
                                    min="1"
                                    max="100"
                                    required
                                >


                                <div class="tug-setting-help">

                                    Jika jawaban benar,
                                    tali bergerak ke arah pemain
                                    sesuai nilai kekuatan ini.

                                </div>

                            </div>

                        </div>


                        {{-- TARIKAN SALAH --}}

                        <div class="col-md-6">

                            <div class="tug-setting-box">

                                <div class="tug-setting-icon">

                                    <i class="bi bi-arrow-left"></i>

                                </div>


                                <label class="builder-label">

                                    Kekuatan Tarikan Salah

                                    <span class="required-mark">
                                        *
                                    </span>

                                </label>


                                <input
                                    type="number"
                                    name="questions[${index}][wrong_pull_power]"
                                    class="builder-input"
                                    value="10"
                                    min="0"
                                    max="100"
                                    required
                                >


                                <div class="tug-setting-help">

                                    Jika jawaban salah,
                                    tali bergerak ke arah lawan
                                    sesuai nilai kekuatan ini.

                                </div>

                            </div>

                        </div>

                    </div>

                </div>


                {{-- FILE --}}

                <div class="file-section">

                    <label class="builder-label">
                        Lampiran Soal
                    </label>


                    <input
                        type="file"
                        name="questions[${index}][image]"
                        class="builder-input question-image"
                        accept=".jpg,.jpeg,.png,.webp,.gif,.pdf"
                    >


                    <div class="file-help">

                        <i class="bi bi-info-circle"></i>

                        <span>
                            JPG, JPEG, PNG, WEBP, GIF atau PDF
                            · Maksimal 5 MB
                        </span>

                    </div>


                    <div class="file-preview">

                        <img
                            src=""
                            alt="Preview"
                        >

                        <div class="file-info"></div>

                    </div>

                </div>


                {{-- OPTIONS --}}

                <div class="option-section">

                    <div class="option-header">

                        <div class="option-heading">

                            <div class="option-icon">

                                <i class="bi bi-list-ul"></i>

                            </div>


                            <div>

                                <div class="option-title">
                                    Pilihan Jawaban
                                </div>

                                <div class="option-help">
                                    Tandai satu pilihan sebagai jawaban benar.
                                </div>

                            </div>

                        </div>


                        <button
                            type="button"
                            class="add-option"
                        >

                            <i class="bi bi-plus-lg"></i>

                            Pilihan

                        </button>

                    </div>


                    <div class="options-container"></div>

                </div>


            </div>

        </div>

    `;


    container.insertAdjacentHTML(
        'beforeend',
        html
    );


    const card =
        container.lastElementChild;


    /* DEFAULT 4 PILIHAN */

    addOption(card);
    addOption(card);
    addOption(card);
    addOption(card);


    questionIndex++;


    refreshQuestionNumbers();
    updateQuestionCount();


    /* FILE EVENT */

    const fileInput =
        card.querySelector(
            '.question-image'
        );


    fileInput.addEventListener(
        'change',
        function () {

            previewFile(
                fileInput,
                card
            );

        }
    );

}


/* =====================================================
   PREVIEW FILE
====================================================== */

function previewFile(input, card) {

    const preview =
        card.querySelector(
            '.file-preview'
        );

    const image =
        preview.querySelector('img');

    const info =
        preview.querySelector('.file-info');


    if (
        !input.files ||
        !input.files[0]
    ) {

        preview.style.display = 'none';

        image.src = '';
        info.innerText = '';

        return;
    }


    const file =
        input.files[0];


    if (
        file.size >
        5 * 1024 * 1024
    ) {

        alert(
            'Ukuran file maksimal 5 MB.'
        );

        input.value = '';

        preview.style.display = 'none';

        return;
    }


    info.innerText =
        file.name +
        ' · ' +
        formatFileSize(file.size);


    if (
        file.type.startsWith('image/')
    ) {

        const reader =
            new FileReader();


        reader.onload =
            function (event) {

                image.src =
                    event.target.result;

                image.style.display =
                    'block';

                preview.style.display =
                    'block';
            };


        reader.readAsDataURL(file);

    } else {

        image.src = '';

        image.style.display =
            'none';

        preview.style.display =
            'block';
    }

}


/* =====================================================
   FORMAT FILE SIZE
====================================================== */

function formatFileSize(bytes) {

    if (bytes === 0) {
        return '0 Bytes';
    }


    const units = [
        'Bytes',
        'KB',
        'MB',
        'GB'
    ];


    const i =
        Math.floor(
            Math.log(bytes) /
            Math.log(1024)
        );


    return (
        parseFloat(
            (
                bytes /
                Math.pow(1024, i)
            ).toFixed(2)
        )
        +
        ' ' +
        units[i]
    );
}


/* =====================================================
   TAMBAH PILIHAN
====================================================== */

function addOption(card) {

    const optionsContainer =
        card.querySelector(
            '.options-container'
        );


    const index =
        optionsContainer.querySelectorAll(
            '.option-item'
        ).length;


    const label =
        getLabel(index);


    const currentQuestionIndex =
        card.dataset.index;


    const html = `

        <div class="option-item">

            <div class="option-label">
                ${label}
            </div>


            <input
                type="text"
                name="questions[${currentQuestionIndex}][options][]"
                class="builder-input"
                placeholder="Tulis pilihan ${label}..."
                required
            >


            <label class="correct-answer">

                <input
                    type="radio"
                    name="questions[${currentQuestionIndex}][correct_answer]"
                    value="${index}"
                    required
                >

                <i class="bi bi-check-circle"></i>

                Benar

            </label>


            <button
                type="button"
                class="remove-option"
                title="Hapus pilihan"
            >

                <i class="bi bi-trash3"></i>

            </button>

        </div>

    `;


    optionsContainer.insertAdjacentHTML(
        'beforeend',
        html
    );
}


/* =====================================================
   NOMOR SOAL
====================================================== */

function refreshQuestionNumbers() {

    const cards =
        container.querySelectorAll(
            '.question-card'
        );


    cards.forEach(
        function (card, index) {

            card.querySelector(
                '.question-number'
            ).innerText =
                index + 1;


            const meta =
                card.querySelector(
                    '.question-meta'
                );


            if (meta) {

                meta.innerText =
                    'Soal ' +
                    (index + 1);
            }

        }
    );


    updateQuestionCount();
}


/* =====================================================
   REFRESH PILIHAN
====================================================== */

function refreshOptionValues(card) {

    const options =
        card.querySelectorAll(
            '.option-item'
        );


    const currentQuestionIndex =
        card.dataset.index;


    options.forEach(
        function (option, index) {

            const label =
                getLabel(index);


            option.querySelector(
                '.option-label'
            ).innerText =
                label;


            const input =
                option.querySelector(
                    'input[type="text"]'
                );


            input.placeholder =
                'Tulis pilihan ' +
                label +
                '...';


            const radio =
                option.querySelector(
                    'input[type="radio"]'
                );


            radio.value =
                index;


            radio.name =
                `questions[${currentQuestionIndex}][correct_answer]`;

        }
    );
}


/* =====================================================
   TAMBAH SOAL
====================================================== */

addQuestionButton.addEventListener(
    'click',
    function () {

        addQuestion();


        const cards =
            container.querySelectorAll(
                '.question-card'
            );


        const lastCard =
            cards[cards.length - 1];


        lastCard.scrollIntoView({
            behavior: 'smooth',
            block: 'start'
        });

    }
);


/* =====================================================
   CLICK EVENT
====================================================== */

container.addEventListener(
    'click',
    function (event) {


        /* HAPUS SOAL */

        const removeQuestionButton =
            event.target.closest(
                '.remove-question'
            );


        if (removeQuestionButton) {

            const cards =
                container.querySelectorAll(
                    '.question-card'
                );


            if (cards.length <= 1) {

                alert(
                    'Minimal harus ada 1 soal.'
                );

                return;
            }


            removeQuestionButton
                .closest('.question-card')
                .remove();


            refreshQuestionNumbers();

            return;
        }


        /* TAMBAH PILIHAN */

        const addOptionButton =
            event.target.closest(
                '.add-option'
            );


        if (addOptionButton) {

            const card =
                addOptionButton.closest(
                    '.question-card'
                );


            addOption(card);

            return;
        }


        /* HAPUS PILIHAN */

        const removeOptionButton =
            event.target.closest(
                '.remove-option'
            );


        if (removeOptionButton) {

            const card =
                removeOptionButton.closest(
                    '.question-card'
                );


            const options =
                card.querySelectorAll(
                    '.option-item'
                );


            if (options.length <= 2) {

                alert(
                    'Minimal harus ada 2 pilihan.'
                );

                return;
            }


            const currentOption =
                removeOptionButton.closest(
                    '.option-item'
                );


            const radio =
                currentOption.querySelector(
                    'input[type="radio"]'
                );


            const wasChecked =
                radio.checked;


            currentOption.remove();


            refreshOptionValues(card);


            if (wasChecked) {

                card.querySelectorAll(
                    'input[type="radio"]'
                ).forEach(
                    function (radio) {

                        radio.checked = false;

                    }
                );

            }

        }

    }
);


/* =====================================================
   VALIDASI SUBMIT
====================================================== */

questionForm.addEventListener(
    'submit',
    function (event) {

        const cards =
            container.querySelectorAll(
                '.question-card'
            );


        if (cards.length === 0) {

            event.preventDefault();

            alert(
                'Minimal harus ada 1 soal.'
            );

            return;
        }


        let valid = true;


        cards.forEach(
            function (card) {


                const options =
                    card.querySelectorAll(
                        '.options-container .option-item'
                    );


                if (options.length < 2) {

                    valid = false;

                    alert(
                        'Minimal harus ada 2 pilihan jawaban.'
                    );

                    return;
                }


                const checked =
                    card.querySelector(
                        '.options-container input[type="radio"]:checked'
                    );


                if (!checked) {

                    valid = false;

                    alert(
                        'Silakan pilih jawaban yang benar pada setiap soal.'
                    );

                    return;
                }


                const emptyOption =
                    Array.from(
                        card.querySelectorAll(
                            '.options-container input[type="text"]'
                        )
                    ).some(
                        function (input) {

                            return (
                                input.value.trim() === ''
                            );

                        }
                    );


                if (emptyOption) {

                    valid = false;

                    alert(
                        'Semua pilihan jawaban harus diisi.'
                    );

                }


                const question =
                    card.querySelector(
                        '.question-textarea'
                    );


                if (
                    !question ||
                    question.value.trim() === ''
                ) {

                    valid = false;

                    alert(
                        'Pertanyaan tidak boleh kosong.'
                    );

                }

            }
        );


        if (!valid) {

            event.preventDefault();

            return;
        }


        /* DOUBLE SUBMIT */

        submitButton.disabled = true;


        submitButton.innerHTML =
            '<i class="bi bi-hourglass-split"></i> Menyimpan...';

    }
);


/* =====================================================
   SOAL PERTAMA
====================================================== */

addQuestion();


});

</script>

@endsection
