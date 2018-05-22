@extends('layouts.admin') 

@section('title', $title)

@section('content')
<div class="content-wrapper">
    <section class="content-header"></section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card card-dark">
            <div class="card-header">
                <h3 class="card-title">{{ $title }}</h3>
            </div>
            <form method="post" role="form" action="{{ route('categories.update', ['id' => $category->id]) }}" data-parsley-validate>
                <div class="card-body">
                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="name">{{ __('categories.name') }}</label>
                        <input type="text" value="{{$category->name}}" class="form-control" id="name" name="name" placeholder="{{ __('categories.name') }}"> 
                        @if ($errors->has('name'))
                            <p class="text-danger">{{ $errors->first('name') }}</p>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                        <label for="description">{{ __('categories.desc') }}</label>
                        <input type="text" value="{{$category->description}}" class="form-control" id="description" name="description" placeholder="{{ __('categories.desc') }}"> 
                        @if ($errors->has('description'))
                            <p class="text-danger">{{ $errors->first('description') }}</p>
                        @endif
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <input type="hidden" name="_token" value="{{ Session::token() }}">
                    <input name="_method" type="hidden" value="PUT">
                    <button id="submit" type="submit" class="btn btn-success">{{ __('categories.save') }}</button>
                </div>
            </form>
        </div>
        <!-- /.card -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection