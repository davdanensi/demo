@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <span>Categorys</span>
                    <a href="{{ route('create_categorys')}}" class="btn btn-primary" style="float: right;">Create Category</a>
                </div>




                <div class="card-body">
                    <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>Name</td>
          <td colspan = 2>Actions</td>
        </tr>
    </thead>
    <tbody>
        @foreach($categorys['data'] as $category)
        <tr>
            <td>{{$category['id']}}</td>
            <td>{{$category['name']}}</td>
            
            <td>
                <a href="{{ route('categorys_edit',['id' => $category['id']])}}" class="btn btn-primary green_btn">Edit</a>
            </td>
            <td>
                <a href="{{ route('categorys_delete',['id' => $category['id']])}}" class="btn btn-primary red_btn">Delete</a>
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
