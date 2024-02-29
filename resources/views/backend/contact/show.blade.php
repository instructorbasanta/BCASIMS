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
                    <tr>
                        <th>Name</th>
                        <td>{{$data['record']->name}}</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>{{$data['record']->email}}</td>
                    </tr>
                    <tr>
                        <th>Phone</th>
                        <td>{{$data['record']->phone}}</td>
                    </tr>
                    <tr>
                        <th>Address</th>
                        <td>{{$data['record']->address}}</td>
                    </tr>
                    <tr>
                        <th>Message</th>
                        <td>{!! $data['record']->message!!}</td>
                    </tr>
                    <tr>
                        <th>Response</th>
                        <td>{{$data['record']->response}}</td>
                    </tr>
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
