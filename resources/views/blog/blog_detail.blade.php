<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>{{ $blog->title ?? 'Blog Detail' }} | Kirim</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Font Awesome 6 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />

    <style>
        body {
            background: #f0f2f5;
            font-family: 'Segoe UI', Roboto, system-ui, sans-serif;
        }

        /* ===== NAVBAR ===== */
        .navbar-custom {
            background: linear-gradient(135deg, #0b2b5c, #1a4b8c);
            box-shadow: 0 4px 20px rgba(0,0,0,0.25);
            padding: 12px 0;
        }
        .navbar-custom .navbar-brand {
            font-weight: 700;
            font-size: 1.6rem;
        }
        .navbar-custom .nav-link {
            font-weight: 500;
            margin: 0 8px;
            border-radius: 30px;
            padding: 8px 18px;
            transition: 0.2s;
        }
        .navbar-custom .nav-link:hover {
            background: rgba(255,255,255,0.15);
            color: #fff !important;
        }
        .navbar-custom .nav-link.active {
            background: rgba(255,255,255,0.2);
        }

        /* ===== BLOG DETAIL ===== */
        .blog-detail-wrapper {
            background: #ffffff;
            border-radius: 28px;
            padding: 40px 48px;
            box-shadow: 0 4px 24px rgba(0,0,0,0.04);
            margin-top: 30px;
        }
        .blog-detail-wrapper .featured-image {
            border-radius: 20px;
            width: 100%;
            max-height: 450px;
            object-fit: cover;
            margin-bottom: 28px;
        }
        .blog-detail-wrapper .blog-detail-meta {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            align-items: center;
            color: #64748b;
            font-size: 0.9rem;
            padding-bottom: 20px;
            border-bottom: 1px solid #f1f5f9;
            margin-bottom: 24px;
        }
        .blog-detail-wrapper .blog-detail-meta .author-info {
            display: flex;
            align-items: center;
            gap: 12px;
        }
        .blog-detail-wrapper .blog-detail-meta .author-info img {
            width: 44px;
            height: 44px;
            border-radius: 50%;
            object-fit: cover;
        }
        .blog-detail-wrapper .blog-detail-content {
            font-size: 1.05rem;
            line-height: 1.8;
            color: #1e293b;
        }
        .blog-detail-wrapper .blog-detail-content h2 {
            font-weight: 700;
            margin-top: 32px;
            margin-bottom: 16px;
            color: #0f172a;
        }
        .blog-detail-wrapper .blog-detail-content h3 {
            font-weight: 600;
            margin-top: 24px;
            margin-bottom: 12px;
            color: #0f172a;
        }
        .blog-detail-wrapper .blog-detail-content ul,
        .blog-detail-wrapper .blog-detail-content ol {
            padding-left: 24px;
            margin-bottom: 16px;
        }
        .blog-detail-wrapper .blog-detail-content blockquote {
            border-left: 4px solid #1a4b8c;
            padding: 12px 24px;
            margin: 20px 0;
            background: #f8fafc;
            border-radius: 0 12px 12px 0;
            font-style: italic;
            color: #334155;
        }
        .blog-detail-wrapper .blog-detail-content img {
            max-width: 100%;
            border-radius: 16px;
            margin: 20px 0;
        }

        /* ===== SIDEBAR ===== */
        .sidebar-card {
            background: #ffffff;
            border-radius: 20px;
            padding: 24px;
            box-shadow: 0 4px 16px rgba(0,0,0,0.04);
            margin-bottom: 24px;
        }
        .sidebar-card .sidebar-title {
            font-weight: 700;
            font-size: 1.1rem;
            margin-bottom: 16px;
            color: #0f172a;
            padding-bottom: 12px;
            border-bottom: 2px solid #f1f5f9;
        }
        .sidebar-card .sidebar-post {
            display: flex;
            gap: 14px;
            padding: 10px 0;
            border-bottom: 1px solid #f8fafc;
            text-decoration: none;
            color: #0f172a;
            transition: 0.2s;
        }
        .sidebar-card .sidebar-post:hover {
            color: #1a4b8c;
        }
        .sidebar-card .sidebar-post img {
            width: 70px;
            height: 70px;
            border-radius: 12px;
            object-fit: cover;
            flex-shrink: 0;
        }
        .sidebar-card .sidebar-post .post-title {
            font-weight: 600;
            font-size: 0.9rem;
            line-height: 1.4;
        }
        .sidebar-card .sidebar-post .post-date {
            font-size: 0.75rem;
            color: #94a3b8;
        }
        .sidebar-card .tag-cloud {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
        }
        .sidebar-card .tag-cloud .tag {
            background: #f1f5f9;
            padding: 4px 14px;
            border-radius: 50px;
            font-size: 0.8rem;
            color: #475569;
            text-decoration: none;
            transition: 0.2s;
        }
        .sidebar-card .tag-cloud .tag:hover {
            background: #1a4b8c;
            color: #fff;
        }

        /* ===== FOOTER ===== */
        .footer-custom {
            background: #0b1a2e;
            color: rgba(255,255,255,0.7);
            padding: 28px 0;
            margin-top: 60px;
        }
        .footer-custom a {
            color: #ffd966;
            text-decoration: none;
        }

        /* ===== RESPONSIVE ===== */
        @media (max-width: 768px) {
            .blog-detail-wrapper {
                padding: 24px 20px;
            }
            .blog-detail-wrapper .featured-image {
                max-height: 250px;
            }
        }

        @media (max-width: 480px) {
            .blog-detail-wrapper {
                padding: 16px;
            }
            .blog-detail-wrapper .featured-image {
                max-height: 200px;
            }
        }
    </style>
</head>
<body>

    <!-- ======= NAVBAR ======= -->
    <nav class="navbar navbar-expand-lg navbar-custom">
        <div class="container">
            <a class="navbar-brand text-white" href="{{ route('home') }}">
                <i class="fas fa-box me-2"></i>Kirim
            </a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="mainNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a href="{{ route('home') }}" class="nav-link text-white">
                            <i class="fas fa-home me-1"></i> Home
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('blog') }}" class="nav-link text-white active">
                            <i class="fas fa-newspaper me-1"></i> Blog
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- ======= BLOG DETAIL ======= -->
    <div class="container py-4">
        <div class="row">
            <div class="col-lg-8">
                <div class="blog-detail-wrapper">
                    <!-- Tombol Kembali -->
                    <a href="{{ route('blog') }}" class="btn btn-outline-secondary mb-4" style="border-radius:50px;">
                        <i class="fas fa-arrow-left me-2"></i> Kembali ke Blog
                    </a>

                    <!-- Featured Image -->
                    <img src="{{ $blog->image ?? 'https://picsum.photos/800/450?random=1' }}" 
                         alt="{{ $blog->title }}" 
                         class="featured-image">

                    <!-- Meta -->
                    <div class="blog-detail-meta">
                        <div class="author-info">
                            <img src="{{ $blog->author_avatar ?? 'https://ui-avatars.com/api/?name='.urlencode($blog->author ?? 'Admin').'&background=1a4b8c&color=fff&size=44' }}" 
                                 alt="{{ $blog->author ?? 'Admin' }}">
                            <div>
                                <strong>{{ $blog->author ?? 'Admin' }}</strong>
                                <span class="text-muted">• {{ $blog->category ?? 'Umum' }}</span>
                            </div>
                        </div>
                        <div>
                            <i class="far fa-calendar-alt"></i> 
                            {{ $blog->published_at ? $blog->published_at->format('d F Y') : $blog->created_at->format('d F Y') }}
                        </div>
                        <div>
                            <i class="far fa-clock"></i> 
                            {{ $blog->read_time ?? '3 min read' }}
                        </div>
                        <div>
                            <i class="fas fa-eye"></i> {{ number_format($blog->views ?? 0) }} views
                        </div>
                    </div>

                    <!-- Title -->
                    <h1 class="fw-bold mb-4" style="color:#0f172a; font-size:2rem;">{{ $blog->title }}</h1>

                    <!-- Content -->
                    <div class="blog-detail-content">
                        {!! $blog->content !!}
                    </div>

                    <!-- Tags -->
                    @if($blog->tags && count($blog->tags) > 0)
                    <div class="mt-4 pt-3 border-top">
                        <div class="mt-3">
                            <span class="fw-bold me-2"><i class="fas fa-tags"></i> Tags:</span>
                            @foreach($blog->tags as $tag)
                            <a href="{{ route('blog.tag', Str::slug($tag)) }}" 
                               class="tag" 
                               style="background:#f1f5f9; padding:4px 14px; border-radius:50px; font-size:0.8rem; color:#475569; text-decoration:none; display:inline-block; margin:2px;">
                                {{ $tag }}
                            </a>
                            @endforeach
                        </div>
                    </div>
                    @endif

                    <!-- Share -->
                    <div class="mt-3 pt-3 border-top">
                        <div class="d-flex flex-wrap align-items-center gap-3">
                            <span class="fw-bold">Bagikan:</span>
                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}" 
                               target="_blank" 
                               class="btn btn-outline-primary btn-sm" 
                               style="border-radius:50px;">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="https://twitter.com/intent/tweet?url={{ urlencode(url()->current()) }}&text={{ urlencode($blog->title) }}" 
                               target="_blank" 
                               class="btn btn-outline-info btn-sm" 
                               style="border-radius:50px;">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a href="https://api.whatsapp.com/send?text={{ urlencode($blog->title.' - '.url()->current()) }}" 
                               target="_blank" 
                               class="btn btn-outline-success btn-sm" 
                               style="border-radius:50px;">
                                <i class="fab fa-whatsapp"></i>
                            </a>
                            <button onclick="navigator.clipboard.writeText(window.location.href)" 
                                    class="btn btn-outline-secondary btn-sm" 
                                    style="border-radius:50px;">
                                <i class="fas fa-link"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Komentar -->
