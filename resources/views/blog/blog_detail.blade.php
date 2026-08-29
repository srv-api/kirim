<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $blog->title ?? 'Blog Detail' }} | TesThink</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
          rel="stylesheet">

    <style>

        /* =========================================
           GLOBAL
        ========================================= */

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            background: #f7f7f7;
            color: #111;
            font-family: 'Inter', sans-serif;
        }

        a {
            text-decoration: none;
        }


        /* =========================================
           NAVBAR
        ========================================= */

        .navbar-custom {
            background: #fff;
            border-bottom: 1px solid #eee;
            padding: 16px 0;
        }

        .navbar-brand {
            display: flex;
            align-items: center;
            gap: 10px;

            color: #111 !important;

            font-size: 20px;
            font-weight: 800;

            letter-spacing: -1px;
        }

        .brand-logo {
            width: 34px;
            height: 34px;

            display: flex;
            align-items: center;
            justify-content: center;

            background: #ffde59;
            color: #000;

            border-radius: 50%;

            font-size: 16px;
            font-weight: 800;
        }

        .navbar-nav {
            gap: 5px;
        }

        .navbar-custom .nav-link {
            color: #555 !important;

            font-size: 13px;
            font-weight: 500;

            padding: 9px 15px !important;

            border-radius: 7px;

            transition: .2s;
        }

        .navbar-custom .nav-link:hover {
            color: #111 !important;
            background: #f5f5f5;
        }

        .navbar-custom .nav-link.active {
            color: #111 !important;
            background: #f3f3f3;

            font-weight: 600;
        }

        .btn-login {
            margin-left: 8px;

            display: inline-block;

            padding: 9px 18px;

            border-radius: 7px;

            background: #111;
            color: #fff !important;

            font-size: 13px;
            font-weight: 600;

            transition: .2s;
        }

        .btn-login:hover {
            background: #292929;
            color: #fff !important;

            transform: translateY(-1px);
        }


        /* =========================================
           MAIN
        ========================================= */

        .main-content {
            padding: 45px 0 70px;
        }


        /* =========================================
           ARTICLE CARD
        ========================================= */

        .article-card {
            background: #fff;

            border: 1px solid #eee;
            border-radius: 16px;

            overflow: hidden;

            box-shadow: 0 8px 30px rgba(0, 0, 0, .04);
        }

        .article-inner {
            padding: 40px;
        }


        /* =========================================
           BACK BUTTON
        ========================================= */

        .back-button {
            display: inline-flex;
            align-items: center;
            gap: 8px;

            color: #555;

            font-size: 12px;
            font-weight: 500;

            margin-bottom: 25px;

            transition: .2s;
        }

        .back-button:hover {
            color: #111;
        }


        /* =========================================
           ARTICLE TITLE
        ========================================= */

        .article-title {
            color: #111;

            font-size: 34px;
            line-height: 1.25;

            font-weight: 700;

            letter-spacing: -1px;

            margin-bottom: 25px;
        }


        /* =========================================
           FEATURED IMAGE
        ========================================= */

        .featured-image {
            width: 100%;
            height: 420px;

            object-fit: cover;

            border-radius: 12px;

            margin-bottom: 28px;
        }


        /* =========================================
           ARTICLE META
        ========================================= */

        .article-meta {
            display: flex;
            align-items: center;
            flex-wrap: wrap;

            gap: 18px;

            padding-bottom: 22px;
            margin-bottom: 28px;

            border-bottom: 1px solid #eee;

            color: #888;

            font-size: 12px;
        }

        .author-info {
            display: flex;
            align-items: center;

            gap: 10px;
        }

        .author-info img {
            width: 38px;
            height: 38px;

            border-radius: 50%;

            object-fit: cover;
        }

        .author-name {
            color: #111;

            font-weight: 600;

            margin-bottom: 2px;
        }

        .meta-divider {
            width: 3px;
            height: 3px;

            background: #ccc;

            border-radius: 50%;
        }


        /* =========================================
           ARTICLE CONTENT
        ========================================= */

        .article-content {
            color: #333;

            font-size: 15px;

            line-height: 1.9;
        }

        .article-content p {
            margin-bottom: 18px;
        }

        .article-content h2 {
            color: #111;

            font-size: 25px;
            font-weight: 700;

            margin-top: 35px;
            margin-bottom: 15px;

            letter-spacing: -.8px;
        }

        .article-content h3 {
            color: #111;

            font-size: 20px;
            font-weight: 600;

            margin-top: 28px;
            margin-bottom: 12px;
        }

        .article-content ul,
        .article-content ol {
            padding-left: 25px;

            margin-bottom: 20px;
        }

        .article-content li {
            margin-bottom: 7px;
        }

        .article-content blockquote {
            margin: 25px 0;

            padding: 18px 22px;

            background: #fafafa;

            border-left: 3px solid #ffde59;

            color: #444;

            border-radius: 0 8px 8px 0;

            font-style: italic;
        }

        .article-content img {
            max-width: 100%;

            border-radius: 12px;

            margin: 25px 0;
        }

        .article-content a {
            color: #111;

            font-weight: 600;

            text-decoration: underline;
        }


        /* =========================================
           TAGS
        ========================================= */

        .article-tags {
            margin-top: 35px;

            padding-top: 22px;

            border-top: 1px solid #eee;
        }

        .tag-title {
            font-size: 12px;

            font-weight: 600;

            margin-right: 8px;
        }

        .tag {
            display: inline-block;

            padding: 6px 12px;

            margin: 3px;

            background: #f5f5f5;

            color: #555;

            border-radius: 6px;

            font-size: 11px;

            transition: .2s;
        }

        .tag:hover {
            background: #111;

            color: #fff;
        }


        /* =========================================
           SHARE
        ========================================= */

        .share-section {
            display: flex;
            align-items: center;

            flex-wrap: wrap;

            gap: 9px;

            margin-top: 25px;

            padding-top: 22px;

            border-top: 1px solid #eee;
        }

        .share-title {
            margin-right: 5px;

            font-size: 12px;

            font-weight: 600;
        }

        .share-btn {
            width: 34px;
            height: 34px;

            display: flex;
            align-items: center;
            justify-content: center;

            border: 1px solid #ddd;

            border-radius: 7px;

            background: #fff;

            color: #555;

            font-size: 12px;

            transition: .2s;
        }

        .share-btn:hover {
            background: #111;

            border-color: #111;

            color: #fff;
        }


        /* =========================================
           COMMENTS
        ========================================= */

        .comments-card {
            margin-top: 25px;

            background: #fff;

            border: 1px solid #eee;

            border-radius: 16px;

            padding: 30px;

            box-shadow: 0 8px 30px rgba(0, 0, 0, .03);
        }

        .section-title {
            font-size: 17px;

            font-weight: 700;

            margin-bottom: 20px;

            letter-spacing: -.4px;
        }

        .comment-form {
            display: flex;

            gap: 10px;
        }

        .comment-input {
            height: 45px;

            border: 1px solid #ddd;

            border-radius: 7px;

            font-size: 13px;

            box-shadow: none !important;
        }

        .comment-input:focus {
            border-color: #111;
        }

        .comment-button {
            height: 45px;

            padding: 0 18px;

            border: none;

            border-radius: 7px;

            background: #111;

            color: #fff;

            font-size: 12px;

            font-weight: 600;

            white-space: nowrap;
        }

        .comment-button:hover {
            background: #292929;
        }

        .login-alert {
            background: #fafafa;

            border: 1px solid #eee;

            color: #666;

            border-radius: 8px;

            padding: 15px;

            font-size: 12px;

            text-align: center;
        }

        .login-alert a {
            color: #111;

            font-weight: 600;
        }

        .comment-item {
            display: flex;

            gap: 12px;

            padding: 18px 0;

            border-bottom: 1px solid #eee;
        }

        .comment-avatar {
            width: 38px;
            height: 38px;

            border-radius: 50%;

            object-fit: cover;

            flex-shrink: 0;
        }

        .comment-name {
            font-size: 13px;

            font-weight: 600;
        }

        .comment-date {
            margin-top: 2px;

            color: #aaa;

            font-size: 10px;
        }

        .comment-text {
            margin-top: 7px;

            margin-bottom: 0;

            color: #555;

            font-size: 12px;

            line-height: 1.6;
        }


        /* =========================================
           SIDEBAR
        ========================================= */

        .sidebar-card {
            background: #fff;

            border: 1px solid #eee;

            border-radius: 16px;

            padding: 24px;

            margin-bottom: 20px;

            box-shadow: 0 8px 30px rgba(0, 0, 0, .03);
        }

        .sidebar-title {
            display: flex;
            align-items: center;

            gap: 8px;

            color: #111;

            font-size: 14px;

            font-weight: 700;

            padding-bottom: 15px;

            margin-bottom: 10px;

            border-bottom: 1px solid #eee;
        }

        .sidebar-title i {
            color: #999;
        }


        /* =========================================
           RELATED POST
        ========================================= */

        .sidebar-post {
            display: flex;

            gap: 12px;

            padding: 12px 0;

            color: #111;

            border-bottom: 1px solid #f1f1f1;

            transition: .2s;
        }

        .sidebar-post:last-child {
            border-bottom: none;
        }

        .sidebar-post:hover {
            color: #111;

            transform: translateX(3px);
        }

        .sidebar-post img {
            width: 62px;
            height: 62px;

            object-fit: cover;

            border-radius: 8px;

            flex-shrink: 0;
        }

        .post-title {
            font-size: 12px;

            font-weight: 600;

            line-height: 1.5;

            margin-bottom: 5px;
        }

        .post-date {
            color: #aaa;

            font-size: 10px;
        }


        /* =========================================
           CATEGORY
        ========================================= */

        .tag-cloud {
            display: flex;

            flex-wrap: wrap;

            gap: 6px;
        }

        .category-tag {
            padding: 7px 11px;

            background: #f6f6f6;

            color: #555;

            border-radius: 6px;

            font-size: 11px;

            transition: .2s;
        }

        .category-tag:hover {
            background: #111;

            color: #fff;
        }


        /* =========================================
           NEWSLETTER
        ========================================= */

        .newsletter {
            background: #111;

            color: #fff;
        }

        .newsletter .sidebar-title {
            color: #fff;

            border-color: rgba(255, 255, 255, .12);
        }

        .newsletter p {
            color: rgba(255, 255, 255, .6);

            font-size: 12px;

            line-height: 1.7;

            margin-bottom: 15px;
        }

        .newsletter-input {
            height: 43px;

            background: #222;

            border: 1px solid #333;

            color: #fff;

            font-size: 12px;

            border-radius: 7px 0 0 7px !important;
        }

        .newsletter-input:focus {
            background: #222;

            color: #fff;

            border-color: #555;

            box-shadow: none;
        }

        .newsletter-input::placeholder {
            color: #777;
        }

        .newsletter-button {
            border: none;

            background: #ffde59;

            color: #111;

            font-size: 11px;

            font-weight: 700;

            border-radius: 0 7px 7px 0 !important;
        }

        .newsletter-button:hover {
            background: #f5d34d;

            color: #111;
        }


        /* =========================================
           FOOTER
        ========================================= */

        .footer {
            background: #111;

            color: rgba(255, 255, 255, .5);

            padding: 35px 0;

            font-size: 11px;
        }

        .footer-brand {
            color: #fff;

            font-weight: 700;

            font-size: 15px;
        }

        .footer a {
            color: #ffde59;
        }


        /* =========================================
           RESPONSIVE
        ========================================= */

        @media (max-width: 991px) {

            .article-inner {
                padding: 30px;
            }

            .featured-image {
                height: 350px;
            }

            .sidebar {
                margin-top: 25px;
            }

        }


        @media (max-width: 768px) {

            .article-inner {
                padding: 22px;
            }

            .article-title {
                font-size: 27px;

                letter-spacing: -.7px;
            }

            .featured-image {
                height: 250px;
            }

            .comments-card {
                padding: 22px;
            }

        }


        @media (max-width: 480px) {

            .navbar-custom {
                padding: 12px 0;
            }

            .article-inner {
                padding: 18px;
            }

            .article-title {
                font-size: 24px;
            }

            .featured-image {
                height: 200px;
            }

            .article-content {
                font-size: 14px;
            }

            .article-meta {
                gap: 10px;
            }

            .meta-divider {
                display: none;
            }

            .comment-form {
                flex-direction: column;
            }

            .comment-button {
                width: 100%;
            }

        }

    </style>

