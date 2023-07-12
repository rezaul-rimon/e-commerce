
@extends('backend.master')
       
@section('main-content')


    <div class="container-fluid px-4">
        <h1 class="mt-4">Users</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{Route('dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">Users</li>
        </ol>
        
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
               All User
                
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>#User ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>#User ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @php

                         $x = 1;
                         //echo ($users)

                        @endphp


                        @if(count($users)>0)

                        @foreach($users as $userItem)
                        
                        <tr>
                            <td>{{$x++}}</td>
                            <td>{{$userItem->name}}</td>
                            <td>{{$userItem->email}}</td>
                            
                            <td>
                                <a href="{{Route('editUsers',$userItem->id)}}" class="btn btn-primary btn-sm"><i class="fa-solid fa-pen-to-square"></i></a>
                                <a href="{{Route('deleteUsers',$userItem->id)}}" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></a>  
                            </td>
                        </tr>

                        @endforeach

                        @else
                            {{'Product not Available'}}

                        @endif
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    


@endsection
        