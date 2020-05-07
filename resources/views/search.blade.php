@extends("layouts.base")
@section("title")

    martSNP- search result
@endsection

@section("content")

    <div class="row  isotope-grid ml-auto mr-auto" >

        @isset($count)
        @if($count === 0)
            <h5 class="font-24 text-center text-danger">Sorry! no result is found.</h5>
        @endif
       @endisset

        @isset($msg)
            <h5 class="font-24 text-center text-danger">{{$msg}}</h5>
        @endisset

        @isset($stores)
             @include("partials.store_item")
            {{$stores->links()}}
        @endisset

        @isset($products)
            {{--                       show buy btn mean user not in the stores page--}}
            <span style="visibility: hidden;">{{$show_buy_btn = true}}</span>
            @include("partials.product_item")

            {{$products->links()}}

        @endisset

    </div>

@endsection
