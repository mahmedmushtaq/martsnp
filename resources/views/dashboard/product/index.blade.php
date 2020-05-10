@extends('layouts.app')

@section('content')

    {{-- =================================    home is actually a container of store  ============================        --}}

    <div class="card">
        <div class="card-header font-24">
            Products
        </div>
        <div class="card-body">

            <a href="{{route('products.create')}}" class="btn btn-success">Create a new product</a>

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
                            <h4 class="card-title">All Posts list</h4>

                        </div>

                    </div>
                    <!-- title -->
                </div>
                <div class="table-responsive">
                    <table class="table v-middle">
                        <thead>
                        <tr class="bg-light">
                            <th class="border-top-0">Name</th>
                            <th class="border-top-0">Store Name</th>
                            <th class="border-top-0">Category</th>
                            <th class="border-top-0">Open</th>
                            <th class="border-top-0">Edit</th>
                            <th class="border-top-0">Delete</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $product)
                            <tr>
                                <td>{{$product->product_name}}</td>
                                <td>{{$product->store->name}}</td>
                                <td>{{$product->category_name === 'both' ? "Both male and female" : $product->category_name }}</td>
                                <td><a href="{{route('productdetails',$product->slug)}}" class="btn xs btn-success">Open</a></td>
                                <td><a href="{{route('products.edit',$product->id)}}" class="btn btn-small btn-default">Edit</a></td>
                                <td><form action="{{route('products.destroy',$product->id)}}" method="POST" >
                                        @method("DELETE")
                                        @csrf
                                        <button class="btn btn-small btn-danger">Delete</button>

                                    </form></td>
                            </tr>
                        @endforeach


                        </tbody>
                    </table>

                    {{$products->links()}}
                </div>
            </div>
        </div>
    </div>
@endsection
