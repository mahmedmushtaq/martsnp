@extends("layouts.app")

@section("content")

    <div class="card ">
        <div class="card-header">
            <span class="font-20 text-success">
              Your Booked Item History
            </span>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table v-middle">
                    <thead>
                    <tr class="bg-light">
                        <th class="border-top-0">Name</th>
                        <th class="border-top-0">Image</th>
                        <th class="border-top-0">price</th>
                        <th class="border-top-0">Store</th>
                        <th class="border-top-0">Confirmed</th>
                        <th class="border-top-0">Date</th>
                    </tr>
                    </thead>
                    <tbody>
               @foreach($histories as $history)
                <tr>
                    <td>{{$history->product->product_name}}</td>
                    <td><img width="40px" height="40px" src="{{asset($history->product->single_image)}}" alt=""></td>
                    <td>Rs {{$history->price}}</td>
                    <td>{{$history->store->name}}</td>
                    <td>{{$history->confirmed}}</td>
                    <td>{{$history->created_at->diffForHumans()}}</td>
                </tr>
               @endforeach
                    </tbody>
            </table>

             @isset($histories)
            {{$histories->links()}}
             @endisset

        </div>

    </div>

@endsection
