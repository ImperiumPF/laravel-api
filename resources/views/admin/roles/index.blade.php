@extends('layouts.admin') 



@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header"></section>

  <!-- Main content -->
  <section class="content">
    <!-- Default box -->
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Roles List</h3>

        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
            <i class="fa fa-minus"></i>
          </button>
        </div>
      </div>
      <div class="card-body">
        <table class="table table-striped table-valign-middle">
          <thead>
            <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Description</th>
              <th>Options</th>
            </tr>
          </thead>
          <tbody>
            @if(count($roles)) @foreach ($roles as $row)
            <tr>
              <td>{{$row->id}}</td>
              <td>{{$row->name}}</td>
              <td>{{$row->description}}</td>
              <td>
                <a href="{{ route('roles.edit', ['id' => $row->id]) }}" class="btn btn-info btn-xs">
                  <i class="fa fa-pencil" title="Edit"></i>
                </a>
                <a href="{{ route('roles.show', ['id' => $row->id]) }}" class="btn btn-danger btn-xs">
                  <i class="fa fa-trash-o" title="Delete"></i>
                </a>
              </td>
            </tr>
            @endforeach @endif
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