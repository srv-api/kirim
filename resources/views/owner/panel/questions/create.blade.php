@extends('dashboard')

@section('content')

<style>
    .question-builder {
        max-width: 1100px;
        margin: 0 auto;
    }

    .page-header {
        border-bottom: 1px solid #e9ecef;
        padding-bottom: 20px;
        margin-bottom: 24px;
    }

    .page-title {
        font-size: 24px;
        font-weight: 700;
        color: #212529;
        margin-bottom: 4px;
    }

    .page-description {
        color: #6c757d;
        font-size: 14px;
        margin: 0;
    }

    .builder-section {
        background: #fff;
        border: 1px solid #e5e7eb;
        border-radius: 10px;
        margin-bottom: 18px;
    }

    .section-header {
        padding: 16px 20px;
        border-bottom: 1px solid #edf0f2;
        background: #fafafa;
        border-radius: 10px 10px 0 0;
    }

    .section-header h6 {
        margin: 0;
        font-weight: 600;
        font-size: 14px;
    }

    .section-body {
        padding: 20px;
    }

    .question-card {
        background: #fff;
        border: 1px solid #dfe3e7;
        border-radius: 10px;
        margin-bottom: 18px;
        overflow: hidden;
    }

    .question-header {
        background: #f8f9fa;
        border-bottom: 1px solid #e5e7eb;
        padding: 14px 18px;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .question-title {
        display: flex;
        align-items: center;
        gap: 10px;
        font-weight: 600;
        font-size: 15px;
    }

    .question-number {
        width: 30px;
        height: 30px;
        border-radius: 6px;
        background: #212529;
        color: #fff;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 13px;
        font-weight: 700;
    }

    .question-body {
        padding: 20px;
    }

    .form-label {
        font-size: 13px;
        font-weight: 600;
        color: #343a40;
        margin-bottom: 7px;
    }

    .form-control,
    .form-select {
        border-color: #dfe3e7;
        border-radius: 7px;
        font-size: 14px;
        min-height: 42px;
    }

    textarea.form-control {
        min-height: 110px;
        resize: vertical;
    }

    .form-control:focus,
    .form-select:focus {
        border-color: #adb5bd;
        box-shadow: 0 0 0 3px rgba(33, 37, 41, .06);
    }

    .option-section {
        margin-top: 20px;
        border-top: 1px solid #edf0f2;
        padding-top: 20px;
    }

    .option-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 12px;
    }

    .option-title {
        font-size: 14px;
        font-weight: 600;
        margin: 0;
    }

    .option-help {
        font-size: 12px;
        color: #868e96;
        margin-top: 3px;
    }

    .option-item {
        display: flex;
        align-items: center;
        gap: 10px;
        border: 1px solid #e1e5e8;
        border-radius: 7px;
        padding: 8px 10px;
        margin-bottom: 8px;
        background: #fff;
    }

    .option-label {
        width: 30px;
        height: 30px;
        flex: 0 0 30px;
        border: 1px solid #dee2e6;
        border-radius: 5px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 12px;
        font-weight: 700;
        color: #495057;
        background: #f8f9fa;
    }

    .option-item .form-control {
        min-height: 38px;
    }

    .correct-answer {
        display: flex;
        align-items: center;
        gap: 6px;
        white-space: nowrap;
        font-size: 12px;
        color: #495057;
    }

    .correct-answer input {
        margin: 0;
    }

    .remove-option {
        width: 32px;
        height: 32px;
        padding: 0;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .add-question-box {
        border: 1px dashed #cfd4da;
        border-radius: 9px;
        padding: 18px;
        text-align: center;
        background: #fafafa;
        margin-bottom: 20px;
    }

    .add-question-box button {
        font-weight: 500;
    }

    .bottom-actions {
        position: sticky;
        bottom: 0;
        background: rgba(255,255,255,.96);
        border-top: 1px solid #e5e7eb;
        padding: 14px 0;
        z-index: 20;
        backdrop-filter: blur(6px);
    }

    .question-count {
        font-size: 13px;
        color: #6c757d;
    }

    .file-preview {
        margin-top: 10px;
        display: none;
    }

    .file-preview img {
        max-width: 180px;
        max-height: 120px;
        object-fit: cover;
        border-radius: 7px;
        border: 1px solid #dee2e6;
    }

    .file-info {
        font-size: 12px;
        color: #6c757d;
        margin-top: 5px;
    }

    @media (max-width: 768px) {
        .question-builder {
            width: 100%;
        }

        .question-body,
        .section-body {
            padding: 15px;
        }

        .option-item {
            flex-wrap: wrap;
        }

        .correct-answer {
            margin-left: 40px;
        }

        .question-header {
            padding: 12px 14px;
        }

        .bottom-actions .d-flex {
            flex-wrap: wrap;
            gap: 10px;
        }
    }
</style>

<div class="container-fluid">

    <div class="question-builder">

        {{-- ==========================================================
             HEADER
        =========================================================== --}}
        <div class="page-header d-flex justify-content-between align-items-center">

            <div>
                <div class="page-title">
                    Tambah Soal
                </div>

                <p class="page-description">
                    Buat beberapa soal sekaligus untuk assessment.
                </p>
            </div>

            <a
                href="{{ route('owner.questions.index') }}"
                class="btn btn-outline-secondary"
            >
                ← Kembali
            </a>

        </div>


        {{-- ==========================================================
             ERROR
        =========================================================== --}}
        @if ($errors->any())

            <div class="alert alert-danger mb-4">

                <div class="fw-semibold mb-2">
                    Terdapat kesalahan:
                </div>

                <ul class="mb-0 ps-3">

                    @foreach ($errors->all() as $error)

                        <li>
                            {{ $error }}
                        </li>

                    @endforeach

                </ul>

            </div>

        @endif


        {{-- ==========================================================
             SUCCESS
        =========================================================== --}}
        @if (session('success'))

            <div class="alert alert-success mb-4">
                {{ session('success') }}
            </div>

        @endif


        {{-- ==========================================================
             FORM
        =========================================================== --}}
        <form
            method="POST"
            action="{{ route('owner.questions.store') }}"
            enctype="multipart/form-data"
            id="questionForm"
        >

            @csrf


            {{-- ======================================================
                 ASSESSMENT
            ======================================================= --}}
            <div class="builder-section">

                <div class="section-header">

                    <h6>
                        Assessment
                    </h6>

                </div>


                <div class="section-body">

                    <label class="form-label">
                        Pilih Assessment
                    </label>

                    <select
                        name="assessment_id"
                        class="form-select"
                        required
                    >

                        <option value="">
                            Pilih assessment...
                        </option>

                        @foreach($assessments as $assessment)

                            <option
                                value="{{ $assessment->id }}"
                                @selected(old('assessment_id') == $assessment->id)
                            >
                                {{ $assessment->title }}
                            </option>

                        @endforeach

                    </select>

                </div>

            </div>


            {{-- ======================================================
                 SOAL
            ======================================================= --}}
            <div id="questionsContainer"></div>


            {{-- ======================================================
                 TAMBAH SOAL
            ======================================================= --}}
            <div class="add-question-box">

                <button
                    type="button"
                    id="addQuestion"
                    class="btn btn-outline-dark"
                >
                    + Tambah Soal
                </button>

                <div class="question-count mt-2">
                    Buat soal berikutnya tanpa meninggalkan halaman.
                </div>

            </div>


            {{-- ======================================================
                 ACTION
            ======================================================= --}}
            <div class="bottom-actions">

                <div class="d-flex justify-content-between align-items-center">

                    <div class="question-count">

                        Total soal:

                        <strong id="questionCount">
                            0
                        </strong>

                    </div>


                    <div class="d-flex gap-2">

                        <a
                            href="{{ route('owner.questions.index') }}"
                            class="btn btn-light border"
                        >
                            Batal
                        </a>

                        <button
                            type="submit"
                            class="btn btn-dark px-4"
                            id="submitButton"
                        >
                            Simpan Semua Soal
                        </button>

                    </div>

                </div>

            </div>

        </form>

    </div>

</div>


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


    /* ==========================================================
       LABEL PILIHAN
    ========================================================== */

    function getLabel(index)
    {
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


    /* ==========================================================
       UPDATE JUMLAH SOAL
    ========================================================== */

    function updateQuestionCount()
    {
        const total =
            container.querySelectorAll(
                '.question-card'
            ).length;

        questionCount.innerText = total;
    }


    /* ==========================================================
       TAMBAH SOAL
    ========================================================== */

    function addQuestion()
    {
        const index = questionIndex;

        const html = `

            <div
                class="question-card"
                data-index="${index}"
            >

                {{-- HEADER SOAL --}}
                <div class="question-header">

                    <div class="question-title">

                        <span class="question-number">
                            ${index + 1}
                        </span>

                        <span>
                            Pertanyaan
                        </span>

                    </div>


                    <button
                        type="button"
                        class="btn btn-sm btn-outline-danger remove-question"
                    >
                        Hapus
                    </button>

                </div>


                {{-- BODY --}}
                <div class="question-body">


                    {{-- TIPE / NILAI / URUTAN --}}
                    <div class="row g-3">

                        <div class="col-md-6">

                            <label class="form-label">
                                Tipe Soal
                            </label>

                            <select
                                name="questions[${index}][type]"
                                class="form-select question-type"
                            >

                                <option value="multiple_choice">
                                    Pilihan Ganda
                                </option>

                                <option value="free_text">
                                    Free Text
                                </option>

                            </select>

                        </div>


                        <div class="col-md-3">

                            <label class="form-label">
                                Nilai
                            </label>

                            <input
                                type="number"
                                name="questions[${index}][score]"
                                class="form-control"
                                value="1"
                                min="1"
                                required
                            >

                        </div>


                        <div class="col-md-3">

                            <label class="form-label">
                                Urutan
                            </label>

                            <input
                                type="number"
                                name="questions[${index}][order]"
                                class="form-control question-order"
                                value="${index + 1}"
                                min="1"
                                required
                            >

                        </div>

                    </div>


                    {{-- PERTANYAAN --}}
                    <div class="mt-3">

                        <label class="form-label">
                            Pertanyaan
                        </label>

                        <textarea
                            name="questions[${index}][question]"
                            class="form-control"
                            rows="4"
                            placeholder="Tulis pertanyaan di sini..."
                            required
                        ></textarea>

                    </div>


                    {{-- FILE / GAMBAR --}}
                    <div class="mt-3">

                        <label class="form-label">
                            File / Gambar Soal
                        </label>

                        <input
                            type="file"
                            name="questions[${index}][image]"
                            class="form-control question-image"
                            accept=".jpg,.jpeg,.png,.webp,.gif,.pdf"
                        >

                        <div class="form-text">
                            JPG, JPEG, PNG, WEBP, GIF atau PDF.
                            Maksimal 5 MB.
                        </div>


                        {{-- PREVIEW --}}
                        <div class="file-preview">

                            <img
                                src=""
                                alt="Preview"
                            >

                            <div class="file-info"></div>

                        </div>

                    </div>


                    {{-- PILIHAN --}}
                    <div class="option-section">

                        <div class="option-header">

                            <div>

                                <div class="option-title">
                                    Pilihan Jawaban
                                </div>

                                <div class="option-help">
                                    Tandai salah satu pilihan sebagai jawaban benar.
                                </div>

                            </div>


                            <button
                                type="button"
                                class="btn btn-sm btn-outline-secondary add-option"
                            >
                                + Pilihan
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


        /*
        |----------------------------------------------------------
        | Default 4 pilihan
        |----------------------------------------------------------
        */

        addOption(card);
        addOption(card);
        addOption(card);
        addOption(card);


        questionIndex++;

        refreshQuestionNumbers();

        updateQuestionCount();


        /*
        |----------------------------------------------------------
        | Event file
        |----------------------------------------------------------
        */

        const fileInput =
            card.querySelector('.question-image');

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


    /* ==========================================================
       PREVIEW FILE
    ========================================================== */

    function previewFile(input, card)
    {
        const preview =
            card.querySelector('.file-preview');

        const image =
            preview.querySelector('img');

        const info =
            preview.querySelector('.file-info');

        if (!input.files || !input.files[0]) {

            preview.style.display = 'none';

            image.src = '';

            info.innerText = '';

            return;
        }


        const file =
            input.files[0];


        /*
        |----------------------------------------------------------
        | Validasi ukuran 5 MB
        |----------------------------------------------------------
        */

        if (file.size > 5 * 1024 * 1024) {

            alert(
                'Ukuran file maksimal 5 MB.'
            );

            input.value = '';

            preview.style.display = 'none';

            return;
        }


        info.innerText =
            file.name +
            ' (' +
            formatFileSize(file.size) +
            ')';


        /*
        |----------------------------------------------------------
        | Preview gambar
        |----------------------------------------------------------
        */

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


    /* ==========================================================
       FORMAT UKURAN FILE
    ========================================================== */

    function formatFileSize(bytes)
    {
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
                (bytes / Math.pow(1024, i))
                    .toFixed(2)
            )
            + ' '
            + units[i]
        );
    }


    /* ==========================================================
       TAMBAH PILIHAN
    ========================================================== */

    function addOption(card)
    {
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
                    class="form-control"
                    placeholder="Pilihan ${label}"
                    required
                >


                <label class="correct-answer">

                    <input
                        type="radio"
                        name="questions[${currentQuestionIndex}][correct_answer]"
                        value="${index}"
                        required
                    >

                    Benar

                </label>


                <button
                    type="button"
                    class="btn btn-sm btn-outline-danger remove-option"
                    title="Hapus pilihan"
                >
                    ×
                </button>

            </div>

        `;


        optionsContainer.insertAdjacentHTML(
            'beforeend',
            html
        );
    }


    /* ==========================================================
       NOMOR SOAL
    ========================================================== */

    function refreshQuestionNumbers()
    {
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


                card.querySelector(
                    '.question-order'
                ).value =
                    index + 1;

            }
        );


        updateQuestionCount();
    }


    /* ==========================================================
       REFRESH PILIHAN
    ========================================================== */

    function refreshOptionValues(card)
    {
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
                    'Pilihan ' + label;


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


    /* ==========================================================
       EVENT TAMBAH SOAL
    ========================================================== */

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


    /* ==========================================================
       EVENT CLICK
    ========================================================== */

    container.addEventListener(
        'click',
        function (event) {


            /* ---------------------------------------------------
               HAPUS SOAL
            --------------------------------------------------- */

            if (
                event.target.classList.contains(
                    'remove-question'
                )
            ) {

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


                event.target
                    .closest('.question-card')
                    .remove();


                refreshQuestionNumbers();

            }


            /* ---------------------------------------------------
               TAMBAH PILIHAN
            --------------------------------------------------- */

            if (
                event.target.classList.contains(
                    'add-option'
                )
            ) {

                const card =
                    event.target.closest(
                        '.question-card'
                    );


                addOption(card);

            }


            /* ---------------------------------------------------
               HAPUS PILIHAN
            --------------------------------------------------- */

            if (
                event.target.classList.contains(
                    'remove-option'
                )
            ) {

                const card =
                    event.target.closest(
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
                    event.target.closest(
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


                /*
                |--------------------------------------------------
                | Jika jawaban benar dihapus
                |--------------------------------------------------
                */

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


    /* ==========================================================
       PERUBAHAN TIPE SOAL
    ========================================================== */

    container.addEventListener(
        'change',
        function (event) {

            if (
                !event.target.classList.contains(
                    'question-type'
                )
            ) {
                return;
            }


            const card =
                event.target.closest(
                    '.question-card'
                );


            const wrapper =
                card.querySelector(
                    '.option-section'
                );


            const textInputs =
                card.querySelectorAll(
                    '.options-container input[type="text"]'
                );


            const radios =
                card.querySelectorAll(
                    '.options-container input[type="radio"]'
                );


            /*
            |------------------------------------------------------
            | FREE TEXT
            |------------------------------------------------------
            */

            if (
                event.target.value ===
                'free_text'
            ) {

                wrapper.style.display =
                    'none';


                textInputs.forEach(
                    function (input) {

                        input.required =
                            false;

                    }
                );


                radios.forEach(
                    function (radio) {

                        radio.required =
                            false;

                        radio.checked =
                            false;

                    }
                );

            }


            /*
            |------------------------------------------------------
            | MULTIPLE CHOICE
            |------------------------------------------------------
            */

            else {

                wrapper.style.display =
                    'block';


                textInputs.forEach(
                    function (input) {

                        input.required =
                            true;

                    }
                );


                radios.forEach(
                    function (radio) {

                        radio.required =
                            true;

                    }
                );

            }

        }
    );


    /* ==========================================================
       VALIDASI SEBELUM SUBMIT
    ========================================================== */

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

                    const type =
                        card.querySelector(
                            '.question-type'
                        ).value;


                    /*
                    |------------------------------------------------
                    | Multiple choice
                    |------------------------------------------------
                    */

                    if (
                        type ===
                        'multiple_choice'
                    ) {

                        const options =
                            card.querySelectorAll(
                                '.options-container .option-item'
                            );


                        if (
                            options.length < 2
                        ) {

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
                                'Silakan pilih jawaban yang benar pada setiap soal pilihan ganda.'
                            );

                            return;
                        }

                    }

                }
            );


            if (!valid) {

                event.preventDefault();

                return;
            }


            /*
            |------------------------------------------------------
            | Cegah double submit
            |------------------------------------------------------
            */

            submitButton.disabled =
                true;

            submitButton.innerText =
                'Menyimpan...';

        }
    );


    /* ==========================================================
       SOAL PERTAMA
    ========================================================== */

    addQuestion();

});
</script>

@endsection