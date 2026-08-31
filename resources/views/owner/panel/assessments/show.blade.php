@extends('dashboard')

@section('content')

<style>
/* =====================================================
   QR CODE ACCESS
====================================================== */

.qr-access-box {
    margin-top: 18px;

    padding-top: 18px;

    border-top: 1px solid var(--border-soft);
}

.qr-access-header {
    margin-bottom: 15px;
}

.qr-access-title {
    display: flex;
    align-items: center;

    gap: 7px;

    color: var(--text);

    font-size: 12px;
    font-weight: 700;
}

.qr-access-title i {
    font-size: 14px;
}

.qr-access-description {
    margin-top: 4px;

    color: var(--muted);

    font-size: 10px;

    line-height: 1.6;
}

.qr-code-wrapper {
    display: flex;
    align-items: center;
    justify-content: center;

    margin-bottom: 14px;

    padding: 18px;

    border: 1px solid var(--border);

    border-radius: 11px;

    background: #fafafa;
}

#assessmentQrCode {
    display: flex;
    align-items: center;
    justify-content: center;

    width: 180px;
    height: 180px;

    padding: 8px;

    background: #fff;
}

#assessmentQrCode img,
#assessmentQrCode canvas {
    max-width: 100%;
    max-height: 100%;
}

@media (max-width: 768px) {

    #assessmentQrCode {
        width: 160px;
        height: 160px;
    }

}
    /* =====================================================
       ASSESSMENT DETAIL
    ====================================================== */

    .assessment-detail-page {
        --text: #111827;
        --text-secondary: #374151;
        --muted: #6b7280;
        --subtle: #9ca3af;
        --border: #e5e7eb;
        --border-soft: #f1f5f9;
        --surface: #ffffff;
        --surface-soft: #f8fafc;

        padding-bottom: 40px;
    }


    /* =====================================================
       HEADER
    ====================================================== */

    .detail-header {
        margin-bottom: 28px;
    }

    .detail-eyebrow {
        display: flex;
        align-items: center;
        gap: 8px;

        margin-bottom: 8px;

        color: var(--subtle);

        font-size: 11px;
        font-weight: 700;

        letter-spacing: .08em;
        text-transform: uppercase;
    }

    .detail-eyebrow span {
        width: 6px;
        height: 6px;

        border-radius: 50%;

        background: #059669;

        box-shadow:
            0 0 0 4px rgba(5, 150, 105, .08);
    }

    .detail-title {
        margin: 0;

        color: var(--text);

        font-size: 28px;
        font-weight: 750;

        line-height: 1.2;

        letter-spacing: -.035em;
    }

    .detail-description {
        margin: 7px 0 0;

        color: var(--muted);

        font-size: 13px;
    }

    .detail-actions {
        display: flex;
        align-items: center;

        gap: 8px;
    }


    /* =====================================================
       BUTTON
    ====================================================== */

    .detail-btn {
        min-height: 39px;

        display: inline-flex;
        align-items: center;
        justify-content: center;

        gap: 7px;

        padding: 8px 13px;

        border-radius: 9px;

        font-size: 12px;
        font-weight: 650;

        text-decoration: none;

        transition: all .18s ease;
    }

    .detail-btn-primary {
        border: 1px solid #111827;

        background: #111827;

        color: #fff;
    }

    .detail-btn-primary:hover {
        background: #000;
        border-color: #000;

        color: #fff;

        transform: translateY(-1px);
    }

    .detail-btn-secondary {
        border: 1px solid var(--border);

        background: #fff;

        color: var(--text-secondary);
    }

    .detail-btn-secondary:hover {
        background: #f9fafb;

        border-color: #d1d5db;

        color: var(--text);
    }


    /* =====================================================
       ALERT
    ====================================================== */

    .detail-alert {
        display: flex;
        align-items: center;
        gap: 10px;

        margin-bottom: 24px;

        padding: 12px 14px;

        border: 1px solid #bbf7d0;

        border-radius: 10px;

        background: #f0fdf4;

        color: #166534;

        font-size: 12px;
    }

    .detail-alert-icon {
        width: 26px;
        height: 26px;

        flex: 0 0 26px;

        display: flex;
        align-items: center;
        justify-content: center;

        border-radius: 7px;

        background: #dcfce7;

        font-size: 12px;
    }


    /* =====================================================
       CARD
    ====================================================== */

    .detail-card {
        background: var(--surface);

        border: 1px solid var(--border);

        border-radius: 15px;

        overflow: hidden;
    }

    .detail-card:not(:last-child) {
        margin-bottom: 16px;
    }

    .detail-card-header {
        display: flex;
        align-items: center;
        justify-content: space-between;

        gap: 15px;

        padding: 19px 22px;

        border-bottom: 1px solid var(--border);
    }

    .detail-card-heading {
        display: flex;
        align-items: center;

        gap: 11px;
    }

    .detail-card-icon {
        width: 35px;
        height: 35px;

        flex: 0 0 35px;

        display: flex;
        align-items: center;
        justify-content: center;

        border-radius: 9px;

        background: #f3f4f6;

        color: #374151;

        font-size: 14px;
    }

    .detail-card-title {
        margin: 0;

        color: var(--text);

        font-size: 13px;
        font-weight: 700;
    }

    .detail-card-subtitle {
        margin: 3px 0 0;

        color: var(--subtle);

        font-size: 10px;
    }

    .detail-card-body {
        padding: 22px;
    }


    /* =====================================================
       STATUS
    ====================================================== */

    .status-badge {
        display: inline-flex;
        align-items: center;
        gap: 7px;

        padding: 6px 10px;

        border-radius: 7px;

        font-size: 10px;
        font-weight: 700;
    }

    .status-dot {
        width: 6px;
        height: 6px;

        border-radius: 50%;

        background: currentColor;
    }

    .status-active {
        color: #166534;

        background: #f0fdf4;
    }

    .status-draft {
        color: #92400e;

        background: #fffbeb;
    }

    .status-inactive {
        color: #4b5563;

        background: #f3f4f6;
    }


    /* =====================================================
       INFORMATION
    ====================================================== */

    .info-block {
        margin-bottom: 22px;
    }

    .info-block:last-child {
        margin-bottom: 0;
    }

    .info-label {
        margin-bottom: 5px;

        color: var(--subtle);

        font-size: 10px;
        font-weight: 650;

        text-transform: uppercase;
        letter-spacing: .04em;
    }

    .info-value {
        color: var(--text-secondary);

        font-size: 13px;
        line-height: 1.65;
    }

    .info-value.large {
        color: var(--text);

        font-size: 17px;
        font-weight: 700;

        line-height: 1.4;
    }

    .info-description {
        color: #4b5563;

        font-size: 13px;

        line-height: 1.7;
    }

    .empty-value {
        color: var(--subtle);
    }


    /* =====================================================
       ID
    ====================================================== */

    .assessment-id {
        display: inline-flex;
        align-items: center;

        padding: 5px 9px;

        border: 1px solid var(--border);

        border-radius: 7px;

        background: var(--surface-soft);

        color: #374151;

        font-family: monospace;

        font-size: 11px;
    }


    /* =====================================================
       META GRID
    ====================================================== */

    .meta-grid {
        display: grid;

        grid-template-columns: repeat(2, minmax(0, 1fr));

        gap: 10px;

        margin-top: 22px;
    }

    .meta-item {
        min-height: 78px;

        padding: 13px 14px;

        border: 1px solid var(--border-soft);

        border-radius: 10px;

        background: #fcfcfd;
    }

    .meta-label {
        margin-bottom: 7px;

        color: var(--subtle);

        font-size: 10px;
    }

    .meta-value {
        color: var(--text);

        font-size: 13px;
        font-weight: 650;
    }

    .meta-value span {
        color: var(--muted);

        font-weight: 400;
    }


    /* =====================================================
       DATE GRID
    ====================================================== */

    .schedule-grid {
        display: grid;

        grid-template-columns: repeat(2, minmax(0, 1fr));

        gap: 20px;

        padding-top: 20px;

        margin-top: 22px;

        border-top: 1px solid var(--border-soft);
    }


    /* =====================================================
       PIN
    ====================================================== */

    .pin-display {
        padding: 18px 12px;

        border: 1px solid var(--border);

        border-radius: 11px;

        background: #fafafa;

        text-align: center;
    }

    .pin-label {
        margin-bottom: 9px;

        color: var(--subtle);

        font-size: 9px;

        font-weight: 700;

        letter-spacing: .08em;

        text-transform: uppercase;
    }

    .pin-value {
        color: var(--text);

        font-size: 29px;

        font-weight: 750;

        letter-spacing: 7px;

        line-height: 1;
    }

    .pin-empty {
        color: var(--subtle);

        letter-spacing: 5px;
    }

    .side-description {
        margin: 12px 0 15px;

        color: var(--muted);

        font-size: 10px;

        line-height: 1.6;
    }

    .side-button {
        width: 100%;

        min-height: 38px;

        display: inline-flex;
        align-items: center;
        justify-content: center;

        gap: 7px;

        padding: 8px 12px;

        border: 1px solid var(--border);

        border-radius: 8px;

        background: #fff;

        color: var(--text-secondary);

        font-size: 11px;

        font-weight: 650;

        transition: .15s;
    }

    .side-button:hover {
        background: #f9fafb;

        border-color: #d1d5db;

        color: var(--text);
    }


    /* =====================================================
       LINK
    ====================================================== */

    .assessment-link-group {
        display: flex;

        gap: 7px;
    }

    .assessment-link-input {
        min-width: 0;

        height: 38px;

        padding: 8px 10px;

        border: 1px solid var(--border);

        border-radius: 8px;

        background: #fafafa;

        color: #6b7280;

        font-size: 10px;
    }

    .assessment-link-input:focus {
        outline: none;

        border-color: #d1d5db;

        box-shadow: none;
    }

    .copy-button {
        flex: 0 0 auto;

        height: 38px;

        padding: 8px 13px;

        border: 1px solid #111827;

        border-radius: 8px;

        background: #111827;

        color: #fff;

        font-size: 11px;

        font-weight: 650;

        transition: .15s;
    }

    .copy-button:hover {
        background: #000;
    }

    .copy-message {
        display: none;

        margin-top: 7px;

        color: #059669;

        font-size: 10px;
    }


    /* =====================================================
       QUESTIONS
    ====================================================== */

    .question-count {
        display: flex;
        align-items: baseline;

        gap: 7px;

        margin-top: 5px;
    }

    .question-number {
        color: var(--text);

        font-size: 30px;

        font-weight: 750;

        line-height: 1;
    }

    .question-label {
        color: var(--muted);

        font-size: 11px;
    }

    .question-progress {
        height: 5px;

        margin: 15px 0 13px;

        overflow: hidden;

        border-radius: 99px;

        background: #f1f5f9;
    }

    .question-progress-bar {
        height: 100%;

        width: 100%;

        border-radius: inherit;

        background: #111827;
    }

    .question-description {
        margin: 0 0 15px;

        color: var(--muted);

        font-size: 10px;

        line-height: 1.6;
    }


    /* =====================================================
       RESPONSIVE
    ====================================================== */

    @media (max-width: 991px) {

        .detail-actions {
            margin-top: 15px;
        }

    }


    @media (max-width: 768px) {

        .detail-header {
            align-items: flex-start !important;

            flex-direction: column;
        }

        .detail-title {
            font-size: 24px;
        }

        .detail-actions {
            width: 100%;
        }

        .detail-actions .detail-btn {
            flex: 1;
        }

        .detail-card-header,
        .detail-card-body {
            padding: 18px;
        }

        .meta-grid,
        .schedule-grid {
            grid-template-columns: 1fr;
        }

        .assessment-link-group {
            flex-direction: column;
        }

        .copy-button {
            width: 100%;
        }

    }

