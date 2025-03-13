<style>
.modal-backdrop{
  position: relative !important;
}
.mgs{
  aspect-ratio: 1 / 1 !important;
    object-fit: cover;
}
    </style>

<button type="button"  class="btn btn-primary models{{ $id }}" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $id }}">
  @lang('global.View_the_bill')
   {{-- <img  src="" alt="Snow"  style="width:70%;max-width:100px;display:none"> --}}
 </button>
<div class="modal fade" id="exampleModal{{ $id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <a target="_blank" href="{{$image ? asset($image) : asset("assets/img/avatar/avatar-3.png")}}"> <img  src="{{$image ? asset($image) : asset("assets/img/avatar/avatar-3.png")}}" alt="Snow" id="img_src{{ $id }}" class="mgs"  style="width:100%;min-width:100%"></a>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

      </div>
    </div>
  </div>
</div>
<script>
  $('.models'+{{ $id }}).click(function(){
$('#exampleModal'+{{ $id }}).modal();
  });
  </script>
