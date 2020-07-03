@extends("layouts.base")
@section("title")

    martSNP- stores
@endsection
@section("content")


    <section class="sec-product bg0 p-t-100 p-b-50">
        <div class="container">
            <div class="p-b-32">
                <h3 class="ltext-105 cl5 txt-center respon1">
                    Stores Overview
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










        </div>
    </section>
@endsection
