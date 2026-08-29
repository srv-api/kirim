<div class="sidebar">

    <ul class="sidebar-menu">

        {{-- =====================================================
             DASHBOARD
        ====================================================== --}}

        <li class="menu-title">
            Dashboard
        </li>

        <li class="{{ request()->is('owner/panel/dashboard') ? 'active' : '' }}">

            <a href="{{ route('owner.dashboard') }}">

                <span class="menu-icon">🏠</span>

                <span>Dashboard</span>

            </a>

        </li>


        {{-- =====================================================
             ASSESSMENT
        ====================================================== --}}

        <li class="menu-title">
            Assessment
        </li>

        <li>

            <a href="{{ route('owner.assessments.index') }}">

                <span class="menu-icon">📝</span>

                <span>Assessment</span>

            </a>

        </li>


               <li class="{{ request()->routeIs('owner.questions.*') ? 'active' : '' }}">

            <a href="{{ route('owner.questions.index') }}">

                <span class="menu-icon">📚</span>

                <span>Soal</span>

            </a>

        </li>


        {{-- =====================================================
             PESERTA
        ====================================================== --}}

        <li class="menu-title">
            Peserta
        </li>

        <li class="{{ request()->routeIs('owner.participants.*') ? 'active' : '' }}">

    <a href="{{ route('owner.participants.index') }}">


                <span class="menu-icon">👥</span>

                <span>Peserta</span>

            </a>

        </li>

        {{-- =====================================================
             HASIL
        ====================================================== --}}

        <li class="menu-title">
            Hasil
        </li>

<li class="{{ request()->routeIs('owner.results.*') ? 'active' : '' }}">

    <a href="{{ route('owner.results.index') }}">

                <span class="menu-icon">📊</span>

                <span>Hasil Assessment</span>

            </a>

        </li>

  <li class="{{ request()->routeIs('owner.ranking.*') ? 'active' : '' }}">

    <a href="{{ route('owner.ranking.index') }}">

                <span class="menu-icon">🏆</span>

                <span>Ranking</span>

            </a>

        </li>


        {{-- =====================================================
             PENGATURAN
        ====================================================== --}}

        <li class="menu-title">
            Pengaturan
        </li>

<li class="{{ request()->routeIs('owner.profile.*') ? 'active' : '' }}">

    <a href="{{ route('owner.profile.index') }}">

                <span class="menu-icon">👤</span>

                <span>Profil</span>

            </a>

        </li>


    </ul>

</div>