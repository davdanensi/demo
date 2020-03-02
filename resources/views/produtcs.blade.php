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
                    <table class="table table-bordered data-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Shop Name</th>
                                <th>Category Name</th>
                                <th>Image</th>

                                <th colspan = 2>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                           
                        </tbody>
                    </table>

                    
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
  $(function () {
    
    var table = $('.data-table').DataTable({
        processing: true,
        serverSide: false,
//        pageLength: 5,
        ajax: "{{ route('produtcs') }}",
        columns: [
            {data: 'id', name: 'id'},
            {data: 'name', name: 'name'},
            {data: 'price', name: 'price'},
            {data: 'shop', 
                "render": function (data, type, row, meta) {
                   return data.name;
                }
            },
            {data: 'category',
                "render": function (data, type, row, meta) {
                   return data.name;
                }
            },
            {data: 'image',
                "render": function (data, type, row, meta) {
                   return  '<img height="100" width="100" src="{{url('images')}}/'+data+'" />';
                }
            },
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
    
  });
</script>
@endsection
