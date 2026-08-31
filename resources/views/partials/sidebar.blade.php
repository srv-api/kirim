<div class="sidebar assessment-sidebar">

    <ul class="sidebar-menu">

        {{-- =====================================================
             DASHBOARD
        ====================================================== --}}

        <li class="menu-title">
            <span>Workspace</span>
        </li>

        <li class="{{ request()->routeIs('owner.dashboard') ? 'active' : '' }}">

            <a href="{{ route('owner.dashboard') }}">

                <span class="menu-icon">
                    <i class="bi bi-grid-1x2"></i>
                </span>

                <span class="menu-text">
                    Dashboard
                </span>

            </a>

        </li>


        {{-- =====================================================
             ASSESSMENT
        ====================================================== --}}

        <li class="menu-title">
            <span>Assessment</span>
        </li>

        <li class="{{ request()->routeIs('owner.assessments.*') ? 'active' : '' }}">

            <a href="{{ route('owner.assessments.index') }}">

                <span class="menu-icon">
                    <i class="bi bi-clipboard-check"></i>
                </span>

                <span class="menu-text">
                    Assessment
                </span>

            </a>

        </li>


        <li class="{{ request()->routeIs('owner.questions.*') ? 'active' : '' }}">

            <a href="{{ route('owner.questions.index') }}">

                <span class="menu-icon">
                    <i class="bi bi-journal-text"></i>
                </span>

                <span class="menu-text">
                    Soal
                </span>

            </a>

        </li>


        {{-- =====================================================
             PESERTA
        ====================================================== --}}

        <li class="menu-title">
            <span>Peserta</span>
        </li>

        <li class="{{ request()->routeIs('owner.participants.*') ? 'active' : '' }}">

            <a href="{{ route('owner.participants.index') }}">

                <span class="menu-icon">
                    <i class="bi bi-people"></i>
                </span>

                <span class="menu-text">
                    Peserta
                </span>

            </a>

        </li>


        {{-- =====================================================
             HASIL
        ====================================================== --}}

        <li class="menu-title">
            <span>Hasil & Analitik</span>
        </li>

        <li class="{{ request()->routeIs('owner.results.*') ? 'active' : '' }}">

            <a href="{{ route('owner.results.index') }}">

                <span class="menu-icon">
                    <i class="bi bi-bar-chart"></i>
                </span>

                <span class="menu-text">
                    Hasil Assessment
                </span>

            </a>

        </li>


        <li class="{{ request()->routeIs('owner.ranking.*') ? 'active' : '' }}">

            <a href="{{ route('owner.ranking.index') }}">

                <span class="menu-icon">
                    <i class="bi bi-trophy"></i>
                </span>

                <span class="menu-text">
                    Ranking
                </span>

            </a>

        </li>


        {{-- =====================================================
             PENGATURAN
        ====================================================== --}}

        <li class="menu-title">
            <span>Pengaturan</span>
        </li>

        <li class="{{ request()->routeIs('owner.profile.*') ? 'active' : '' }}">

            <a href="{{ route('owner.profile.index') }}">

                <span class="menu-icon">
                    <i class="bi bi-person"></i>
                </span>

                <span class="menu-text">
                    Profil
                </span>

            </a>

        </li>
    </ul>
        <div class="sidebar-upgrade">
            <div class="upgrade-content">
                <div class="upgrade-title">
                    Upgrade Sekarang
                </div>

                <div class="upgrade-text">
                    Dapatkan fitur lebih lengkap untuk assessment Anda.
                </div>

               <a
    href="{{ route('subscription.checkout', 'plus') }}"
    class="upgrade-button"
>
    <span>Upgrade</span>
    <i class="bi bi-arrow-right"></i>
</a>
            </div>
        </div>
</div>


<style>

.assessment-sidebar {
    display: flex;
    flex-direction: column;
}

.assessment-sidebar .sidebar-menu {
    flex: 1;
}


/* =====================================================
   UPGRADE WRAPPER
====================================================== */

.assessment-sidebar .sidebar-upgrade {
    margin: 10px 12px 16px;
    padding: 14px;
    background: #e5e5e6;
    border-radius: 14px;
    position: relative;
    overflow: hidden;
    box-shadow: 0 4px 12px rgba(15, 23, 42, .08);
}


/* Decorative glow */

.assessment-sidebar .sidebar-upgrade::after {
    content: "";
    position: absolute;
    width: 80px;
    height: 80px;
    right: -28px;
    top: -28px;
    border-radius: 50%;
    background: rgba(255, 222, 89, .14);
}


/* =====================================================
   CONTENT
====================================================== */

