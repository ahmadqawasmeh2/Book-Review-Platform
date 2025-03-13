@if(count($actions)> 0)
    <div class="dropdown">
        <button class="btn btn-info dropdown-toggle btn-sm" type="button" id="dt-dropdownMenu-actions" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
            <i class="icon-settings mr-1"></i>@lang('global.actions')
        </button>
        <div class="dropdown-menu" aria-labelledby="dt-dropdownMenu-actions">
            @foreach ($actions as $action)
                <a class="dropdown-item " href="{{$action['route'] }}"><i class="{{$action['icon']}}"></i> {{$action['name']}}</a>
            @endforeach

        </div>
    </div>
@endif
