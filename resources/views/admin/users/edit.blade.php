@extends('layouts.admin') 

@section('title', $title)

@section('content')
<div class="content-wrapper">
    <section class="content-header"></section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">{{ $title }}</h3>
            </div>
            <form method="post" role="form" action="{{ route('users.update', ['id' => $user->id]) }}" data-parsley-validate>
                <div class="card-body">

                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="name">{{ __('users.name') }}</label>
                        <input type="text" value="{{$user->name}}" class="form-control" id="name" name="name" placeholder="{{ __('users.name') }}"> 
                        @if ($errors->has('name'))
                            <p class="text-danger">{{ $errors->first('name') }}</p>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email">{{ __('users.email') }}</label>
                        <input type="email" value="{{$user->email}}" class="form-control" id="email" name="email" placeholder="{{ __('users.email') }}"> 
                        @if ($errors->has('email'))
                            <p class="text-danger">{{ $errors->first('email') }}</p>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label for="password">{{ __('users.password') }}</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="{{ __('users.password') }}"> 
                        @if ($errors->has('password'))
                            <p class="text-danger">{{ $errors->first('password') }}</p>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                        <label for="password_confirmation">{{ __('users.passwordc') }}</label>
                        <input type="password" value="{{ Request::old('password_confirmation') ?: '' }}" class="form-control" id="password_confirmation"
                            name="password_confirmation" placeholder="{{ __('users.passwordc') }}"> 
                        @if ($errors->has('password_confirmation'))
                            <p class="text-danger">{{ $errors->first('password_confirmation') }}</p>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('role_id') ? ' has-error' : '' }}">
                        <label for="password">{{ __('users.role') }}</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select class="form-control" id="role_id" name="role_id">
                                @if(count($roles)) 
                                    @foreach($roles as $row)
                                        <option value="{{$row->id}}" {{$row->id == $user->roles[0]->id ? 'selected="selected"' : ''}}>{{$row->name}}</option>
                                    @endforeach 
                                @endif
                            </select>
                            @if ($errors->has('role_id'))
                                <span class="help-block">{{ $errors->first('role_id') }}</span>
                            @endif
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <input type="hidden" name="_token" value="{{ Session::token() }}">
                    <input name="_method" type="hidden" value="PUT">
                    <button type="submit" class="btn btn-success">{{ __('users.save') }}</button>
                </div>
            </form>
        </div>
        <!-- /.card -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection