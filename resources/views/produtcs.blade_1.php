@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <span>Products</span>
                    <a href="{{ route('create_produtcs')}}" class="btn btn-primary" style="float: right;">Create Produtcs</a>
                </div>

                <div class="card-body">
                    <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>Name</td>
          <td>Price</td>
          <td>Shop Name</td>
          <td>Category Name</td>
          <td>Image</td>
          
          <td colspan = 2>Actions</td>
        </tr>
    </thead>
    <tbody>
        @foreach($data['data'] as $contact)
        <tr>
            <td>{{$contact['id']}}</td>
            <td>{{$contact['name']}}</td>
            <td>{{$contact['price']}}</td>
            <td>{{$contact['shop']['name']}}</td>
            <td>{{$contact['category']['name']}}</td>

            <td>
                <img height="100" width="100" src="{{url('images')}}\{{$contact['image']}}" />
            </td>
            <td>
                <a href="{{ route('product_edit',['id' => $contact['id']])}}" class="btn btn-primary">Edit</a>
            </td>
            <td>
                <a href="{{ route('produtcs_delete',['id' => $contact['id']])}}" class="btn btn-primary red_btn">Delete</a>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>

  <a href="{{$data['first_page_url']}}">First Page</a>
  <?php
  for($i = 1; $i <= $data['last_page']; $i++){
    ?>
    <a href="http://localhost/nensi/crud_demo/public/produtcs?page={{$i}}">{{$i}}</a>
    <?php
  }
  ?>
  <a href="{{$data['last_page_url']}}">Last Page</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
