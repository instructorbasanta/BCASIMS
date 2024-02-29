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
                    <a class="btn btn-primary" href="{{route($base_route . 'create')}}" title="Create {{$panel}}" title=" Create {{$panel}}"> <i class="fas fa-plus"></i></a>
                    <a class="btn btn-info" href="{{route($base_route . 'index')}}" title="List {{$panel}}"> <i class="fas fa-list"></i></a>
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
                    @if($data['record']->device_type_id != null)
                    <tr>
                        <th>Device Type</th>
                        <td>{{$data['record']->deviceType->title}}</td>
                    </tr>
                    @endif
                    <tr>
                        <th>Title</th>
                        <td>{{$data['record']->title}}</td>
                    </tr>
                    <tr>
                        <th>Display Rank</th>
                        <td>{{$data['record']->display_rank}}</td>
                    </tr>
                    <tr>
                        <th>Slug</th>
                        <td>{{$data['record']->slug}}</td>
                    </tr>
                    <tr>
                        <th>Image</th>
                        <td>
                            @if(!empty($data['record']->image))
                            <a href="{{asset('images/' . $folder . '/' . $data['record']->image)}}" target="_blank">
                                <img src="{{asset('images/' . $folder . '/' . $data['record']->image)}}" alt="{{$data['record']->title}}" width="200px" />
                            </a>
                            @else
                                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/65/No-Image-Placeholder.svg/330px-No-Image-Placeholder.svg.png" alt="{{$data['record']->title}}" width="200px" />
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>Short Description</th>
                        <td>{{$data['record']->short_description}}</td>
                    </tr>
                    <tr>
                        <th>Description</th>
                        <td>{!! $data['record']->description!!}</td>
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
                            <form action="{{route($base_route . 'destroy',$data['record']->id)}}" method="post" onsubmit="return confirm('are you sure to delete?')">
                                @csrf
                                <input type="hidden" name="_method" value="DELETE" >
                                <button type="submit" class="btn btn-danger"  title="Delete"><i class="fas fa-trash"></i></button>
                            </form>
                        </td>
                        <td>
                            <a href="{{route($base_route . 'edit',$data['record']->id )}}" class="btn btn-warning"  title="Edit"><i class="fas fa-edit"></i></a>
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