</head>


<body>


<!-- =====================================================
     NAVBAR
===================================================== -->

<nav class="navbar navbar-expand-lg navbar-custom">

    <div class="container">

        <!-- BRAND -->

        <a
            class="navbar-brand"
            href="{{ route('home') }}"
        >

            <span class="brand-logo">
                Y
            </span>

            TesThink

        </a>


        <!-- MOBILE BUTTON -->

        <button
            class="navbar-toggler border-0 shadow-none"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#mainNav"
        >

            <i class="fas fa-bars"></i>

        </button>


        <!-- MENU -->

        <div
            class="collapse navbar-collapse"
            id="mainNav"
        >

            <ul class="navbar-nav ms-auto align-items-lg-center">


                <!-- HOME -->

                <li class="nav-item">

                    <a
                        href="{{ route('home') }}"
                        class="nav-link"
                    >

                        <i class="fas fa-home me-1"></i>

                        Beranda

                    </a>

                </li>


                <!-- BLOG -->

                <li class="nav-item">

                    <a
                        href="{{ route('blog') }}"
                        class="nav-link active"
                    >

                        <i class="fas fa-newspaper me-1"></i>

                        Blog

                    </a>

                </li>


                <!-- LOGIN -->

                @guest

                    <li class="nav-item">

                        <a
                            href="{{ route('login') }}"
                            class="btn-login"
                        >

                            Masuk

                        </a>

                    </li>

                @endguest


            </ul>

        </div>

    </div>

