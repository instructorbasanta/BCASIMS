@extends('backend.layouts.master')
@section('title','Edit ' . $panel)
@section('main-content')
@include('backend.includes.breadcrumb')
<section class="content">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Manage {{$panel}}
            </h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
        <div class="card-body">
    <form action="{{route($base_route . 'update',$data['record']->id)}}" method="POST" enctype="multipart/form-data" novalidate>
        <input type="hidden" name="_method" value="PUT">
        @csrf
        <div class="form-group">
            <label for="">Name</label>
            <input type="text" class="form-control" name="name" id="" aria-describedby="helpId" placeholder="enter title" value="{{$data['record']->name}}">
            @include('backend.includes.filed_validation',['input' => 'name'])
        </div>
        <div class="form-group">
            <label for="">Slogan</label>
            <input type="text" class="form-control" name="slogan" id="" aria-describedby="helpId" placeholder="enter slogan" value="{{$data['record']->slogan}}">
            @include('backend.includes.filed_validation',['input' => 'slogan'])
        </div>
        <div class="form-group">
            <label for="">Logo Header</label>
            <input type="file" class="form-control" name="logo_header_image" id="" aria-describedby="helpId" placeholder="enter logo_header" value="{{$data['record']->logo_header}}">
            <img src="{{ asset('/setting/images/'.$data['record']->logo_header) }}" alt="no image" width="100px"><p>{{$data['record']->logo_header}}</p>
            @include('backend.includes.filed_validation',['input' => 'logo_header_image'])
        </div>
        <div class="form-group">
            <label for="">Logo Footer</label>
            <input type="file" class="form-control" name="logo_footer_image" id="" aria-describedby="helpId" placeholder="enter logo_footer" value="{{$data['record']->logo_footer}}">
            <img src="{{ asset('/setting/images/'.$data['record']->logo_footer) }}" alt="no image" width="100px"><p>{{$data['record']->logo_footer}}</p>
            @include('backend.includes.filed_validation',['input' => 'logo_footer_image'])
        </div>
        <div class="form-group">
            <label for="">Favicon</label>
            <input type="file" class="form-control" name="favicon_image_file" id="" aria-describedby="helpId" placeholder="enter favicon" value="{{$data['record']->favicon_image}}">
            <img src="{{ asset('/setting/images/'.$data['record']->favicon_image) }}" alt="no image" width="100px"><p>{{$data['record']->favicon_image}}</p>
            @include('backend.includes.filed_validation',['input' => 'favicon_image_file'])
        </div>
        <div class="form-group">
            <label for="">Email</label>
            <input type="email" class="form-control" name="email" id="" aria-describedby="helpId" placeholder="enter email" value="{{$data['record']->email}}">
            @include('backend.includes.filed_validation',['input' => 'email'])
        </div>
        <div class="form-group">
            <label for="">Phone</label>
            <input type="number" class="form-control" name="phone" id="" aria-describedby="helpId" placeholder="enter phone" value="{{$data['record']->phone}}">
            @include('backend.includes.filed_validation',['input' => 'phone'])
        </div>
        <div class="form-group">
            <label for="">Mobile</label>
            <input type="number" class="form-control" name="mobile" id="" aria-describedby="helpId" placeholder="Enter mobile" value="{{$data['record']->mobile}}">
            @include('backend.includes.filed_validation',['input' => 'mobile'])
        </div>
        <div class="form-group">
            <label for="">Address</label>
            <input type="text" class="form-control" name="address" id="" aria-describedby="helpId" placeholder="Enter address" value="{{$data['record']->address}}">
            @include('backend.includes.filed_validation',['input' => 'address'])
        </div>
        <div class="form-check">
            <label for="" class="pr-4">Status</label>
            <label class="form-check-label pr-4">
                <input type="radio" class="form-check-input" name="status" id="" value="1" {{$data['record']->status == "1"?'checked':''}}>
                active
            </label>
            <label class="form-check-label">
                <input type="radio" class="form-check-input" name="status" id="" value="0" {{$data['record']->status == "0"?'checked':''}}>
                inactive
            </label><br>
            @include('backend.includes.filed_validation',['input' => 'status'])
        </div>
        <button class="btn btn-primary">Submit</button>
</form>
    </div>
</div>
</section>
@endsection
@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.4/js/lightbox.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/38.0.1/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create( document.querySelector( '#about_website' ) )
            .catch( err => {
                console.error( err.stack );
            } );
        ClassicEditor
            .create( document.querySelector( '#meta_keyword' ) )
            .catch( err => {
                console.error( err.stack );
            } );
        ClassicEditor
            .create( document.querySelector( '#meta_title' ) )
            .catch( err => {
                console.error( err.stack );
            } );
        ClassicEditor
            .create( document.querySelector( '#meta_description' ) )
            .catch( err => {
                console.error( err.stack );
            } );
    </script>
@endsection
