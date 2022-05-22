<div class="wrap-header-cart js-panel-cart">
    <div class="s-full js-hide-cart"></div>

   <span style="visibility: hidden">
        {{$value = 0}}
   </span>
    <div class="header-cart flex-col-l p-l-65 p-r-25">
        <div class="header-cart-title flex-w flex-sb-m p-b-8">
				<span class="mtext-103 cl2">
					Your Cart
				</span>

            <div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-cart">
                <i class="zmdi zmdi-close"></i>
            </div>
        </div>

        <div class="header-cart-content flex-w js-pscroll">
            <ul class="header-cart-wrapitem w-full">

                @isset($cartData)
                @foreach($cartData as $cart)

                <li class="header-cart-item flex-w flex-t m-b-12">
                    <div class="header-cart-item-img">
                        <img src="{{asset($cart->single_image)}}" alt="IMG">

                    </div>

                    <div class="header-cart-item-txt p-t-8">
                        <a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
                           {{$cart->name}}
                        </a>

                        <span class="header-cart-item-info">
								{{$cart->qty}} x {{$cart->price}}
							</span>

                    </div>

                    <form action="{{route('cart.destroy',$cart->rawId())}}" method="POST">
                        @csrf
                        @method("DELETE")
                        <div class="wrap-num-product flex-w m-r-20 m-tb-10">
{{--                             here I am not following the convention --}}
                            <button type="submit" name="decrease" value="decrease" class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
                                <i class="fs-16 zmdi zmdi-minus"></i>
                            </button>

                            <input class="mtext-104 cl3 txt-center num-product" type="number" name="cart_quantity" value="{{$cart->qty}}">

                        <button name="increase" type="submit" value="increase"  class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
                            <i class="fs-16 zmdi zmdi-plus"></i>

                        </button>




                        </div>

                        <button name="remove_item" type="submit" value="remove_item" class="flex-c-m stext-101 cl0 size-107 bg1 bor2 hov-btn3 p-lr-15 trans-04 m-b-10">Remove </button>

                        <span style="visibility: hidden;">
                           {{ $value += $cart->qty * $cart->price}}
                        </span>


                    </form>





                </li>
                @endforeach
                    @endisset




            </ul>

            <div class="w-full">
                @isset($cartData)
                <div class="header-cart-total w-full p-tb-40">
                    Total
                   Rs   {{$value}}
                </div>
               @endisset

                <div class="header-cart-buttons flex-w w-full">


                    <a href="{{route('cart.index')}}" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-b-10">
                        Check Out
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

@section("scripts")
    <script>
        const increaseValue = ()=>{
            console.log("onclick occur");
        }
    </script>
@endsection
