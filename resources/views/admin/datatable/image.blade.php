@if(app()->getLocale() === 'ar')
<img alt="image" style="height: 45px; width: 45px;
 justify-content: center;
display: flex;" src="{{$image ? $image : asset("assets/img/avatar/avatar-3.png")}}" class="rounded-circle" width="35" data-toggle="tooltip"
     title="" data-original-title="Wildan Ahdian"> {{$name ? $name : ""}}
    @else
    <img alt="image" style="height: 45px; width: 45px;" src="{{$image ? $image : asset("assets/img/avatar/avatar-3.png")}}" class="rounded-circle" width="35" data-toggle="tooltip"
        title="" data-original-title="Wildan Ahdian"> {{$name ? $name : ""}}
@endif
