<div class="sidebar">

    <ul class="sidebar-menu">


        {{-- =====================================================
             Dashboard
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
             KASIR
        ====================================================== --}}

        <li class="menu-title">
            Kasir
        </li>


        {{-- Transaksi Baru --}}

            <a href="{{ route('owner.cashier-device.index') }}">
                <span class="menu-icon">🔌</span>

                <span>Device</span>

            </a>

        </li>


        {{-- =====================================================
             PENJUALAN
        ====================================================== --}}

        <li>

            <a href="#"
               data-submenu-toggle="submenu-penjualan">

                <span class="menu-icon">🧾</span>

                <span class="flex-grow-1">
                    Penjualan
                </span>

                <span class="submenu-arrow">
                    ›
                </span>

            </a>


            <ul
                id="submenu-penjualan"
                class="submenu d-none"
            >

                {{-- Semua Penjualan --}}

                <li>

                    <a href="#">

                        <span class="menu-icon">📋</span>

                        <span>Semua Penjualan</span>

                    </a>

                </li>


                {{-- Penjualan Hari Ini --}}

                <li>

                    <a href="#">

                        <span class="menu-icon">📅</span>

                        <span>Penjualan Hari Ini</span>

                    </a>

                </li>


                {{-- Penjualan Periode --}}

                <li>

                    <a href="#"
                       data-submenu-toggle="subsubmenu-penjualan-periode">

                        <span class="menu-icon">📊</span>

                        <span class="flex-grow-1">
                            Berdasarkan Periode
                        </span>

                        <span class="submenu-arrow">
                            ›
                        </span>

                    </a>


                    <ul
                        id="subsubmenu-penjualan-periode"
                        class="sub-submenu d-none"
                    >

                        <li>
                            <a href="#">
                                <span class="menu-icon">📅</span>
                                <span>Hari Ini</span>
                            </a>
                        </li>

                        <li>
                            <a href="#">
                                <span class="menu-icon">📅</span>
                                <span>Kemarin</span>
                            </a>
                        </li>

                        <li>
                            <a href="#">
                                <span class="menu-icon">📅</span>
                                <span>Minggu Ini</span>
                            </a>
                        </li>

                        <li>
                            <a href="#">
                                <span class="menu-icon">📅</span>
                                <span>Bulan Ini</span>
                            </a>
                        </li>

                        <li>
                            <a href="#">
                                <span class="menu-icon">📅</span>
                                <span>Pilih Periode</span>
                            </a>
                        </li>

                    </ul>

                </li>


                {{-- Penjualan Dibatalkan --}}

                <li>

                    <a href="#">

                        <span class="menu-icon">❌</span>

                        <span>Penjualan Dibatalkan</span>

                    </a>

                </li>

            </ul>

        </li>


        {{-- Transaksi Ditunda --}}

        <li>

            <a href="#">

                <span class="menu-icon">⏸️</span>

                <span>Transaksi Ditunda</span>

            </a>

        </li>


        {{-- =====================================================
             RETUR PENJUALAN
        ====================================================== --}}

        <li>

            <a href="#"
               data-submenu-toggle="submenu-retur">

                <span class="menu-icon">↩️</span>

                <span class="flex-grow-1">
                    Retur Penjualan
                </span>

                <span class="submenu-arrow">
                    ›
                </span>

            </a>


            <ul
                id="submenu-retur"
                class="submenu d-none"
            >

                <li>

                    <a href="#">

                        <span class="menu-icon">📋</span>

                        <span>Semua Retur</span>

                    </a>

                </li>


                <li>

                    <a href="#">

                        <span class="menu-icon">📅</span>

                        <span>Retur Hari Ini</span>

                    </a>

                </li>


                <li>

                    <a href="#">

                        <span class="menu-icon">📜</span>

                        <span>Riwayat Retur</span>

                    </a>

                </li>

            </ul>

        </li>


        {{-- =====================================================
             PERSEDIAAN
        ====================================================== --}}

        <li class="menu-title">
            Persediaan
        </li>


        {{-- Produk --}}

        <li class="{{ request()->is('owner/panel/products*') ? 'active' : '' }}">

            <a href="{{ route('owner.products.index') }}">

                <span class="menu-icon">📦</span>

                <span>Produk</span>

            </a>

        </li>


        {{-- Kategori --}}

        <li>

    <a href="{{ route('owner.category-products.index') }}">

                <span class="menu-icon">🗂️</span>

                <span>Kategori</span>

            </a>

        </li>


        {{-- Grup Produk --}}

        <li>

    <a href="{{ route('owner.product-groups.index') }}">

                <span class="menu-icon">🏷️</span>

                <span>Grup Produk</span>

            </a>

        </li>


        {{-- =====================================================
             STOK
        ====================================================== --}}

        <li>

            <a href="#"
               data-submenu-toggle="submenu-stok">

                <span class="menu-icon">📊</span>

                <span class="flex-grow-1">
                    Stok
                </span>

                <span class="submenu-arrow">
                    ›
                </span>

            </a>


            <ul
                id="submenu-stok"
                class="submenu d-none"
            >

                <li>

                    <a href="#">

                        <span class="menu-icon">📦</span>

                        <span>Stok Saat Ini</span>

                    </a>

                </li>

                    <a href="{{ route('owner.reports.low-stock') }}">

                        <span class="menu-icon">⚠️</span>

                        <span>Stok Menipis</span>

                    </a>

                </li>


                <li>

                    <a href="#">

                        <span class="menu-icon">🚫</span>

                        <span>Stok Habis</span>

                    </a>

                </li>


                {{-- SUB SUBMENU RIWAYAT STOK --}}

                <li>

                    <a href="#"
                       data-submenu-toggle="subsubmenu-riwayat-stok">

                        <span class="menu-icon">📜</span>

                        <span class="flex-grow-1">
                            Riwayat Stok
                        </span>

                        <span class="submenu-arrow">
                            ›
                        </span>

                    </a>


                    <ul
                        id="subsubmenu-riwayat-stok"
                        class="sub-submenu d-none"
                    >

                        <li>

                            <a href="#">

                                <span class="menu-icon">➕</span>

                                <span>Stok Masuk</span>

                            </a>

                        </li>


                        <li>

                            <a href="#">

                                <span class="menu-icon">➖</span>

                                <span>Stok Keluar</span>

                            </a>

                        </li>


                        <li>

                            <a href="#">

                                <span class="menu-icon">🔄</span>

                                <span>Penyesuaian</span>

                            </a>

                        </li>

                    </ul>

                </li>

            </ul>

        </li>


        {{-- Penyesuaian Stok --}}

        <li>

            <a href="{{ route('owner.stock-adjustments.index') }}">

                <span class="menu-icon">🔄</span>

                <span>Penyesuaian Stok</span>

            </a>

        </li>


        {{-- =====================================================
             PEMBELIAN
        ====================================================== --}}

        <li class="menu-title">
            Pembelian
        </li>


        {{-- Pembelian Baru --}}

        <li>

    <a href="{{ route('owner.purchases.create') }}">

                <span class="menu-icon">➕</span>

                <span>Pembelian Baru</span>

            </a>

        </li>


        {{-- Riwayat Pembelian --}}

        <li>

            <a href="#"
               data-submenu-toggle="submenu-pembelian">

                <span class="menu-icon">🛍️</span>

                <span class="flex-grow-1">
                    Riwayat Pembelian
                </span>

                <span class="submenu-arrow">
                    ›
                </span>

            </a>


            <ul
                id="submenu-pembelian"
                class="submenu d-none"
            >

                <li>

                    <a href="#">

                        <span class="menu-icon">📋</span>

                        <span>Semua Pembelian</span>

                    </a>

                </li>


                <li>

                    <a href="#">

                        <span class="menu-icon">📅</span>

                        <span>Pembelian Hari Ini</span>

                    </a>

                </li>


                <li>

                    <a href="#">

                        <span class="menu-icon">📜</span>

                        <span>Riwayat Pembelian</span>

                    </a>

                </li>

            </ul>

        </li>


        {{-- Supplier --}}

        <li class="{{ request()->is('owner/panel/suppliers*') ? 'active' : '' }}">

            <a href="{{ route('owner.suppliers.index') }}">

                <span class="menu-icon">🚚</span>

                <span>Supplier</span>

            </a>

        </li>


        {{-- =====================================================
             PELANGGAN
        ====================================================== --}}

        <li class="menu-title">
            Pelanggan
        </li>


        <li>

            <a href="#"
               data-submenu-toggle="submenu-pelanggan">

                <span class="menu-icon">👥</span>

                <span class="flex-grow-1">
                    Pelanggan
                </span>

                <span class="submenu-arrow">
                    ›
                </span>

            </a>


            <ul
                id="submenu-pelanggan"
                class="submenu d-none"
            >

                <li>

                    <a href="#">

                        <span class="menu-icon">👥</span>

                        <span>Semua Pelanggan</span>

                    </a>

                </li>


                <li>

                    <a href="#">

                        <span class="menu-icon">➕</span>

                        <span>Tambah Pelanggan</span>

                    </a>

                </li>


                <li>

                    <a href="#">

                        <span class="menu-icon">⭐</span>

                        <span>Pelanggan Terbaik</span>

                    </a>

                </li>

            </ul>

        </li>


        {{-- =====================================================
             LAPORAN
        ====================================================== --}}

        <li class="menu-title">
            Laporan
        </li>


        {{-- =====================================================
             LAPORAN PENJUALAN
        ====================================================== --}}

        <li>

            <a href="#"
               data-submenu-toggle="submenu-laporan-penjualan">

                <span class="menu-icon">💰</span>

                <span class="flex-grow-1">
                    Penjualan
                </span>

                <span class="submenu-arrow">
                    ›
                </span>

            </a>


            <ul
                id="submenu-laporan-penjualan"
                class="submenu d-none"
            >

                <li>

                    <a href="#"
                       data-submenu-toggle="subsubmenu-laporan-periode">

                        <span class="menu-icon">📊</span>

                        <span class="flex-grow-1">
                            Ringkasan Penjualan
                        </span>

                        <span class="submenu-arrow">
                            ›
                        </span>

                    </a>


                    <ul
                        id="subsubmenu-laporan-periode"
                        class="sub-submenu d-none"
                    >

                        <li>

                            <a href="#">

                                <span class="menu-icon">📅</span>

                                <span>Hari Ini</span>

                            </a>

                        </li>


                        <li>

                            <a href="#">

                                <span class="menu-icon">📅</span>

                                <span>Minggu Ini</span>

                            </a>

                        </li>


                        <li>

                            <a href="#">

                                <span class="menu-icon">📅</span>

                                <span>Bulan Ini</span>

                            </a>

                        </li>


                        <li>

                            <a href="#">

                                <span class="menu-icon">📅</span>

                                <span>Pilih Periode</span>

                            </a>

                        </li>

                    </ul>

                </li>


                <li class="{{ request()->is('owner/panel/reports/sales-today*') ? 'active' : '' }}">

                    <a href="{{ route('owner.reports.sales-today') }}">

                        <span class="menu-icon">📅</span>

                        <span>Penjualan Hari Ini</span>

                    </a>

                </li>


                <li class="{{ request()->is('owner/panel/reports/transactions*') ? 'active' : '' }}">

                    <a href="{{ route('owner.reports.transactions') }}">

                        <span class="menu-icon">🧾</span>

                        <span>Semua Transaksi</span>

                    </a>

                </li>


                <li class="{{ request()->is('owner/panel/reports/products-sold*') ? 'active' : '' }}">

                    <a href="{{ route('owner.reports.products-sold') }}">

                        <span class="menu-icon">📦</span>

                        <span>Produk Terjual</span>

                    </a>

                </li>

            </ul>

        </li>


        {{-- =====================================================
             LAPORAN KEUANGAN
        ====================================================== --}}

        <li>

            <a href="#"
               data-submenu-toggle="submenu-keuangan">

                <span class="menu-icon">💵</span>

                <span class="flex-grow-1">
                    Keuangan
                </span>

                <span class="submenu-arrow">
                    ›
                </span>

            </a>


            <ul
                id="submenu-keuangan"
                class="submenu d-none"
            >

                <li class="{{ request()->is('owner/panel/reports/revenue*') ? 'active' : '' }}">

                    <a href="{{ route('owner.reports.revenue') }}">

                        <span class="menu-icon">💵</span>

                        <span>Pendapatan</span>

                    </a>

                </li>


                <li class="{{ request()->is('owner/panel/reports/profit*') ? 'active' : '' }}">

                    <a href="{{ route('owner.reports.profit') }}">

                        <span class="menu-icon">📈</span>

                        <span>Keuntungan</span>

                    </a>

                </li>


                <li class="{{ request()->is('owner/panel/reports/average-transaction*') ? 'active' : '' }}">

                    <a href="{{ route('owner.reports.average-transaction') }}">

                        <span class="menu-icon">📊</span>

                        <span>Rata-rata Transaksi</span>

                    </a>

                </li>


                {{-- SUB SUBMENU KEUANGAN --}}

                <li>

                    <a href="#"
                       data-submenu-toggle="subsubmenu-keuangan-periode">

                        <span class="menu-icon">📅</span>

                        <span class="flex-grow-1">
                            Berdasarkan Periode
                        </span>

                        <span class="submenu-arrow">
                            ›
                        </span>

                    </a>


                    <ul
                        id="subsubmenu-keuangan-periode"
                        class="sub-submenu d-none"
                    >

                        <li>

                            <a href="#">

                                <span class="menu-icon">📅</span>

                                <span>Hari Ini</span>

                            </a>

                        </li>


                        <li>

                            <a href="#">

                                <span class="menu-icon">📅</span>

                                <span>Minggu Ini</span>

                            </a>

                        </li>


                        <li>

                            <a href="#">

                                <span class="menu-icon">📅</span>

                                <span>Bulan Ini</span>

                            </a>

                        </li>

                    </ul>

                </li>

            </ul>

        </li>


        {{-- Pelanggan --}}

        <li class="{{ request()->is('owner/panel/reports/customers*') ? 'active' : '' }}">

            <a href="{{ route('owner.reports.customers') }}">

                <span class="menu-icon">👥</span>

                <span>Pelanggan</span>

            </a>

        </li>


        {{-- =====================================================
             LAPORAN PERSEDIAAN
        ====================================================== --}}

        <li>

            <a href="#"
               data-submenu-toggle="submenu-laporan-persediaan">

                <span class="menu-icon">📦</span>

                <span class="flex-grow-1">
                    Persediaan
                </span>

                <span class="submenu-arrow">
                    ›
                </span>

            </a>


            <ul
                id="submenu-laporan-persediaan"
                class="submenu d-none"
            >

                <li>

                    <a href="#">

                        <span class="menu-icon">📊</span>

                        <span>Ringkasan Stok</span>

                    </a>

                </li>


                <li class="{{ request()->is('owner/panel/reports/low-stock*') ? 'active' : '' }}">

                    <a href="{{ route('owner.reports.low-stock') }}">

                        <span class="menu-icon">⚠️</span>

                        <span>Stok Menipis</span>

                    </a>

                </li>


                <li>

                    <a href="#">

                        <span class="menu-icon">🚫</span>

                        <span>Stok Habis</span>

                    </a>

                </li>


                <li>

                    <a href="#"
                       data-submenu-toggle="subsubmenu-laporan-stok">

                        <span class="menu-icon">📜</span>

                        <span class="flex-grow-1">
                            Riwayat Stok
                        </span>

                        <span class="submenu-arrow">
                            ›
                        </span>

                    </a>


                    <ul
                        id="subsubmenu-laporan-stok"
                        class="sub-submenu d-none"
                    >

                        <li>

                            <a href="#">

                                <span class="menu-icon">➕</span>

                                <span>Stok Masuk</span>

                            </a>

                        </li>


                        <li>

                            <a href="#">

                                <span class="menu-icon">➖</span>

                                <span>Stok Keluar</span>

                            </a>

                        </li>


                        <li>

                            <a href="#">

                                <span class="menu-icon">🔄</span>

                                <span>Penyesuaian Stok</span>

                            </a>

                        </li>

                    </ul>

                </li>

            </ul>

        </li>


        {{-- =====================================================
             PENGATURAN
        ====================================================== --}}

        <li class="menu-title">
            Pengaturan
        </li>


        {{-- Toko --}}

        <li>

            <a href="#"
               data-submenu-toggle="submenu-toko">

                <span class="menu-icon">🏪</span>

                <span class="flex-grow-1">
                    Toko
                </span>

                <span class="submenu-arrow">
                    ›
                </span>

            </a>


            <ul
                id="submenu-toko"
                class="submenu d-none"
            >

                <li>

                    <a href="{{ route('owner.store-information.index') }}">

                        <span class="menu-icon">🏪</span>

                        <span>Informasi Toko</span>

                    </a>

                </li>

                <li>

                    <a href="#"
                       data-submenu-toggle="subsubmenu-perangkat">

                        <span class="menu-icon">🖨️</span>

                        <span class="flex-grow-1">
                            Perangkat
                        </span>

                        <span class="submenu-arrow">
                            ›
                        </span>

                    </a>


                    <ul
                        id="subsubmenu-perangkat"
                        class="sub-submenu d-none"
                    >

                        <li>

                            <a href="#">

                                <span class="menu-icon">🖨️</span>

                                <span>Printer</span>

                            </a>

                        </li>


                        <li>

                            <a href="{{ route('owner.cashier-device.index') }}">

                                <span class="menu-icon">🔌</span>

                                <span>Perangkat Kasir</span>

                            </a>

                        </li>


                        <li>

                            <a href="#">

                                <span class="menu-icon">📱</span>

                                <span>Perangkat Terhubung</span>

                            </a>

                        </li>

                    </ul>

                </li>

            </ul>

        </li>


        {{-- Metode Pembayaran --}}

        <li>

    <a href="{{ route('owner.payment-methods.index') }}">

                <span class="menu-icon">💳</span>

                <span>Metode Pembayaran</span>

            </a>

        </li>


        {{-- Struk --}}

        <li>

            <a href="#">

                <span class="menu-icon">🧾</span>

                <span>Struk</span>

            </a>

        </li>


        {{-- Pengguna --}}

        <li>

            <a href="#"
               data-submenu-toggle="submenu-pengguna">

                <span class="menu-icon">👤</span>

                <span class="flex-grow-1">
                    Pengguna
                </span>

                <span class="submenu-arrow">
                    ›
                </span>

            </a>


            <ul
                id="submenu-pengguna"
                class="submenu d-none"
            >

                <li>

                    <a href="#">

                        <span class="menu-icon">👥</span>

                        <span>Semua Pengguna</span>

                    </a>

                </li>


                <li>

                    <a href="#">

                        <span class="menu-icon">➕</span>

                        <span>Tambah Pengguna</span>

                    </a>

                </li>


                <li>

                    <a href="#">

                        <span class="menu-icon">🔐</span>

                        <span>Hak Akses</span>

                    </a>

                </li>

            </ul>

        </li>


    </ul>

</div>