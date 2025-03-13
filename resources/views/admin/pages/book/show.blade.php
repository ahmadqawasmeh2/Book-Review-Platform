@extends('admin.layouts.index')
@section('page_title')
   Show Book
@stop
@section('breadcrumb')
    <div class="breadcrumb-item">
        <a href="{{route("admin.book.index")}}"> Book</a>
    </div>
    <div class="breadcrumb-item">
        Show Book
    </div>
@stop
@section('content')
<div class="row">
    <div class="col-12 col-md-12 col-lg-12">
        <div class="card profile-widget">
            <div class="profile-widget-header">
                <img alt="image"
                     src="{{ is_null($model->cover_image) ? asset('assets/img/avatar/avatar-5.png') : asset($model->cover_image) }}"
                     class="rounded-circle profile-widget-picture">
                <div class="profile-widget-items">
                    <div class="profile-widget-item">
                        <div class="profile-widget-item-label">Avg Rating</div>
                        <div class="profile-widget-item-value">{{ $avg }}</div>
                    </div>
                    <div class="profile-widget-item">
                        <div class="profile-widget-item-label">Review Count</div>
                        <div class="profile-widget-item-value">{{ $count }}</div>
                    </div>
                </div>
            </div>
            <div class="profile-widget-description">
                <div class="profile-widget-name">{{ $model->title }}
                    <div class="text-muted d-inline font-weight-normal">
                        <div class="slash"></div>
                        {{ $model->author }}
                    </div>
                </div>
                <address>
                    Isbn : {{ $model->isbn }}<br>
                </address>

                <address>
                    Description : {{ $model->description }}<br>
                </address>
            </div>
            <div class="card-footer text-center">
                <div class="font-weight-bold mb-2"></div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-7">
        <div class="card">
            <div class="card-header">
                <h4>Review Book</h4>
            </div>
            <div class="card-body p-4">
                <div class="table-responsive">
                    <table class="table table-striped" id="table-orders">
                        <thead>
                        <tr>
                            <th class="text-center"><i class="fas fa-th"></i></th>
                            <th>User</th>
                            <th>Review</th>
                            <th>Rate</th>
                            <th>Created At</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($getAll as $ga )

                                <td>{{ $ga->id }}</td>
                                <td>{{ $ga->user->name }}</td>
                                <td>{{ $ga->review }}</td>
                                <td>{{ $ga->rating }}</td>
                                <td>{{ $ga->created_at->format('Y-m-d') }}</td>
                            @endforeach
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
        $(function () {
            var table = $("#table-orders").DataTable({
                oLanguage: {
                    "sSearch": "search",
                    "sLengthMenu": "show _MENU_ record",
                    "sZeroRecords": "zero_records",
                    "sInfo": "showing  _START_ to _END_ of _TOTAL_ entries",
                    'sInfoEmpty': "zero_pages",
                    "sProcessing": "processing",
                    oPaginate: {
                        "sFirst": "first",
                        "sLast": "last",
                        "sNext": "next",
                        "sPrevious": "previous"
                    },
                },
            });
        });
    </script>
@endpush