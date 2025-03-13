<style>
    .disable-links {
     pointer-events: none;
 }
 </style>


@if(count($actions)> 0)

    @foreach ($actions as $action)

        @if(isset($action["flag"]))

            @if($action["flag"] == "delete")
                <a id="actionDelete" class="{{$action['class']}}" href="#" data-url="{{$action['route']}}"
                   id="form.{{$action['route']}}" data-toggle="tooltip" title="{{$action['name']}}"
                   data-original-title="{{$action['name']}}">
                    <i class="{{$action['icon']}}"></i>
                </a>
            @elseif($action["flag"] == "model")
                <a class="{{$action['class']}}" href="#!"
                   onclick="forModal('{{$action['route'] }}' , '{{__("global.model")}}')"
                   data-toggle="tooltip" title="{{$action['name']}}"
                   data-original-title="{{$action['name']}}"><i
                        class="{{$action['icon']}}"></i></a>
            @endif
        @else
            <a class="{{$action['class']}}" href="{{$action['route'] }}" data-toggle="tooltip" title="{{$action['name']}}"
               data-original-title="{{$action['name']}}">
                <i class="{{$action['icon']}}"></i>
            </a>
        @endif

    @endforeach


@endif
