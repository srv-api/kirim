<!DOCTYPE html>

<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Testhink — Platform Assessment & Testing</title>

<meta
    name="description"
    content="Testhink adalah platform assessment dan testing modern untuk membuat tes, mengelola peserta, melakukan penilaian, dan melihat hasil dalam satu tempat."
>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap');

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    html {
        scroll-behavior: smooth;
    }

    body {
        font-family: 'Inter', sans-serif;
        background: #fff;
        color: #111;
        overflow-x: hidden;
    }

    a {
        color: inherit;
        text-decoration: none;
    }

    :root {
        --yellow: #ffde59;
        --black: #111111;
        --dark: #171717;
        --gray: #777;
        --light: #f7f7f7;
        --border: #e9e9e9;
    }

    /* =========================
       NAVBAR
    ========================= */

    .navbar {
        width: 100%;
        position: absolute;
        top: 0;
        left: 0;
        z-index: 100;
        padding: 25px 6%;
    }

    .nav-inner {
        max-width: 1280px;
        margin: auto;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .logo {
        display: flex;
        align-items: center;
        gap: 10px;
        font-size: 20px;
        font-weight: 800;
        letter-spacing: -1px;
    }

    .logo-icon {
        width: 38px;
        height: 38px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: var(--yellow);
        color: #000;
        border-radius: 50%;
        font-size: 18px;
        font-weight: 800;
    }

    .nav-menu {
        display: flex;
        align-items: center;
        gap: 34px;
        font-size: 13px;
        font-weight: 500;
    }

    .nav-menu a {
        color: #555;
        transition: color .2s ease;
    }

    .nav-menu a:hover {
        color: #000;
    }

    .nav-actions {
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .nav-login {
        font-size: 13px;
        font-weight: 600;
        padding: 12px 19px;
        border-radius: 7px;
        background: #f3df82;
        color: #111;
    }

    .nav-button {
        padding: 12px 19px;
        border-radius: 7px;
        background: #111;
        color: #fff;
        font-size: 13px;
        font-weight: 600;
        transition: .2s ease;
    }

    .nav-button:hover {
        background: #333;
    }

    /* =========================
       HERO
    ========================= */

    .hero {
        min-height: 100vh;
        display: flex;
        align-items: center;
        padding: 150px 6% 100px;

        background:
            radial-gradient(
                circle at 85% 25%,
                rgba(255, 222, 89, .25),
                transparent 30%
            ),
            #fff;
    }

    .hero-inner {
        width: 100%;
        max-width: 1280px;
        margin: auto;

        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 80px;

        align-items: center;
    }

    .hero-content {
        max-width: 620px;
    }

    .eyebrow {
        display: inline-flex;
        align-items: center;
        gap: 8px;

        padding: 7px 11px;

        background: #fff8d9;
        border: 1px solid #f3df82;

        border-radius: 50px;

        font-size: 11px;
        font-weight: 600;

        margin-bottom: 25px;
    }

    .eyebrow-dot {
        width: 6px;
        height: 6px;

        background: var(--yellow);

        border-radius: 50%;
    }

    .hero h1 {
        font-size: clamp(48px, 6vw, 78px);
        line-height: .98;

        letter-spacing: -5px;

        font-weight: 700;

        margin-bottom: 28px;
    }

    .hero h1 span {
        position: relative;
        z-index: 1;
    }

    .hero h1 span::after {
        content: "";

        position: absolute;

        left: 0;
        right: 0;
        bottom: 3px;

        height: 12px;

        background: var(--yellow);

        z-index: -1;
    }

    .hero-description {
        max-width: 540px;

        color: #666;

        font-size: 16px;
        line-height: 1.8;

        margin-bottom: 32px;
    }

    .hero-buttons {
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .btn-primary {
        display: inline-flex;
        align-items: center;
        justify-content: center;

        padding: 15px 23px;

        background: #111;
        color: #fff;

        border-radius: 8px;

        font-size: 13px;
        font-weight: 600;

        transition: .2s ease;
    }

    .btn-primary:hover {
        background: #333;
        transform: translateY(-2px);
    }

    .btn-secondary {
        display: inline-flex;
        align-items: center;
        justify-content: center;

        padding: 15px 23px;

        border: 1px solid #ddd;
        color: #111;

        border-radius: 8px;

        font-size: 13px;
        font-weight: 600;

        transition: .2s ease;
    }

    .btn-secondary:hover {
        border-color: #111;
    }

    .hero-note {
        margin-top: 20px;

        color: #999;

        font-size: 11px;
    }

    /* =========================
       ASSESSMENT MOCKUP
    ========================= */

    .hero-visual {
        position: relative;
    }

    .dashboard {
        position: relative;

        width: 100%;

        background: #111;

        border-radius: 18px;

        padding: 12px;

        box-shadow:
            0 30px 70px rgba(0, 0, 0, .16);

        transform: rotate(1.5deg);
    }

    .dashboard-bar {
        height: 35px;

        display: flex;
        align-items: center;

        padding: 0 10px;

        gap: 5px;
    }

    .circle {
        width: 7px;
        height: 7px;

        border-radius: 50%;

        background: #555;
    }

    .dashboard-screen {
        min-height: 430px;

        background: #f5f5f5;

        border-radius: 11px;

        padding: 20px;

        display: grid;

        grid-template-columns: 1.25fr .75fr;

        gap: 15px;
    }

    .assessment-left {
        background: #fff;

        border-radius: 10px;

        padding: 18px;
    }

    .screen-title {
        font-size: 13px;
        font-weight: 700;

        margin-bottom: 15px;
    }

    .question-progress {
        display: flex;
        justify-content: space-between;
        align-items: center;

        font-size: 9px;
        color: #888;

        margin-bottom: 12px;
    }

    .progress {
        height: 5px;

        background: #eee;

        border-radius: 20px;

        overflow: hidden;

        margin-bottom: 20px;
    }

    .progress span {
        display: block;

        width: 68%;
        height: 100%;

        background: var(--yellow);
    }

    .question {
        border: 1px solid #eee;

        border-radius: 9px;

        padding: 15px;
    }

    .question-number {
        font-size: 9px;
        color: #999;

        margin-bottom: 8px;
    }

    .question-text {
        font-size: 12px;
        font-weight: 600;

        line-height: 1.5;

        margin-bottom: 14px;
    }

    .answer {
        border: 1px solid #eee;

        border-radius: 7px;

        padding: 9px;

        font-size: 9px;

        margin-bottom: 7px;

        display: flex;
        align-items: center;

        gap: 8px;
    }

    .answer.active {
        border-color: #111;
        background: #fafafa;
    }

    .answer-dot {
        width: 10px;
        height: 10px;

        border: 1px solid #aaa;

        border-radius: 50%;
    }

    .answer.active .answer-dot {
        background: var(--yellow);
        border-color: #111;
    }

    .assessment-right {
        background: #fff;

        border-radius: 10px;

        padding: 17px;

        display: flex;
        flex-direction: column;
    }

    .result-title {
        font-size: 13px;
        font-weight: 700;

        margin-bottom: 15px;
    }

    .score {
        padding: 18px;

        background: #f7f7f7;

        border-radius: 9px;

        text-align: center;

        margin-bottom: 12px;
    }

    .score strong {
        display: block;

        font-size: 30px;

        margin-bottom: 4px;
    }

    .score span {
        color: #888;

        font-size: 9px;
    }

    .result-item {
        display: flex;
        justify-content: space-between;

        padding: 10px 0;

        border-bottom: 1px solid #eee;

        font-size: 9px;
    }

    .result-item span:last-child {
        font-weight: 700;
    }

    .result-button {
        margin-top: auto;

        width: 100%;

        padding: 12px;

        border-radius: 7px;

        background: var(--yellow);

        color: #000;

        text-align: center;

        font-size: 10px;
        font-weight: 700;
    }

    /* =========================
       STATS
    ========================= */

    .stats {
        padding: 25px 6%;

        border-top: 1px solid var(--border);
        border-bottom: 1px solid var(--border);
    }

    .stats-inner {
        max-width: 1100px;
        margin: auto;

        display: grid;

        grid-template-columns: repeat(3, 1fr);
    }

    .stat {
        text-align: center;

        padding: 10px;

        border-right: 1px solid var(--border);
    }

    .stat:last-child {
        border-right: none;
    }

    .stat strong {
        display: block;

        font-size: 22px;

        margin-bottom: 5px;
    }

    .stat span {
        color: #888;

        font-size: 11px;
    }

    /* =========================
       SECTION
    ========================= */

    .section {
        padding: 120px 6%;
    }

    .section-inner {
        max-width: 1100px;
        margin: auto;
    }

    .section-heading {
        max-width: 650px;

        margin-bottom: 55px;
    }

    .section-label {
        display: block;

        color: #999;

        font-size: 11px;
        font-weight: 600;

        text-transform: uppercase;

        letter-spacing: 1px;

        margin-bottom: 15px;
    }

    .section-heading h2 {
        font-size: clamp(34px, 5vw, 52px);

        line-height: 1.05;

        letter-spacing: -3px;

        margin-bottom: 18px;
    }

    .section-heading p {
        color: #777;

        font-size: 14px;
        line-height: 1.8;
    }

    /* =========================
       FEATURES
    ========================= */

    .features {
        display: grid;

        grid-template-columns: repeat(3, 1fr);

        gap: 15px;
    }

    .feature {
        padding: 30px;

        border: 1px solid var(--border);

        border-radius: 12px;

        transition: .25s ease;
    }

    .feature:hover {
        border-color: #ccc;

        transform: translateY(-4px);
    }

    .feature-number {
        width: 36px;
        height: 36px;

        display: flex;
        align-items: center;
        justify-content: center;

        background: var(--yellow);

        border-radius: 50%;

        font-size: 11px;
        font-weight: 700;

        margin-bottom: 25px;
    }

    .feature h3 {
        font-size: 17px;

        margin-bottom: 10px;

        letter-spacing: -.5px;
    }

    .feature p {
        color: #777;

        font-size: 12px;
        line-height: 1.8;
    }

    /* =========================
       DARK SECTION
    ========================= */

    .dark-section {
        background: #111;

        color: #fff;
    }

    .dark-section .section-heading p {
        color: #999;
    }

    .management {
        display: grid;

        grid-template-columns: 1fr 1fr;

        gap: 50px;

        align-items: center;
    }

    .management-list {
        display: flex;
        flex-direction: column;

        gap: 10px;
    }

    .management-item {
        padding: 18px 20px;

        border: 1px solid #292929;

        border-radius: 9px;

        display: flex;
        align-items: center;

        gap: 15px;

        transition: .2s ease;
    }

    .management-item:hover {
        background: #181818;
    }

    .check {
        width: 28px;
        height: 28px;

        display: flex;
        align-items: center;
        justify-content: center;

        border-radius: 50%;

        background: var(--yellow);
        color: #000;

        font-size: 11px;
        font-weight: 800;

        flex-shrink: 0;
    }

    .management-item div strong {
        display: block;

        font-size: 13px;

        margin-bottom: 4px;
    }

    .management-item div span {
        color: #777;

        font-size: 10px;
    }

    /* =========================
       CTA
    ========================= */

    .cta {
        padding: 100px 6%;
    }

    .cta-box {
        max-width: 1100px;

        margin: auto;

        padding: 70px 50px;

        background: var(--yellow);

        border-radius: 18px;

        text-align: center;
    }

    .cta-box h2 {
        font-size: clamp(34px, 5vw, 52px);

        letter-spacing: -3px;

        margin-bottom: 15px;
    }

    .cta-box p {
        color: #4f4620;

        font-size: 14px;

        margin-bottom: 28px;
    }

    .cta-button {
        display: inline-flex;

        padding: 15px 25px;

        background: #111;
        color: #fff;

        border-radius: 8px;

        font-size: 13px;
        font-weight: 600;
    }

    /* =========================
       FOOTER
    ========================= */

    footer {
        padding: 35px 6%;

        border-top: 1px solid var(--border);
    }

    .footer-inner {
        max-width: 1100px;

        margin: auto;

        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .footer-logo {
        font-size: 16px;
        font-weight: 800;
    }

    footer p {
        color: #999;

        font-size: 11px;
    }

    /* =========================
       MOBILE
    ========================= */

    @media (max-width: 900px) {

        .nav-menu {
            display: none;
        }

        .hero-inner {
            grid-template-columns: 1fr;

            gap: 60px;
        }

        .hero-content {
            max-width: 700px;
        }

        .dashboard {
            transform: none;
        }

        .features {
            grid-template-columns: 1fr 1fr;
        }

        .management {
            grid-template-columns: 1fr;
        }
    }

    @media (max-width: 600px) {

        .navbar {
            padding: 20px 22px;
        }

        .nav-login {
            display: none;
        }

        .hero {
            padding: 130px 22px 70px;
        }

        .hero h1 {
            font-size: 48px;

            letter-spacing: -3px;
        }

        .hero-description {
            font-size: 14px;
        }

        .hero-buttons {
            flex-direction: column;

            align-items: stretch;
        }

        .btn-primary,
        .btn-secondary {
            width: 100%;
        }

        .dashboard-screen {
            min-height: 350px;

            grid-template-columns: 1fr;
        }

        .assessment-right {
            display: none;
        }

        .stats {
            padding: 20px 15px;
        }

        .stats-inner {
            grid-template-columns: 1fr 1fr;
        }

        .stat:last-child {
            grid-column: 1 / -1;

            border-right: none;
        }

        .section {
            padding: 80px 22px;
        }

        .features {
            grid-template-columns: 1fr;
        }

        .cta {
            padding: 60px 22px;
        }

        .cta-box {
            padding: 50px 25px;
        }

        .footer-inner {
            flex-direction: column;

            gap: 10px;
        }
    }
</style>

</head>

<body>

{{-- =========================
NAVBAR
========================= --}}

<header class="navbar">

<div class="nav-inner">

    <a href="#" class="logo">

        <span class="logo-icon">
            T
        </span>

        Testhink

    </a>


    <nav class="nav-menu">

        <a href="#fitur">
            Fitur
        </a>

        <a href="#keunggulan">
            Keunggulan
        </a>

        <a href="#tentang">
            Tentang
        </a>

        <a href="{{ route('blog') }}">
            Blog
        </a>

    </nav>


    <div class="nav-actions">

        <a
            href="{{ route('register') }}"
            class="nav-login"
        >
            Mulai Sekarang
        </a>

        <a
            href="{{ route('login') }}"
            class="nav-button"
        >
            Masuk
        </a>

    </div>

</div>

</header>

{{-- =========================
HERO
========================= --}}

<section class="hero">

<div class="hero-inner">


    <div class="hero-content">

        <div class="eyebrow">

            <span class="eyebrow-dot"></span>

            PLATFORM ASSESSMENT & TESTING

        </div>


        <h1>
            Testing lebih
            <span>mudah.</span>
            Assessment lebih
            terstruktur.
        </h1>


        <p class="hero-description">

            Testhink membantu Anda membuat assessment,
            mengelola soal dan peserta, melakukan penilaian,
            serta melihat hasil dalam satu platform yang sederhana.

        </p>


        <div class="hero-buttons">

            <a
                href="{{ route('register') }}"
                class="btn-primary"
            >
                Mulai Gratis →
            </a>

            <a
                href="#fitur"
                class="btn-secondary"
            >
                Lihat Fitur
            </a>

        </div>


        <div class="hero-note">

            Buat assessment, bagikan kepada peserta,
            dan lihat hasilnya dalam satu tempat.

        </div>

    </div>


    {{-- ASSESSMENT MOCKUP --}}

    <div class="hero-visual">

        <div class="dashboard">

            <div class="dashboard-bar">

                <span class="circle"></span>
                <span class="circle"></span>
                <span class="circle"></span>

            </div>


            <div class="dashboard-screen">


                {{-- QUESTION --}}

                <div class="assessment-left">

                    <div class="screen-title">
                        Assessment Dasar
                    </div>


                    <div class="question-progress">

                        <span>
                            Pertanyaan 17 dari 25
                        </span>

                        <span>
                            68%
                        </span>

                    </div>


                    <div class="progress">
                        <span></span>
                    </div>


                    <div class="question">

                        <div class="question-number">
                            PERTANYAAN 17
                        </div>

                        <div class="question-text">

                            Manakah pernyataan yang
                            paling tepat mengenai
                            proses evaluasi?

                        </div>


                        <div class="answer active">

                            <span class="answer-dot"></span>

                            Evaluasi dilakukan berdasarkan
                            tujuan yang telah ditentukan.

                        </div>


                        <div class="answer">

                            <span class="answer-dot"></span>

                            Evaluasi hanya dilakukan
                            setelah seluruh proses selesai.

                        </div>


                        <div class="answer">

                            <span class="answer-dot"></span>

                            Evaluasi tidak membutuhkan
                            indikator penilaian.

                        </div>


                        <div class="answer">

                            <span class="answer-dot"></span>

                            Semua jawaban tidak tepat.

                        </div>

                    </div>

                </div>


                {{-- RESULT --}}

                <div class="assessment-right">

                    <div class="result-title">
                        Hasil Assessment
                    </div>


                    <div class="score">

                        <strong>
                            86
                        </strong>

                        <span>
                            Nilai sementara
                        </span>

                    </div>


                    <div class="result-item">

                        <span>
                            Benar
                        </span>

                        <span>
                            21
                        </span>

                    </div>


                    <div class="result-item">

                        <span>
                            Salah
                        </span>

                        <span>
                            3
                        </span>

                    </div>


                    <div class="result-item">

                        <span>
                            Belum dijawab
                        </span>

                        <span>
                            1
                        </span>

                    </div>


                    <div class="result-button">
                        LANJUTKAN ASSESSMENT
                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

</section>

{{-- =========================
STATS
========================= --}}

<section class="stats">

<div class="stats-inner">

    <div class="stat">

        <strong>
            1 Platform
        </strong>

        <span>
            Kelola assessment dalam satu tempat
        </span>

    </div>


    <div class="stat">

        <strong>
            Real-time
        </strong>

        <span>
            Pantau proses dan hasil assessment
        </span>

    </div>


    <div class="stat">

        <strong>
            Lebih terstruktur
        </strong>

        <span>
            Buat proses testing lebih sederhana
        </span>

    </div>

</div>

</section>

{{-- =========================
FITUR
========================= --}}

<section
    class="section"
    id="fitur"
>

<div class="section-inner">

    <div class="section-heading">

        <span class="section-label">
            Fitur Testhink
        </span>

        <h2>
            Semua yang dibutuhkan
            untuk assessment.
        </h2>

        <p>
            Testhink membantu Anda mengelola seluruh proses
            assessment mulai dari pembuatan soal hingga
            hasil penilaian.
        </p>

    </div>


    <div class="features">


        <div class="feature">

            <div class="feature-number">
                01
            </div>

            <h3>
                Buat Assessment
            </h3>

            <p>
                Buat assessment dengan mudah dan tentukan
                struktur serta aturan pengerjaan sesuai kebutuhan.
            </p>

        </div>


        <div class="feature">

            <div class="feature-number">
                02
            </div>

            <h3>
                Bank Soal
            </h3>

            <p>
                Simpan dan kelola berbagai soal dalam satu
                bank soal yang terorganisir.
            </p>

        </div>


        <div class="feature">

            <div class="feature-number">
                03
            </div>

            <h3>
                Kelola Peserta
            </h3>

            <p>
                Atur peserta assessment dan pantau status
                pengerjaan mereka dengan mudah.
            </p>

        </div>


        <div class="feature">

            <div class="feature-number">
                04
            </div>

            <h3>
                Penilaian Otomatis
            </h3>

            <p>
                Proses penilaian dapat dilakukan secara otomatis
                sehingga hasil dapat diperoleh lebih cepat.
            </p>

        </div>


        <div class="feature">

            <div class="feature-number">
                05
            </div>

            <h3>
                Hasil & Analitik
            </h3>

            <p>
                Lihat nilai, performa, dan hasil assessment
                melalui data yang lebih mudah dipahami.
            </p>

        </div>


        <div class="feature">

            <div class="feature-number">
                06
            </div>

            <h3>
                Dashboard
            </h3>

            <p>
                Dapatkan gambaran seluruh aktivitas assessment
                langsung dari satu dashboard.
            </p>

        </div>

    </div>

</div>

</section>

{{-- =========================
KEUNGGULAN
========================= --}}

<section
    class="section dark-section"
    id="keunggulan"
>

<div class="section-inner">

    <div class="management">

        <div>

            <div class="section-heading">

                <span class="section-label">
                    Kenapa Testhink?
                </span>

                <h2>
                    Assessment yang
                    lebih sederhana.
                </h2>

                <p>
                    Tidak perlu proses yang rumit.
                    Testhink membantu membuat, menjalankan,
                    dan mengevaluasi assessment dengan lebih efisien.
                </p>

            </div>

        </div>


        <div class="management-list">


            <div class="management-item">

                <div class="check">
                    ✓
                </div>

                <div>

                    <strong>
                        Mudah digunakan
                    </strong>

                    <span>
                        Antarmuka sederhana untuk administrator dan peserta.
                    </span>

                </div>

            </div>


            <div class="management-item">

                <div class="check">
                    ✓
                </div>

                <div>

                    <strong>
                        Soal lebih terorganisir
                    </strong>

                    <span>
                        Kelola bank soal dan assessment dalam satu sistem.
                    </span>

                </div>

            </div>


            <div class="management-item">

                <div class="check">
                    ✓
                </div>

                <div>

                    <strong>
                        Penilaian lebih cepat
                    </strong>

                    <span>
                        Kurangi pekerjaan manual dalam proses evaluasi.
                    </span>

                </div>

            </div>


            <div class="management-item">

                <div class="check">
                    ✓
                </div>

                <div>

                    <strong>
                        Data lebih terukur
                    </strong>

                    <span>
                        Gunakan hasil assessment untuk memahami performa peserta.
                    </span>

                </div>

            </div>


        </div>

    </div>

</div>

</section>

{{-- =========================
TENTANG
========================= --}}

<section
    class="section"
    id="tentang"
>

<div class="section-inner">

    <div class="section-heading">

        <span class="section-label">
            Tentang Testhink
        </span>

        <h2>
            Satu tempat untuk
            mengelola assessment.
        </h2>

        <p>
            Testhink dirancang untuk membantu organisasi,
            institusi, maupun individu membuat dan mengelola
            proses testing secara lebih terstruktur.
        </p>

    </div>

</div>

</section>

{{-- =========================
CTA
========================= --}}

<section class="cta">

<div class="cta-box">

    <h2>
        Siap mulai assessment?
    </h2>

    <p>
        Buat akun Testhink dan mulai membuat
        assessment pertama Anda.
    </p>

    <a
        href="{{ route('register') }}"
        class="cta-button"
    >
        Buat Akun Sekarang →
    </a>

</div>

</section>

{{-- =========================
FOOTER
========================= --}}

<footer>

<div class="footer-inner">

    <div class="footer-logo">
        Testhink
    </div>

    <p>
        © {{ date('Y') }} Testhink. Hak cipta dilindungi.
    </p>

</div>

</footer>

</body>

</html>
