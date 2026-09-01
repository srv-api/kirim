@extends('dashboard')

@section('content')

<style>
    .game-setting-page {
        max-width: 850px;
        margin: 0 auto;
        padding: 30px 20px;
    }

    .game-setting-header {
        margin-bottom: 25px;
    }

    .game-setting-header h1 {
        margin: 0;
        font-size: 28px;
        font-weight: 900;
        color: #111827;
    }

    .game-setting-header p {
        margin: 7px 0 0;
        color: #6b7280;
        font-size: 14px;
    }

    .game-setting-card {
        background: #fff;
        border: 1px solid #e5e7eb;
        border-radius: 18px;
        padding: 25px;
        box-shadow: 0 8px 30px rgba(15, 23, 42, .05);
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

    .form-input,
    .form-select {
        width: 100%;
        height: 48px;
        padding: 0 14px;
        border: 1px solid #d1d5db;
        border-radius: 11px;
        outline: none;
        font-size: 14px;
        color: #111827;
        background: #fff;
    }

    .form-input:focus,
    .form-select:focus {
        border-color: #111827;
    }

    .players {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 15px;
    }

    .info {
        margin-bottom: 22px;
        padding: 15px;
        border-radius: 12px;
        background: #f8fafc;
        border: 1px solid #e5e7eb;
    }

    .info strong {
        display: block;
        margin-bottom: 4px;
        color: #111827;
    }

    .info span {
        color: #6b7280;
        font-size: 13px;
    }

    .submit-button {
        width: 100%;
        height: 50px;
        border: 0;
        border-radius: 11px;
        background: #111827;
        color: #fff;
        font-size: 14px;
        font-weight: 800;
        cursor: pointer;
    }

    .submit-button:hover {
        opacity: .9;
    }

    .error {
        margin-bottom: 20px;
        padding: 13px 15px;
        border-radius: 10px;
        background: #fef2f2;
        border: 1px solid #fecaca;
        color: #991b1b;
        font-size: 13px;
    }

    @media(max-width: 650px) {
        .players {
            grid-template-columns: 1fr;
        }
    }
</style>

<div class="game-setting-page">

    <div class="game-setting-header">
        <h1>🪢 Tarik Tambang</h1>

        <p>
            Atur dua pemain dan waktu permainan sebelum memulai.
        </p>
    </div>

    <div class="game-setting-card">

        @if(session('error'))
            <div class="error">
                {{ session('error') }}
            </div>
        @endif

        @if($errors->any())
            <div class="error">
                <strong>Periksa data berikut:</strong>

                <ul style="margin:8px 0 0;padding-left:20px;">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="info">
            <strong>Pengaturan Permainan</strong>

            <span>
                Game menggunakan dua pemain.
                Jawaban benar akan menarik tali ke arah pemain.
            </span>
        </div>

        <form
            method="POST"
            action="{{ route('owner.tug-game.create') }}"
        >
            @csrf

            <div class="players">

                <div class="form-group">

                    <label class="form-label">
                        Pemain 1
                    </label>

                    <input
                        type="text"
                        name="player_one"
                        class="form-input"
                        value="{{ old('player_one') }}"
                        placeholder="Nama pemain 1"
                        maxlength="100"
                        required
                    >

                </div>

                <div class="form-group">

                    <label class="form-label">
                        Pemain 2
                    </label>

                    <input
                        type="text"
                        name="player_two"
                        class="form-input"
                        value="{{ old('player_two') }}"
                        placeholder="Nama pemain 2"
                        maxlength="100"
                        required
                    >

                </div>

            </div>

            <div class="form-group">

                <label class="form-label">
                    Waktu Permainan
                </label>

                <select
                    name="duration"
                    class="form-select"
                    required
                >
                    <option
                        value="30"
                        {{ old('duration') == 30 ? 'selected' : '' }}
                    >
                        30 detik
                    </option>

                    <option
                        value="60"
                        {{ old('duration', 60) == 60 ? 'selected' : '' }}
                    >
                        60 detik
                    </option>

                    <option
                        value="90"
                        {{ old('duration') == 90 ? 'selected' : '' }}
                    >
                        90 detik
                    </option>

                    <option
                        value="120"
                        {{ old('duration') == 120 ? 'selected' : '' }}
                    >
                        2 menit
                    </option>

                    <option
                        value="180"
                        {{ old('duration') == 180 ? 'selected' : '' }}
                    >
                        3 menit
                    </option>

                    <option
                        value="300"
                        {{ old('duration') == 300 ? 'selected' : '' }}
                    >
                        5 menit
                    </option>
                </select>

            </div>

            <button
                type="submit"
                class="submit-button"
            >
                Mulai Permainan
            </button>

        </form>

    </div>

</div>

@endsection