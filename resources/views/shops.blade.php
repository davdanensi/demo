@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <span>Shops</span>
                    <a href="{{ route('create_shops')}}" class="btn btn-primary" style="float: right;">Create Shops</a>
                </div>




                <div class="card-body">
                    <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>Name</td>
          <td>Address</td>
          <td>Products</td>
          
          
          <td colspan = 2>Actions</td>
        </tr>
    </thead>
    <tbody>
        @foreach($shops as $shop)
        <tr>
            <td>{{$shop['id']}}</td>
            <td>{{$shop['name']}}</td>
            <td>{{$shop['address']}}</td>
            <td>
                @foreach($shop['products'] as $k => $s)
                {{$s['name']}}
                @endforeach
            </td>
            
            <td>
                <a href="{{ route('shops_edit',['id' => $shop['id']])}}" class="btn btn-primary green_btn">Edit</a>
            </td>
            <td>
                <a href="{{ route('shops_delete',['id' => $shop['id']])}}" class="btn btn-primary red_btn">Delete</a>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
