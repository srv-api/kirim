<div class="navbar-custom bg-white border-bottom px-3 py-2 d-flex justify-content-between">

<div class="d-flex align-items-center">

<button id="toggleSidebar" class="btn btn-sm btn-outline-secondary me-2">
☰
</button>

<strong>Owner Panel</strong>

</div>

<form method="POST" action="{{ route('logout') }}">
@csrf
<button class="btn btn-danger btn-sm">Logout</button>
</form>

</div>