</style>


<div class="container-fluid assessment-detail-page">


    {{-- =====================================================
         HEADER
    ====================================================== --}}

    <div class="detail-header d-flex justify-content-between align-items-start">

        <div>

            <div class="detail-eyebrow">
                <span></span>
                Assessment Management
            </div>

            <h1 class="detail-title">
                {{ $assessment->title }}
            </h1>

            <p class="detail-description">
                Kelola informasi, soal, PIN, dan akses peserta.
            </p>

        </div>


        <div class="detail-actions">

            <a
                href="{{ route('owner.assessments.edit', $assessment) }}"
                class="detail-btn detail-btn-primary"
            >
                <i class="bi bi-pencil"></i>
                Edit Assessment
            </a>

            <a
                href="{{ route('owner.assessments.index') }}"
                class="detail-btn detail-btn-secondary"
            >
                <i class="bi bi-arrow-left"></i>
                Kembali
            </a>

        </div>

    </div>


    {{-- =====================================================
         SUCCESS
    ====================================================== --}}

    @if(session('success'))

        <div class="detail-alert">

            <div class="detail-alert-icon">
                <i class="bi bi-check-lg"></i>
            </div>

            <div>
                {{ session('success') }}
            </div>

        </div>

    @endif


    <div class="row g-4">


        {{-- =================================================
             MAIN CONTENT
        ================================================== --}}

        <div class="col-lg-8">


            {{-- =================================================
                 INFORMATION CARD
            ================================================== --}}

            <div class="detail-card">

                <div class="detail-card-header">

                    <div class="detail-card-heading">

                        <div class="detail-card-icon">
                            <i class="bi bi-clipboard-data"></i>
                        </div>

                        <div>

                            <h2 class="detail-card-title">
                                Informasi Assessment
                            </h2>

                            <p class="detail-card-subtitle">
                                Detail dan konfigurasi assessment
                            </p>

                        </div>

                    </div>


                    @if($assessment->status === 'active')

                        <span class="status-badge status-active">

                            <span class="status-dot"></span>

                            Aktif

                        </span>

                    @elseif($assessment->status === 'draft')

                        <span class="status-badge status-draft">

                            <span class="status-dot"></span>

                            Draft

                        </span>

                    @else

                        <span class="status-badge status-inactive">

                            <span class="status-dot"></span>

                            Tidak Aktif

                        </span>

                    @endif

                </div>


                <div class="detail-card-body">


                    {{-- NAME --}}

                    <div class="info-block">

                        <div class="info-label">
                            Nama Assessment
                        </div>

                        <div class="info-value large">
                            {{ $assessment->title }}
                        </div>

                    </div>


                    {{-- ID --}}

                    <div class="info-block">

                        <div class="info-label">
                            ID Assessment
                        </div>

                        <div>

                            <span class="assessment-id">
                                {{ $assessment->id }}
                            </span>

                        </div>

                    </div>


                    {{-- DESCRIPTION --}}

                    <div class="info-block">

                        <div class="info-label">
                            Deskripsi
                        </div>

                        <div class="info-description">

                            @if($assessment->description)

                                {!! nl2br(e($assessment->description)) !!}

                            @else

                                <span class="empty-value">
                                    Tidak ada deskripsi.
                                </span>

                            @endif

                        </div>

                    </div>


                    {{-- META --}}

                    <div class="meta-grid">


                        {{-- CATEGORY --}}

                        <div class="meta-item">

                            <div class="meta-label">
                                Kategori
                            </div>

                            <div class="meta-value">

                                {{ $assessment->category ?: '-' }}

                            </div>

                        </div>


                        {{-- DURATION --}}

                        <div class="meta-item">

                            <div class="meta-label">
                                Durasi
                            </div>

                            <div class="meta-value">

                                {{ $assessment->duration }}

                                <span>
                                    menit
                                </span>

                            </div>

                        </div>


                        {{-- PASSING --}}

                        <div class="meta-item">

                            <div class="meta-label">
                                Passing Score
                            </div>

                            <div class="meta-value">

                                {{ number_format($assessment->passing_score, 2) }}

                                <span>
                                    %
                                </span>

                            </div>

                        </div>


                        {{-- QUESTIONS --}}

                        <div class="meta-item">

                            <div class="meta-label">
                                Jumlah Soal
                            </div>

                            <div class="meta-value">

                                {{ $assessment->questions->count() }}

                                <span>
                                    soal
                                </span>

                            </div>

                        </div>

                    </div>


                    {{-- SCHEDULE --}}

                    <div class="schedule-grid">


                        <div>

                            <div class="info-label">
                                Waktu Mulai
                            </div>

                            <div class="info-value">

                                @if($assessment->start_at)

                                    {{ $assessment->start_at->format('d M Y, H:i') }}

                                @else

                                    <span class="empty-value">
                                        Tidak ditentukan
                                    </span>

                                @endif

                            </div>

                        </div>


                        <div>

                            <div class="info-label">
                                Waktu Berakhir
                            </div>

                            <div class="info-value">

                                @if($assessment->end_at)

                                    {{ $assessment->end_at->format('d M Y, H:i') }}

                                @else

                                    <span class="empty-value">
                                        Tidak ditentukan
                                    </span>

                                @endif

                            </div>

                        </div>

                    </div>

                </div>

            </div>
                        {{-- =================================================
                 QUESTIONS
            ================================================== --}}

            <div class="detail-card">

                <div class="detail-card-header">

                    <div class="detail-card-heading">

                        <div class="detail-card-icon">
                            <i class="bi bi-list-check"></i>
                        </div>

                        <div>

                            <h2 class="detail-card-title">
                                Soal Assessment
                            </h2>

                            <p class="detail-card-subtitle">
                                Bank soal yang digunakan
                            </p>

                        </div>

                    </div>


                    <a
                        href="{{ route(
                            'owner.questions.create',
                            ['assessment_id' => $assessment->id]
                        ) }}"
                        class="detail-btn detail-btn-primary"
                        style="min-height:32px;padding:6px 10px;font-size:10px;"
                    >

                        <i class="bi bi-plus-lg"></i>

                        Tambah

                    </a>

                </div>


                <div class="detail-card-body">

                    <div class="question-count">

                        <div class="question-number">
                            {{ $assessment->questions->count() }}
                        </div>

                        <div class="question-label">
                            soal
                        </div>

                    </div>


                    @if($assessment->questions->count() > 0)

                        <div class="question-progress">

                            <div class="question-progress-bar"></div>

                        </div>

                        <p class="question-description">

                            Assessment sudah memiliki soal
                            dan siap dikelola.

                        </p>


                        <a
                            href="{{ route('owner.questions.index') }}"
                            class="side-button"
                        >

                            <i class="bi bi-arrow-right"></i>

                            Kelola Semua Soal

                        </a>

                    @else

                        <p class="question-description">

                            Belum ada soal pada assessment ini.
                            Tambahkan soal untuk mulai membangun
                            assessment.

                        </p>

                    @endif

                </div>

            </div>

        </div>


        {{-- =================================================
             SIDEBAR
        ================================================== --}}

        <div class="col-lg-4">


            {{-- =================================================
                 PIN
            ================================================== --}}

            <div class="detail-card">

                <div class="detail-card-header">

                    <div class="detail-card-heading">

                        <div class="detail-card-icon">
                            <i class="bi bi-shield-lock"></i>
                        </div>

                        <div>

                            <h2 class="detail-card-title">
                                PIN Peserta
                            </h2>

                            <p class="detail-card-subtitle">
                                Kode akses assessment
                            </p>

                        </div>

                    </div>

                </div>


                <div class="detail-card-body">

                    <div class="pin-display">

                        <div class="pin-label">
                            PIN Assessment
                        </div>

                        @if($assessment->pin)

                            <div class="pin-value">
                                {{ $assessment->pin }}
                            </div>

                        @else

                            <div class="pin-value pin-empty">
                                ------
                            </div>

                        @endif

                    </div>


                    <p class="side-description">
                        Gunakan PIN ini bersama link assessment
                        untuk memberikan akses kepada peserta.
                    </p>


                    <form
                        method="POST"
                        action="{{ route(
                            'owner.assessments.regenerate-pin',
                            $assessment
                        ) }}"
                        onsubmit="return confirm('Buat PIN baru untuk assessment ini?')"
                    >

                        @csrf

                        <button
                            type="submit"
                            class="side-button"
                        >

                            <i class="bi bi-arrow-clockwise"></i>

                            Buat PIN Baru

                        </button>

                    </form>

                </div>

            </div>


