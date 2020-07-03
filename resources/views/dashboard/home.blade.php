@extends("layouts.app")

@section("content")
    <div class="card">
        <div class="card-header font-24 text-danger">
            martSNP
        </div>
        <div class="card-body">


{{--            <div class="text-center font-12 text-default">--}}
{{--                <h6>Contact owner for subscription</h6>--}}
{{--                <p>Free Seller Account For 7 Days</p>--}}

{{--                <p><span class="text-danger">Name :</span>--}}
{{--                    <span class="text-success">M Ahmed Mushtaq</span>--}}
{{--                    <span class="text-danger">Contact/whatsapp :</span>--}}
{{--                    <span class="text-success">03316062251</span>--}}
{{--                    <span class="text-danger"> Email:</span>--}}
{{--                    <span class="text-success">ahmedmushtaq296@gmail.com</span>--}}
{{--                    <span class="text-danger">Import message:</span>--}}
{{--                    <span class="text-success"> If notifications are not visible in the inbox then please check your spam</span>--}}
{{--                    <span class="text-danger"> Thanks!</span></p>--}}
{{--            </div>--}}

{{--            <div class="text-center">--}}
{{--                <h6>--}}
{{--                    Remaining Days--}}
{{--                </h6>--}}
{{--                <p>{{auth()->user()->remainingSubscription()}}</p>--}}


{{--            </div>--}}



            <div class="d-flex justify-content-around flex-wrap" >



                @if(auth()->user()->account_type === 'seller')

            <a href="{{route("stores.index")}}" class="shadow-sm p-3 m-10 bg-white rounded text-center font-24 " style="cursor:pointer;">

                 <h5 href="{{route("stores.index")}}" class="text-success">My Store</h5>

            </a>






                <a href="{{route("products.index")}}" class="shadow-sm p-3 m-10 bg-white rounded text-center font-24 " style="cursor:pointer;">

                    <h5   class="text-success">My Products</h5>

                </a>


                <a href="{{route('orders.myorders')}}" class="shadow-sm p-3 m-10 bg-white rounded text-center font-24 " style="cursor:pointer;">

                    <h5   class="text-success">New Orders</h5>

                </a>
                    <a href="{{route('subscription.index')}}"  class="shadow-sm p-3 m-10 bg-white rounded text-center font-24 " style="cursor:pointer;">

                        <h5 href="{{route("stores.index")}}" class="text-success">Subscription</h5>

                    </a>



                @else

                <form action="{{route('seller.store')}}" method="POST">
                   @csrf

                <button type="submit"   class="shadow-sm p-3 m-10 bg-white rounded text-center font-24 " style="cursor:pointer;background:transparent;border: none;">

                    <h5   class="text-success">Become A Seller</h5>

                </button>

                </form>



              @endif

                    <a  href="{{route('orders.index')}}" class="shadow-sm p-3 m-10 bg-white rounded text-center font-24 " style="cursor:pointer;">

                        <h5   class="text-success">Your History</h5>

                    </a>


                    <a  href="{{route("home")}}" class="shadow-sm p-3 m-10 bg-white rounded text-center font-24 " style="cursor:pointer;">

                        <h5   class="text-success">Back to front page</h5>

                    </a>




            </div>




        </div>
    </div>

@endsection
