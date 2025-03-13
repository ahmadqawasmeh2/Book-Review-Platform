<div class="update-avatar-container">
    {{-- <div class="avatar-container">
        <img id="img-avatar" src="{{ isset($avatar) ?$avatar:asset('assets/img/avatar/avatar-3.png')}}">
    </div> --}}

    @if(isset($avatar))
    <div class="avatar-container">
        <img id="img-avatar" src="{{ isset($avatar) ?$avatar:asset('assets/img/avatar/avatar-3.png')}}">
    </div>
    @else
    <div class="avatar-container">
        <img id="img-avatar" src="{{ isset($image) ?$image:asset('assets/img/avatar/avatar-3.png')}}">
    </div>
    @endif
    <button type="button" id="btn-select-avatar" class="btn btn-primary">
        <i class="ft-image"></i>
        @lang('global.select_image')</button>
    <input name="image" type="file" id="file-avatar">
</div>

@push('js')
    <script>
        $("#btn-select-avatar").on("click",function(){
            $("#file-avatar").click();
            $("#file-avatar").change(function(event){
                var fullPath =URL.createObjectURL(event.target.files[0])
                $("#img-avatar").attr("src",fullPath);
            });
        });
    </script>
@endpush
