@extends('admin.templates.main',['title'=>'Data Produk'])

@push('more-css')
@endpush

@push('more-js')
@endpush

@push('styles')
@endpush

@push('scripts')
@endpush

@section('content')
    <div class="d-flex justify-content-between mb-3">
        <div class="h1">
            Data Produk
        </div>
        <div class="">
            <a class="btn btn-primary" href="{{ route('categories.create') }}"> Tambah data kategori</a>
        </div>
    </div>

    @if (session()->has('message'))
        <div class="alert {{ session()->get('message')['css'] }}" role="alert">
            {{ session()->get('message')['message'] }}
        </div>
    @endif

    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead class="table-secondary">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama Kategori</th>
                    <th scope="col">Total Produk</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($categories as $category)
                    <tr>
                        <td>{{ ($categories->currentpage() - 1) * $categories->perpage() + $loop->index + 1 }}</td>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->products_count }}</td>

                        <td>
                            <form action="{{ route('categories.destroy', $category) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <a href="{{ route('categories.edit', $category) }}"
                                    class="btn btn-sm btn-warning mb-sm-1">Ubah</a>

                                <button type="submit" class="btn btn-sm btn-danger mt-1">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7">Data kategori tidak tersedia</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <div class="d-flex justify-content-between">
            <div class="">
                Menampilkan {{ $categories->firstItem() }} sampai
                {{ $categories->lastItem() }} dari {{ $categories->total() }} data
            </div>
            <div class="">
                {{ $categories->links() }}
            </div>
        </div>
    </div>
@endsection
