@extends('backend.layouts.master')
@section('title','List ' . $panel)
@section('main-content')
    <!-- Content Header (Page header) -->
    @include('backend.includes.breadcrumb')
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">List  {{$panel}}
                    <a class="btn btn-primary" href="{{route($base_route . 'create')}}" title="Create {{$panel}}"> <i class="fas fa-plus"></i></a>
                    <a class="btn btn-danger" href="{{route($base_route . 'trash')}}" title="Trash {{$panel}}"> <i class="fas fa-list"></i> </a>
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
                <table class="table table-bordered" id="list_data">
                   <thead>
                       <tr>
                           <th>SN</th>
                           <th>Title</th>
                           <th>Status</th>
                           <th>Created At</th>
                           <th>Created By</th>
                           <th>Action</th>
                       </tr>
                   </thead>
                    <tbody>
                    @forelse($data['records'] as $index => $record)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$record->title}}</td>
                        <td>
                            @include('backend.includes.display_status',['status' => $record->status])
                        </td>
                        <td>{{$record->created_at}}</td>
                        <td>{{$record->createdBy->name}}</td>
                        <td class="column-action">
                            <a href="{{route($base_route . 'show',$record->id )}}" class="btn btn-info" title="View"><i class="fas fa-eye"></i></a>
                            <a href="{{route($base_route . 'edit',$record->id )}}" class="btn btn-warning" title="Edit"><i class="fas fa-edit"></i></a>
                            <form action="{{route($base_route . 'destroy',$record->id)}}" class="d-inline" method="post" onsubmit="return confirm('are you sure to delete?')">
                                @csrf
                                <input type="hidden" name="_method" value="DELETE" >
                                <button type="submit" class="btn btn-danger"  title="Move to Trash"><i class="fas fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-danger text-center text-bold">{{$panel}} not found</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        <!-- /.card -->
    </section>
    <!-- /.content -->
@endsection
@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css"/>
@endsection
@section('js')
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript">
        $('#list_data').dataTable();
    </script>
@endsection