.assessment-sidebar .upgrade-content {
    position: relative;
    z-index: 1;
}

.assessment-sidebar .upgrade-title {
    margin-bottom: 4px;

    color: #000000;
    font-size: 13px;
    font-weight: 700;
}

.assessment-sidebar .upgrade-text {
    margin-bottom: 12px;

    color: #9ca3af;
    font-size: 10px;
    line-height: 1.5;
}


/* =====================================================
   BUTTON
====================================================== */

.assessment-sidebar .upgrade-button {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 8px;

    width: 100%;
    padding: 8px 10px;

    color: #111827;
    background: #ffde59;

    border-radius: 8px;

    text-decoration: none;
    font-size: 11px;
    font-weight: 700;

    transition:
        background .18s ease,
        transform .18s ease,
        box-shadow .18s ease;
}

.assessment-sidebar .upgrade-button i {
    font-size: 12px;
}

.assessment-sidebar .upgrade-button:hover {
    color: #111827;
    background: #ffe778;
    transform: translateY(-1px);
    box-shadow: 0 3px 8px rgba(0, 0, 0, .12);
}


/* =====================================================
   RESPONSIVE
====================================================== */

@media (max-width: 768px) {
    .assessment-sidebar .sidebar-upgrade {
        margin: 10px 10px 14px;
    }
}
    /* =====================================================
       ASSESSMENT SIDEBAR
    ====================================================== */

    .assessment-sidebar {
        background: #ffffff;
        border-right: 1px solid #e5e7eb;
    }


    /* =====================================================
       MENU
    ====================================================== */

    .assessment-sidebar .sidebar-menu {
        list-style: none;
        padding: 14px 12px;
        margin: 0;
    }


    /* =====================================================
       SECTION TITLE
    ====================================================== */

    .assessment-sidebar .menu-title {
        padding: 18px 12px 7px;

        color: #9ca3af;

        font-size: 10px;
        font-weight: 700;

        letter-spacing: .08em;
        text-transform: uppercase;
    }

    .assessment-sidebar .menu-title:first-child {
        padding-top: 7px;
    }


    /* =====================================================
       MENU ITEM
    ====================================================== */

    .assessment-sidebar .sidebar-menu > li:not(.menu-title) {
        margin-bottom: 3px;
    }


    /* =====================================================
       LINK
    ====================================================== */

    .assessment-sidebar .sidebar-menu > li > a {

        position: relative;

        display: flex;
        align-items: center;

        gap: 11px;

        min-height: 42px;

        padding: 9px 11px;

        color: #6b7280;

        text-decoration: none;

        font-size: 13px;
        font-weight: 500;

        border-radius: 10px;

        transition:
            color .18s ease,
            background .18s ease,
            transform .18s ease;
    }


    /* =====================================================
       ICON
    ====================================================== */

    .assessment-sidebar .menu-icon {

        width: 32px;
        height: 32px;

        flex: 0 0 32px;

        display: flex;
        align-items: center;
        justify-content: center;

        border-radius: 8px;

        color: #9ca3af;

        font-size: 15px;

        transition:
            color .18s ease,
            background .18s ease;
    }


    .assessment-sidebar .menu-text {
        white-space: nowrap;
    }


    /* =====================================================
       HOVER
    ====================================================== */

    .assessment-sidebar .sidebar-menu > li > a:hover {

        color: #111827;

        background: #f8fafc;

        transform: translateX(2px);
    }

    .assessment-sidebar .sidebar-menu > li > a:hover .menu-icon {

        color: #374151;

        background: #ffde59;
    }


    /* =====================================================
       ACTIVE
    ====================================================== */

    .assessment-sidebar .sidebar-menu > li.active > a {

        color: #111827;

        background: #f3f4f6;

        font-weight: 650;
    }


    .assessment-sidebar .sidebar-menu > li.active > a::before {

        content: "";

        position: absolute;

        left: -12px;

        top: 9px;
        bottom: 9px;

        width: 3px;

        border-radius: 0 4px 4px 0;

        background: #111827;
    }


    .assessment-sidebar .sidebar-menu > li.active .menu-icon {

        color: #111827;

        background: #ffde59;

        box-shadow:
            0 1px 2px rgba(15, 23, 42, .05);
    }


    /* =====================================================
       RESPONSIVE
    ====================================================== */

    @media (max-width: 768px) {

        .assessment-sidebar .sidebar-menu {
            padding: 12px 10px;
        }

        .assessment-sidebar .menu-title {
            padding-left: 10px;
        }

        .assessment-sidebar .sidebar-menu > li > a {
            padding: 9px 10px;
        }

    }

</style>

