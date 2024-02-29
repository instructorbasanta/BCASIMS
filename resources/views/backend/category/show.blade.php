@extends('backend.layouts.master')
@section('title','Show ' . $panel)
@section('main-content')
    <!-- Content Header (Page header) -->
    @include('backend.includes.breadcrumb')
    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">List  {{$panel}}
                    <a class="btn btn-primary" href="{{route($base_route . 'create')}}">Create {{$panel}}</a>
                    <a class="btn btn-info" href="{{route($base_route . 'index')}}">List {{$panel}}</a>
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
                <table class="table table-bordered">
                    <tr>
                        <th>ID</th>
                        <td>{{$data['record']->id}}</td>
                    </tr>
                    <tr>
                        <th>Name</th>
                        <td>{{$data['record']->name}}</td>
                    </tr>
                    <tr>
                        <th>Rank</th>
                        <td>{{$data['record']->rank}}</td>
                    </tr>
                    <tr>
                        <th>Slug</th>
                        <td>{{$data['record']->slug}}</td>
                    </tr>
                    <tr>
                        <th>Short Description</th>
                        <td>{{$data['record']->short_description}}</td>
                    </tr>
                    <tr>
                        <th>Description</th>
                        <td>{{$data['record']->description}}</td>
                    </tr>
                    <tr>
                        <th>Meta Title</th>
                        <td>{{$data['record']->meta_title}}</td>
                    </tr>
                    <tr>
                        <th>Meta Description</th>
                        <td>{{$data['record']->meta_description}}</td>
                    </tr>
                    <tr>
                        <th>Meta Keyword</th>
                        <td>{{$data['record']->meta_keyword}}</td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <td>@include('backend.includes.display_status',['status' => $data['record']->status])</td>
                    </tr>
                    <tr>
                        <th>Created By</th>
                        <td>{{$data['record']->createdBy->name}}</td>
                    </tr>
                    @if($data['record']->updated_by != null)
                    <tr>
                        <th>Updated By</th>
                        <td>{{$data['record']->updatedBy->name}}</td>
                    </tr>
                    @endif
                    <tr>
                        <th>Created At</th>
                        <td>{{$data['record']->created_at}}</td>
                    </tr>
                    <tr>
                        <th>Updated At</th>
                        <td>{{$data['record']->updated_at}}</td>
                    </tr>
                    <tr>
                        <td>
                            <form action="{{route($base_route . 'destroy',$data['record']->id)}}" class="mt-3" method="post" onsubmit="return confirm('are you sure to delete?')">
                                @csrf
                                <input type="hidden" name="_method" value="DELETE" >
                                <input type="submit" class="btn btn-danger"  value="Delete">
                            </form>
                        </td>
                        <td>
                            <a href="{{route($base_route . 'edit',$data['record']->id )}}" class="btn btn-warning mt-3">Edit</a>
                        </td>
                    </tr>
                </table>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                Footer
            </div>
            <!-- /.card-footer-->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
@endsection
