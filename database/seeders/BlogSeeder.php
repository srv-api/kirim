<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Category;
use App\Models\Comment;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BlogSeeder extends Seeder
{
    public function run(): void
    {
        // ============================================
        // 1. Buat Kategori
        // ============================================
        $categories = [
            ['name' => 'Tips Packing', 'slug' => 'tips-packing', 'description' => 'Tips dan trik mengemas barang dengan aman'],
            ['name' => 'Teknologi', 'slug' => 'teknologi', 'description' => 'Perkembangan teknologi di bidang logistik'],
            ['name' => 'Layanan', 'slug' => 'layanan', 'description' => 'Informasi tentang layanan pengiriman'],
            ['name' => 'Industri', 'slug' => 'industri', 'description' => 'Berita dan perkembangan industri logistik'],
            ['name' => 'Bisnis', 'slug' => 'bisnis', 'description' => 'Tips bisnis dan pengiriman untuk UMKM'],
            ['name' => 'Keamanan', 'slug' => 'keamanan', 'description' => 'Tips keamanan paket dan menghindari penipuan'],
            ['name' => 'Promo', 'slug' => 'promo', 'description' => 'Informasi promo dan diskon pengiriman'],
            ['name' => 'Event', 'slug' => 'event', 'description' => 'Event dan acara terkait logistik'],
        ];

        foreach ($categories as $cat) {
            Category::updateOrCreate(
                ['slug' => $cat['slug']],
                $cat
            );
        }

        // ============================================
        // 2. Buat Posts
        // ============================================
        $posts = [
            [
                'title' => 'Tips Packing Aman untuk Barang Pecah Belah',
                'slug' => 'tips-packing-aman-untuk-barang-pecah-belah',
                'excerpt' => 'Pelajari cara mengemas barang pecah belah dengan aman agar sampai tujuan dalam kondisi sempurna. Panduan lengkap untuk pemula.',
                'content' => '
                    <p>Mengirim barang pecah belah seperti gelas, piring, atau vas bunga memang membutuhkan perhatian ekstra. <strong>Packing yang tepat</strong> adalah kunci utama agar barang sampai ke tujuan dalam kondisi utuh.</p>

                    <h2>1. Pilih Bahan Packing yang Tepat</h2>
                    <p>Gunakan bahan seperti <strong>bubble wrap</strong>, styrofoam, atau kertas koran untuk membungkus setiap benda. Pastikan tidak ada ruang kosong di dalam kemasan agar barang tidak bergeser.</p>

                    <ul>
                        <li><strong>Bubble wrap</strong> - Perlindungan terbaik untuk barang pecah belah</li>
                        <li><strong>Styrofoam</strong> - Cocok untuk barang berat dan besar</li>
                        <li><strong>Kertas koran</strong> - Alternatif murah untuk perlindungan ekstra</li>
                    </ul>

                    <blockquote>
                        "Jangan pernah menganggap remeh proses packing. Investasi waktu dan bahan yang baik akan menghemat biaya penggantian barang."
                    </blockquote>

                    <h2>2. Beri Label "Fragile"</h2>
                    <p>Tempelkan stiker atau tulisan <strong>"Fragile"</strong> atau <strong>"Handle with Care"</strong> pada setiap sisi kemasan untuk mengingatkan petugas pengiriman agar lebih hati-hati.</p>

                    <h2>3. Gunakan Kemasan Bertingkat</h2>
                    <p>Untuk keamanan ekstra, gunakan dua lapis kemasan. Misalnya, barang dibungkus bubble wrap, lalu dimasukkan ke kotak kardus, dan kardus tersebut dibungkus lagi dengan kardus lebih besar.</p>

                    <h2>4. Tips Tambahan</h2>
                    <ul>
                        <li>Gunakan kardus yang masih kuat dan tidak lembek</li>
                        <li>Isi celah kosong dengan bubble wrap atau kertas</li>
                        <li>Rekatkan semua sisi kardus dengan lakban yang kuat</li>
                        <li>Pastikan berat barang tidak melebihi kapasitas kardus</li>
                    </ul>

                    <p>Dengan tips di atas, paket Anda akan lebih aman dan terlindungi selama proses pengiriman. Selamat mencoba!</p>
                ',
                'image' => 'https://images.unsplash.com/photo-1586528116311-ad8dd3c8310d?w=800&h=400&fit=crop',
                'category' => 'Tips Packing',
                'author' => 'Admin Kirim',
                'author_avatar' => 'https://ui-avatars.com/api/?name=Admin+Kirim&background=1a4b8c&color=fff&size=32',
                'read_time' => '5 min read',
                'status' => 'published',
                'tags' => ['Packing', 'Tips', 'Keamanan', 'Pecah Belah'],
                'views' => rand(100, 500),
            ],
            [
                'title' => 'Cara Melacak Paket dengan Mudah via Aplikasi',
                'slug' => 'cara-melacak-paket-dengan-mudah-via-aplikasi',
                'excerpt' => 'Gunakan fitur tracking kami untuk memantau posisi paket secara real-time dari mana saja. Panduan lengkap untuk pengguna baru.',
                'content' => '
                    <p>Melacak paket kini semakin mudah dengan aplikasi Kirim. Berikut panduan lengkapnya:</p>

                    <h2>Langkah-langkah Tracking</h2>
                    <ol>
                        <li><strong>Buka aplikasi Kirim</strong> atau website resmi</li>
                        <li><strong>Masukkan nomor resi</strong> pada kolom yang tersedia</li>
                        <li><strong>Klik tombol "Cek Resi"</strong></li>
                        <li><strong>Lihat status</strong> dan riwayat pengiriman</li>
                    </ol>

                    <h2>Fitur Unggulan</h2>
                    <ul>
                        <li><strong>Real-time tracking</strong> - Update posisi paket secara langsung</li>
                        <li><strong>Notifikasi otomatis</strong> - Dapatkan notifikasi setiap ada perubahan status</li>
                        <li><strong>Riwayat lengkap</strong> - Lihat semua perjalanan paket Anda</li>
                        <li><strong>Estimasi kedatangan</strong> - Perkiraan waktu tiba paket</li>
                    </ul>

                    <blockquote>
                        "Dengan fitur tracking, Anda bisa memantau posisi paket kapan saja dan di mana saja dengan mudah."
                    </blockquote>

                    <p>Dengan fitur ini, Anda bisa memantau posisi paket kapan saja dan di mana saja.</p>
                ',
                'image' => 'https://images.unsplash.com/photo-1588345921523-c2dcdb7f1dcd?w=800&h=400&fit=crop',
                'category' => 'Teknologi',
                'author' => 'Tim Kirim',
                'author_avatar' => 'https://ui-avatars.com/api/?name=Tim+Kirim&background=1a4b8c&color=fff&size=32',
                'read_time' => '4 min read',
                'status' => 'published',
                'tags' => ['Tracking', 'Aplikasi', 'Teknologi', 'Real-time'],
                'views' => rand(100, 500),
            ],
            [
                'title' => 'Mengenal Berbagai Jenis Layanan Pengiriman',
                'slug' => 'mengenal-berbagai-jenis-layanan-pengiriman',
                'excerpt' => 'Pahami perbedaan layanan reguler, express, dan same day untuk memilih yang paling sesuai dengan kebutuhan Anda.',
                'content' => '
                    <p>Memilih layanan pengiriman yang tepat sangat penting untuk efisiensi biaya dan waktu. Berikut penjelasan lengkapnya:</p>

                    <h2>Jenis Layanan Pengiriman</h2>

                    <h3>1. Reguler (2-5 hari)</h3>
                    <ul>
                        <li><strong>Biaya:</strong> Termurah</li>
                        <li><strong>Kecepatan:</strong> Standar (2-5 hari kerja)</li>
                        <li><strong>Cocok untuk:</strong> Pengiriman non-darurat, dokumen, dan barang biasa</li>
                    </ul>

                    <h3>2. Express (1-2 hari)</h3>
                    <ul>
                        <li><strong>Biaya:</strong> Sedang</li>
                        <li><strong>Kecepatan:</strong> Cepat (1-2 hari kerja)</li>
                        <li><strong>Cocok untuk:</strong> Pengiriman penting, dokumen urgent</li>
                    </ul>

                    <h3>3. Same Day (Hari yang sama)</h3>
                    <ul>
                        <li><strong>Biaya:</strong> Tertinggi</li>
                        <li><strong>Kecepatan:</strong> Sangat cepat (sampai di hari yang sama)</li>
                        <li><strong>Cocok untuk:</strong> Pengiriman sangat urgent dalam satu kota</li>
                    </ul>

                    <blockquote>
                        "Pilih layanan yang paling sesuai dengan kebutuhan dan budget Anda."
                    </blockquote>

                    <p>Pilih layanan yang paling sesuai dengan kebutuhan dan budget Anda.</p>
                ',
                'image' => 'https://images.unsplash.com/photo-1570871162962-1b39f1b2d4f1?w=800&h=400&fit=crop',
                'category' => 'Layanan',
                'author' => 'Marketing Kirim',
                'author_avatar' => 'https://ui-avatars.com/api/?name=Marketing+Kirim&background=1a4b8c&color=fff&size=32',
                'read_time' => '6 min read',
                'status' => 'published',
                'tags' => ['Layanan', 'Pengiriman', 'Express', 'Reguler'],
                'views' => rand(100, 500),
            ],
            [
                'title' => 'Evolusi Logistik: Dari Pos Hingga Drone Delivery',
                'slug' => 'evolusi-logistik-dari-pos-hingga-drone-delivery',
                'excerpt' => 'Simak perkembangan teknologi logistik yang mengubah cara kita mengirim barang dari masa ke masa.',
                'content' => '
                    <p>Industri logistik telah berkembang pesat dalam beberapa dekade terakhir. Berikut perjalanannya:</p>

                    <h2>Perjalanan Logistik</h2>

                    <h3>1. Era Pos (Abad 19-20)</h3>
                    <ul>
                        <li>Pengiriman surat dan paket secara manual</li>
                        <li>Menggunakan kereta api dan kapal</li>
                        <li>Waktu pengiriman bisa berminggu-minggu</li>
                    </ul>

                    <h3>2. Era Digital (2000-2020)</h3>
                    <ul>
                        <li>Tracking online dan otomatisasi</li>
                        <li>Penggunaan komputer dan internet</li>
                        <li>Waktu pengiriman menjadi lebih cepat</li>
                    </ul>

                    <h3>3. Masa Depan (2025+)</h3>
                    <ul>
                        <li><strong>Drone delivery</strong> - Pengiriman menggunakan drone</li>
                        <li><strong>AI dan IoT</strong> - Optimasi rute dan prediksi</li>
                        <li><strong>Autonomous vehicles</strong> - Mobil dan truk tanpa pengemudi</li>
                    </ul>

                    <blockquote>
                        "Kirim terus berinovasi untuk memberikan layanan terbaik di era digital."
                    </blockquote>

                    <p>Kirim terus berinovasi untuk memberikan layanan terbaik.</p>
                ',
                'image' => 'https://images.unsplash.com/photo-1519861531473-9200262188bf?w=800&h=400&fit=crop',
                'category' => 'Industri',
                'author' => 'CEO Kirim',
                'author_avatar' => 'https://ui-avatars.com/api/?name=CEO+Kirim&background=1a4b8c&color=fff&size=32',
                'read_time' => '7 min read',
                'status' => 'published',
                'tags' => ['Logistik', 'Drone', 'Inovasi', 'Teknologi'],
                'views' => rand(100, 500),
            ],
            [
                'title' => 'Tips Menghemat Biaya Pengiriman untuk UMKM',
                'slug' => 'tips-menghemat-biaya-pengiriman-untuk-umkm',
                'excerpt' => 'Rekomendasi strategi pengiriman hemat untuk bisnis kecil dan menengah. Optimalisasi biaya logistik.',
                'content' => '
                    <p>Bagi UMKM, biaya pengiriman sering menjadi tantangan tersendiri. Berikut tips hematnya:</p>

                    <h2>Strategi Pengiriman Hemat</h2>

                    <h3>1. Gunakan Layanan Reguler</h3>
                    <ul>
                        <li>Untuk pengiriman non-darurat</li>
                        <li>Biaya 30-50% lebih murah dari express</li>
                        <li>Cocok untuk pengiriman rutin</li>
                    </ul>

                    <h3>2. Manfaatkan Promo dan Diskon</h3>
                    <ul>
                        <li>Pantau promo dari berbagai kurir</li>
                        <li>Gunakan voucher diskon</li>
                        <li>Daftar sebagai mitra untuk tarif khusus</li>
                    </ul>

                    <h3>3. Bergabung dengan Program Mitra Kirim</h3>
                    <ul>
                        <li>Dapatkan tarif khusus untuk bisnis</li>
                        <li>Akses ke fitur premium</li>
                        <li>Dukungan customer service prioritas</li>
                    </ul>

                    <h3>4. Optimasi Packing</h3>
                    <ul>
                        <li>Gunakan kemasan yang tepat ukuran</li>
                        <li>Hindari kelebihan berat</li>
                        <li>Pilih kemasan yang ringan namun kuat</li>
                    </ul>

                    <blockquote>
                        "Efisiensi biaya pengiriman adalah kunci kesuksesan UMKM di era digital."
                    </blockquote>
                ',
                'image' => 'https://images.unsplash.com/photo-1556742049-0cfed4f6a45d?w=800&h=400&fit=crop',
                'category' => 'Bisnis',
                'author' => 'Tim Bisnis',
                'author_avatar' => 'https://ui-avatars.com/api/?name=Tim+Bisnis&background=1a4b8c&color=fff&size=32',
                'read_time' => '5 min read',
                'status' => 'published',
                'tags' => ['UMKM', 'Bisnis', 'Hemat', 'Strategi'],
                'views' => rand(100, 500),
            ],
            [
                'title' => 'Keamanan Paket: Cara Menghindari Penipuan',
                'slug' => 'keamanan-paket-cara-menghindari-penipuan',
                'excerpt' => 'Waspada terhadap modus penipuan dan tips menjaga keamanan paket Anda. Panduan lengkap untuk konsumen.',
                'content' => '
                    <p>Keamanan paket adalah prioritas utama. Waspadai modus penipuan berikut:</p>

                    <h2>Modus Penipuan Umum</h2>

                    <h3>1. Panggilan Palsu dari Kurir</h3>
                    <ul>
                        <li>Penipu berpura-pura menjadi kurir</li>
                        <li>Meminta kode OTP atau data pribadi</li>
                        <li>Jangan pernah memberikan OTP kepada siapapun</li>
                    </ul>

                    <h3>2. Link Tracking Palsu</h3>
                    <ul>
                        <li>Mengirim link tracking palsu via SMS/WA</li>
                        <li>Link mengarah ke website phishing</li>
                        <li>Selalu gunakan website resmi Kirim</li>
                    </ul>

                    <h3>3. Permintaan Pembayaran Tambahan</h3>
                    <ul>
                        <li>Meminta biaya tambahan di luar ketentuan</li>
                        <li>Klaim bahwa paket tertahan</li>
                        <li>Hubungi customer service resmi untuk verifikasi</li>
                    </ul>

                    <h2>Tips Keamanan</h2>
                    <ul>
                        <li><strong>Gunakan website resmi</strong> - Pastikan domain resmi kirim.com</li>
                        <li><strong>Periksa nomor resi</strong> - Cek keaslian nomor resi</li>
                        <li><strong>Hubungi CS</strong> - Jika ragu, hubungi customer service</li>
                        <li><strong>Jangan share OTP</strong> - OTP hanya untuk Anda sendiri</li>
                    </ul>

                    <blockquote>
                        "Selalu gunakan website resmi Kirim untuk tracking dan hubungi customer service jika ragu."
                    </blockquote>

                    <p>Selalu gunakan website resmi Kirim untuk tracking dan hubungi customer service jika ragu.</p>
                ',
                'image' => 'https://images.unsplash.com/photo-1563013544-824ae1b704d3?w=800&h=400&fit=crop',
                'category' => 'Keamanan',
                'author' => 'Tim Keamanan',
                'author_avatar' => 'https://ui-avatars.com/api/?name=Tim+Keamanan&background=1a4b8c&color=fff&size=32',
                'read_time' => '4 min read',
                'status' => 'published',
                'tags' => ['Keamanan', 'Penipuan', 'Tips', 'Waspada'],
                'views' => rand(100, 500),
            ],
            [
                'title' => 'Promo Spesial: Diskon 50% untuk Pengiriman Pertama',
                'slug' => 'promo-spesial-diskon-50-persen-untuk-pengiriman-pertama',
                'excerpt' => 'Dapatkan diskon 50% untuk pengiriman pertama Anda di Kirim. Promo terbatas untuk pengguna baru.',
                'content' => '
                    <p>Kirim memberikan promo spesial untuk pengguna baru! Dapatkan diskon 50% untuk pengiriman pertama Anda.</p>

                    <h2>Syarat dan Ketentuan</h2>
                    <ul>
                        <li>Promo berlaku untuk pengguna baru</li>
                        <li>Maksimal diskon Rp 50.000</li>
                        <li>Berlaku untuk semua layanan pengiriman</li>
                        <li>Promo berlaku hingga 31 Desember 2026</li>
                    </ul>

                    <h2>Cara Mendapatkan Promo</h2>
                    <ol>
                        <li>Daftar akun baru di Kirim</li>
                        <li>Masukkan kode promo <strong>KIRIM50</strong></li>
                        <li>Lakukan pengiriman pertama Anda</li>
                    </ol>

                    <blockquote>
                        "Jangan lewatkan kesempatan untuk menghemat biaya pengiriman Anda!"
                    </blockquote>

                    <p>Jangan lewatkan kesempatan untuk menghemat biaya pengiriman Anda!</p>
                ',
                'image' => 'https://images.unsplash.com/photo-1563013544-824ae1b704d3?w=800&h=400&fit=crop',
                'category' => 'Promo',
                'author' => 'Tim Marketing',
                'author_avatar' => 'https://ui-avatars.com/api/?name=Tim+Marketing&background=1a4b8c&color=fff&size=32',
                'read_time' => '3 min read',
                'status' => 'published',
                'tags' => ['Promo', 'Diskon', 'Pengguna Baru'],
                'views' => rand(100, 500),
            ],
            [
                'title' => 'Webinar: Tips Sukses Berbisnis Online dengan Logistik',
                'slug' => 'webinar-tips-sukses-berbisnis-online-dengan-logistik',
                'excerpt' => 'Ikuti webinar gratis tentang tips sukses berbisnis online dengan strategi logistik yang tepat.',
                'content' => '
                    <p>Kirim mengadakan webinar gratis untuk para pelaku bisnis online. Dapatkan tips dan strategi logistik untuk sukses berbisnis.</p>

                    <h2>Detail Webinar</h2>
                    <ul>
                        <li><strong>Tanggal:</strong> 15 Juli 2026</li>
                        <li><strong>Waktu:</strong> 14.00 - 16.00 WIB</li>
                        <li><strong>Platform:</strong> Zoom Meeting</li>
                        <li><strong>Pembicara:</strong> CEO Kirim dan Praktisi Logistik</li>
                    </ul>

                    <h2>Materi Webinar</h2>
                    <ul>
                        <li>Strategi pengiriman untuk UMKM</li>
                        <li>Optimasi biaya logistik</li>
                        <li>Tips packing dan keamanan paket</li>
                        <li>Q&A dengan para ahli</li>
                    </ul>

                    <h2>Cara Mendaftar</h2>
                    <ol>
                        <li>Kunjungi halaman pendaftaran di website Kirim</li>
                        <li>Isi formulir pendaftaran</li>
                        <li>Dapatkan link Zoom via email</li>
                    </ol>

                    <blockquote>
                        "Daftar sekarang dan tingkatkan bisnis Anda dengan strategi logistik yang tepat!"
                    </blockquote>

                    <p>Daftar sekarang dan tingkatkan bisnis Anda dengan strategi logistik yang tepat!</p>
                ',
                'image' => 'https://images.unsplash.com/photo-1570871162962-1b39f1b2d4f1?w=800&h=400&fit=crop',
                'category' => 'Event',
                'author' => 'Event Kirim',
                'author_avatar' => 'https://ui-avatars.com/api/?name=Event+Kirim&background=1a4b8c&color=fff&size=32',
                'read_time' => '4 min read',
                'status' => 'published',
                'tags' => ['Webinar', 'Event', 'Bisnis Online', 'UMKM'],
                'views' => rand(100, 500),
            ],
        ];

        foreach ($posts as $postData) {
            // Cari category_id berdasarkan nama category
            $category = Category::where('name', $postData['category'])->first();
            
            Post::updateOrCreate(
                ['slug' => $postData['slug']],
                [
                    'title' => $postData['title'],
                    'excerpt' => $postData['excerpt'],
                    'content' => $postData['content'],
                    'image' => $postData['image'],
                    'category' => $postData['category'],
                    'category_id' => $category ? $category->id : null,
                    'author' => $postData['author'],
                    'author_avatar' => $postData['author_avatar'],
                    'read_time' => $postData['read_time'],
                    'status' => $postData['status'],
                    'tags' => $postData['tags'],
                    'views' => $postData['views'],
                    'published_at' => now()->subDays(rand(1, 30)),
                    'created_at' => now()->subDays(rand(1, 60)),
                    'updated_at' => now(),
                ]
            );
        }

        // ============================================
        // 3. Buat Comments (Opsional)
        // ============================================
        $posts = Post::all();
        $users = \App\Models\User::all();

        if ($users->count() > 0) {
            $comments = [
                'Artikel yang sangat bermanfaat! Terima kasih sudah berbagi tipsnya 🙏',
                'Wah jadi tahu cara packing yang benar, selama ini saya salah terus 😅',
                'Aplikasi trackingnya sangat membantu, saya jadi bisa monitor paket dengan mudah',
                'Promo diskon 50% sangat menggiurkan! Langsung saya coba',
                'Webinarnya kapan lagi ya? Saya tertarik untuk ikut',
                'Tips untuk UMKM sangat relevan, terima kasih Kirim!',
                'Saya baru tahu ada layanan same day, cocok untuk bisnis saya',
                'Keamanan paket memang penting, terima kasih sudah mengingatkan',
                'Artikelnya lengkap dan mudah dipahami, keep writing!',
                'Drone delivery? Wow, masa depan logistik benar-benar canggih',
            ];

            foreach ($posts as $post) {
                // Random comment count 0-5 per post
                $commentCount = rand(0, 5);
                for ($i = 0; $i < $commentCount; $i++) {
                    Comment::create([
                        'post_id' => $post->id,
                        'user_id' => $users->random()->id,
                        'comment' => $comments[array_rand($comments)],
                        'status' => ['approved', 'pending'][rand(0, 1)],
                        'created_at' => now()->subDays(rand(1, 30)),
                        'updated_at' => now(),
                    ]);
                }
            }
        }

        $this->command->info('Blog seeder completed successfully!');
        $this->command->info('Total posts: ' . Post::count());
        $this->command->info('Total categories: ' . Category::count());
        $this->command->info('Total comments: ' . Comment::count());
    }
}