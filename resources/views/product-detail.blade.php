@extends("layouts.base")
@section("title")

    martSNP- {{isset($product) ? $product->product_name : "Product Details"}}
@endsection
@section("content")


   @isset($product)

	<!-- Product Detail -->
    <div>
{{--	<section class="sec-product-detail bg0 p-t-65 p-b-60">--}}
{{--		<div class="container">--}}
{{--			<div class="row">--}}
{{--				<div class="col-md-5 col-lg-6 p-b-30">--}}
{{--					<div class="p-l-25 p-r-30 p-lr-0-lg">--}}
{{--						<div class="wrap-slick3 flex-sb flex-w">--}}
{{--							<div class="wrap-slick3-dots"></div>--}}
{{--							<div class="wrap-slick3-arrows flex-sb-m flex-w"></div>--}}




{{--                            @foreach(explode(",",$product->images) as $image)--}}
{{--                                @if($image !== "")--}}

{{--								<div class="item-slick3" data-thumb="images/product-detail-03.jpg">--}}
{{--									<div class="wrap-pic-w pos-relative">--}}
{{--										<img src="{{asset($image)}}" alt="IMG-PRODUCT">--}}

{{--										<span class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04">--}}
{{--											<i class="fa fa-expand"></i>--}}
{{--										</span>--}}
{{--									</div>--}}
{{--								</div>--}}

{{--                                @endif--}}
{{--                                @endforeach--}}



{{--							</div>--}}
{{--						</div>--}}
{{--					</div>--}}
{{--				</div>--}}

{{--				<div class="col-md-5 col-lg-4 p-b-30">--}}
{{--					<div class="p-r-50 p-t-5 p-lr-0-lg">--}}
{{--						<h4 class="mtext-105 cl2 js-name-detail p-b-14">--}}
{{--						{{$product->product_name}}--}}
{{--						</h4>--}}

{{--						<span class="mtext-106 cl2">--}}
{{--							{{$product->price}}--}}
{{--						</span>--}}

{{--						<p class="stext-102 cl3 p-t-23">--}}
{{--							{{$product->description}}--}}
{{--                        </p>--}}

{{--						<!--  -->--}}
{{--						<div class="p-t-33">--}}
{{--							<div class="flex-w flex-r-m p-b-10">--}}
{{--								<div class="size-203 flex-c-m respon6">--}}
{{--									Size--}}
{{--								</div>--}}

{{--								<div class="size-204 respon6-next">--}}
{{--									<div class="rs1-select2 bor8 bg0">--}}
{{--										{{$product->size}}--}}
{{--										<div class="dropDownSelect2"></div>--}}
{{--									</div>--}}
{{--								</div>--}}
{{--							</div>--}}



{{--							<div class="flex-w flex-r-m p-b-10">--}}
{{--								<div class="size-204 flex-w flex-m respon6-next">--}}
{{--									<div class="wrap-num-product flex-w m-r-20 m-tb-10">--}}
{{--										<div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">--}}
{{--											<i class="fs-16 zmdi zmdi-minus"></i>--}}
{{--										</div>--}}

{{--										<input class="mtext-104 cl3 txt-center num-product" type="number" name="num-product" value="1">--}}

{{--										<div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">--}}
{{--											<i class="fs-16 zmdi zmdi-plus"></i>--}}
{{--										</div>--}}
{{--									</div>--}}

{{--									<button class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail">--}}
{{--										Add to cart--}}
{{--									</button>--}}
{{--								</div>--}}
{{--							</div>--}}

{{--                            <form method="POST" action="{{route('cart.store')}}">--}}
{{--                                @csrf--}}
{{--                                <input type="hidden" name="product_id" value="{{$product->id}}">--}}
{{--                                <div class="wrap-num-product flex-w m-r-20 m-tb-10">--}}
{{--                                    <div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">--}}
{{--                                        <i class="fs-16 zmdi zmdi-minus"></i>--}}
{{--                                    </div>--}}

{{--                                    <input class="mtext-104 cl3 txt-center num-product" type="number" name="cart_quantity" value="1">--}}

{{--                                    <div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">--}}
{{--                                        <i class="fs-16 zmdi zmdi-plus"></i>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <button type="submit" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail">--}}
{{--                                    Add to cart--}}
{{--                                </button>--}}
{{--                            </form>--}}


{{--						</div>--}}



{{--						<!--  -->--}}
{{--						<div class="flex-w flex-m p-l-100 p-t-40 respon7">--}}
{{--							<div class="flex-m bor9 p-r-10 m-r-11">--}}
{{--								<a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 js-addwish-detail tooltip100" data-tooltip="Add to Wishlist">--}}
{{--									<i class="zmdi zmdi-favorite"></i>--}}
{{--								</a>--}}
{{--							</div>--}}

{{--							<a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Facebook">--}}
{{--								<i class="fa fa-facebook"></i>--}}
{{--							</a>--}}

{{--							<a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Twitter">--}}
{{--								<i class="fa fa-twitter"></i>--}}
{{--							</a>--}}

{{--							<a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Google Plus">--}}
{{--								<i class="fa fa-google-plus"></i>--}}
{{--							</a>--}}
{{--						</div>--}}
{{--					</div>--}}
{{--				</div>--}}
{{--			</div>--}}


{{--		</div>--}}

{{--		<div class="bg6 flex-c-m flex-w size-302 m-t-73 p-tb-15">--}}
{{--			<span class="stext-107 cl6 p-lr-25">--}}
{{--				SKU: JAK-01--}}
{{--			</span>--}}

{{--			<span class="stext-107 cl6 p-lr-25">--}}
{{--				Categories: Jacket, Men--}}
{{--			</span>--}}
{{--		</div>--}}
{{--	</section>--}}
    </div>


    <body class="animsition">





    <!-- Product Detail -->
    <section class="sec-product-detail bg0 p-t-65 p-b-60">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-7 p-b-30">
                    <div class="p-l-25 p-r-30 p-lr-0-lg">
                        <div class="wrap-slick3 flex-sb flex-w">
                            <div class="wrap-slick3-dots"></div>
                            <div class="wrap-slick3-arrows flex-sb-m flex-w"></div>

                            <div class="slick3 gallery-lb">
                                @foreach(explode(",",$product->images) as $image)
                                    @if($image !== "")








                                <div class="item-slick3" data-thumb="images/product-detail-03.jpg">
                                    <div class="wrap-pic-w pos-relative">
                                        <img src="{{asset($image)}}" alt="IMG-PRODUCT">

                                        <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" >
                                            <i class="fa fa-expand"></i>
                                        </a>
                                    </div>


                                </div>

                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-5 p-b-30">
                    <div class="p-r-50 p-t-5 p-lr-0-lg">
                        <h4 class="mtext-105 cl2 js-name-detail p-b-14">
                            {{$product->product_name}}
                        </h4>

                        <span class="mtext-106 cl2">
							{{$product->price}}
						</span>

                        <p class="stext-102 cl3 p-t-23">
                            {{$product->description}}
                        </p>

                        <!--  -->
                        @isset($product->size)
                        <div class="p-t-33">
                            <div class="flex-w flex-r-m p-b-10">
                                <div class="size-203 flex-c-m respon6">
                                    Size
                                </div>

                                <div class="size-204 respon6-next">
                                    <div class="rs1-select2 bor8 bg0">
                                        {{$product->size}}
                                        <div class="dropDownSelect2"></div>
                                    </div>
                                </div>
                            </div>
                          @endisset



{{--                            <div class="flex-w flex-r-m p-b-10">--}}
{{--                                <div class="size-204 flex-w flex-m respon6-next">--}}
{{--                                    --}}
{{--                                    --}}
{{--                                    <div class="wrap-num-product flex-w m-r-20 m-tb-10">--}}
{{--                                        <div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">--}}
{{--                                            <i class="fs-16 zmdi zmdi-minus"></i>--}}
{{--                                        </div>--}}

{{--                                        <input class="mtext-104 cl3 txt-center num-product" type="number" name="num-product" value="1">--}}

{{--                                        <div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">--}}
{{--                                            <i class="fs-16 zmdi zmdi-plus"></i>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}

{{--                                    <button class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail">--}}
{{--                                        Add to cart--}}
{{--                                    </button>--}}
{{--                                </div>--}}
{{--                            </div>--}}


                            <div class="flex-w flex-r-m p-b-10">
                                <div class="size-204 flex-w flex-m respon6-next">


                                    <form method="POST" action="{{route('cart.store')}}">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{$product->id}}">
                                        <div class="wrap-num-product flex-w m-r-20 m-tb-10">
                                            <div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
                                                <i class="fs-16 zmdi zmdi-minus"></i>
                                            </div>

                                            <input class="mtext-104 cl3 txt-center num-product" type="number" name="cart_quantity" value="1">

                                            <div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
                                                <i class="fs-16 zmdi zmdi-plus"></i>
                                            </div>
                                        </div>
                                        <button type="submit" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail">
                                            Add to cart
                                        </button>
                                    </form>

                                </div>
                            </div>



                        </div>

                        <!--  -->
                        <div class="flex-w flex-m p-l-100 p-t-40 respon7">
                            <div class="flex-m bor9 p-r-10 m-r-11">
                                <a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 js-addwish-detail tooltip100" data-tooltip="Add to Wishlist">
                                    <i class="zmdi zmdi-favorite"></i>
                                </a>
                            </div>

                            <a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Facebook">
                                <i class="fa fa-facebook"></i>
                            </a>

                            <a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Twitter">
                                <i class="fa fa-twitter"></i>
                            </a>

                            <a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Google Plus">
                                <i class="fa fa-google-plus"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>


        </div>


    </section>





    <!-- Back to top -->
    <div class="btn-back-to-top" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="zmdi zmdi-chevron-up"></i>
		</span>
    </div>

    @else
       <h1 class="text-danger text-center font-24"> Please select a product</h1>
    @endisset




	<!-- Back to top -->
	<div class="btn-back-to-top" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="zmdi zmdi-chevron-up"></i>
		</span>
	</div>

@endsection


