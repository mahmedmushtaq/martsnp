@extends("layouts.base")
@section("title")

    martSNP- All Products
@endsection
@section("content")
    <div class="bg0 m-t-23 p-b-140">
        <div class="container">
            <div class="flex-w flex-sb-m p-b-52">
                <div class="flex-w flex-l-m filter-tope-group m-tb-10">
                    <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 how-active1" data-filter="*">
                        All Products
                    </button>

                    <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".women">
                        Women
                    </button>

                    <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".men">
                        Men
                    </button>

                    <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".bag">
                        Bag
                    </button>

                    <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".shoes">
                        Shoes
                    </button>

                    <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".watches">
                        Watches
                    </button>
                </div>






            </div>




            <div class="row  isotope-grid ml-auto mr-auto" >



                   <span style="visibility: hidden;">
{{--                       show buy btn mean user not in the stores page--}}
                                {{$show_buy_btn = true}}
                            </span>



               @include("partials.product_item")






            </div>


            <!-- Load more -->
            <div class="flex-c-m flex-w w-full p-t-45">
                @isset($products)
                    {{$products->links()}}
                @endisset
            </div>
        </div>
    </div>
@endsection
