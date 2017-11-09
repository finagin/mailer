@extends('layouts.app')

@section('title', 'API Tokens')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <passport-personal-access-tokens></passport-personal-access-tokens>
                <passport-clients></passport-clients>
                <passport-authorized-clients></passport-authorized-clients>
            </div>
        </div>
    </div>
@endsection
