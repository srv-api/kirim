<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="{{ asset('logo.png') }}">

    <title>Blog | TesThink</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
    >

    <style>

        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html,
        body {
            font-family: 'Inter', sans-serif;
            background: #fff;
            color: #111;
        }

        a {
            text-decoration: none;
        }

        /* =========================
           NAVBAR
        ========================= */

        .navbar-custom {
            background: #fff;
            border-bottom: 1px solid #eee;
            padding: 17px 0;
        }

        .navbar-brand {
            display: flex;
            align-items: center;
            gap: 10px;

            color: #111 !important;

            font-size: 21px;
            font-weight: 800;

            letter-spacing: -1px;
        }

        .brand-logo {
            width: 38px;
            height: 38px;

            display: flex;
            align-items: center;
            justify-content: center;

            background: #ffde59;
            color: #000;

            border-radius: 50%;

            font-size: 18px;
            font-weight: 800;
        }

        .navbar-custom .nav-link {
            color: #555 !important;

            font-size: 13px;
            font-weight: 500;

            padding: 9px 15px !important;

            border-radius: 7px;

            transition: .2s ease;
        }

        .navbar-custom .nav-link:hover {
            color: #111 !important;
            background: #f7f7f7;
        }

        .navbar-custom .nav-link.active {
            background: #ffde59;
            color: #000 !important;
            font-weight: 600;
        }

        .btn-login {
            background: #111;
            color: #fff !important;

            padding: 10px 18px !important;

            border-radius: 7px !important;

            font-weight: 600 !important;
        }

        .btn-login:hover {
            background: #292929 !important;
        }

        /* =========================
           BLOG HERO
        ========================= */

        .blog-header {
            background: #ffde59;

            padding: 90px 20px 85px;

            position: relative;
            overflow: hidden;
        }

        .blog-header::before {
            content: "";

            position: absolute;

            width: 320px;
            height: 320px;

            border-radius: 50%;

            background: rgba(255,255,255,.18);

            top: -170px;
            right: 5%;
        }

        .blog-header::after {
            content: "";

            position: absolute;

            width: 220px;
            height: 220px;

            border-radius: 50%;

            background: rgba(0,0,0,.04);

            bottom: -120px;
            left: 8%;
        }

        .hero-content {
            position: relative;
            z-index: 2;
        }

        .hero-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;

            padding: 8px 14px;

            background: rgba(0,0,0,.08);

            border-radius: 50px;

            color: #111;

            font-size: 11px;
            font-weight: 700;

            text-transform: uppercase;
            letter-spacing: .5px;

            margin-bottom: 20px;
        }

        .blog-header h1 {
            color: #111;

            font-size: clamp(40px, 6vw, 68px);

            font-weight: 800;

            letter-spacing: -4px;

            line-height: .98;

            margin-bottom: 20px;
        }

        .blog-header p {
            max-width: 600px;

            margin: auto;

            color: rgba(0,0,0,.65);

            font-size: 15px;
            line-height: 1.7;
        }

        /* =========================
           MAIN
        ========================= */

        .blog-main {
            padding: 70px 0;
        }

        /* =========================
           BLOG CARD
        ========================= */

        .blog-card {
            height: 100%;

            background: #fff;

            border: 1px solid #e9e9e9;

            border-radius: 14px;

            overflow: hidden;

            transition: .25s ease;
        }

        .blog-card:hover {
            transform: translateY(-5px);

            border-color: #ddd;

            box-shadow: 0 18px 45px rgba(0,0,0,.08);
        }

        .blog-img-wrapper {
            position: relative;

            height: 220px;

            overflow: hidden;

            background: #f5f5f5;
        }

        .blog-img {
            width: 100%;
            height: 100%;

            object-fit: cover;

            transition: .4s ease;
        }

        .blog-card:hover .blog-img {
            transform: scale(1.04);
        }

        .blog-category {
            position: absolute;

            top: 15px;
            left: 15px;

            background: #ffde59;
            color: #000;

            padding: 6px 11px;

            border-radius: 5px;

            font-size: 10px;
            font-weight: 700;

            text-transform: uppercase;
        }

        .blog-body {
            padding: 23px;
        }

        .blog-title {
            display: block;

            color: #111;

            font-size: 19px;
            font-weight: 700;

            line-height: 1.3;

            letter-spacing: -.5px;

            margin-bottom: 11px;

            transition: .2s ease;
        }

        .blog-title:hover {
            color: #777;
        }

        .blog-excerpt {
            color: #777;

            font-size: 13px;

            line-height: 1.7;

            margin-bottom: 18px;
        }

        .blog-meta {
            display: flex;
            align-items: center;

            gap: 10px;

            padding-top: 15px;

            border-top: 1px solid #eee;

            color: #999;

            font-size: 11px;
        }

        .blog-meta img {
            width: 32px;
            height: 32px;

            border-radius: 50%;

            object-fit: cover;
        }

        .author-name {
            color: #333;

            font-weight: 600;

            margin-bottom: 2px;
        }

        /* =========================
           SECTION TITLE
        ========================= */

        .section-title {
            display: flex;
            align-items: center;
            justify-content: space-between;

            margin-bottom: 25px;
        }

        .section-title h2 {
            font-size: 21px;

            font-weight: 700;

            letter-spacing: -1px;

            margin: 0;
        }

        .section-title span {
            color: #999;

            font-size: 12px;
        }

        /* =========================
           SIDEBAR
        ========================= */

        .sidebar-card {
            background: #fff;

            border: 1px solid #e9e9e9;

            border-radius: 14px;

            padding: 22px;

            margin-bottom: 20px;
        }

        .sidebar-title {
            display: flex;
            align-items: center;

            gap: 9px;

            color: #111;

            font-size: 15px;

            font-weight: 700;

            padding-bottom: 15px;

            margin-bottom: 12px;

            border-bottom: 1px solid #eee;
        }

        .sidebar-title i {
            color: #000;

            width: 27px;
            height: 27px;

            display: flex;
            align-items: center;
            justify-content: center;

            background: #ffde59;

            border-radius: 6px;

            font-size: 11px;
        }

        /* =========================
           SEARCH
        ========================= */

        .search-box {
            display: flex;

            border: 1px solid #ddd;

            border-radius: 8px;

            overflow: hidden;
        }

        .search-box input {
            flex: 1;

            min-width: 0;

            border: 0;

            outline: none;

            padding: 12px 14px;

            font-family: inherit;

            font-size: 13px;
        }

        .search-box button {
            width: 48px;

            border: 0;

            background: #111;

            color: #fff;

            cursor: pointer;
        }

        .search-box button:hover {
            background: #333;
        }

        /* =========================
           RECENT POSTS
        ========================= */

        .sidebar-post {
            display: flex;

            gap: 12px;

            padding: 11px 0;

            color: #111;

            border-bottom: 1px solid #f0f0f0;

            transition: .2s;
        }

        .sidebar-post:last-child {
            border-bottom: 0;
        }

        .sidebar-post:hover {
            opacity: .65;
        }

        .sidebar-post img {
            width: 65px;
            height: 65px;

            flex-shrink: 0;

            object-fit: cover;

            border-radius: 8px;
        }

        .post-title {
            color: #222;

            font-size: 12px;

            font-weight: 600;

            line-height: 1.45;

            margin-bottom: 5px;
        }

        .post-date {
            color: #aaa;

            font-size: 10px;
        }

        /* =========================
           TAG
        ========================= */

        .tag-cloud {
            display: flex;

            flex-wrap: wrap;

            gap: 7px;
        }

        .tag {
            padding: 7px 11px;

            background: #f6f6f6;

            color: #666;

            border-radius: 6px;

            font-size: 11px;

            transition: .2s;
        }

        .tag:hover {
            background: #ffde59;

            color: #000;
        }

        /* =========================
           EMPTY
        ========================= */

        .empty-state {
            padding: 80px 20px;

            text-align: center;

            border: 1px dashed #ddd;

            border-radius: 14px;
        }

        .empty-state-icon {
            width: 55px;
            height: 55px;

            display: flex;
            align-items: center;
            justify-content: center;

            margin: 0 auto 15px;

            background: #ffde59;

            border-radius: 50%;

            color: #000;
        }

        .empty-state h5 {
            font-size: 16px;

            font-weight: 700;
        }

        .empty-state p {
            color: #999;

            font-size: 13px;
        }

        /* =========================
           PAGINATION
        ========================= */

        .pagination {
            gap: 5px;
        }

        .pagination .page-link {
            border: 1px solid #e5e5e5;

            border-radius: 7px !important;

            color: #111;

            font-size: 12px;

            padding: 8px 13px;
        }

        .pagination .page-link:hover {
            background: #ffde59;

            border-color: #ffde59;

            color: #000;
        }

        .pagination .active .page-link {
            background: #111;

            border-color: #111;

            color: #fff;
        }

        /* =========================
           FOOTER
        ========================= */

        .footer-custom {
            background: #111;

            color: rgba(255,255,255,.55);

            padding: 35px 0;
        }

        .footer-logo {
            display: inline-flex;

            align-items: center;

            gap: 8px;

            color: #fff;

            font-size: 17px;

            font-weight: 700;
        }

        .footer-logo span {
            width: 30px;
            height: 30px;

            display: flex;
            align-items: center;
            justify-content: center;

            background: #ffde59;

            color: #000;

            border-radius: 50%;

            font-size: 14px;

            font-weight: 800;
        }

        .footer-custom p {
            margin: 10px 0 0;

            font-size: 11px;
        }

        .footer-custom a {
            color: #ffde59;
        }

        /* =========================
           MOBILE
        ========================= */

        @media (max-width: 991px) {

            .sidebar {
                margin-top: 40px;
            }

        }

        @media (max-width: 768px) {

            .navbar-custom {
                padding: 12px 0;
            }

            .blog-header {
                padding: 65px 20px;
            }

            .blog-header h1 {
                font-size: 44px;

                letter-spacing: -2.5px;
            }

            .blog-main {
                padding: 45px 0;
            }

            .blog-img-wrapper {
                height: 200px;
            }

        }

        @media (max-width: 480px) {

            .blog-header h1 {
                font-size: 38px;
            }

            .blog-header p {
                font-size: 13px;
            }

            .blog-body {
                padding: 18px;
            }

            .blog-title {
                font-size: 17px;
            }

        }

    </style>