{{-- =================================================
     PARTICIPANT LINK
================================================== --}}

<div class="detail-card">

    <div class="detail-card-header">

        <div class="detail-card-heading">

            <div class="detail-card-icon">
                <i class="bi bi-link-45deg"></i>
            </div>

            <div>

                <h2 class="detail-card-title">
                    Akses Peserta
                </h2>

                <p class="detail-card-subtitle">
                    Link dan QR Code untuk mengerjakan assessment
                </p>

            </div>

        </div>

    </div>


    <div class="detail-card-body">

        {{-- LINK --}}

        <div class="assessment-link-group">

            <input
                type="text"
                id="assessmentLink"
                class="assessment-link-input"
                value="{{ route(
                    'assessment.participant.show',
                    ['assessment' => $assessment->id]
                ) }}"
                readonly
            >

            <button
                type="button"
                class="copy-button"
                onclick="copyAssessmentLink()"
                title="Salin Link"
            >
                <i class="bi bi-copy"></i>
                Salin
            </button>

        </div>


        {{-- COPY MESSAGE --}}

        <div
            id="copyMessage"
            class="copy-message"
        >
            <i class="bi bi-check-lg"></i>
            Link berhasil disalin.
        </div>


        {{-- QR CODE --}}

        <div class="qr-access-box">

            <div class="qr-access-header">

                <div>

                    <div class="qr-access-title">
                        <i class="bi bi-qr-code"></i>
                        QR Code Assessment
                    </div>

                    <div class="qr-access-description">
                        Peserta dapat scan QR Code untuk membuka
                        link assessment secara langsung.
                    </div>

                </div>

            </div>


            <div class="qr-code-wrapper">

                <div id="assessmentQrCode"></div>

            </div>


            <button
                type="button"
                class="side-button"
                onclick="downloadQRCode()"
            >

                <i class="bi bi-download"></i>

                Download QR Code

            </button>

        </div>

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


