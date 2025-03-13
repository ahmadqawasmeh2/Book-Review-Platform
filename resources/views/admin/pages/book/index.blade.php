@extends('admin.layouts.index')
@section('page_title')
Book Review
@stop
@section('breadcrumb')
<div class="breadcrumb-item">
    Book Review
</div>
@stop
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4></h4>
                <div class="card-header-action">
                    {{-- <a href="{{route('admin.book.create')}}" id="btn-create" class="btn btn-primary">
                        <i class="fa fa-plus"></i>
                        Create
                    </a> --}}
                </div>
            </div>
            <div class="card-body p-4">
                <div class="table-responsive">
                    <table class="table table-striped" id="table-products">
                        <thead>
                            <tr>
                                <th class="text-center">
                                    <i class="fas fa-th"></i>
                                </th>
                                <th>Title</th>
                                <th>Author</th>
                                <th>Isbn</th>
                                <th>CoverImage</th>
                                <th>Description</th>
                                <th>CreatedAt</th>
                                <th>Actions</th>

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
@stop
@push('js')

<script>
    $(document).ready(function () {
        var table = $("#table-products").DataTable({
            columnDefs: [
        { 
            targets: 4, 
            className: "text-wrap", 
        }
    ],
            language: {
                search: "search",
                lengthMenu: "show_MENU_ record",
                zeroRecords: "zero_records",
                info: "showing _START_ to _END_ of _TOTAL_ entries",
                infoEmpty: "zero_pages",
                processing: "processing",
                paginate: {
                    first: "first",
                    last: "last",
                    next: "next",
                    previous: "previous"
                },
            },
            dom: 'Bfrtip',
            buttons: ['copy','print'],
            processing: true,
            serverSide: true,
            ajax: '{{ route("admin.book.dataTable") }}',
            columns: [
                {data: 'id', name: 'id'},
                {data: 'title', name: 'title'},
                {data: 'author', name: 'author'},
                {data: 'isbn', name: 'isbn'},
                {data: 'cover_image', name: 'cover_image'},
                {data: 'description', name: 'description'},
                {data: 'created_at', name: 'created_at'},
                {data: 'actions', name: 'actions'},
            ]
        });

        // Reload function
        App.reloadTable = function () {
            table.ajax.reload();
        }
    });
</script>

@endpush