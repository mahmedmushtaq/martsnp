@extends("layouts.base")
@section("title")
    martSNP- Get free online store| Sell And Buy
@endsection

@section("content")
    <!-- Product -->
    <!-- ================================ Slider ==========================  -->
    @include("components.slider")


    {{-- ================================ Banner =============================--}}
    @include("components.banner")

    <section class="sec-product bg0 p-t-100 p-b-50">
        <div class="container">
            <div class="p-b-32">
                <h3 class="ltext-105 cl5 txt-center respon1">
                    Store Overview
                </h3>
            </div>

            <!-- Tab01 -->
            <div class="tab01">
                <!-- Nav tabs -->


                <!-- Tab panes -->
                <div class="tab-content p-t-50">
                    <!-- - -->
                    <div class="tab-pane fade show active" id="best-seller" role="tabpanel">
                        <!-- Slide2 -->
                        <div class="row isotope-grid">






                           @include("partials.store_item")






                        </div>
                    </div>
                </div>

                {{$stores->links()}}
            </div>




{{--            ========== tab 02 =================--}}

            <br><br>
            <div class="p-b-32">
                <h3 class="ltext-105 cl5 txt-center respon1">
                    Products Overview
                </h3>
            </div>
        <!-- Tab01 -->
            <div class="tab01">
                <!-- Nav tabs -->


                <!-- Tab panes -->
                <div class="tab-content p-t-50">
                    <!-- - -->
                    <div class="tab-pane fade show active" id="best-seller" role="tabpanel">
                        <!-- Slide2 -->

                        <div class="row  isotope-grid ml-auto mr-auto" >






                                             <span style="visibility: hidden;">
{{--                       show buy btn mean user not in the stores page--}}
                                                 {{$show_buy_btn = true}}
                            </span>



                            @include("partials.product_item")






                        </div>


                        </div>
                    </div>

                {{$products->links()}}
            </div>






        </div>
    </section>
@endsection
