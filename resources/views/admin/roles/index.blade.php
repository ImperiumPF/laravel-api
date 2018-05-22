@extends('layouts.admin') 

@section('title', $title)

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header"></section>
    <!-- Main content -->
    <section class="content">
        @include('admin.partials.alerts')
        <!-- Default box -->
        <div class="card card-dark">
            <div class="card-header">
                <h3 class="card-title">{{ $title }}</h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-hover" data-toggle="dataTable" data-form="deleteForm">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>{{ __('roles.name') }}</th>
                            <th>{{ __('roles.desc') }}</th>
                            <th>{{ __('roles.options') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(count($roles)) 
                            @foreach ($roles as $row)
                            <tr>
                                <td>{{$row->id}}</td>
                                <td>{{$row->name}}</td>
                                <td>{{$row->description}}</td>
                                <td>
                                    <a href="{{ route('roles.edit', ['id' => $row->id]) }}" id="{{$row->id}}" class="btn btn-info btn-xs">
                                        <i class="fa fa-pencil" title="{{ __('roles.edit') }}"></i>
                                    </a>
                                    {{ Form::model($row, ['method' => 'delete', 'route' => ['roles.destroy', $row->id], 'class' =>'btn btn-xs form-delete']) }}
                                    {{ Form::hidden('id', $row->id) }}
                                    {{ Form::button('<i class="fa fa-trash-o" title="Delete"></i>', ['class' => 'btn btn-danger btn-xs form-delete', 'name' => 'deleteUser', 'id' => 'D'.$row->id.'']) }}
                                    {{ Form::close() }}
                                </td>
                            </tr>
                            @endforeach 
                        @endif
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection

@section('modal')
<!-- Modal -->
<div class="modal fade" id="confirm" tabindex="-1" role="dialog" aria-labelledby="confirmLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmLabel">{{ __('roles.mDelc') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>{{ __('roles.mDelf') }}</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('admin.close') }}</button>
                <button type="button" class="btn btn-danger" id="delete-btn">{{ __('admin.delete') }}</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
  <!-- DataTables -->
  <script src="{{ asset('assets/js/plugins/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('assets/js/plugins/dataTables.bootstrap4.min.js') }}"></script>

  <script src="{{ asset('assets/js/admin.js') }}"></script>
@endsection