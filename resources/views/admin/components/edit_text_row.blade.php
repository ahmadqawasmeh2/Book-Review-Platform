<div class="form-group row @if(isset($col)) {{$col}} @else @endif">
    <label class="{{isset($classlable) ? $classlable :""}} " >{{isset($title) ? $title : __("global.title")}}</label>
    <input type="{{isset($type) ? $type : "text"}}"  @if(isset($id)) id="{{$id}}" @endif
     class="form-control
     @error($name) is-invalid @enderror" @if(isset($value)) value="{{$value}}"
      @else @endif value="{{old($name)}}" name="{{isset($name) ? $name : "name"}}" required="">
    @error($name)
    <div class="invalid-feedback">
        <strong>{{ $message }}</strong>
    </div>
    @enderror
</div>

