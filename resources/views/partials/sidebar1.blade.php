<div class="sidebar">
    <ul class="sidebar-menu">

        {{-- Dashboard --}}
        <li class="{{ request()->is('admin/panel/panel/dashboard') ? 'active' : '' }}">
            <a href="{{ route('admin.dashboard') }}">
                <span class="me-2">🏠</span> Dashboard
            </a>
        </li>


        {{-- ========================= --}}
        {{-- CMS BLOG --}}
        {{-- ========================= --}}

        <li class="menu-title">
            Cms Blog
        </li>

        {{-- Posts --}}
        <li class="{{ request()->is('admin/panel/posts*') ? 'active' : '' }}">
            <a href="{{ route('admin.posts.index') }}">
                <span class="me-2">📝</span> Posts
            </a>
        </li>

        {{-- Categories --}}
        <li class="{{ request()->is('admin/panel/categories*') ? 'active' : '' }}">
            <a href="{{ route('admin.categories.index') }}">
                <span class="me-2">📂</span> Categories
            </a>
        </li>

        {{-- Tags --}}
        <li class="{{ request()->is('admin/panel/tags*') ? 'active' : '' }}">
            <a href="{{ route('admin.tags.index') }}">
                <span class="me-2">🏷️</span> Tags
            </a>
        </li>

        {{-- Comments --}}
        <li class="{{ request()->is('admin/panel/comments*') ? 'active' : '' }}">
            <a href="{{ route('admin.comments.index') }}">
                <span class="me-2">💬</span> Comments
            </a>
        </li>

        {{-- =========================
     Inventory
========================= --}}
<li class="menu-title">Inventory</li>

{{-- Products --}}
<li class="{{ request()->is('owner/panel/products*') ? 'active' : '' }}">
    <a href="{{ route('owner.products.index') }}">
        <span class="me-2">📦</span>
        Products
    </a>
</li>


        {{-- ========================= --}}
        {{-- USER MANAGEMENT --}}
        {{-- ========================= --}}

        <li class="menu-title">
            User Manajemen
        </li>

        <li class="{{ request()->is('admin/panel/roles*') ? 'active' : '' }}">
            <a href="{{ route('admin.roles.index') }}">
                <span class="me-2">🔑</span> Roles
            </a>
        </li>

        <li class="{{ request()->is('admin/panel/users*') ? 'active' : '' }}">
            <a href="{{ route('admin.users.index') }}">
                <span class="me-2">👤</span> Users
            </a>
        </li>

        {{-- ========================= --}}
{{-- REPORT --}}
{{-- ========================= --}}

<li class="menu-title">
    Report
</li>

{{-- Total Penjualan Hari Ini --}}
<li class="{{ request()->is('admin/panel/reports/sales-today*') ? 'active' : '' }}">
        <span class="me-2">💰</span> Sales Today
    </a>
</li>

{{-- Total Transaksi --}}
<li class="{{ request()->is('admin/panel/reports/transactions*') ? 'active' : '' }}">
        <span class="me-2">🧾</span> Transactions
    </a>
</li>

{{-- Total Produk Terjual --}}
<li class="{{ request()->is('admin/panel/reports/products-sold*') ? 'active' : '' }}">
        <span class="me-2">📦</span> Products Sold
    </a>
</li>

{{-- Total Pendapatan --}}
<li class="{{ request()->is('admin/panel/reports/revenue*') ? 'active' : '' }}">
        <span class="me-2">💵</span> Revenue
    </a>
</li>

{{-- Laba / Profit --}}
<li class="{{ request()->is('admin/panel/reports/profit*') ? 'active' : '' }}">
        <span class="me-2">📈</span> Profit
    </a>
</li>

{{-- Rata-rata Nilai Transaksi --}}
<li class="{{ request()->is('admin/panel/reports/average-transaction*') ? 'active' : '' }}">
        <span class="me-2">📊</span> Average Transaction
    </a>
</li>

{{-- Jumlah Pelanggan --}}
<li class="{{ request()->is('admin/panel/reports/customers*') ? 'active' : '' }}">
        <span class="me-2">👥</span> Customers
    </a>
</li>

{{-- Produk Stok Menipis --}}
<li class="{{ request()->is('admin/panel/reports/low-stock*') ? 'active' : '' }}">
        <span class="me-2">⚠️</span> Low Stock
    </a>
</li>


        {{-- ========================= --}}
        {{-- EMPLOYEE MANAGEMENT --}}
        {{-- ========================= --}}

        <li class="menu-title">
            EMPLOYEE MANAGEMENT
        </li>

        <li class="{{ request()->is('employees*') ? 'active' : '' }}">
            <a href="{{ url('/employees') }}">
                <span class="me-2">👥</span> Employees
            </a>
        </li>

        <li class="{{ request()->is('departments*') ? 'active' : '' }}">
            <a href="{{ url('/departments') }}">
                <span class="me-2">🏢</span> Departments
            </a>
        </li>

        <li class="{{ request()->is('shift-template*') ? 'active' : '' }}">
            <a href="{{ url('/shift-template') }}">
                <span class="me-2">⏰</span> Shift Template
            </a>
        </li>

        <li class="{{ request()->is('shift-assignments*') ? 'active' : '' }}">
            <a href="{{ url('/shift-assignments') }}">
                <span class="me-2">📅</span> Shift Assignments
            </a>
        </li>

        <li class="{{ request()->is('timeoff*') ? 'active' : '' }}">
            <a href="{{ url('/timeoff') }}">
                <span class="me-2">🗓️</span> Timeoff
            </a>
        </li>

    </ul>

</div>