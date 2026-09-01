@extends('dashboard')

@section('content')

<style>

    .tug-create-page {
        padding: 10px 0 40px;
    }

    .tug-create-header {
        margin-bottom: 24px;
    }

    .tug-create-header h1 {
        margin: 0;
        font-size: 28px;
        font-weight: 900;
        color: #111827;
    }

    .tug-create-header p {
        margin: 7px 0 0;
        color: #6b7280;
        font-size: 14px;
    }

    .tug-form-card {
        background: #fff;
        border: 1px solid #e5e7eb;
        border-radius: 18px;
        padding: 26px;
        box-shadow: 0 8px 25px rgba(15, 23, 42, .05);
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-label {
        display: block;
        margin-bottom: 7px;
        font-size: 13px;
        font-weight: 800;
        color: #111827;
    }

    .form-control {
        width: 100%;
        padding: 12px 14px;
        border: 1px solid #d1d5db;
        border-radius: 11px;
        outline: none;
        font-size: 14px;
        background: #fff;
        transition: .2s ease;
    }

    .form-control:focus {
        border-color: #111827;
        box-shadow: 0 0 0 3px rgba(17, 24, 39, .06);
    }

    textarea.form-control {
        min-height: 120px;
        resize: vertical;
    }

    .answers-grid {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 16px;
    }

    .settings-grid {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 16px;
    }

    .section-title {
        margin: 28px 0 16px;
        padding-bottom: 10px;
        border-bottom: 1px solid #e5e7eb;
        font-size: 15px;
        font-weight: 900;
        color: #111827;
    }

    .time-help {
        margin-top: 6px;
        color: #6b7280;
        font-size: 12px;
    }

    .checkbox-row {
        display: flex;
        align-items: center;
        gap: 9px;
        min-height: 46px;
    }

    .checkbox-row input {
        width: 17px;
        height: 17px;
    }

    .checkbox-row label {
        font-size: 14px;
        font-weight: 700;
        color: #111827;
        cursor: pointer;
    }

    .error-message {
        margin-top: 6px;
        font-size: 12px;
        color: #dc2626;
    }

    .form-actions {
        display: flex;
        justify-content: flex-end;
        gap: 10px;
        margin-top: 28px;
        padding-top: 20px;
        border-top: 1px solid #e5e7eb;
    }

    .btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        min-height: 42px;
        padding: 0 18px;
        border-radius: 10px;
        text-decoration: none;
        border: 0;
        cursor: pointer;
        font-size: 13px;
        font-weight: 800;
    }

    .btn-secondary {
        background: #f3f4f6;
        color: #111827;
    }

    .btn-primary {
        background: #111827;
        color: #fff;
    }

    @media (max-width: 700px) {

        .tug-form-card {
            padding: 18px;
        }

        .answers-grid,
        .settings-grid {
            grid-template-columns: 1fr;
        }

        .form-actions {
            flex-direction: column-reverse;
        }

        .btn {
            width: 100%;
        }
    }

</style>

