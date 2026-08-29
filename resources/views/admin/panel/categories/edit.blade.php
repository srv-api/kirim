@extends('dashboard')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h2>Edit Category</h2>

        <a href="{{ route('admin.categories.index') }}"
           class="btn btn-secondary">
            Kembali
        </a>

    </div>

    @if($errors->any())

        <div class="alert alert-danger">

            <ul class="mb-0">

                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach

            </ul>

        </div>

    @endif

    <div class="card">

        <div class="card-body">

            <form method="POST"
                  action="{{ route('admin.categories.update', $category) }}">

                @csrf
                @method('PUT')

                <div class="mb-3">

                    <label class="form-label">
                        Nama Category
                    </label>

                    <input
                        type="text"
                        name="name"
                        value="{{ old('name', $category->name) }}"
                        class="form-control"
                        required
                    >

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Description
                    </label>

                    <textarea
                        name="description"
                        rows="5"
                        class="form-control"
                    >{{ old('description', $category->description) }}</textarea>

                </div>

                <button class="btn btn-primary">
                    Update Category
                </button>

            </form>

        </div>

    </div>

</div>

@endsection