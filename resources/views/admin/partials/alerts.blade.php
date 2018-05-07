@if (Session::has('info'))
<div class="alert alert-info alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <p><i class="icon fa fa-info"></i>{!! Session::get('info') !!}</p>
</div>
@endif

@if (Session::has('success'))
<div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <p><h5><i class="icon fa fa-check"></i></h5>{!! Session::get('success') !!}</p>
</div>
@endif

@if (Session::has('warning'))
<div class="alert alert-warning alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h5><i class="icon fa fa-warning"></i></h5><p>{!! Session::get('warning') !!}</p>
</div>
@endif

@if (Session::has('error'))
<div class="alert alert-danger alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h5><i class="icon fa fa-ban"></i></h5>><p>{!! Session::get('error') !!}</p>
</div>
@endif
