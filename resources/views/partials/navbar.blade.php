<div class="navbar-custom bg-white border-bottom px-3 py-2 d-flex justify-content-between">

<div class="d-flex align-items-center">

<button id="toggleSidebar" class="btn btn-sm me-2">
☰
</button>

<strong>Panel Dashboard</strong>

</div>

{{-- LOGOUT --}}

<form
    method="POST"
    action="{{ route('logout') }}"
    class="mb-0"
>
    @csrf


<button
    type="submit"
    class="btn btn-sm d-inline-flex align-items-center gap-2"
    style="
        padding: 8px 13px;
        border: 1px solid #fecaca;
        border-radius: 9px;
        background: #fffafa;
        color: #dc2626;
        font-size: 12px;
        font-weight: 650;
        transition: all .15s ease;
    "
    onmouseover="this.style.background='#fef2f2'; this.style.borderColor='#fca5a5'; this.style.color='#b91c1c';"
    onmouseout="this.style.background='#fffafa'; this.style.borderColor='#fecaca'; this.style.color='#dc2626';"
    title="Keluar"
>
    <i class="bi bi-box-arrow-right"></i>
    <span>Keluar</span>
</button>


</form>

</div>