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
                </div>
                <div class="table-responsive">
                    <table class="table v-middle">
                        <thead>
                        <tr class="bg-light">

                            <th class="border-top-0">Name</th>
                            <th class="border-top-0">image</th>
                            <th class="border-top-0">Store Type</th>
                            <th class="border-top-0">Total_products</th>
                            <th class="border-top-0">Edit</th>
                            <th class="border-top-0">Delete</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($stores as $store)
                            <tr>
                                <td>{{$store->name}}</td>
                                <td><img src="{{asset($store->store_image)}}" alt="" height="40px" width="40px"></td>
                                <td>{{$store->store_type}}</td>
                                <td>{{$store->products->count()}}</td>

                                <td><a href="{{route('stores.edit',$store->id)}}" class="btn btn-small btn-default">Edit</a></td>
                                <td><form action="{{route('stores.destroy',$store->id)}}" method="POST" >
                                        @method("DELETE")
                                        @csrf
                                        <button class="btn btn-small btn-danger">Delete</button>

                                    </form></td>
                            </tr>
                        @endforeach


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
