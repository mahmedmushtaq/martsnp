
@extends("layouts.base")


@section("content")
    <div class="bg0 m-t-23 p-b-140">
        <div class="container">
            <div class="flex-w flex-sb-m p-b-52">
                <div class="flex-w flex-l-m filter-tope-group m-tb-10">
                    <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 how-active1" data-filter="*">
                       Products Related To
                    </button>

                    <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".women">
                        Men
                    </button>
                    <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".women">
                        Women
                    </button>
                    <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".women">
                        Others
                    </button>


                </div>
            </div>
    <div class="row isotope-grid">

        @if($products->count() > 0)

            <span style="visibility: hidden;">
{{--                       show buy btn mean user not in the stores page--}}
                {{$show_buy_btn = false}}
                            </span>



            @include("partials.product_item")



         @else
            <div>No content is found</div>
        @endif



        {{--        =========2======--}}








    </div>
        </div>



    </div>
@endsection

