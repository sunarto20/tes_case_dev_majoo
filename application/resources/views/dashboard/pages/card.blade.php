@foreach ($products as $product)
    <div class="col-lg-3 col-md-6 col-12 mb-3 d-flex align-items-stretch">
        <div class="card ">
            <img src="{{ url('storage') . '/' . $product->image }}" class="card-img-top" alt="...">
            <div class="card-body d-flex flex-column">
                <h5 class="card-title">{{ $product->name }}</h5>
                <h4>Rp. {{ number_format($product->price, 0, '.', '.') }}</h4>
                <p class="card-text">
                    {!! $product->description !!}
                </p>
                <a href="#" class="btn btn-primary">Beli</a>
            </div>
        </div>
    </div>
@endforeach
