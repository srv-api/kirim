<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Tarik Tambang - Quiz</title>

    <style>

        * {
            box-sizing: border-box;
        }

        html,
        body {
            margin: 0;
            padding: 0;
            width: 100%;
            min-height: 100%;
        }

        body {
            font-family:
                Inter,
                ui-sans-serif,
                system-ui,
                -apple-system,
                BlinkMacSystemFont,
                "Segoe UI",
                sans-serif;

            background: #f5f7fb;
            color: #111827;
        }


        /* =====================================================
           PAGE
        ====================================================== */

        .tug-page {
            min-height: 100vh;

            display: flex;
            align-items: center;
            justify-content: center;

            padding: 30px 18px;
        }

        .tug-container {
            width: 100%;
            max-width: 1100px;
        }


        /* =====================================================
           HEADER
        ====================================================== */

        .tug-header {
            text-align: center;
            margin-bottom: 24px;
        }

        .tug-header h1 {
            margin: 0;

            font-size: 30px;
            line-height: 1.2;
            font-weight: 900;

            color: #111827;
        }

        .tug-header p {
            margin: 8px 0 0;

            font-size: 14px;
            color: #6b7280;
        }


        /* =====================================================
           SCOREBOARD
        ====================================================== */

        .tug-scoreboard {
            display: grid;

            grid-template-columns:
                minmax(0, 1fr)
                130px
                minmax(0, 1fr);

            gap: 14px;

            margin-bottom: 18px;
        }

        .score-card {
            min-height: 72px;

            padding: 13px 18px;

            display: flex;
            align-items: center;
            justify-content: space-between;

            background: #ffffff;

            border: 1px solid #e5e7eb;
            border-radius: 16px;

            box-shadow:
                0 5px 20px rgba(0, 0, 0, .04);
        }

        .score-card.center {
            flex-direction: column;
            justify-content: center;
            text-align: center;
        }

        .score-label {
            font-size: 11px;

            font-weight: 700;

            color: #9ca3af;

            text-transform: uppercase;

            letter-spacing: .5px;
        }

        .score-name {
            margin-top: 3px;

            font-size: 15px;

            font-weight: 800;

            color: #111827;
        }

        .score-number {
            font-size: 27px;

            font-weight: 900;

            color: #111827;
        }

        .question-count {
            margin-top: 2px;

            font-size: 19px;

            font-weight: 900;

            color: #111827;
        }


        /* =====================================================
           ARENA
        ====================================================== */

        .arena {
            position: relative;

            height: 350px;

            overflow: hidden;

            border-radius: 24px;

            border: 1px solid #e2e8f0;

            background:
                linear-gradient(
                    to bottom,
                    #eaf4ff 0%,
                    #f8fbff 66%,
                    #dcebd7 66%,
                    #cbdcc5 100%
                );

            box-shadow:
                0 15px 40px rgba(15, 23, 42, .08);
        }


        /* =====================================================
           CLOUD
        ====================================================== */

        .cloud {
            position: absolute;

            width: 100px;
            height: 30px;

            background: rgba(255,255,255,.8);

            border-radius: 30px;

            opacity: .7;
        }

        .cloud::before,
        .cloud::after {
            content: "";

            position: absolute;

            background: #fff;

            border-radius: 50%;
        }

        .cloud::before {
            width: 45px;
            height: 45px;

            left: 15px;
            bottom: 0;
        }

        .cloud::after {
            width: 55px;
            height: 55px;

            right: 12px;
            bottom: 0;
        }

        .cloud-1 {
            top: 35px;
            left: 10%;
        }

        .cloud-2 {
            top: 70px;
            right: 12%;

            transform: scale(.75);
        }


        /* =====================================================
           GROUND
        ====================================================== */

        .ground {
            position: absolute;

            left: 0;
            right: 0;
            bottom: 0;

            height: 34%;

            border-top:
                2px solid rgba(15, 23, 42, .08);
        }


        /* =====================================================
           CENTER LINE
        ====================================================== */

        .center-line {
            position: absolute;

            left: 50%;
            bottom: 34%;

            height: 75px;

            border-left:
                2px dashed rgba(15, 23, 42, .18);

            transform:
                translateX(-50%);
        }


        /* =====================================================
           CHARACTER
        ====================================================== */

        .character {
            position: absolute;

            bottom: 40px;

            width: 125px;

            text-align: center;

            z-index: 10;

            transition:
                transform .5s
                cubic-bezier(.2,.8,.2,1);
        }

        .player {
            left: 45px;
        }

        .opponent {
            right: 45px;
        }

        .avatar {
            width: 82px;
            height: 82px;

            margin: 0 auto;

            display: flex;

            align-items: center;
            justify-content: center;

            border-radius: 50%;

            background: #fff;

            border: 4px solid #fff;

            box-shadow:
                0 10px 25px rgba(15,23,42,.15);

            font-size: 46px;
        }

        .character-name {
            margin-top: 9px;

            font-size: 13px;

            font-weight: 800;

            color: #111827;
        }


        /* =====================================================
           ROPE
        ====================================================== */

        .rope-wrapper {
            position: absolute;

            top: 46%;
            left: 50%;

            width: 76%;
            height: 75px;

            transform:
                translate(-50%, -50%);

            z-index: 7;
        }

        .rope {
            position: absolute;

            top: 32px;
            left: 0;

            width: 100%;
            height: 13px;

            border-radius: 20px;

            background:
                repeating-linear-gradient(
                    -45deg,
                    #92400e 0,
                    #92400e 6px,
                    #b45309 6px,
                    #b45309 12px
                );

            box-shadow:
                0 5px 7px rgba(0,0,0,.15),
                inset 0 2px 2px rgba(255,255,255,.25);

            transform: translateX(0);

            transition:
                transform .8s
                cubic-bezier(.2,.8,.2,1);
        }

        .rope::before,
        .rope::after {
            content: "";

            position: absolute;

            top: 50%;

            width: 23px;
            height: 23px;

            border:
                6px solid #78350f;

            border-radius: 50%;

            transform:
                translateY(-50%);
        }

        .rope::before {
            left: -8px;
        }

        .rope::after {
            right: -8px;
        }


        /* =====================================================
           ROPE WAVE
        ====================================================== */

        .rope.pulling {
            animation:
                ropePull .8s ease;
        }

        @keyframes ropePull {

            0% {
                transform:
                    translateX(var(--rope-x))
                    rotate(0);
            }

            25% {
                transform:
                    translateX(var(--rope-x))
                    rotate(.8deg);
            }

            50% {
                transform:
                    translateX(var(--rope-x))
                    rotate(-.8deg);
            }

            75% {
                transform:
                    translateX(var(--rope-x))
                    rotate(.5deg);
            }

            100% {
                transform:
                    translateX(var(--rope-x))
                    rotate(0);
            }
        }


        /* =====================================================
           FLAG
        ====================================================== */

        .flag {
            position: absolute;

            top: 4px;
            left: 50%;

            width: 4px;
            height: 62px;

            background: #111827;

            transform:
                translateX(-50%);

            transition:
                left .8s
                cubic-bezier(.2,.8,.2,1);

            z-index: 12;
        }

        .flag::after {
            content: "";

            position: absolute;

            left: 4px;
            top: 0;

            width: 38px;
            height: 23px;

            background: #ef4444;

            clip-path:
                polygon(
                    0 0,
                    100% 50%,
                    0 100%
                );
        }


        /* =====================================================
           PULL CHARACTER
        ====================================================== */

        .pull-left {
            animation:
                pullLeft .8s ease;
        }

        .pull-right {
            animation:
                pullRight .8s ease;
        }

        @keyframes pullLeft {

            0% {
                transform:
                    translateX(0)
                    rotate(0);
            }

            25% {
                transform:
                    translateX(-16px)
                    rotate(-5deg);
            }

            50% {
                transform:
                    translateX(5px)
                    rotate(2deg);
            }

            75% {
                transform:
                    translateX(-9px)
                    rotate(-3deg);
            }

            100% {
                transform:
                    translateX(0)
                    rotate(0);
            }
        }

        @keyframes pullRight {

            0% {
                transform:
                    translateX(0)
                    rotate(0);
            }

            25% {
                transform:
                    translateX(16px)
                    rotate(5deg);
            }

            50% {
                transform:
                    translateX(-5px)
                    rotate(-2deg);
            }

            75% {
                transform:
                    translateX(9px)
                    rotate(3deg);
            }

            100% {
                transform:
                    translateX(0)
                    rotate(0);
            }
        }


        /* =====================================================
           QUESTION
        ====================================================== */

        .question-card {
            margin-top: 18px;

            padding: 24px;

            background: #fff;

            border:
                1px solid #e5e7eb;

            border-radius: 20px;

            box-shadow:
                0 8px 25px rgba(15,23,42,.05);
        }

        .question-label {
            margin-bottom: 7px;

            font-size: 11px;

            font-weight: 800;

            color: #9ca3af;

            text-transform: uppercase;

            letter-spacing: .6px;
        }

        .question {
            margin-bottom: 20px;

            font-size: 21px;

            line-height: 1.45;

            font-weight: 850;

            color: #111827;
        }


        /* =====================================================
           ANSWERS
        ====================================================== */

        .answers {
            display: grid;

            grid-template-columns:
                repeat(2, minmax(0, 1fr));

            gap: 12px;
        }

        .answer {
            position: relative;

            min-height: 54px;

            padding: 14px 17px;

            border:
                1.5px solid #e5e7eb;

            border-radius: 13px;

            background: #fff;

            color: #111827;

            text-align: left;

            font-size: 14px;

            font-weight: 650;

            cursor: pointer;

            transition:
                border-color .2s ease,
                background .2s ease,
                transform .2s ease,
                box-shadow .2s ease;
        }

        .answer:hover {
            transform:
                translateY(-2px);

            border-color: #9ca3af;

            box-shadow:
                0 5px 15px rgba(15,23,42,.06);
        }

        .answer.correct {
            border-color: #22c55e;

            background: #f0fdf4;

            color: #166534;
        }

        .answer.wrong {
            border-color: #ef4444;

            background: #fef2f2;

            color: #991b1b;
        }

        .answer:disabled {
            cursor: default;
        }

        .answer:disabled:hover {
            transform: none;

            box-shadow: none;
        }


        /* =====================================================
           RESULT
        ====================================================== */

        .result {
            min-height: 24px;

            margin-top: 16px;

            text-align: center;

            font-size: 14px;

            font-weight: 800;
        }


        /* =====================================================
           FINISH
        ====================================================== */

        .finish {
            position: absolute;

            inset: 0;

            display: flex;

            align-items: center;
            justify-content: center;

            flex-direction: column;

            text-align: center;

            background:
                rgba(255,255,255,.95);

            backdrop-filter:
                blur(5px);

            opacity: 0;

            visibility: hidden;

            transition:
                opacity .3s ease,
                visibility .3s ease;

            z-index: 50;
        }

        .finish.show {
            opacity: 1;

            visibility: visible;
        }

        .finish-icon {
            font-size: 65px;

            animation:
                finishBounce 1s ease infinite;
        }

        @keyframes finishBounce {

            0%,
            100% {
                transform:
                    translateY(0);
            }

            50% {
                transform:
                    translateY(-8px);
            }
        }

        .finish-title {
            margin-top: 5px;

            font-size: 28px;

            font-weight: 900;

            color: #111827;
        }

        .finish-score {
            margin-top: 6px;

            font-size: 14px;

            color: #6b7280;
        }

        .restart {
            margin-top: 20px;

            padding: 12px 22px;

            border: 0;

            border-radius: 11px;

            background: #111827;

            color: #fff;

            font-size: 13px;

            font-weight: 800;

            cursor: pointer;

            transition:
                transform .2s ease,
                opacity .2s ease;
        }

        .restart:hover {
            transform:
                translateY(-2px);

            opacity: .9;
        }


        /* =====================================================
           EMPTY
        ====================================================== */

        .empty-game {
            background: #fff;

            border: 1px solid #e5e7eb;

            border-radius: 20px;

            padding: 50px 30px;

            text-align: center;

            box-shadow:
                0 8px 25px rgba(15,23,42,.05);
        }

        .empty-icon {
            font-size: 55px;

            margin-bottom: 15px;
        }

        .empty-game h2 {
            margin: 0;

            font-size: 22px;

            font-weight: 900;
        }

        .empty-game p {
            margin: 8px 0 0;

            color: #6b7280;

            font-size: 14px;
        }


        /* =====================================================
           MOBILE
        ====================================================== */

        @media (max-width: 700px) {

            .tug-page {
                padding: 18px 12px;
            }

            .tug-header h1 {
                font-size: 25px;
            }

            .tug-scoreboard {
                grid-template-columns:
                    minmax(0, 1fr)
                    85px
                    minmax(0, 1fr);

                gap: 8px;
            }

            .score-card {
                padding: 12px;
            }

            .score-name {
                font-size: 13px;
            }

            .score-number {
                font-size: 23px;
            }

            .arena {
                height: 300px;

                border-radius: 19px;
            }

            .player {
                left: 5px;
            }

            .opponent {
                right: 5px;
            }

            .character {
                width: 95px;
            }

            .avatar {
                width: 67px;
                height: 67px;

                font-size: 37px;
            }

            .rope-wrapper {
                width: 68%;
            }

            .question-card {
                padding: 19px;
            }

            .question {
                font-size: 18px;
            }

            .answers {
                grid-template-columns: 1fr;
            }
        }

    </style>

