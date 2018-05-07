@extends('layouts.app')

@section('content')
<body class="template-page sidebar-collapse">
        <!-- Navbar -->
        @include('partials.navbar')
        <!-- End Navbar -->
        <div class="wrapper">
            <div class="page-header">
                <div class="page-header-image" data-parallax="true">
                </div>
            </div>
            <div class="section">
            </div>
            @include('partials.footer')
        </div>
    </body>
@endsection