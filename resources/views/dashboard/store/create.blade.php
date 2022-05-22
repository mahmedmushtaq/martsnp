@extends('layouts.app')

@section('content')


    <div class="card">
        <div class="card-header font-24">
           {{isset($store) ? "Edit store" : "Add A New Store"}}
        </div>
        <div class="card-body">
            @include("partials.error")

            <form action="{{isset($store) ? route("stores.update",$store->id) :route("stores.store")}}" method="POST" enctype="multipart/form-data">
                @if(isset($store))
                    @method("PUT")
                @endif
                @csrf
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Store Name" name="name" value="{{isset($store)? $store->name : ""}}">
                </div>

                    <div class="form-group">
                        <label for="">Store Type <small>(e.g Store for men's or women's clothes,electronics or others)</small></label>
{{--                        <input type="text" class="form-control" placeholder="Store Type" name="store_type" value="{{isset($store)? $store->store_type : ""}}">--}}
                        <select name="store_type" id="" class="form-control">
                          @foreach($store_types as $type)
                    <option value="{{$type->slug}}"@if(isset($store)){{$store->store_type === $type->slug ? 'selected' : ""}}@endif>{{$type->store_type}}</option>

                              @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Store image</label>
                        <input type="file" class="form-control"  name="store_image" >
                    </div>
                    @isset($store)
                        <img src="{{asset($store->store_image)}}" alt="" height="100px" width="100px">
                        <br>    <br>
                    @endisset



                <div class="form-group">
                    <button type="submit" class="btn btn-success">{{isset($store) ? "Update store": "Create a new store"}}</button>
                </div>


            </form>
        </div>
    </div>



@endsection