</head>


<body>

<div class="tug-page">

    <div class="tug-container">


        {{-- =================================================
             HEADER
        ================================================== --}}

        <div class="tug-header">

            <h1>
                🪢 Tarik Tambang
            </h1>

            <p>
                Jawab pertanyaan dengan benar untuk menarik tali.
            </p>

        </div>


        {{-- =================================================
             CEK SOAL
        ================================================== --}}

        @if($gameQuestions->count() === 0)

            <div class="empty-game">

                <div class="empty-icon">
                    📝
                </div>

                <h2>
                    Belum Ada Soal
                </h2>

                <p>
                    Tambahkan soal aktif terlebih dahulu untuk memainkan game tarik tambang.
                </p>

            </div>

        @else


            {{-- =================================================
                 SCORE
            ================================================== --}}

            <div class="tug-scoreboard">


                <div class="score-card">

                    <div>

                        <div class="score-label">
                            Pemain
                        </div>

                        <div class="score-name">
                            Kamu
                        </div>

                    </div>

                    <div
                        class="score-number"
                        id="playerScore"
                    >
                        0
                    </div>

                </div>


                <div class="score-card center">

                    <div class="score-label">
                        Soal
                    </div>

                    <div
                        class="question-count"
                        id="questionNumber"
                    >
                        1/{{ $gameQuestions->count() }}
                    </div>

                </div>


                <div class="score-card">

                    <div>

                        <div class="score-label">
                            Lawan
                        </div>

                        <div class="score-name">
                            Lawan
                        </div>

                    </div>

                    <div
                        class="score-number"
                        id="opponentScore"
                    >
                        0
                    </div>

                </div>

            </div>


            {{-- =================================================
                 GAME ARENA
            ================================================== --}}

            <div class="arena">


                <div class="cloud cloud-1"></div>

                <div class="cloud cloud-2"></div>


                <div class="ground"></div>


                <div class="center-line"></div>


                {{-- PLAYER --}}

                <div
                    class="character player"
                    id="player"
                >

                    <div class="avatar">
                        🧑
                    </div>

                    <div class="character-name">
                        Kamu
                    </div>

                </div>


                {{-- OPPONENT --}}

                <div
                    class="character opponent"
                    id="opponent"
                >

                    <div class="avatar">
                        🤖
                    </div>

                    <div class="character-name">
                        Lawan
                    </div>

                </div>


                {{-- ROPE --}}

                <div class="rope-wrapper">

                    <div
                        class="rope"
                        id="rope"
                    ></div>

                    <div
                        class="flag"
                        id="flag"
                    ></div>

                </div>


                {{-- =================================================
                     FINISH
                ================================================== --}}

                <div
                    class="finish"
                    id="finish"
                >

                    <div
                        class="finish-icon"
                        id="finishIcon"
                    >
                        🏆
                    </div>

                    <div
                        class="finish-title"
                        id="finishTitle"
                    >
                        Kamu Menang!
                    </div>

                    <div
                        class="finish-score"
                        id="finishScore"
                    >
                        Skor 0 - 0
                    </div>

                    <button
                        type="button"
                        class="restart"
                        onclick="restartGame()"
                    >
                        Main Lagi
                    </button>

                </div>

            </div>


            {{-- =================================================
                 QUESTION
            ================================================== --}}

            <div class="question-card">

                <div class="question-label">

                    Pertanyaan

                    <span id="questionLabel">
                        1
                    </span>

                </div>


                <div
                    class="question"
                    id="question"
                ></div>


                <div
                    class="answers"
                    id="answers"
                ></div>


                <div
                    class="result"
                    id="result"
                ></div>

            </div>


        @endif

    </div>

