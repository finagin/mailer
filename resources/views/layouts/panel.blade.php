@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <ol class="breadcrumb">
                            @stack('breadcrumbs')
                            <li class="active">@yield('title')</li>
                        </ol>
                    </div>
                    @yield('panel')
                </div>
            </div>
        </div>
    </div>
@endsection
