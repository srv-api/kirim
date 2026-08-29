<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Dashboard</title>
<meta name="viewport" content="width=device-width, initial-scale=1">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

body{
    overflow-x:hidden;
    background:#f4f6f8;
    font-family:'Segoe UI',sans-serif;
}

/* SIDEBAR */

.sidebar{
    min-height:100vh;
    background:#fff;
    padding:25px 15px;
    display:flex;
    flex-direction:column;
}

.sidebar h4{
    color:#fff;
    text-align:center;
    margin-bottom:20px;
}

.sidebar-menu{
    list-style:none;
    padding:0;
}

.sidebar-menu a{
    display:flex;
    align-items:center;
    padding:10px 15px;
    border-radius:6px;
    color:#000;
    text-decoration:none;
}

.sidebar-menu a:hover{
    background:#f2f2f2;
}

.sidebar-menu li.active>a{
    background:#f2f2f2;
    color:#000000;
}

/* collapse */

#sidebarWrapper{
    transition:.3s;
}

#contentWrapper{
    transition:.3s;
}

.sidebar-collapsed #sidebarWrapper{
    flex:0 0 70px;
    max-width:70px;
}

.sidebar-collapsed #contentWrapper{
    flex:0 0 calc(100% - 70px);
    max-width:calc(100% - 70px);
}

.sidebar-collapsed .sidebar h4{
    display:none;
}

.sidebar-collapsed .sidebar-menu a{
    justify-content:center;
    font-size:0;
}

.sidebar-collapsed .sidebar-menu a span{
    font-size:18px;
}

/* content */

.content-area{
    padding:25px;
    background:#fff;
    border-radius:8px;
    box-shadow:0 0 10px rgba(0,0,0,0.05);
    min-height:80vh;
}

</style>

</head>
<body>

{{-- Navbar --}}
@include('partials.navbar')

<div class="container-fluid">
<div class="row">

{{-- Sidebar --}}
<div id="sidebarWrapper" class="col-md-2 p-0">
@include('partials.sidebar')
</div>

{{-- Content --}}
<div id="contentWrapper" class="col-md-10 p-4">
<div class="content-area">

@yield('content')

</div>
</div>

</div>
</div>

{{-- Footer --}}
@include('partials.footer')

<script>

document.addEventListener('DOMContentLoaded',function(){

const toggleBtn=document.getElementById('toggleSidebar');

toggleBtn.addEventListener('click',function(){
document.body.classList.toggle('sidebar-collapsed');
});

});

</script>

</body>
</html>