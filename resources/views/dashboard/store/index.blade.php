@extends('layouts.app')

@section('content')

    {{-- =================================    home is actually a container of store  ============================        --}}

    <div class="card">
        <div class="card-header font-24">
            Store
        </div>
        <div class="card-body">

            <a href="{{route('stores.create')}}" class="btn btn-success">Create a new store</a>

        </div>
    </div>


    <div class="row">
        <!-- column -->
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <!-- title -->
                    <div class="d-md-flex align-items-center">
                        <div>
                            <h4 class="card-title">All stores list</h4>

                        </div>

                    </div>
                    <!-- title -->

{{--                    =========== end limit ================= --}}


                </div>
                <div class="table-responsive">
                    <table class="table v-middle">
                        <thead>
                        <tr class="bg-light">

                            <th class="border-top-0">Name</th>
                            <th class="border-top-0">Subscription Limit</th>
                            <th class="border-top-0">Remaining Days</th>
                            <th class="border-top-0">image</th>
                            <th class="border-top-0">Store Type</th>
                            <th class="border-top-0">Total_products</th>
                            <th class="border-top-0">Open</th>
                            <th class="border-top-0">Edit</th>
{{--                            <th class="border-top-0">Delete</th>--}}
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($stores as $store)

{{--                            {{$store}}--}}



                            <tr>
                                <td>{{$store->name}}</td>

                                <td>{{$store->seller()->end_limit}} days</td>
{{--                                seller is indirect relation with store, seller is simply a function not a relation--}}


                                <td>{{$store->remainingSubscription()}}</td>

                                <td><img src="{{asset($store->store_image)}}" alt="" height="40px" width="40px"></td>
                                <td>{{str_replace("-"," ",$store->store_type)}}</td>
                                <td>{{$store->products->count()}}</td>
                                <td><a href="{{route('storeProduct',$store->slug)}}" class="btn btn-xs btn-success">Open</a></td>

                                <td><a href="{{route('stores.edit',$store->id)}}" class="btn btn-xs btn-default">Edit</a></td>
{{--                                <td>Not available yet</td>--}}
                            </tr>
                        @endforeach


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
