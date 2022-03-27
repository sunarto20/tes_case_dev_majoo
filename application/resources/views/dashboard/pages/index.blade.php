@extends('dashboard.templates.main')


@push('styles')
    <style>

    </style>
@endpush

@push('scripts')
    <script>
        let page = 1;
        $(window).scroll(() => {
            if ($(window).scrollTop() + $(window).height() >= $(document).height()) {
                page++;
                loadMoreData(page);
            }
        });


        function loadMoreData(page) {
            $.ajax({
                    url: '?page=' + page,
                    type: "get",
                    beforeSend: () => {
                        $('.load').show();
                    }
                })
                .done(data => {
                    $('.load').hide();
                    $("#product").append(data.html);
                })
        }
    </script>
@endpush


@section('section')
    <div class="mt-3 mb-4">
        <h1>Produk</h1>
    </div>
    <div class="row" id="product">
        @include('dashboard.pages.card')


    </div>
    <div class="load text-center">
        <div class="spinner-border text-primary" style="display: none">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
@endsection
