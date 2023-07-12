
@extends('backend.master')
       
@section('main-content')

<div class="container-fluid px-4">

            <h1 class="mt-4">Manage Product</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="{{Route('dashboard')}}">Dashboard</a></li>
                <li class="breadcrumb-item active">Manage Product</li>
            </ol>
          
            <div class="card mb-4">
                <div class="card-header">
                    <a href="{{Route('product.index')}}" class="btn btn-primary btn-sm">Add Product</a>
                </div>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>#SL</th>
                                <th>Product Name</th>
                                <th>Product Image</th>
                                <th>Current Price</th>
                                <th>Previous Price</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>#SL</th>
                                <th>Product Name</th>
                                <th>Product Image</th>
                                <th>Current Price</th>
                                <th>Previous Price</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @php

                               $index=1;

                            @endphp


                            @if(count($product)>0)

                                @foreach($product as $productItem)

                                <tr>
                                    <td>{{$index++}}</td>
                                    <td>{{$productItem->product_name}}</td>
                                    <td>
                                        <img src="{{asset('uploads/product/'.$productItem->product_image)}}" alt="" height="80px" width="80px">
                                    </td>
                                    <td>{{$productItem->current_price}}</td>
                                    <td>{{$productItem->prev_price}}</td>
                                    <td>
                                        @if($productItem->status==1)
                                            <a href="{{Route('product.atoi',$productItem->id)}}" class="btn btn-success btn-sm">
                                                
                                                <i class="fa-solid fa-user-check"></i>
                                               
                                            </a>

                                        @else 
                                           <a href="{{Route('product.itoa',$productItem->id)}}" class="btn btn-danger btn-sm">

                                            <i class="fa-solid fa-user-xmark"></i>
                                           
                                        </a>

                                        @endif
                                    </td>
                                    <td> 
                                        <a href="{{Route('product.edit',$productItem->id)}}" class="btn btn-warning btn-sm"><i class="fa-solid fa-pen-to-square"></i></a>
                                        <a href="{{Route('product.delete',$productItem->id)}}" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></a>
                                    </td>

                                </tr>

                                @endforeach


                            @endif




                           
                           
                        </tbody>
                    </table>
                </div>
            </div>
      

    
    
</div>

@endsection
        