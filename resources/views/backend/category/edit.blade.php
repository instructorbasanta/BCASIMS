@extends('backend.layouts.master')
@section('title','Update ' . $panel)
@section('main-content')
    <!-- Content Header (Page header) -->
    @include('backend.includes.breadcrumb')
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Update {{$panel}}
                    <a class="btn btn-info" href="{{route($base_route . 'index')}}">List {{$panel}}</a>
                    <a class="btn btn-primary" href="{{route($base_route . 'create')}}">Create {{$panel}}</a>
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
                {!! Form::model($data['record'], ['route' => [$base_route . 'update',$data['record']->id],'method' =>'PUT']) !!}
                @include($base_view . 'includes.__form')
                <div class="form-group">
                    {!! Form::submit('Update ' . $panel,['class' => 'btn btn-success']); !!}
                </div>
                {!! Form::close() !!}
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </section>
    <!-- /.content -->
@endsection
