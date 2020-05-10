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

    <section class="sec-product bg0 p-t-20 p-b-50">
        <div class="container">


            <!-- ======= Services Section ======= -->
            <section id="services" class="services">
                <div class="container">





                    <div class="row d-flex ">

                        @foreach($store_types as $type)

                        <a href="{{route('specific-stores',$type->slug)}}" class="col-lg-4 btn-style col-md-6 d-flex align-items-stretch m-tb--5 p-b-100 align-self-center ">
                           <div class="image-container m-l-auto m-r-auto" style='font-family: "Nunito", sans-serif;'>
                               <img  src="{{asset($type->image)}}" width="250px" height="250px" alt="">

                               <div style="text-align:center;  font-family: Poppins-Medium; color:black; box-shadow: 0 0px 1px 1px rgba(211,211,211,.55); padding:20px;">{{$type->store_type}}</div>

                           </div>

                        </a>
                        @endforeach









{{--                        <a href="{{route('specific-stores','')}}"  class="col-lg-4 btn-style col-md-6 d-flex align-items-stretch p-b-100">--}}
{{--                            <div class="image-container m-l-auto m-r-auto">--}}
{{--                                <img src="{{asset('assets/images/btn-2.png')}}" width="250px" height="250px" alt="">--}}
{{--                                <div style="text-align:center;font-family: Poppins-Medium; color:black; box-shadow: 0 0px 1px 1px rgba(211,211,211,.55); padding:20px;">Stylish Watch Stores</div>--}}

{{--                            </div>--}}
{{--                        </a>--}}



{{--                        <div class="col-lg-4 col-md-6 d-flex align-items-stretch p-b-100 mt-4 mt-md-0">--}}
{{--                            <div class="image-container m-l-auto m-r-auto">--}}
{{--                                <img src="{{asset('assets/images/btn-3.png')}}" width="250px" height="250px" alt="">--}}
{{--                                <div style="text-align:center;font-family: Poppins-Medium; color:black; box-shadow: 0 0px 1px 1px rgba(211,211,211,.55); padding:20px;">Shoes Stores</div>--}}

{{--                            </div>--}}
{{--                        </div>--}}



{{--                        <div class="col-lg-4 col-md-6 d-flex align-items-stretch p-b-100 mt-4 mt-md-0">--}}
{{--                            <div class="image-container m-l-auto m-r-auto">--}}
{{--                                <img src="{{asset('assets/images/btn-4.png')}}" width="250px" height="250px" alt="">--}}
{{--                                <div style="text-align:center;font-family: Poppins-Medium; color:black; box-shadow: 0 0px 1px 1px rgba(211,211,211,.55); padding:20px;">Child Garments</div>--}}

{{--                            </div>--}}
{{--                        </div>--}}



{{--                        <div class="col-lg-4 col-md-6 d-flex align-items-stretch p-b-100 mt-4 mt-md-0">--}}
{{--                            <div class="image-container m-l-auto m-r-auto">--}}
{{--                                <img src="{{asset('assets/images/btn-5.png')}}" width="250px" height="250px" alt="">--}}
{{--                                <div style="text-align:center; color:black;font-family: Poppins-Medium; box-shadow: 0 0px 1px 1px rgba(211,211,211,.55); padding:20px;">Men garments</div>--}}

{{--                            </div>--}}
{{--                        </div>--}}






{{--                            <div class="col-lg-4 col-md-6  mt-4 mt-md-0 align-items-stretch p-b-100   d-flex ">--}}
{{--                                <div class="image-container m-l-auto m-r-auto ">--}}
{{--                                    <img src="{{asset('assets/images/btn-6.png')}}" width="250px" height="250px" alt="">--}}
{{--                                    <div style="text-align:center;font-family: Poppins-Medium; color:black; box-shadow: 0 0px 1px 1px rgba(211,211,211,.55); padding:20px;">Ladies Garments</div>--}}


{{--                                </div>--}}


{{--                        </div>--}}






                    </div>


                </div>
            </section>



            <div>

{{--            <!-- Tab01 -->--}}
{{--            <div class="tab01">--}}
{{--                <!-- Nav tabs -->--}}


{{--                <!-- Tab panes -->--}}
{{--                <div class="tab-content p-t-50">--}}
{{--                    <!-- - -->--}}
{{--                    <div class="tab-pane fade show active" id="best-seller" role="tabpanel">--}}
{{--                        <!-- Slide2 -->--}}
{{--                        <div class="row isotope-grid">--}}






{{--                     @include("partials.store_item")--}}






{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                {{$stores->links()}}--}}
{{--            </div>--}}




{{--            ========== tab 02 =================--}}


            </div>





        </div>
    </section>
@endsection

@section("css")
    <style>
        .btn-style{
            cursor: pointer;
        }
    </style>
@endsection



