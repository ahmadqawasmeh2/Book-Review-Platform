<div class="form-group row @if(isset($col)) {{$col}} @else @endif ">
    <label  class="{{isset($classlable) ? $classlable :""}} " >{{isset($title) ? $title : __("global.title")}}</label>
    <select name="{{ $name }}" class="form-control"   aria-label=".form-select-sm example">
        @foreach ($model as $data )
        <option value={{ $data->id }}>{{ $data->name_ar }}</option>
        @endforeach
    </select>
</div>
