
@extends('backend.master')
       
@section('main-content')

<div class="container-fluid px-4">

            <h1 class="mt-4">Add Product</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="{{Route('dashboard')}}">Dashboard</a></li>
                <li class="breadcrumb-item active">Add Product</li>
            </ol>
          
            <div class="row">
                <div class="col-lg-6 offset-lg-3">

                    <form action="{{Route('product.add')}}" method="POST" enctype="multipart/form-data" class="shadow p-4">
                        @csrf

                        <div class="form-group mb-3">
                            <label for="p_name">Product Name</label>
                            <input type="text" name="p_name" id="p_name" class="form-control" placeholder="Enter product name">
                        </div>

                        <div class="form-group mb-3">
                            <label for="p_image">Product Image</label>
                            <input type="file" name="p_image" id="p_image" class="form-control" placeholder="Enter product Image">
                        </div>

                        <div class="form-group mb-3">
                            <label for="c_price">Current Price</label>
                            <input type="text" name="c_price" id="c_price" class="form-control" placeholder="Enter product Current Price">
                        </div>

                        <div class="form-group mb-3">
                            <label for="p_price">Previous Price</label>
                            <input type="text" name="p_price" id="p_price" class="form-control" placeholder="Enter product Previous Price">
                        </div>

                        <div class="form-group mb-3">
                            <label for="p_description">product Description</label><br>
                            <textarea wrap="hard" id="p_description" rows="4" cols="50" name="p_description" class="form-control">Write here Product Details</textarea>
                        </div>

                        <div class="form-group mb-3">
                            <input type="submit" class="btn btn-primary w-100" value="Add Product">
                        </div>

                    </form>

                </div>
            </div>
      

    
    
</div>

@endsection
        