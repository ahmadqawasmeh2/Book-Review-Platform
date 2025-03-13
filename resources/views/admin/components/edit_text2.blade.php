<div class="form-group row mb-4">
    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">{{isset($title) ? $title : __("global.title")}}</label>
    <div class="col-sm-12 col-md-7">
        <input type="{{isset($type) ? $type : "text"}}" class="form-control  @error($name) is-invalid @enderror"
               @if(isset($value)) value="{{$value}}" @else @endif value="{{old($name)}}"
               name="{{isset($name) ? $name : "name"}}" required="">
        @error($name)
        <div class="invalid-feedback">
            <strong>{{ $message }}</strong>
        </div>
        @enderror
    </div>
</div>
