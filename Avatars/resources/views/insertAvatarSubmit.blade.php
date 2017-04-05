@extends('insertAvatar')

@section('contentForm')

    Your avatar has been submit

    <img src="{{ route('downloadAvatar', ['email' => $email]) }}" />

    <div class="pull-center">
        <a class="btn btn-success" href="{{ route('home') }}"> Dashboard</a>
    </div>


@endsection
