@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create Product</div>

                <div class="card-body">
                    <form enctype='multipart/form-data' method="POST" action="{{ route('update_produtcs') }}" aria-label="{{ __('Register') }}">
                        @csrf

                        <input id="id" type="hidden" name="id" value="{{ $data['id'] }}">

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $data['name'] }}" autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="price" class="col-md-4 col-form-label text-md-right">{{ __('Price') }}</label>

                            <div class="col-md-6">
                                <input id="price" type="text" class="form-control{{ $errors->has('price') ? ' is-invalid' : '' }}" name="price" value="{{ $data['price'] }}">

                                @if ($errors->has('price'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('price') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                         <div class="form-group row">
                            <label for="price" class="col-md-4 col-form-label text-md-right">{{ __('Shop Name') }}</label>

                            <div class="col-md-6">
                                <select name="shop_id" >
                                    @foreach($shopdata as $shopdata)
                                        <option value="{{$shopdata['id']}}" {{$data['shop_id'] == $shopdata['id'] ? 'selected' : ''}}>{{$shopdata['name']}}</option>
                                     @endforeach
                                </select>

                               
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="price" class="col-md-4 col-form-label text-md-right">{{ __('Category Name') }}</label>

                            <div class="col-md-6">
                                <select name="category_id" >
                                    @foreach($categorydata as $categorydata)
                                        <option value="{{$categorydata['id']}}" {{$data['category_id'] == $categorydata['id'] ? 'selected' : ''}}>{{$categorydata['name']}}</option>
                                     @endforeach
                                </select>

                               
                            </div>
                        </div>


                        <input id="image" type="file" class="form-control" name="image">


                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('update') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