</nav>



<!-- =====================================================
     MAIN CONTENT
===================================================== -->

<main class="main-content">

    <div class="container">

        <div class="row">


            <!-- =================================================
                 ARTICLE
            ================================================= -->

            <div class="col-lg-8">

                <article class="article-card">

                    <div class="article-inner">


                        <!-- KEMBALI -->

                        <a
                            href="{{ route('blog') }}"
                            class="back-button"
                        >

                            <i class="fas fa-arrow-left"></i>

                            Kembali ke Blog

                        </a>


                        <!-- JUDUL -->

                        <h1 class="article-title">

                            {{ $blog->title }}

                        </h1>


                        <!-- GAMBAR -->

                        <img
                            src="{{ $blog->image ?? 'https://picsum.photos/800/450?random=1' }}"
                            alt="{{ $blog->title }}"
                            class="featured-image"
                        >


                        <!-- =================================================
                             META
                        ================================================= -->

                        <div class="article-meta">


                            <!-- AUTHOR -->

                            <div class="author-info">

                                <img
                                    src="{{ $blog->author_avatar ?? 'https://ui-avatars.com/api/?name='.urlencode($blog->author ?? 'Admin').'&background=111111&color=ffffff&size=44' }}"
                                    alt="{{ $blog->author ?? 'Admin' }}"
                                >

                                <div>

                                    <div class="author-name">

                                        {{ $blog->author ?? 'Admin' }}

                                    </div>

                                    <div>

                                        Penulis TesThink

                                    </div>

                                </div>

                            </div>


                            <span class="meta-divider"></span>


                            <!-- DATE -->

                            <div>

                                <i class="far fa-calendar-alt me-1"></i>

                                {{ $blog->published_at
                                    ? $blog->published_at->format('d F Y')
                                    : $blog->created_at->format('d F Y')
                                }}

                            </div>


                            <span class="meta-divider"></span>


                            <!-- READ TIME -->

                            <div>

                                <i class="far fa-clock me-1"></i>

                                {{ $blog->read_time ?? '3 min read' }}

                            </div>


                            <span class="meta-divider"></span>


                            <!-- VIEWS -->

                            <div>

                                <i class="fas fa-eye me-1"></i>

                                {{ number_format($blog->views ?? 0) }}

                            </div>

                        </div>


                        <!-- =================================================
                             ARTICLE CONTENT
                        ================================================= -->

                        <div class="article-content">

                            {!! $blog->content !!}

                        </div>


                        <!-- =================================================
                             TAGS
                        ================================================= -->

                        @if($blog->tags && count($blog->tags) > 0)

                            <div class="article-tags">

                                <span class="tag-title">

                                    <i class="fas fa-tags me-1"></i>

                                    Tags

                                </span>


                                @foreach($blog->tags as $tag)

                                    <a
                                        href="{{ route('blog.tag', Str::slug($tag)) }}"
                                        class="tag"
                                    >

                                        {{ $tag }}

                                    </a>

                                @endforeach

                            </div>

                        @endif


                        <!-- =================================================
                             SHARE
                        ================================================= -->

                        <div class="share-section">

                            <span class="share-title">

                                Bagikan

                            </span>


                            <!-- FACEBOOK -->

                            <a
                                href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}"
                                target="_blank"
                                class="share-btn"
                            >

                                <i class="fab fa-facebook-f"></i>

                            </a>


                            <!-- TWITTER -->

                            <a
                                href="https://twitter.com/intent/tweet?url={{ urlencode(url()->current()) }}&text={{ urlencode($blog->title) }}"
                                target="_blank"
                                class="share-btn"
                            >

                                <i class="fab fa-twitter"></i>

                            </a>


                            <!-- WHATSAPP -->

                            <a
                                href="https://api.whatsapp.com/send?text={{ urlencode($blog->title.' - '.url()->current()) }}"
                                target="_blank"
                                class="share-btn"
                            >

                                <i class="fab fa-whatsapp"></i>

                            </a>


                            <!-- COPY -->

                            <button
                                type="button"
                                onclick="copyLink()"
                                class="share-btn"
                            >

                                <i class="fas fa-link"></i>

                            </button>

                        </div>

                    </div>

                </article>



                <!-- =================================================
                     COMMENTS
                ================================================= -->

                <div class="comments-card">


                    <h5 class="section-title">

                        <i class="fas fa-comments me-2"></i>

                        Komentar

                        <span class="text-muted">

                            ({{ $comments->count() ?? 0 }})

                        </span>

                    </h5>


                    <!-- FORM KOMENTAR -->

                    @auth

                        <form
                            action="{{ route('blog.comment', $blog->id) }}"
                            method="POST"
                            class="mb-4"
                        >

                            @csrf

                            <div class="comment-form">

                                <input
                                    type="text"
                                    name="comment"
                                    class="form-control comment-input"
                                    placeholder="Tulis komentar..."
                                    required
                                >


                                <button
                                    type="submit"
                                    class="comment-button"
                                >

                                    <i class="fas fa-paper-plane me-1"></i>

                                    Kirim

                                </button>

                            </div>

                        </form>

                    @else

                        <div class="login-alert mb-4">

                            <i class="fas fa-lock me-1"></i>

                            Silakan

                            <a href="{{ route('login') }}">
                                Masuk
                            </a>

                            atau

                            <a href="{{ route('register') }}">
                                Daftar
                            </a>

                            untuk memberikan komentar.

                        </div>

                    @endauth


                    <!-- DAFTAR KOMENTAR -->

                    @if($comments && $comments->count() > 0)

                        @foreach($comments as $comment)

                            <div class="comment-item">


                                <img
                                    src="{{ $comment->user->avatar ?? 'https://ui-avatars.com/api/?name='.urlencode($comment->user->name ?? 'User').'&background=111111&color=ffffff&size=40' }}"
                                    class="comment-avatar"
                                    alt="User"
                                >


                                <div>

                                    <div class="comment-name">

                                        {{ $comment->user->name ?? 'User' }}

                                    </div>


                                    <div class="comment-date">

                                        {{ $comment->created_at->diffForHumans() }}

                                    </div>


                                    <p class="comment-text">

                                        {{ $comment->comment }}

                                    </p>

                                </div>

                            </div>

                        @endforeach


                        <!-- PAGINATION -->

                        @if(method_exists($comments, 'links'))

                            <div class="mt-4">

                                {{ $comments->links('pagination::bootstrap-5') }}

                            </div>

                        @endif


                    @else

                        <div class="text-center text-muted py-4">

                            <i class="far fa-comment-dots fa-2x mb-2"></i>

                            <div style="font-size:12px;">

                                Belum ada komentar.

                                Jadilah yang pertama!

                            </div>

                        </div>

                    @endif

                </div>

            </div>



            <!-- =================================================
                 SIDEBAR
            ================================================= -->

            <div class="col-lg-4 sidebar">


                <!-- POSTINGAN LAINNYA -->

                <div class="sidebar-card">

                    <div class="sidebar-title">

                        <i class="fas fa-clock"></i>

                        Postingan Lainnya

                    </div>


                    @forelse($relatedPosts ?? [] as $post)

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

                                    {{ $post->published_at
                                        ? $post->published_at->format('d M Y')
                                        : $post->created_at->format('d M Y')
                                    }}

                                </div>

                            </div>

                        </a>

                    @empty

                        <div
                            class="text-muted text-center py-3"
                            style="font-size:12px;"
                        >

                            Tidak ada postingan lainnya.

                        </div>

                    @endforelse

                </div>



                <!-- KATEGORI -->

                <div class="sidebar-card">

                    <div class="sidebar-title">

                        <i class="fas fa-tags"></i>

                        Kategori

                    </div>


                    <div class="tag-cloud">

                        @forelse($categories ?? [] as $category)

                            <a
                                href="{{ route('blog.category', $category->slug) }}"
                                class="category-tag"
                            >

                                {{ $category->name }}

                            </a>

                        @empty

                            <span
                                class="text-muted"
                                style="font-size:12px;"
                            >

                                Belum ada kategori.

                            </span>

                        @endforelse

                    </div>

                </div>



                <!-- NEWSLETTER -->

                <div class="sidebar-card newsletter">

                    <div class="sidebar-title">

                        <i class="fas fa-envelope"></i>

                        Update TesThink

                    </div>


                    <p>

                        Dapatkan artikel dan informasi terbaru
                        seputar bisnis dan TesThink langsung melalui email.

                    </p>


                    <form action="#" method="POST">

                        @csrf

                        <div class="input-group">

                            <input
                                type="email"
                                name="email"
                                class="form-control newsletter-input"
                                placeholder="Email Anda"
                                required
                            >


                            <button
                                type="submit"
                                class="btn newsletter-button"
                            >

                                Subscribe

                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</main>



