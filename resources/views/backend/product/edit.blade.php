
@extends('backend.master')
       
@section('main-content')

<div class="container-fluid px-4">

            <h1 class="mt-4">Update Product</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="{{Route('dashboard')}}">Dashboard</a></li>
                <li class="breadcrumb-item active">Update Product</li>
            </ol>
          
            <div class="row">
                <div class="col-lg-6 offset-lg-3">

                    <form action="{{Route('product.update',$product->id)}}" method="POST" enctype="multipart/form-data" class="shadow p-4">
                        @csrf

                        <div class="form-group mb-3">
                            <label for="p_name">Product Name</label>

                            {{-- @php
                                dd($product)
                            @endphp --}}


                            <input type="text" name="p_name" id="p_name" class="form-control" placeholder="Enter product name" value="{{$product->product_name}}">
                        </div>

                        <div class="form-group mb-3">
                            <label for="p_image">Insert New Image</label>
                            <input type="file" name="p_image" id="p_image" class="form-control" placeholder="Enter product Image">
                            <label for="o_image" class="mt-3">Old Image</label><br>
                            <img src="{{asset('uploads/product/'.$product->product_image)}}" alt="" id="o_image" height="50px" width="50px">
                        </div>

                        <div class="form-group mb-3">
                            <label for="c_price">Current Price</label>
                            <input type="text" name="c_price" id="c_price" class="form-control" placeholder="Enter product Current Price" value="{{$product->current_price}}">
                        </div>

                        <div class="form-group mb-3">
                            <label for="p_price">Previous Price</label>
                            <input type="text" name="p_price" id="p_price" class="form-control" placeholder="Enter product Previous Price" value="{{$product->prev_price}}">
                        </div>

                        <div class="form-group mb-3">
                            <label for="p_description">product Datails</label><br>
                            <textarea wrap="hard" id="p_description" rows="4" cols="50" name="p_description" class="form-control">{{$product->product_description}}</textarea>
                        </div>

                        <div class="form-group mb-3">
                            <input type="submit" class="btn btn-primary w-100" value="Update Product">
                        </div>

                    </form>

                </div>
            </div>
      

    
    
</div>

@endsection
        