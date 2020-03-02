@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">View Product</div>

                id:<input id="nid" type="text" name="id" value="{{ $data['id'] }}">
                name:<input id="name" type="text" name="name" value="">
            </div>
        </div>
    </div>
</div>

<script>
    $.ajaxSetup({
        headers: {"X-CSRF-TOKEN": jQuery(`meta[name="csrf-token"]`).attr("content")}
    });
    $.ajax({
        url: "{{ url('/product_get_data') }}",
        method: 'post',
        data: {
//            id: '{{$data["id"]}}',
            id: $('#nid').val(),
        },
        success: function (data) {
            //called when successful
            console.log('success');
            console.log(data);
            $('#name').val(data.name);
        },
        error: function (e) {
            //called when there is an error
            console.log('error');
            console.log(e.message);
        }
    });
</script>

@endsection