<!-- =====================================================
     FOOTER
===================================================== -->

<footer class="footer">

    <div class="container">

        <div class="row align-items-center">


            <div class="col-md-6">

                <div class="footer-brand">

                    <span style="color:#ffde59;">
                        Y
                    </span>

                    TesThink

                </div>

                <div class="mt-2">

                    Solusi POS sederhana untuk bisnis modern.

                </div>

            </div>


            <div class="col-md-6 text-md-end mt-3 mt-md-0">

                © {{ date('Y') }}

                <a href="{{ route('home') }}">

                    TesThink

                </a>

                . Semua hak dilindungi.

            </div>

        </div>

    </div>

</footer>



<!-- =====================================================
     BOOTSTRAP
===================================================== -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>



<!-- =====================================================
     COPY LINK
===================================================== -->

<script>

function copyLink() {

    navigator.clipboard.writeText(window.location.href)
        .then(function () {

            const notification = document.createElement('div');

            notification.style.position = 'fixed';
            notification.style.bottom = '25px';
            notification.style.right = '25px';

            notification.style.background = '#111';
            notification.style.color = '#fff';

            notification.style.padding = '13px 18px';

            notification.style.borderRadius = '8px';

            notification.style.fontSize = '12px';

            notification.style.zIndex = '9999';

            notification.innerHTML =
                '<i class="fas fa-check-circle me-2" style="color:#ffde59;"></i>' +
                'Link berhasil disalin';

            document.body.appendChild(notification);


            setTimeout(function () {

                notification.remove();

            }, 2500);

        });

}

</script>
</body>
</html>