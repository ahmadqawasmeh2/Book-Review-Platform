@extends('admin.layouts.index')
@section('page_title')
Create Book
@stop


@section('breadcrumb')
<div class="breadcrumb-item">
    <a href="{{route("admin.book.index")}}"> Book</a>
</div>
<div class="breadcrumb-item">
    Create Book
</div>
@stop

@section('content')
<form class="form" id="form" enctype="multipart/form-data" action="{{route("admin.book.store")}}" novalidate
    method="POST">
    @csrf
    <div class="row">

        <div class="col-sm-12 col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Create Book</h4>
                </div>
                <div class="card-body">
                    @component('admin.components.edit_text2' , [
                    "name" => "title",
                    "type" => "text",
                    "title" => 'Title',
                    ])
                    @endcomponent

                    @component('admin.components.edit_text2' , [
                    "name" => "author",
                    "type" => "text",
                    "title" => 'Author',
                    ])
                    @endcomponent

                    @component('admin.components.edit_text2' , [
                    "name" => "isbn",
                    "type" => "text",
                    "title" => 'Isbn',
                    ])
                    @endcomponent


                    @component('admin.components.edit_text2' , [
                    "name" => "cover_image",
                    "type" => "file",
                    "title" => 'CoverImage',
                    ])
                    @endcomponent



                    @component('admin.components.edit_text_large' , [
                    "name" => "description",
                    "type" => "text",
                    "title" => 'Description',
                    ])
                    @endcomponent

                </div>

                <div class="card-footer text-right">
                    <button class="btn btn-primary">Save</button>
                </div>

            </div>
        </div>
    </div>
</form>
@stop