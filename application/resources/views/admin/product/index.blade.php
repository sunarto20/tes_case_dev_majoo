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
            <a class="btn btn-primary" href="{{ route('products.create') }}"> Tambah data produk</a>
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
                    <th scope="col">Nama Produk</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Kategori</th>
                    <th scope="col">Deskripsi</th>
                    <th scope="col">Foto Produk</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($products as $product)
                    <tr>
                        <td>{{ ($products->currentpage() - 1) * $products->perpage() + $loop->index + 1 }}</td>
                        <td>{{ $product->name }}</td>
                        <td>Rp. {{ number_format($product->price, 0, '.', '.') }}</td>
                        <td>{{ $product->category->name }}</td>
                        <td>{!! $product->description !!}</td>
                        <td> <img src="{{ url('storage') . '/' . $product->image }}" alt="{{ $product->name }}"
                                width="100">
                        </td>
                        <td>
                            <form action="{{ route('products.destroy', $product) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <a href="{{ route('products.edit', $product) }}"
                                    class="btn btn-sm btn-warning mb-sm-1">Ubah</a>

                                <button type="submit" class="btn btn-sm btn-danger mt-1">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7">Data produk tidak tersedia</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <div class="d-flex justify-content-between">
            <div class="">
                Menampilkan {{ $products->firstItem() }} sampai
                {{ $products->lastItem() }} dari {{ $products->total() }} data
            </div>
            <div class="">
                {{ $products->links() }}
            </div>
        </div>
    </div>
@endsection
