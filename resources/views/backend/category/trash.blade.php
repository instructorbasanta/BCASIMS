@extends('backend.layouts.master')
@section('title',$panel . ' Trash List ')
@section('main-content')
    <!-- Content Header (Page header) -->
    @include('backend.includes.breadcrumb')
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">{{$panel}} Trash List
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
                @include('backend.includes.flash_message')
                <table class="table table-bordered">
                    <tr>
                        <th>SN</th>
                        <th>Name</th>
                        <th>Rank</th>
                        <th>Status</th>
                        <th>Created At</th>
                        <th>Created By</th>
                        <th>Action</th>
                    </tr>
                    @forelse($data['records'] as $index => $record)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$record->name}}</td>
                        <td>{{$record->rank}}</td>
                        <td>
                            @include('backend.includes.display_status',['status' => $record->status])
                        </td>
                        <td>{{$record->created_at}}</td>
                        <td>{{$record->createdBy->name}}</td>
                        <td>
                            <a href="{{route($base_route . 'restore',$record->id )}}" class="btn btn-warning mt-3">Restore</a>
                            <form action="{{route($base_route . 'permanent_delete',$record->id)}}" class="mt-3" method="post" onsubmit="return confirm('are you sure to delete?')">
                                @csrf
                                <input type="submit" class="btn btn-danger"  value="Remove">
                            </form>
                        </td>
                    </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-danger text-center text-bold">{{$panel}} not found</td>
                        </tr>
                    @endforelse
                </table>
            </div>
        </div>
        <!-- /.card -->
    </section>
    <!-- /.content -->
@endsection
