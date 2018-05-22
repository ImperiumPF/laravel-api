@extends('layouts.admin')

@section('title', trans('categories.add'))

@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header"></section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="card card-dark">
      <div class="card-header">
        <h3 class="card-title">{{ $title }}</h3>
      </div>
      <form method="post" role="form" action="{{ route('roles.store') }}" data-parsley-validate>
        <div class="card-body">

          <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
            <label for="name">{{ __('roles.name') }}</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="{{ __('roles.Ename') }}"> 
            @if ($errors->has('name'))
                <p class="text-danger">{{ $errors->first('name') }}</p>
            @endif
          </div>

          <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
            <label for="description">{{ __('roles.desc') }}</label>
            <input type="description" class="form-control" id="description" name="description" placeholder="{{ __('roles.Edesc') }}"> 
            @if ($errors->has('description'))
                <p class="text-danger">{{ $errors->first('description') }}</p>
            @endif
          </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          <input type="hidden" name="_token" value="{{ Session::token() }}">
          <button id="submit" type="submit" class="btn btn-success">{{ __('roles.add') }}</button>
        </div>
      </form>
    </div>
    <!-- /.card -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection