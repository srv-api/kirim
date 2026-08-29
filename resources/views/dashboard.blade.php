<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <title>Dashboard</title>

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1"
    >

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >


    <style>

        /* =====================================================
           RESET
        ====================================================== */

        * {
            box-sizing: border-box;
        }


        html,
        body {
            margin: 0;
            padding: 0;
            min-height: 100%;
        }


        body {
            overflow-x: hidden;

            background: #f4f6f8;

            font-family:
                "Segoe UI",
                Arial,
                sans-serif;

            color: #111;
        }


        /* =====================================================
           NAVBAR
        ====================================================== */

        .navbar-custom {

            height: 56px;

            position: fixed;

            top: 0;
            left: 0;
            right: 0;

            z-index: 1200;

        }


        #toggleSidebar {

            width: 38px;
            height: 34px;

            display: flex;

            align-items: center;
            justify-content: center;

            padding: 0;

            font-size: 18px;

        }


        /* =====================================================
           SIDEBAR
        ====================================================== */

        #sidebarWrapper {

            width: 250px;
            min-width: 250px;

            height: calc(100vh - 56px);

            position: fixed;

            top: 56px;
            left: 0;

            background: #fff;

            border-right: 1px solid #e5e5e5;

            z-index: 1100;

            overflow-y: auto;
            overflow-x: hidden;

            transition:
                width .25s ease,
                min-width .25s ease,
                transform .25s ease;

            scrollbar-width: thin;

            scrollbar-color:
                #d5d5d5
                transparent;

        }


        /* Chrome scrollbar */

        #sidebarWrapper::-webkit-scrollbar {
            width: 6px;
        }


        #sidebarWrapper::-webkit-scrollbar-track {
            background: transparent;
        }


        #sidebarWrapper::-webkit-scrollbar-thumb {

            background: #d5d5d5;

            border-radius: 10px;

        }


        #sidebarWrapper::-webkit-scrollbar-thumb:hover {
            background: #aaa;
        }


        /* =====================================================
           SIDEBAR
        ====================================================== */

        .sidebar {

            width: 100%;

            min-height: 100%;

            padding:
                20px
                12px
                40px;

            background: #fff;

        }


        /* =====================================================
           MENU
        ====================================================== */

        .sidebar-menu {

            list-style: none;

            margin: 0;

            padding: 0;

        }


        .sidebar-menu li {
            margin: 2px 0;
        }


        .sidebar-menu a {

            display: flex;

            align-items: center;

            width: 100%;

            min-height: 42px;

            padding:
                10px
                12px;

            border-radius: 7px;

            color: #222;

            text-decoration: none;

            font-size: 14px;

            transition:
                background .2s ease,
                color .2s ease;

        }


        .sidebar-menu a:hover {

            background: #f3f3f3;

            color: #000;

        }


        .sidebar-menu li.active > a {

            background: #eeeeee;

            color: #000;

            font-weight: 600;

        }


        /* =====================================================
           ICON
        ====================================================== */

        .menu-icon {

            width: 28px;

            min-width: 28px;

            margin-right: 8px;

            text-align: center;

            font-size: 17px;

            line-height: 1;

        }


        /* =====================================================
           MENU TITLE
        ====================================================== */

        .menu-title {

            margin-top: 22px !important;

            margin-bottom: 7px !important;

            padding:
                0
                12px;

            color: #888;

            font-size: 11px;

            font-weight: 700;

            text-transform: uppercase;

            letter-spacing: .7px;

        }


        .menu-title:first-child {

            margin-top: 0 !important;

        }


        /* =====================================================
           SUBMENU ARROW
        ====================================================== */

        .submenu-arrow {

            margin-left: auto;

            width: 20px;

            min-width: 20px;

            text-align: center;

            font-size: 18px;

            line-height: 1;

            color: #888;

            transition:
                transform .2s ease;

        }


        /* =====================================================
           SUBMENU
        ====================================================== */

        .submenu {

            list-style: none;

            margin:
                2px
                0
                5px
                0;

            padding:
                0
                0
                0
                18px;

            border-left:
                1px
                solid
                #e5e5e5;

        }


        .submenu li {
            margin: 1px 0;
        }


        .submenu a {

            min-height: 38px;

            padding:
                8px
                10px;

            font-size: 13px;

            color: #666;

            border-radius: 6px;

        }


        .submenu a:hover {

            background: #f6f6f6;

            color: #111;

        }


        .submenu li.active > a {

            background: #f0f0f0;

            color: #000;

            font-weight: 600;

        }


        .submenu .menu-icon {
            font-size: 14px;
        }


        /* =====================================================
           SUB SUBMENU
        ====================================================== */

        .sub-submenu {

            list-style: none;

            margin:
                0
                0
                5px
                18px;

            padding:
                0
                0
                0
                14px;

            border-left:
                1px
                solid
                #ededed;

        }


        .sub-submenu li {
            margin: 1px 0;
        }


        .sub-submenu a {

            min-height: 35px;

            padding:
                7px
                10px;

            font-size: 12px;

            color: #777;

            border-radius: 5px;

        }


        .sub-submenu a:hover {

            background: #f7f7f7;

            color: #111;

        }


        .sub-submenu li.active > a {

            background: #f0f0f0;

            color: #000;

            font-weight: 600;

        }


        .sub-submenu .menu-icon {
            font-size: 13px;
        }


        /* =====================================================
           CONTENT
        ====================================================== */

        #contentWrapper {

            width:
                calc(100% - 250px);

            margin-left: 250px;

            min-height: 100vh;

            padding:
                81px
                25px
                25px;

            transition:
                width .25s ease,
                margin-left .25s ease;

        }


        .content-area {

            width: 100%;

            min-height:
                calc(100vh - 106px);

            padding: 25px;

            background: #fff;

            border-radius: 8px;

            box-shadow:
                0
                0
                10px
                rgba(0, 0, 0, .05);

        }


        /* =====================================================
           FOOTER
        ====================================================== */

        .dashboard-footer {

            margin-left: 250px;

            transition:
                margin-left .25s ease;

        }


        /* =====================================================
           SIDEBAR COLLAPSED
        ====================================================== */

        body.sidebar-collapsed #sidebarWrapper {

            width: 75px;

            min-width: 75px;

        }


        body.sidebar-collapsed #contentWrapper {

            width:
                calc(100% - 75px);

            margin-left: 75px;

        }


        body.sidebar-collapsed .dashboard-footer {

            margin-left: 75px;

        }


        /* =====================================================
           HIDE TEXT SAAT COLLAPSED
        ====================================================== */

        body.sidebar-collapsed
        .sidebar-menu a > span:not(.menu-icon):not(.submenu-arrow) {

            display: none;

        }


        /* =====================================================
           CENTER ICON
        ====================================================== */

        body.sidebar-collapsed
        .sidebar-menu a {

            justify-content: center;

            padding:
                10px
                8px;

        }


        body.sidebar-collapsed
        .menu-icon {

            margin-right: 0;

        }


        /* =====================================================
           HIDE ARROW
        ====================================================== */

        body.sidebar-collapsed
        .submenu-arrow {

            display: none;

        }


        /* =====================================================
           HIDE SUBMENU
        ====================================================== */

        body.sidebar-collapsed
        .submenu,

        body.sidebar-collapsed
        .sub-submenu {

            display: none !important;

        }


        /* =====================================================
           MENU TITLE COLLAPSED
        ====================================================== */

        body.sidebar-collapsed
        .menu-title {

            height: 1px;

            margin:
                15px
                8px !important;

            padding: 0;

            background: #e5e5e5;

            font-size: 0;

            overflow: hidden;

        }


        /* =====================================================
           MOBILE
        ====================================================== */

        @media (max-width: 767px) {

            #sidebarWrapper {

                width: 230px;

                min-width: 230px;

                transform:
                    translateX(-100%);

            }


            #contentWrapper {

                width: 100%;

                margin-left: 0;

                padding:
                    71px
                    15px
                    15px;

            }


            .content-area {

                padding: 18px;

                min-height:
                    calc(100vh - 86px);

            }


            .dashboard-footer {

                margin-left: 0;

            }


            /* Mobile sidebar open */

            body.sidebar-mobile-open
            #sidebarWrapper {

                transform:
                    translateX(0);

            }


            /* Overlay */

            body.sidebar-mobile-open::after {

                content: "";

                position: fixed;

                top: 56px;

                left: 0;

                right: 0;

                bottom: 0;

                background:
                    rgba(0, 0, 0, .25);

                z-index: 1050;

            }


            body.sidebar-collapsed
            #contentWrapper {

                width: 100%;

                margin-left: 0;

            }


            body.sidebar-collapsed
            .dashboard-footer {

                margin-left: 0;

            }

        }


        /* =====================================================
           TABLET
        ====================================================== */

        @media (min-width: 768px)
        and (max-width: 991px) {

            #sidebarWrapper {

                width: 220px;

                min-width: 220px;

            }


            #contentWrapper {

                width:
                    calc(100% - 220px);

                margin-left: 220px;

            }


            .dashboard-footer {

                margin-left: 220px;

            }


            body.sidebar-collapsed
            #sidebarWrapper {

                width: 75px;

                min-width: 75px;

            }


            body.sidebar-collapsed
            #contentWrapper {

                width:
                    calc(100% - 75px);

                margin-left: 75px;

            }


            body.sidebar-collapsed
            .dashboard-footer {

                margin-left: 75px;

            }

        }

    </style>

