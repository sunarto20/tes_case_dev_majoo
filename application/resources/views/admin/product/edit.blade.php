@extends('admin.templates.main',['title'=>'Ubah data produk'])


@push('more-css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush

@push('more-js')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="//cdn.ckeditor.com/4.18.0/standard/ckeditor.js"></script>
@endpush

@push('styles')
@endpush

@push('scripts')
    <script>
        $(document).ready(function() {
            $('.select').select2()
        });

        var description = document.getElementById("description");
        CKEDITOR.replace(description, {
            language: 'en-gb'
        });
        CKEDITOR.config.allowedContent = true;
    </script>
@endpush

@section('content')
    <div class="">
        <h1>Ubah produk</h1>
    </div>
    <div class="row">
        <div class="col-12 col-md-6">

            <div class="card">
                <div class="card-header">
                    <form method="POST" action="{{ route('products.update', $product) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Nama Produk</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name"
                            value="{{ old('name') ?? $product->name }}" placeholder="Nama Produk">
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="price">Harga</label>
                        <input type="number" name="price" class="form-control @error('price') is-invalid @enderror"
                            id="price" placeholder="Harga Produk" value="{{ old('price') ?? $product->price }}">
                        @error('price')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="category">Kategori</label>
                        <select name="category" id="category"
                            class="form-control @error('category') is-invalid @enderror select">
                            <option value="" name="category" disabled selected>Pilih Kategori</option>
                            @foreach ($categories as $category)
                                <option @selected($category->id == (old('category') ?? $product->category_id)) value="{{ $category->id }}">{{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('category')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="description">Deskripsi</label>
                        <textarea class="form-control is-invalid" name="description" id="description" cols="30"
                            rows="10">{!! old('description') ?? $product->description !!}</textarea>
                        @error('description')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="custom-file mb-3">
                        <label for="">Foto Produk</label>
                        <div class="custom-file">
                            <input type="file" name="image" class="custom-file-input @error('image') is-invalid @enderror"
                                id="customFile">
                            <label class="custom-file-label" for="customFile">Choose file</label>
                            @error('image')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mt-3 mb-2">
                            <img width="50" src="{{ url('storage') . '/' . $product->image }}"
                                alt="{{ $product->name }}">
                        </div>
                    </div>
                </div>
                <div class="card-footer mt-2"><button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