</div>


@if($gameQuestions->count() > 0)

<script>

document.addEventListener('DOMContentLoaded', function () {

    /*
    |--------------------------------------------------------------------------
    | DATA SOAL DARI LARAVEL
    |--------------------------------------------------------------------------
    */

    const questions = @json($gameQuestions);


    /*
    |--------------------------------------------------------------------------
    | GAME STATE
    |--------------------------------------------------------------------------
    */

    let currentQuestion = 0;

    let playerScore = 0;

    let opponentScore = 0;

    /*
     * 50 = tengah
     * 20 = pemain menang
     * 80 = lawan menang
     */

    let ropePosition = 50;


    /*
    |--------------------------------------------------------------------------
    | ELEMENT
    |--------------------------------------------------------------------------
    */

    const questionElement =
        document.getElementById('question');

    const answersElement =
        document.getElementById('answers');

    const resultElement =
        document.getElementById('result');

    const playerElement =
        document.getElementById('player');

    const opponentElement =
        document.getElementById('opponent');

    const ropeElement =
        document.getElementById('rope');

    const flagElement =
        document.getElementById('flag');

    const playerScoreElement =
        document.getElementById('playerScore');

    const opponentScoreElement =
        document.getElementById('opponentScore');

    const questionNumberElement =
        document.getElementById('questionNumber');

    const questionLabelElement =
        document.getElementById('questionLabel');


    /*
    |--------------------------------------------------------------------------
    | LOAD QUESTION
    |--------------------------------------------------------------------------
    */

    function loadQuestion() {

        const data =
            questions[currentQuestion];


        questionElement.textContent =
            data.question;


        questionLabelElement.textContent =
            currentQuestion + 1;


        questionNumberElement.textContent =
            `${currentQuestion + 1}/${questions.length}`;


        resultElement.textContent = '';


        answersElement.innerHTML = '';


        data.answers.forEach(function (answer) {

            const button =
                document.createElement('button');


            button.type =
                'button';


            button.className =
                'answer';


            button.textContent =
                answer;


            button.addEventListener(
                'click',
                function () {

                    answerQuestion(
                        answer,
                        button
                    );

                }
            );


            answersElement.appendChild(
                button
            );

        });

    }


    /*
    |--------------------------------------------------------------------------
    | ANSWER
    |--------------------------------------------------------------------------
    */

    function answerQuestion(
        selectedAnswer,
        selectedButton
    ) {

        const data =
            questions[currentQuestion];


        /*
        |--------------------------------------------------------------------------
        | DISABLE SEMUA JAWABAN
        |--------------------------------------------------------------------------
        */

        document
            .querySelectorAll('.answer')
            .forEach(function (button) {

                button.disabled = true;

            });


        /*
        |--------------------------------------------------------------------------
        | BENAR
        |--------------------------------------------------------------------------
        */

        if (
            selectedAnswer ===
            data.correct
        ) {

            selectedButton.classList.add(
                'correct'
            );


            playerScore++;


            playerScoreElement.textContent =
                playerScore;


            resultElement.textContent =
                '✓ Benar! Kamu menarik tali.';


            pullPlayer();

        }


        /*
        |--------------------------------------------------------------------------
        | SALAH
        |--------------------------------------------------------------------------
        */

        else {

            selectedButton.classList.add(
                'wrong'
            );


            /*
            |--------------------------------------------------------------------------
            | Tampilkan jawaban benar
            |--------------------------------------------------------------------------
            */

            document
                .querySelectorAll('.answer')
                .forEach(function (button) {

                    if (
                        button.textContent ===
                        data.correct
                    ) {

                        button.classList.add(
                            'correct'
                        );

                    }

                });


            opponentScore++;


            opponentScoreElement.textContent =
                opponentScore;


            resultElement.textContent =
                '✕ Salah! Lawan menarik tali.';


            pullOpponent();

        }


        /*
        |--------------------------------------------------------------------------
        | CEK PEMENANG
        |--------------------------------------------------------------------------
        */

        if (
            ropePosition <= 20
        ) {

            setTimeout(function () {

                finishGame('player');

            }, 900);

            return;

        }


        if (
            ropePosition >= 80
        ) {

            setTimeout(function () {

                finishGame('opponent');

            }, 900);

            return;

        }


        /*
        |--------------------------------------------------------------------------
        | LANJUT SOAL
        |--------------------------------------------------------------------------
        */

        setTimeout(function () {

            currentQuestion++;


            if (
                currentQuestion <
                questions.length
            ) {

                loadQuestion();

            }

            else {

                finishGame();

            }

        }, 1200);

    }


    /*
    |--------------------------------------------------------------------------
    | PLAYER PULL
    |--------------------------------------------------------------------------
    */

    function pullPlayer() {

        ropePosition -= 10;


        if (
            ropePosition < 20
        ) {

            ropePosition = 20;

        }


        updateRope();


        playerElement.classList.remove(
            'pull-left'
        );


        void playerElement.offsetWidth;


        playerElement.classList.add(
            'pull-left'
        );


        animateRope();

    }


    /*
    |--------------------------------------------------------------------------
    | OPPONENT PULL
    |--------------------------------------------------------------------------
    */

    function pullOpponent() {

        ropePosition += 10;


        if (
            ropePosition > 80
        ) {

            ropePosition = 80;

        }


        updateRope();


        opponentElement.classList.remove(
            'pull-right'
        );


        void opponentElement.offsetWidth;


        opponentElement.classList.add(
            'pull-right'
        );


        animateRope();

    }


    /*
    |--------------------------------------------------------------------------
    | UPDATE ROPE
    |--------------------------------------------------------------------------
    */

    function updateRope() {

        const movement =
            ropePosition - 50;


        ropeElement.style.setProperty(
            '--rope-x',
            `${movement}%`
        );


        ropeElement.style.transform =
            `translateX(${movement}%)`;


        flagElement.style.left =
            `${ropePosition}%`;

    }


    /*
    |--------------------------------------------------------------------------
    | ROPE ANIMATION
    |--------------------------------------------------------------------------
    */

    function animateRope() {

        ropeElement.classList.remove(
            'pulling'
        );


        void ropeElement.offsetWidth;


        ropeElement.classList.add(
            'pulling'
        );

    }


    /*
    |--------------------------------------------------------------------------
    | FINISH
    |--------------------------------------------------------------------------
    */

    function finishGame(
        winner = null
    ) {

        const finish =
            document.getElementById('finish');


        const finishIcon =
            document.getElementById('finishIcon');


        const finishTitle =
            document.getElementById('finishTitle');


        const finishScore =
            document.getElementById('finishScore');


        if (
            winner === 'player'
        ) {

            finishIcon.textContent =
                '🏆';

            finishTitle.textContent =
                'Kamu Menang!';

        }

        else if (
            winner === 'opponent'
        ) {

            finishIcon.textContent =
                '🤖';

            finishTitle.textContent =
                'Lawan Menang!';

        }

        else {

            if (
                playerScore >
                opponentScore
            ) {

                finishIcon.textContent =
                    '🏆';

                finishTitle.textContent =
                    'Kamu Menang!';

            }

            else if (
                opponentScore >
                playerScore
            ) {

                finishIcon.textContent =
                    '🤖';

                finishTitle.textContent =
                    'Lawan Menang!';

            }

            else {

                finishIcon.textContent =
                    '🤝';

                finishTitle.textContent =
                    'Seri!';

            }

        }


        finishScore.textContent =
            `Skor ${playerScore} - ${opponentScore}`;


        finish.classList.add(
            'show'
        );

    }


    /*
    |--------------------------------------------------------------------------
    | RESTART
    |--------------------------------------------------------------------------
    */

    window.restartGame =
        function () {

            currentQuestion = 0;

            playerScore = 0;

            opponentScore = 0;

            ropePosition = 50;


            playerScoreElement.textContent =
                '0';


            opponentScoreElement.textContent =
                '0';


            ropeElement.style.transform =
                'translateX(0)';


            ropeElement.style.setProperty(
                '--rope-x',
                '0%'
            );


            flagElement.style.left =
                '50%';


            document
                .getElementById('finish')
                .classList.remove('show');


            loadQuestion();

        };


    /*
    |--------------------------------------------------------------------------
    | START GAME
    |--------------------------------------------------------------------------
    */

    loadQuestion();

});

</script>

@endif

</body>

</html>