<div class="tug-create-page">

    <div class="tug-create-header">
        <h1>Tambah Soal Tarik Tambang</h1>
        <p>
            Buat pertanyaan dan atur waktu yang diberikan kepada pemain.
        </p>
    </div>

    <div class="tug-form-card">

        <form
            action="{{ route('owner.tug-questions.store') }}"
            method="POST"
        >

            @csrf

            {{-- SOAL --}}
            <div class="form-group">

                <label class="form-label">
                    Pertanyaan
                </label>

                <textarea
                    name="question"
                    class="form-control"
                    placeholder="Masukkan pertanyaan..."
                    required
                >{{ old('question') }}</textarea>

                @error('question')
                    <div class="error-message">
                        {{ $message }}
                    </div>
                @enderror

            </div>


            {{-- JAWABAN --}}
            <div class="section-title">
                Pilihan Jawaban
            </div>

            <div class="answers-grid">

                <div class="form-group">

                    <label class="form-label">
                        Jawaban A
                    </label>

                    <input
                        type="text"
                        name="option_a"
                        class="form-control"
                        value="{{ old('option_a') }}"
                        placeholder="Jawaban A"
                        required
                    >

                    @error('option_a')
                        <div class="error-message">
                            {{ $message }}
                        </div>
                    @enderror

                </div>


                <div class="form-group">

                    <label class="form-label">
                        Jawaban B
                    </label>

                    <input
                        type="text"
                        name="option_b"
                        class="form-control"
                        value="{{ old('option_b') }}"
                        placeholder="Jawaban B"
                        required
                    >

                    @error('option_b')
                        <div class="error-message">
                            {{ $message }}
                        </div>
                    @enderror

                </div>


                <div class="form-group">

                    <label class="form-label">
                        Jawaban C
                    </label>

                    <input
                        type="text"
                        name="option_c"
                        class="form-control"
                        value="{{ old('option_c') }}"
                        placeholder="Jawaban C"
                        required
                    >

                    @error('option_c')
                        <div class="error-message">
                            {{ $message }}
                        </div>
                    @enderror

                </div>


                <div class="form-group">

                    <label class="form-label">
                        Jawaban D
                    </label>

                    <input
                        type="text"
                        name="option_d"
                        class="form-control"
                        value="{{ old('option_d') }}"
                        placeholder="Jawaban D"
                        required
                    >

                    @error('option_d')
                        <div class="error-message">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

            </div>


            {{-- SETTING --}}
            <div class="section-title">
                Pengaturan Game
            </div>

            <div class="settings-grid">

                <div class="form-group">

                    <label class="form-label">
                        Jawaban yang benar
                    </label>

                    <select
                        name="correct_answer"
                        class="form-control"
                        required
                    >

                        <option value="">
                            Pilih jawaban benar
                        </option>

                        <option
                            value="option_a"
                            {{ old('correct_answer') === 'option_a' ? 'selected' : '' }}
                        >
                            Jawaban A
                        </option>

                        <option
                            value="option_b"
                            {{ old('correct_answer') === 'option_b' ? 'selected' : '' }}
                        >
                            Jawaban B
                        </option>

                        <option
                            value="option_c"
                            {{ old('correct_answer') === 'option_c' ? 'selected' : '' }}
                        >
                            Jawaban C
                        </option>

                        <option
                            value="option_d"
                            {{ old('correct_answer') === 'option_d' ? 'selected' : '' }}
                        >
                            Jawaban D
                        </option>

                    </select>

                    @error('correct_answer')
                        <div class="error-message">
                            {{ $message }}
                        </div>
                    @enderror

                </div>


                <div class="form-group">

                    <label class="form-label">
                        Urutan Soal
                    </label>

                    <input
                        type="number"
                        name="order"
                        class="form-control"
                        value="{{ old('order', 0) }}"
                        min="0"
                    >

                </div>


                <div class="form-group">

                    <label class="form-label">
                        Waktu Menjawab
                    </label>

                    <input
                        type="number"
                        name="time_limit"
                        class="form-control"
                        value="{{ old('time_limit', 30) }}"
                        min="5"
                        max="600"
                        required
                    >

                    <div class="time-help">
                        Masukkan waktu dalam detik. Contoh: 30 = 30 detik.
                    </div>

                    @error('time_limit')
                        <div class="error-message">
                            {{ $message }}
                        </div>
                    @enderror

                </div>


                <div class="form-group">

                    <label class="form-label">
                        Status
                    </label>

                    <div class="checkbox-row">

                        <input
                            type="checkbox"
                            id="is_active"
                            name="is_active"
                            value="1"
                            {{ old('is_active', true) ? 'checked' : '' }}
                        >

                        <label for="is_active">
                            Aktifkan soal
                        </label>

                    </div>

                </div>

            </div>


            {{-- BUTTON --}}
            <div class="form-actions">

                <a
                    href="{{ route('owner.tug-questions.index') }}"
                    class="btn btn-secondary"
                >
                    Batal
                </a>

                <button
                    type="submit"
                    class="btn btn-primary"
                >
                    Simpan Soal
                </button>

            </div>

        </form>

    </div>

</div>

@endsection