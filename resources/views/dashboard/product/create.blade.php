@extends('layouts.app')

@section('content')


    <div class="card">
        <div class="card-header font-24">
            {{isset($product) ? "Edit product" : "Add A New Product"}}
        </div>
        <div class="card-body">

            @include("partials.error")

            <form action="{{isset($product) ? route("products.update",$product->id) :route("products.store")}}" method="POST" enctype="multipart/form-data">
                @if(isset($product))
                    @method("PUT")
                @endif
                @csrf
                <div class="form-group">
                    <label for="">Product Name</label>
                    <input type="text" class="form-control" placeholder="Product Name" name="product_name" value="{{isset($product)? $product->product_name : ""}}">
                </div>


                    <div class="form-group">
                        <label for="">Product Price</label>
                        <input type="text" class="form-control" placeholder="Product Price" name="product_price" value="{{isset($product)? $product->price : ""}}">
                    </div>

                    <div class="form-group">
                        <label for="">Product Size <small>(e.g small,medium,large)</small></label>
                        <input type="text" class="form-control" placeholder="Product size" name="product_size" value="{{isset($product)? $product->product_size : ""}}">
                    </div>

                    <div class="form-group">
                        <label for="">Product Description</label>
                        <textarea  class="form-control" placeholder="Write the complete product description" name="product_description" >{{isset($product)? $product->description : ""}}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="">Product Category</label>
                        <select name="category_name" id="" class="form-control">



                                    <option value="male"
                                    @if(isset($product))
                                        {{$product->category_name === "male" ? 'selected' : ""}}
                                        @endif
                                    >Male</option>




                            <option value="female"
                            @if(isset($product))
                                {{$product->category_name === "female" ? 'selected' : ""}}
                                @endif
                            >Female</option>
                            <option value="both"
                            @if(isset($product))
                                {{$product->category_name === "both" ? 'selected' : ""}}
                                @endif
                            >Male and female</option>

                            <option value="other"
                            @if(isset($product))
                                {{$product->category_name === "both" ? 'selected' : ""}}
                                @endif
                            >Other categories</option>

                        </select>
                    </div>


                    <div class="form-group">
                        <label for="">Stores</label>
                        <select name="store_id" id="" class="form-control">
                            @foreach($stores as $store)
                              <option value="{{$store->id}}"
                              @if(isset($product))
                                  {{$product->store_id === $store->id ? 'selected' : ""}}
                              @endif
                              >{{$store->name}}</option>
                            @endforeach

                        </select>
                    </div>

                    <div class="form-control">
                        <label for="">Products Images</label>

                        <input type="file" accept="image/*" class="form-control" name="product_images[]" multiple>

                    </div>


                <div class="form-group">
                    <button type="submit" class="btn btn-success">{{isset($product) ? "Update Product": "Create a new product"}}</button>
                </div>

                    @isset($product)
               <div class="imagesContainer">

                   @foreach(explode(",",$product->images) as $image)
                     @if($image !== "")
                     <img src="{{asset($image)}}" height="100px" width="100px"/>
                     @endif
                   @endforeach

               </div>
                        @endisset
            </form>
        </div>
    </div>



@endsection