</head>

<body>


{{-- =========================
     NAVBAR
========================= --}}

<nav class="navbar navbar-expand-lg navbar-custom">

    <div class="container">

        <a
            class="navbar-brand"
            href="{{ route('home') }}"
        >

            <span class="brand-logo">
                Y
            </span>

            TesThink

        </a>


        <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#mainNav"
            style="border:0;"
        >

            <i class="fas fa-bars"></i>

        </button>


        <div
            class="collapse navbar-collapse"
            id="mainNav"
        >

            <ul class="navbar-nav ms-auto align-items-lg-center">

                <li class="nav-item">

                    <a
                        href="{{ route('home') }}"
                        class="nav-link"
                    >
                        Beranda
                    </a>

                </li>


                <li class="nav-item">

                    <a
                        href="{{ route('blog') }}"
                        class="nav-link active"
                    >
                        Blog
                    </a>

                </li>


                @if(Route::has('login'))

                    <li class="nav-item ms-lg-2 mt-2 mt-lg-0">

                        <a
                            href="{{ route('login') }}"
                            class="nav-link btn-login"
                        >
                            Masuk
                        </a>

                    </li>

                @endif

            </ul>

        </div>

    </div>

</nav>



{{-- =========================
     HERO
========================= --}}

<section class="blog-header">

    <div class="container">

        <div class="hero-content text-center">

            <div class="hero-badge">

                <i class="fas fa-newspaper"></i>

                Artikel TesThink

            </div>


            <h1>
                Insight untuk<br>
                bisnis yang lebih baik.
            </h1>


            <p>
                Tips, informasi, dan wawasan seputar
                kasir, penjualan, stok, dan pengelolaan
                bisnis bersama TesThink.
            </p>

        </div>

    </div>