{{-- =====================================================
     COPY LINK
====================================================== --}}
<script src="https://cdn.jsdelivr.net/npm/qrcodejs@1.0.0/qrcode.min.js"></script>
<script>

document.addEventListener('DOMContentLoaded', function () {

    const input = document.getElementById('assessmentLink');
    const qrContainer = document.getElementById('assessmentQrCode');

    if (!input || !qrContainer) {
        return;
    }

    new QRCode(qrContainer, {
        text: input.value,
        width: 164,
        height: 164,
        colorDark: '#111827',
        colorLight: '#ffffff',
        correctLevel: QRCode.CorrectLevel.H
    });

});


function copyAssessmentLink()
{
    const input =
        document.getElementById('assessmentLink');

    const message =
        document.getElementById('copyMessage');


    navigator.clipboard
        .writeText(input.value)

        .then(function () {

            message.style.display = 'block';

            setTimeout(function () {

                message.style.display = 'none';

            }, 2500);

        })

        .catch(function () {

            input.select();

            document.execCommand('copy');

            message.style.display = 'block';

            setTimeout(function () {

                message.style.display = 'none';

            }, 2500);

        });
}


function downloadQRCode()
{
    const qrContainer =
        document.getElementById('assessmentQrCode');

    const canvas =
        qrContainer.querySelector('canvas');

    if (!canvas) {
        alert('QR Code belum siap.');
        return;
    }


    const link =
        document.createElement('a');

    link.download =
        'qr-assessment-{{ $assessment->id }}.png';

    link.href =
        canvas.toDataURL('image/png');

    link.click();
}

</script>

@endsection
