@extends('backend.layouts.master')
@section('title','Create ' . $panel)
@section('main-content')
@include('backend.includes.breadcrumb')
<section class="content">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Create {{$panel}}</h3>
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
        <form action="{{route($base_route . 'store')}}" method="POST" enctype="multipart/form-data" novalidate>
            @csrf
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" class="form-control" name="name" id="" aria-describedby="helpId" placeholder="enter title" value="{{old('name')}}">
                @include('backend.includes.filed_validation',['input' => 'name'])
            </div>
            <div class="form-group">
                <label for="">Slogan</label>
                <input type="text" class="form-control" name="slogan" id="" aria-describedby="helpId" placeholder="enter slogan" value="{{old('slogan')}}">
                @include('backend.includes.filed_validation',['input' => 'slogan'])
            </div>
            <div class="form-group">
                <label for="">Facebook URL</label>
                <input type="text" class="form-control" name="facebook_url" id="" aria-describedby="helpId" placeholder="enter slogan" value="{{old('slogan')}}">
                @include('backend.includes.filed_validation',['input' => 'facebook_url'])
            </div>
            <div class="form-group">
                <label for="">Youtube URL</label>
                <input type="text" class="form-control" name="youtube_url" id="" aria-describedby="helpId" placeholder="enter slogan" value="{{old('slogan')}}">
                @include('backend.includes.filed_validation',['input' => 'youtube_url'])
            </div>
            <div class="form-group">
                <label for="">Instagram URL</label>
                <input type="text" class="form-control" name="instagram_url" id="" aria-describedby="helpId" placeholder="enter slogan" value="{{old('slogan')}}">
                @include('backend.includes.filed_validation',['input' => 'instagram_url'])
            </div>
            <div class="form-group">
                <label for="">Twitter URL</label>
                <input type="text" class="form-control" name="twitter_url" id="" aria-describedby="helpId" placeholder="enter slogan" value="{{old('slogan')}}">
                @include('backend.includes.filed_validation',['input' => 'twitter_url'])
            </div>
            <div class="form-group">
                <label for="">Logo Header</label>
                <input type="file" class="form-control" name="logo_header_image" id="" aria-describedby="helpId" placeholder="enter logo_header">
                @include('backend.includes.filed_validation',['input' => 'logo_header_image'])
            </div>
            <div class="form-group">
                <label for="">Logo Footer</label>
                <input type="file" class="form-control" name="logo_footer_image" id="" aria-describedby="helpId" placeholder="enter logo_footer">
                @include('backend.includes.filed_validation',['input' => 'logo_footer_image'])
            </div>
            <div class="form-group">
                <label for="">Favicon</label>
                <input type="file" class="form-control" name="favicon_image_file" id="" aria-describedby="helpId" placeholder="enter favicon">
                @include('backend.includes.filed_validation',['input' => 'favicon_image_file'])
            </div>
            <div class="form-group">
                <label for="">Email</label>
                <input type="email" class="form-control" name="email" id="" aria-describedby="helpId" placeholder="enter email" value="{{old('email')}}">
                @include('backend.includes.filed_validation',['input' => 'email'])
            </div>
            <div class="form-group">
                <label for="">Phone</label>
                <input type="number" class="form-control" name="phone" id="" aria-describedby="helpId" placeholder="enter phone" value="{{old('phone')}}">
                @include('backend.includes.filed_validation',['input' => 'phone'])
            </div>
            <div class="form-group">
                <label for="">Mobile</label>
                <input type="number" class="form-control" name="mobile" id="" aria-describedby="helpId" placeholder="enter mobile" value="{{old('mobile')}}">
                @include('backend.includes.filed_validation',['input' => 'mobile'])
            </div>
            <div class="form-group">
                <label for="">Address</label>
                <input type="text" class="form-control" name="address" id="" aria-describedby="helpId" placeholder="Enter address" value="{{old('address')}}">
                @include('backend.includes.filed_validation',['input' => 'address'])
            </div>
            <div class="form-check">
                <label for="" class="pr-4">Status</label>
                <label class="form-check-label pr-4">
                    <input type="radio" class="form-check-input" name="status" id="" value="1" {{old('status') == "1"?'checked':''}}>
                    active
                </label>
                <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="status" id="" value="0" {{old('status') == "0"?'checked':''}}>
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
