<div class="sidebar">

<h4>Admin Panel</h4>

<ul class="sidebar-menu">

<li class="{{ request()->is('admin') ? 'active' : '' }}">
<a href="{{ route('admin.dashboard') }}">
<span class="me-2">🏠</span> Dashboard
</a>
</li>

<li class="{{ request()->is('roles*') ? 'active' : '' }}">
<a href="{{ route('roles.index') }}">
<span class="me-2">🔑</span> Roles
</a>
</li>

<li class="{{ request()->is('users*') ? 'active' : '' }}">
<a href="{{ url('/users') }}">
<span class="me-2">👤</span> Users
</a>
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
<span class="me-2">📅</span> Timeoff
</a>
</li>

@can('zkteco.view')
<li class="{{ request()->is('zkteco*') ? 'active' : '' }}">
<a href="{{ route('zkteco.dashboard') }}">
<span class="me-2">🖥️</span> ZKTeco
</a>
</li>
@endcan

</ul>

</div>