<div class="mt-4 p-4 bg-white rounded-4" style="box-shadow:0 4px 16px rgba(0,0,0,0.04);">
    <h5 class="fw-bold mb-3"><i class="fas fa-comments me-2"></i> Komentar ({{ $comments->count() ?? 0 }})</h5>
    
    <!-- Form Komentar - Tampilkan untuk semua user -->
    <div class="d-flex gap-3 mb-4">
        <img src="https://ui-avatars.com/api/?name=Guest&background=ccc&color=fff&size=40" 
             style="width:40px;height:40px;border-radius:50%;">
        <div class="flex-grow-1">
            @auth
            <form action="{{ route('blog.comment', $blog->id) }}" method="POST">
                @csrf
                <div class="d-flex gap-2">
                    <input type="text" 
                           name="comment" 
                           class="form-control" 
                           placeholder="Tulis komentar..." 
                           style="border-radius:50px;" 
                           required>
                    <button type="submit" class="btn btn-primary" style="border-radius:50px; background:#1a4b8c; border-color:#1a4b8c;">
                        <i class="fas fa-paper-plane"></i>
                    </button>
                </div>
            </form>
            @else
            <div class="alert alert-info text-center mb-0">
                <i class="fas fa-info-circle me-2"></i>
                Silakan <a href="{{ route('login') }}" class="fw-bold">Login</a> atau 
                <a href="{{ route('register') }}" class="fw-bold">Daftar</a> untuk memberikan komentar.
                <br>
                <small class="text-muted">(Anda tetap bisa membaca artikel tanpa login)</small>
            </div>
            @endauth
        </div>
    </div>

    <!-- Daftar Komentar -->
    @if($comments && $comments->count() > 0)
    <div class="mt-3">
        @foreach($comments as $comment)
        <div class="d-flex gap-3 py-3 border-bottom">
            <img src="{{ $comment->user->avatar ?? 'https://ui-avatars.com/api/?name='.urlencode($comment->user->name ?? 'User').'&background=ccc&color=fff&size=40' }}" 
                 style="width:40px;height:40px;border-radius:50%;">
            <div>
                <div class="fw-bold">{{ $comment->user->name ?? 'User' }}</div>
                <div class="text-muted small">{{ $comment->created_at->diffForHumans() }}</div>
                <p class="mt-1 mb-0">{{ $comment->comment }}</p>
            </div>
        </div>
        @endforeach
        
        @if(method_exists($comments, 'links'))
        <div class="mt-3">
            {{ $comments->links('pagination::bootstrap-5') }}
        </div>
        @endif
    </div>
    @else
    <div class="text-muted text-center py-3">
        <i class="fas fa-comment-slash me-2"></i> Belum ada komentar. Jadilah yang pertama!
    </div>
    @endif