</section>



{{-- =========================
     BLOG
========================= --}}

<main class="blog-main">

    <div class="container">

        <div class="row">


            {{-- =====================
                 BLOG LIST
            ====================== --}}

            <div class="col-lg-8">

                <div class="section-title">

                    <h2>
                        Artikel terbaru
                    </h2>

                    <span>
                        {{ isset($blogs) ? $blogs->count() : 0 }}
                        artikel
                    </span>

                </div>


                <div class="row g-4">

                    @forelse($blogs as $blog)

                        <div class="col-md-6">

                            <article class="blog-card">

                                <div class="blog-img-wrapper">

                                    <img
                                        src="{{ $blog->image ?? 'https://picsum.photos/800/400?random='.$loop->index }}"
                                        alt="{{ $blog->title }}"
                                        class="blog-img"
                                        loading="lazy"
                                    >

                                    <span class="blog-category">

                                        {{ $blog->category ?? 'Umum' }}

                                    </span>

                                </div>


                                <div class="blog-body">

                                    <a
                                        href="{{ route('blog.detail', $blog->slug) }}"
                                        class="blog-title"
                                    >
                                        {{ $blog->title }}
                                    </a>


                                    <p class="blog-excerpt">

                                        {{ Str::limit(
                                            $blog->excerpt ?? $blog->content,
                                            120
                                        ) }}

                                    </p>


                                    <div class="blog-meta">

                                        <img
                                            src="{{ $blog->author_avatar ?? 'https://ui-avatars.com/api/?name='.urlencode($blog->author ?? 'Admin').'&background=ffde59&color=000&size=32' }}"
                                            alt="{{ $blog->author ?? 'Admin' }}"
                                        >


                                        <div>

                                            <div class="author-name">

                                                {{ $blog->author ?? 'Admin' }}

                                            </div>


                                            <div>

                                                <i class="far fa-calendar"></i>

                                                {{ $blog->published_at
                                                    ? $blog->published_at->format('d M Y')
                                                    : $blog->created_at->format('d M Y')
                                                }}

                                                <span class="mx-1">
                                                    •
                                                </span>

                                                <i class="far fa-clock"></i>

                                                {{ $blog->read_time ?? '3 min read' }}

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </article>

                        </div>

                    @empty

                        <div class="col-12">

                            <div class="empty-state">

                                <div class="empty-state-icon">

                                    <i class="fas fa-newspaper"></i>

                                </div>


                                <h5>
                                    Belum ada artikel
                                </h5>


                                <p>
                                    Belum ada artikel yang dipublikasikan
                                    saat ini.
                                </p>

                            </div>

                        </div>

                    @endforelse

                </div>



                {{-- PAGINATION --}}

                @if(isset($blogs) && method_exists($blogs, 'links'))

                    <div class="mt-5">

                        {{ $blogs->links('pagination::bootstrap-5') }}

                    </div>

                @endif

            </div>



            {{-- =====================
                 SIDEBAR
            ====================== --}}

            <div class="col-lg-4 sidebar">


                {{-- SEARCH --}}

                <div class="sidebar-card">

                    <h5 class="sidebar-title">

                        <i class="fas fa-search"></i>

                        Cari artikel

                    </h5>


                    <form
                        action="{{ route('blog.search') }}"
                        method="GET"
                    >

                        <div class="search-box">

                            <input
                                type="text"
                                name="q"
                                placeholder="Cari artikel..."
                                value="{{ request('q') }}"
                            >


                            <button type="submit">

                                <i class="fas fa-search"></i>

                            </button>

                        </div>

                    </form>

                </div>



                {{-- RECENT POSTS --}}

                <div class="sidebar-card">

                    <h5 class="sidebar-title">

                        <i class="fas fa-clock"></i>

                        Artikel terbaru

                    </h5>


                    @forelse($recentPosts ?? [] as $post)

                        <a
                            href="{{ route('blog.detail', $post->slug) }}"
                            class="sidebar-post"
                        >

                            <img
                                src="{{ $post->image ?? 'https://picsum.photos/70/70?random='.$loop->index }}"
                                alt="{{ $post->title }}"
                            >


                            <div>

                                <div class="post-title">

                                    {{ $post->title }}

                                </div>


                                <div class="post-date">

                                    <i class="far fa-calendar"></i>

                                    {{ $post->published_at
                                        ? $post->published_at->format('d M Y')
                                        : $post->created_at->format('d M Y')
                                    }}

                                </div>

                            </div>

                        </a>

                    @empty

                        <p class="text-muted text-center mb-0">

                            Belum ada artikel.

                        </p>

                    @endforelse

                </div>



                {{-- CATEGORY --}}

                <div class="sidebar-card">

                    <h5 class="sidebar-title">

                        <i class="fas fa-tags"></i>

                        Kategori

                    </h5>


                    <div class="tag-cloud">

                        @forelse($categories ?? [] as $category)

                            <a
                                href="{{ route('blog.category', $category->slug) }}"
                                class="tag"
                            >

                                {{ $category->name }}

                            </a>

                        @empty

                            <span class="text-muted">

                                Belum ada kategori.

                            </span>

                        @endforelse

                    </div>

                </div>

            </div>

        </div>

    </div>

</main>



{{-- =========================
     FOOTER
========================= --}}

<footer class="footer-custom">

    <div class="container text-center">

        <div class="footer-logo">

            <span>Y</span>

            TesThink

        </div>


        <p>

            © {{ date('Y') }} TesThink.
            Solusi POS sederhana untuk bisnis Anda.

        </p>

    </div>

</footer>



<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
</script>

</body>

</html>