</head>


<body>


{{-- =====================================================
     NAVBAR
====================================================== --}}

@include('partials.navbar')


{{-- =====================================================
     DASHBOARD WRAPPER
====================================================== --}}

<div class="dashboard-wrapper">


    {{-- =================================================
         SIDEBAR
    ================================================== --}}

    <aside id="sidebarWrapper">

        @include('partials.sidebar')

    </aside>


    {{-- =================================================
         CONTENT
    ================================================== --}}

    <main id="contentWrapper">

        <div class="content-area">

            @yield('content')

        </div>

    </main>


</div>


{{-- =====================================================
     FOOTER
====================================================== --}}

<div class="dashboard-footer">

    @include('partials.footer')

</div>


{{-- =====================================================
     JAVASCRIPT
====================================================== --}}

<script>

document.addEventListener('DOMContentLoaded', function () {


    /* =====================================================
       ELEMENT
    ====================================================== */

    const toggleButton =
        document.getElementById('toggleSidebar');

    const sidebar =
        document.getElementById('sidebarWrapper');


    /* =====================================================
       TOGGLE SIDEBAR
    ====================================================== */

    if (toggleButton) {

        toggleButton.addEventListener('click', function (event) {

            event.stopPropagation();


            /* ---------------------------------------------
               MOBILE
            --------------------------------------------- */

            if (window.innerWidth <= 767) {

                document.body.classList.toggle(
                    'sidebar-mobile-open'
                );

                return;

            }


            /* ---------------------------------------------
               DESKTOP / TABLET
            --------------------------------------------- */

            document.body.classList.toggle(
                'sidebar-collapsed'
            );

        });

    }


    /* =====================================================
       SUBMENU TOGGLE
    ====================================================== */

    const submenuButtons =
        document.querySelectorAll(
            '[data-submenu-toggle]'
        );


    submenuButtons.forEach(function (button) {

        button.addEventListener('click', function (event) {

            event.preventDefault();

            event.stopPropagation();


            const target =
                this.getAttribute(
                    'data-submenu-toggle'
                );


            const submenu =
                document.getElementById(target);


            if (!submenu) {
                return;
            }


            const isClosed =
                submenu.classList.contains('d-none');


            /* ---------------------------------------------
               TOGGLE
            --------------------------------------------- */

            submenu.classList.toggle(
                'd-none'
            );


            /* ---------------------------------------------
               ARROW
            --------------------------------------------- */

            const arrow =
                this.querySelector(
                    '.submenu-arrow'
                );


            if (arrow) {

                arrow.textContent =
                    isClosed
                        ? '⌄'
                        : '›';

            }

        });

    });


    /* =====================================================
       AUTO OPEN MENU AKTIF
    ====================================================== */

    document
        .querySelectorAll('.submenu')
        .forEach(function (submenu) {


            const activeItem =
                submenu.querySelector('.active');


            if (!activeItem) {
                return;
            }


            /* ---------------------------------------------
               OPEN SUBMENU
            --------------------------------------------- */

            submenu.classList.remove(
                'd-none'
            );


            /* ---------------------------------------------
               OPEN ARROW
            --------------------------------------------- */

            const parentButton =
                document.querySelector(
                    '[data-submenu-toggle="' +
                    submenu.id +
                    '"]'
                );


            if (parentButton) {

                const arrow =
                    parentButton.querySelector(
                        '.submenu-arrow'
                    );


                if (arrow) {

                    arrow.textContent = '⌄';

                }

            }


            /* ---------------------------------------------
               OPEN PARENT SUBMENU
            --------------------------------------------- */

            let parentSubmenu =
                submenu.parentElement.closest(
                    '.submenu'
                );


            while (parentSubmenu) {


                parentSubmenu.classList.remove(
                    'd-none'
                );


                const parentButton =
                    document.querySelector(
                        '[data-submenu-toggle="' +
                        parentSubmenu.id +
                        '"]'
                    );


                if (parentButton) {

                    const parentArrow =
                        parentButton.querySelector(
                            '.submenu-arrow'
                        );


                    if (parentArrow) {

                        parentArrow.textContent =
                            '⌄';

                    }

                }


                parentSubmenu =
                    parentSubmenu.parentElement.closest(
                        '.submenu'
                    );

            }

        });


    /* =====================================================
       KLIK DI LUAR SIDEBAR MOBILE
    ====================================================== */

    document.addEventListener(
        'click',
        function (event) {


            if (
                window.innerWidth <= 767 &&
                document.body.classList.contains(
                    'sidebar-mobile-open'
                )
            ) {


                if (
                    sidebar &&
                    !sidebar.contains(event.target) &&
                    toggleButton &&
                    !toggleButton.contains(event.target)
                ) {


                    document.body.classList.remove(
                        'sidebar-mobile-open'
                    );

                }

            }

        }
    );


    /* =====================================================
       KLIK OVERLAY MOBILE
    ====================================================== */

    document.addEventListener(
        'click',
        function (event) {


            if (
                window.innerWidth <= 767 &&
                document.body.classList.contains(
                    'sidebar-mobile-open'
                )
            ) {


                const sidebarRect =
                    sidebar.getBoundingClientRect();


                const clickedOutside =
                    event.clientX >
                    sidebarRect.right;


                if (clickedOutside) {

                    document.body.classList.remove(
                        'sidebar-mobile-open'
                    );

                }

            }

        }
    );


    /* =====================================================
       RESIZE
    ====================================================== */

    window.addEventListener(
        'resize',
        function () {


            if (window.innerWidth > 767) {

                document.body.classList.remove(
                    'sidebar-mobile-open'
                );

            }


        }
    );

});

</script>


</body>

</html>