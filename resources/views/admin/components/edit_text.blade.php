<div class="form-group  @if(isset($col)) {{$col}} @else @endif ">
    <label>{{isset($title) ? $title : __("global.title")}}</label>
    <input type="{{isset($type) ? $type : "text"}}"  class="form-control
     @error($name) is-invalid @enderror" @if(isset($value)) value="{{$value}}"
      @else @endif value="{{old($name)}}" name="{{isset($name) ? $name : "name"}}" required="">
    @error($name)
    <div class="invalid-feedback">
        <strong>{{ $message }}</strong>
    </div>
    @enderror
</div>
