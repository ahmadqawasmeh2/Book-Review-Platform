<div class="form-group @if(isset($col)) {{$col}} @else @endif ">
    <label  class="{{isset($classlable) ? $classlable :""}} " >{{isset($title) ? $title : __("global.title")}}</label>
    <select name="{{ $name }}" class="form-control"  aria-label=".form-select-sm example">
        <option value={{ $values }}>{{ $values }}</option>
        @foreach ($model as $data )
        <option value={{ $data->name }}>{{ $data->name }}</option>
        @endforeach
    </select>
</div>