</div>
            </div>

            <!-- Sidebar -->
            <div class="col-lg-4">
                <!-- Postingan Lainnya -->
                <div class="sidebar-card">
                    <h5 class="sidebar-title"><i class="fas fa-clock me-2"></i> Postingan Lainnya</h5>
                    @forelse($relatedPosts ?? [] as $post)
                    <a href="{{ route('blog.detail', $post->slug) }}" class="sidebar-post">
                        <img src="{{ $post->image ?? 'https://picsum.photos/70/70?random='.$loop->index }}" 
                             alt="{{ $post->title }}">
                        <div>
                            <div class="post-title">{{ $post->title }}</div>
                            <div class="post-date">
                                {{ $post->published_at ? $post->published_at->format('d M Y') : $post->created_at->format('d M Y') }}
                            </div>
                        </div>
                    </a>
                    @empty
                    <p class="text-muted text-center py-2">Tidak ada postingan lainnya</p>
                    @endforelse
                </div>

                <!-- Kategori -->
                <div class="sidebar-card">
                    <h5 class="sidebar-title"><i class="fas fa-tags me-2"></i> Kategori</h5>
                    <div class="tag-cloud">
                        @forelse($categories ?? [] as $category)
                        <a href="{{ route('blog.category', $category->slug) }}" class="tag">{{ $category->name }}</a>
                        @empty
                        <span class="text-muted">Belum ada kategori</span>
                        @endforelse
                    </div>
                </div>

                <!-- Newsletter -->
                <div class="sidebar-card" style="background:linear-gradient(135deg, #0b2b5c, #1a4b8c); color:white;">
                    <h5 class="sidebar-title" style="color:white; border-bottom-color:rgba(255,255,255,0.2);">
                        <i class="fas fa-envelope me-2"></i> Newsletter
                    </h5>
                    <p style="font-size:0.9rem; opacity:0.8;">
                        Dapatkan update artikel terbaru langsung ke email Anda.
                    </p>
                    <form action="#" method="POST">
                        @csrf
                        <div class="input-group">
                            <input type="email" 
                                   name="email" 
                                   class="form-control" 
                                   placeholder="Email Anda" 
                                   style="border-radius:50px 0 0 50px;" 
                                   required>
                            <button class="btn btn-warning" 
                                    style="border-radius:0 50px 50px 0; background:#f9b81b; color:#1a2a4a; font-weight:600;">
                                Subscribe
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- ======= FOOTER ======= -->
    <footer class="footer-custom text-center">
        <div class="container">
            <p>&copy; {{ date('Y') }} <a href="{{ route('home') }}">PT Kirim Mengirim Terkirim</a></p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Toast notification untuk copy link
        document.querySelectorAll('[onclick*="clipboard"]').forEach(btn => {
            btn.addEventListener('click', function() {
                const toast = document.createElement('div');
                toast.className = 'position-fixed bottom-0 end-0 p-3';
                toast.style.zIndex = '9999';
                toast.innerHTML = `
                    <div class="toast show" role="alert">
                        <div class="toast-body bg-success text-white rounded-3">
                            <i class="fas fa-check-circle me-2"></i> Link berhasil disalin!
                        </div>
                    </div>
                `;
                document.body.appendChild(toast);
                setTimeout(() => toast.remove(), 3000);
            });
        });
    </script>

</body>
</html>