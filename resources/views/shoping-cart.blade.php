@extends("layouts.base")
@section("title")

    martSNP- cart
@endsection

@section("content")
	<!-- Header -->


    <span style="visibility: hidden">
        {{$value=0}}
    </span>
	<!-- Cart -->




	<!-- breadcrumb -->
	<div class="container">
		<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
			<a href="index.blade.php" class="stext-109 cl8 hov-cl1 trans-04">
				Home
				<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
			</a>

			<span class="stext-109 cl4">
				Shoping Cart
			</span>
		</div>
	</div>


	<!-- Shoping Cart -->
	<div class="bg0 p-t-75 p-b-85">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
					<div class="m-l-25 m-r--38 m-lr-0-xl">
						<div class="wrap-table-shopping-cart">
							<table class="table-shopping-cart">
								<tr class="table_head">
									<th class="column-1">Product</th>
									<th class="column-2">Store</th>
									<th class="column-3">Name</th>
									<th class="column-4">Price</th>
									<th class="column-4">Quantity</th>
									<th class="column-5">Total</th>
								</tr>

                                @isset($cartData)
                                 @foreach($cartData as $cart)
								<tr class="table_row">
									<td class="column-1">
										<div class="how-itemcart1">
											<img src="{{asset($cart->single_image)}}" alt="IMG">
										</div>
									</td>
									<td class="column-2">{{$cart->store_name}}</td>
									<td class="column-2">{{$cart->name}}</td>
									<td class="column-3">Rs {{$cart->price}}</td>
									<td class="column-4"> qty {{$cart->qty}}</td>
									<td class="column-5">Rs {{ $cart->qty * $cart->price}}</td>
								</tr>

                                     <span style="visibility: hidden">
                                         {{$value += $cart->qty * $cart->price}}
                                     </span>

                                    @endforeach
                                @endisset




							</table>
						</div>


					</div>
				</div>

				<div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
					<div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
						<h4 class="mtext-109 cl2 p-b-30">
							Cart Totals
						</h4>

						<div class="flex-w flex-t bor12 p-b-13">
							<div class="size-208">
								<span class="stext-110 cl2">
									Subtotal:
								</span>
							</div>

							<div class="size-209">
								<span class="mtext-110 cl2">
									Rs {{$value}}
								</span>
							</div>
						</div>

						<div class="flex-w flex-t bor12 p-t-15 p-b-30">
							<div class="size-208 w-full-ssm">
								<span class="stext-110 cl2">
									Shipping:
								</span>
							</div>

							<div class="size-209 p-r-18 p-r-0-sm w-full-ssm">
								<p class="stext-111 cl6 p-t-2">
									Not available yet
								</p>




							</div>
						</div>

                        <div class="flex-w flex-t bor12 p-t-15 p-b-30">
                            <div class="size-208 w-full-ssm">
								<span class="stext-110 cl2">
									Shipping Charges:
								</span>
                            </div>

                            <div class="size-209 p-r-18 p-r-0-sm w-full-ssm">
                                <p class="stext-111 cl6 p-t-2">
                                 ...
                                </p>




                            </div>
                        </div>

						<div class="flex-w flex-t p-t-27 p-b-33">
							<div class="size-208">
								<span class="mtext-101 cl2">
									Total:
								</span>
							</div>

							<div class="size-209 p-t-1">
								<span class="mtext-110 cl2">
									Rs {{$value}}
								</span>
							</div>
						</div>




                        @auth
                            <form action="{{route('orders.store')}}" method="POST" >

                                @csrf
                                <button type="submit" class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 ">
                                    Confirm Order
                                </button>
                            </form>

                        @else

                            <div class="size-209 p-t-1">
								<span class="text-body cl2 text-center">
								   Your are not logged in. Please login to confirm your order
								</span>
                            </div>
                            <br>

                        <a href="{{route('login')}}" style="text-align: center;"  class="flex-c-m stext-101 cl0 size-116 bg1 bor14 hov-btn2 p-lr-15 trans-04 pointer">
                            Login
                        </a>
                            <br>

                        <a href="{{route('register')}}" style="text-align: center;"   class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn2 p-lr-15 trans-04 pointer">
                             Sign up
                        </a>
                        @endauth

					</div>
				</div>


			</div>
		</div>
	</div>



@endsection

	<!-- Footer -->



	<!-- Back to top -->


