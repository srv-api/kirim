@extends('layouts.app')

@section('title','Contact')

@section('content')

<div class="container py-5">

    <h2>Hubungi Kami</h2>

    <form class="mt-4">

        <div class="mb-3">
            <label>Nama</label>
            <input type="text" class="form-control">
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email" class="form-control">
        </div>

        <div class="mb-3">
            <label>Pesan</label>
            <textarea class="form-control" rows="5"></textarea>
        </div>

        <button class="btn btn-primary">
            Kirim
        </button>

    </form>

</div>

@endsection