@extends("layouts.app")

@section("content")
    <div class="card">
        <div class="card-header font-24 text-danger">
            martSNP
        </div>
        <div class="card-body">




            <div class="d-flex justify-content-around flex-wrap" >


                @if(auth()->user()->account_type === 'seller')

            <a href="{{route("stores.index")}}" class="shadow-sm p-3 m-10 bg-white rounded text-center font-24 " style="cursor:pointer;">
                <div class="icon">
                    <img src="https://img.icons8.com/dusk/128/000000/online-store.png"/>
                </div>
                 <h5 href="{{route("stores.index")}}" class="text-success">My Store</h5>

            </a>


                <a href="{{route("products.index")}}" class="shadow-sm p-3 m-10 bg-white rounded text-center font-24 " style="cursor:pointer;">
                    <div class="icon">
                        <img src="https://img.icons8.com/flat_round/128/000000/add-tag--v1.png"/>
                    </div>
                    <h5   class="text-success">My Products</h5>

                </a>


                <a href="{{route('orders.myorders')}}" class="shadow-sm p-3 m-10 bg-white rounded text-center font-24 " style="cursor:pointer;">
                    <div class="icon">
                        <img src="https://img.icons8.com/nolan/128/order-history.png"/>
                    </div>
                    <h5   class="text-success">New Orders</h5>

                </a>



                @else

                <form action="{{route('seller.store')}}" method="POST">
                   @csrf

                <button type="submit"   class="shadow-sm p-3 m-10 bg-white rounded text-center font-24 " style="cursor:pointer;background:transparent;border: none;">
                        <div class="icon">
                            <img src="https://img.icons8.com/color/128/000000/reseller.png"/>
                        </div>
                    <h5   class="text-success">Become A Seller</h5>

                </button>

                </form>



              @endif

                    <a  href="{{route('orders.index')}}" class="shadow-sm p-3 m-10 bg-white rounded text-center font-24 " style="cursor:pointer;">
                        <div class="icon">
                            <img src="https://img.icons8.com/dusk/128/000000/payment-history.png"/>
                        </div>
                        <h5   class="text-success">Your History</h5>

                    </a>


                    <a  href="{{route("home")}}" class="shadow-sm p-3 m-10 bg-white rounded text-center font-24 " style="cursor:pointer;">
                        <div class="icon">
                            <img   src="https://img.icons8.com/dusk/128/000000/front-sorting.png"/>
                        </div>
                        <h5   class="text-success">Back to front page</h5>

                    </a>




            </div>




        </div>
    </div>

@endsection
