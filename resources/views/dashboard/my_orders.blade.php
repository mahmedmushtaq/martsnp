@extends("layouts.app")

@section("content")

    <div class="card ">
        <div class="card-header">
            <span class="font-20 text-success">
             Pending Orders
            </span>
            <span class="text-body">
                <span class="text-danger">Precaution</span><br>
                First Call customers and then confirm their orders
            </span>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table v-middle">
                    <thead>
                    <tr class="bg-light">
                        <th class="border-top-0">Product Details</th>
                        <th class="border-top-0">Ordered By</th>
                        <th class="border-top-0">Email</th>
                        <th class="border-top-0">Phone</th>
                        <th class="border-top-0">Product Name</th>
                        <th class="border-top-0">Image</th>
                        <th class="border-top-0">Total price</th>
                        <th class="border-top-0">Quantity</th>
                        <th class="border-top-0">Store</th>
                        <th class="border-top-0">Confirmed</th>
                        <th class="border-top-0">Date</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($orders as $order)
                        <tr>
                            <td><a href="{{route("productdetails",$order->product->slug)}}" class="btn btn-xs btn-success">Check</a></td>
                            <td>{{$order->user->name}}</td>
                            <td>{{$order->user->email}}</td>
                            <td>{{$order->user->phone}}</td>
                            <td>{{$order->product->product_name}}</td>
                            <td><img width="40px" height="40px" src="{{asset($order->product->single_image)}}" alt=""></td>
                            <td>Rs {{$order->price * $order->quantity}}</td>
                            <td>{{$order->quantity}}</td>
                            <td>{{$order->store->name}}</td>
                            <td>
                                @if($order->confirmed === 'yes')
                                    {{$order->confirmed}}
                                @else
                                    <form action="{{route('orders.confirmed',$order->id)}}" method="POST">
                                        @csrf
                                        @method("PUT")

                                        <button type="submit" class="btn btn-xs btn-success">Confirm</button>
                                    </form>
                                @endif

                            </td>
                            <td>{{$order->created_at->diffForHumans()}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                @isset($orders)
                {{$orders->links()}}
                @endisset

            </div>

        </div>
    </div>

@endsection
