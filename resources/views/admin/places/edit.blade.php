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
            <form method="post" role="form" action="{{ route('places.update', ['id' => $places->id]) }}" data-parsley-validate>
                <div class="card-body">
                    <!-- Name -->
                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="name">{{ __('places.name') }}</label>
                        <input type="text" value="{{$places->name}}" class="form-control" id="name" name="name" placeholder="{{ __('places.name') }}"> 
                        @if ($errors->has('name'))
                            <p class="text-danger">{{ $errors->first('name') }}</p>
                        @endif
                    </div>
                    <!-- Description -->
                    <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                        <label for="description">{{ __('places.desc') }}</label>
                        <input type="text" value="{{$places->description}}" class="form-control" id="description" name="description" placeholder="{{ __('places.desc') }}"> 
                        @if ($errors->has('description'))
                            <p class="text-danger">{{ $errors->first('description') }}</p>
                        @endif
                    </div>
                    <!-- Price -->
                    <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                        <label for="price">{{ __('places.price') }}</label>
                        <input type="text" value="{{$places->price}}" class="form-control" id="price" name="price" placeholder="{{ __('places.price') }}"> 
                        @if ($errors->has('price'))
                            <p class="text-danger">{{ $errors->first('price') }}</p>
                        @endif
                    </div>
                    <!-- Schedule -->
                    <div class="form-group{{ $errors->has('schedule') ? ' has-error' : '' }}">
                        <label for="schedule">{{ __('places.schedule') }}</label>
                        <input type="text" value="{{$places->schedule}}" class="form-control" id="schedule" name="schedule" placeholder="{{ __('places.schedule') }}"> 
                        @if ($errors->has('schedule'))
                            <p class="text-danger">{{ $errors->first('schedule') }}</p>
                        @endif
                    </div>
                    <!-- Visitation Time -->
                    <div class="form-group{{ $errors->has('visitationTime') ? ' has-error' : '' }}">
                        <label for="visitationTime">{{ __('places.visitationTime') }}</label>
                        <input type="visitationTime" value="{{$places->visitationTime}}" class="form-control" id="visitationTime" name="visitationTime" placeholder="{{ __('places.visitationTime') }}"> 
                        @if ($errors->has('visitationTime'))
                            <p class="text-danger">{{ $errors->first('visitationTime') }}</p>
                        @endif
                    </div>
                    <!-- Coordinates -->
                    <div class="form-group{{ $errors->has('coordinates') ? ' has-error' : '' }}">
                        <label for="coordinates">{{ __('places.coordinates') }}</label>
                        <input type="text" value="{{$places->coordinates}}" class="form-control" id="coordinates" name="coordinates" placeholder="{{ __('places.coordinates') }}"> 
                        @if ($errors->has('coordinates'))
                            <p class="text-danger">{{ $errors->first('coordinates') }}</p>
                        @endif
                    </div>
                    <!-- Images -->
                    <div class="form-group{{ $errors->has('images') ? ' has-error' : '' }}">
                        <label for="images">{{ __('places.images') }}</label>
                        <input type="text" value="{{$places->images}}" class="form-control" id="images" name="images" placeholder="{{ __('places.images') }}"> 
                        @if ($errors->has('images'))
                            <p class="text-danger">{{ $errors->first('images') }}</p>
                        @endif
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <input type="hidden" name="_token" value="{{ Session::token() }}">
                    <input name="_method" type="hidden" value="PUT">
                    <button id="submit" type="submit" class="btn btn-success">{{ __('places.save') }}</button>
                </div>
            </form>
        </div>
        <!-- /.card -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection