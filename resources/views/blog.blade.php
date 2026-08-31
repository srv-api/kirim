<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="icon" type="image/x-icon" href="{{ asset('logo.png') }}">
    <title>Blog | Kirim</title>

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

        /* ===== BLOG HEADER ===== */
        .blog-header {
            background: linear-gradient(145deg, #0a1e3c, #0b2b5c);
            padding: 60px 0 50px;
            color: white;
            position: relative;
            overflow: hidden;
        }
        .blog-header .badge-light {
            background: rgba(255,255,255,0.12) !important;
            color: #ffd966 !important;
            backdrop-filter: blur(4px);
        }

        /* ===== BLOG CARD ===== */
        .blog-card {
            border: none;
            border-radius: 20px;
            overflow: hidden;
            background: #ffffff;
            transition: all 0.3s ease;
            box-shadow: 0 4px 16px rgba(0,0,0,0.06);
            height: 100%;
        }
        .blog-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 48px rgba(0,40,80,0.12);
        }
        .blog-card .blog-img {
            height: 220px;
            object-fit: cover;
            width: 100%;
        }
        .blog-card .blog-body {
            padding: 24px;
        }
        .blog-card .blog-category {
            font-size: 0.75rem;
            text-transform: uppercase;
            font-weight: 600;
            color: #1a4b8c;
            background: rgba(26,75,140,0.08);
            padding: 4px 14px;
            border-radius: 50px;
            display: inline-block;
        }
        .blog-card .blog-title {
            font-weight: 700;
            font-size: 1.2rem;
            margin: 12px 0 10px;
            color: #0f172a;
            text-decoration: none;
            display: block;
            transition: 0.2s;
        }
        .blog-card .blog-title:hover {
            color: #1a4b8c;
        }
        .blog-card .blog-excerpt {
            color: #64748b;
            font-size: 0.95rem;
            line-height: 1.6;
        }
        .blog-card .blog-meta {
            display: flex;
            align-items: center;
            gap: 16px;
            font-size: 0.85rem;
            color: #94a3b8;
            margin-top: 14px;
            padding-top: 14px;
            border-top: 1px solid #f1f5f9;
        }
        .blog-card .blog-meta img {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            object-fit: cover;
        }
        .blog-card .blog-meta .author-name {
            font-weight: 600;
            color: #334155;
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

        /* ===== PAGINATION ===== */
        .pagination-custom .page-link {
            border-radius: 50px;
            margin: 0 4px;
            color: #0f172a;
            border: 1px solid #e2e8f0;
            padding: 8px 18px;
        }
        .pagination-custom .page-link:hover {
            background: #1a4b8c;
            color: #fff;
            border-color: #1a4b8c;
        }
        .pagination-custom .page-item.active .page-link {
            background: #1a4b8c;
            border-color: #1a4b8c;
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
            .blog-card .blog-img {
                height: 180px;
            }
            .blog-header {
                padding: 40px 0 30px;
            }
        }

        @media (max-width: 480px) {
            .blog-card .blog-img {
                height: 160px;
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

    <!-- ======= BLOG HEADER ======= -->
    <section class="blog-header text-center">
        <div class="container">
            <span class="badge badge-light px-4 py-2 mb-4 d-inline-block">
                <i class="fas fa-pencil-alt me-2"></i> Artikel Terbaru
            </span>
            <h1 class="display-4 fw-bold mb-3">Blog & Informasi</h1>
            <p class="lead text-white-50" style="max-width:540px; margin:0 auto;">
                Dapatkan informasi seputar pengiriman, tips packing, dan berita terbaru dari <strong>Kirim</strong>.
            </p>
        </div>
    </section>

    <!-- ======= LIST BLOG ======= -->
    <div class="container py-4">
        <div class="row">
            <div class="col-lg-8">
                <div class="row g-4">
                    @forelse($blogs as $blog)
                    <div class="col-md-6">
                        <div class="blog-card">
                            <img src="{{ $blog->image ?? 'https://picsum.photos/800/400?random='.$loop->index }}" 
                                 alt="{{ $blog->title }}" 
                                 class="blog-img" 
                                 loading="lazy">
                            <div class="blog-body">
                                <span class="blog-category">{{ $blog->category ?? 'Umum' }}</span>
                                <a href="{{ route('blog.detail', $blog->slug ?? $blog->id) }}" class="blog-title">
                                    {{ $blog->title }}
                                </a>
                                <p class="blog-excerpt">{{ Str::limit($blog->excerpt ?? $blog->content, 120) }}</p>
                                <div class="blog-meta">
                                    <img src="{{ $blog->author_avatar ?? 'https://ui-avatars.com/api/?name='.urlencode($blog->author ?? 'Admin').'&background=1a4b8c&color=fff&size=32' }}" 
                                         alt="{{ $blog->author ?? 'Admin' }}">
                                    <div>
                                        <div class="author-name">{{ $blog->author ?? 'Admin' }}</div>
                                        <div>
                                            <i class="far fa-calendar-alt"></i> 
                                            {{ $blog->created_at ? $blog->created_at->format('d M Y') : date('d M Y') }}
                                            <span class="mx-1">•</span>
                                            <i class="far fa-clock"></i> 
                                            {{ $blog->read_time ?? $blog->reading_time ?? '3 min read' }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="col-12 text-center py-5">
                        <i class="fas fa-inbox fa-3x text-muted mb-3"></i>
                        <h5>Belum ada artikel</h5>
                        <p class="text-muted">Belum ada artikel yang dipublikasikan saat ini.</p>
                    </div>
                    @endforelse
                </div>

                <!-- Pagination -->
                @if(isset($blogs) && method_exists($blogs, 'links'))
                <div class="mt-5">
                    {{ $blogs->links('pagination::bootstrap-5') }}
                </div>
                @else
                <nav class="mt-5">
                    <ul class="pagination justify-content-center pagination-custom">
                        <li class="page-item disabled"><span class="page-link">Sebelumnya</span></li>
                        <li class="page-item active"><span class="page-link">1</span></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">Selanjutnya</a></li>
                    </ul>
                </nav>
                @endif
            </div>

            <!-- Sidebar -->
            <div class="col-lg-4">
                <!-- Pencarian -->
                <div class="sidebar-card">
                    <h5 class="sidebar-title"><i class="fas fa-search me-2"></i> Cari Artikel</h5>
                    <form action="{{ route('blog.search') }}" method="GET">
                        <div class="input-group">
                            <input type="text" 
                                   name="q" 
                                   class="form-control" 
                                   placeholder="Cari..." 
                                   style="border-radius:50px 0 0 50px;"
                                   value="{{ request('q') }}">
                            <button class="btn btn-primary" 
                                    style="border-radius:0 50px 50px 0; background:#1a4b8c; border-color:#1a4b8c;">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Postingan Terbaru -->
                <div class="sidebar-card">
                    <h5 class="sidebar-title"><i class="fas fa-clock me-2"></i> Postingan Terbaru</h5>
                    @php
                        $recentPosts = isset($recentPosts) ? $recentPosts : (isset($blogs) ? $blogs->take(3) : []);
                    @endphp
                    @forelse($recentPosts as $post)
                    <a href="{{ route('blog.detail', $post->slug ?? $post->id) }}" class="sidebar-post">
                        <img src="{{ $post->image ?? 'https://picsum.photos/70/70?random='.$loop->index }}" 
                             alt="{{ $post->title }}">
                        <div>
                            <div class="post-title">{{ $post->title }}</div>
                            <div class="post-date">
                                {{ $post->created_at ? $post->created_at->format('d M Y') : date('d M Y') }}
                            </div>
                        </div>
                    </a>
                    @empty
                    <p class="text-muted text-center py-2">Belum ada postingan</p>
                    @endforelse
                </div>

                <!-- Kategori -->
                <div class="sidebar-card">
                    <h5 class="sidebar-title"><i class="fas fa-tags me-2"></i> Kategori</h5>
                    <div class="tag-cloud">
                        @php
                            $categories = isset($categories) ? $categories : ['Tips Packing', 'Teknologi', 'Layanan', 'Industri', 'Bisnis', 'Keamanan'];
                        @endphp
                        @foreach($categories as $category)
                        <a href="{{ route('blog.category', Str::slug($category)) }}" class="tag">{{ $category }}</a>
                        @endforeach
                    </div>
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

</body>
</html>