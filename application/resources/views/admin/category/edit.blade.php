@extends('admin.templates.main',['title'=>'Ubah data kategori'])

@section('content')
    <div class="">
        <h1>Ubah Kategori</h1>
    </div>
    <div class="row">
        <div class="col-12 col-md-6">

            <div class="card">
                <div class="card-header">
                    <form method="POST" action="{{ route('categories.update', $category) }}">
                        @csrf
                        @method('PUT')
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Nama Kategori</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name"
                            value="{{ old('name') ?? $category->name }}" placeholder="Nama Kategori">
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                </div>
                <div class="card-footer"><button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
