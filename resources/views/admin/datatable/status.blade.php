@if($status == 1)
    <div class="badge badge-success"> {{$message}}</div>
@else
    <div class="badge badge-danger"> {{$message}}</div>
@endif