@extends('insertAvatar')

@section('contentForm')

    Your avatar has been submit

    <img src="{{ route('downloadAvatar', ['email' => $email]) }}" />


@endsection
