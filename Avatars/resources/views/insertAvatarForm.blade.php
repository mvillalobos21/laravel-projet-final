@extends('insertAvatar')

@section('contentForm')


                    {!! Form::open(['route' => 'addAvatarSubmit', 'method' => 'post', 'files' => true]) !!}
                    {!! Form::label('emailLabel_form', 'Email') !!}
                    {!! Form::text('email_form', '') !!}
                    <br/>
                    {!! Form::label('avatarLabel_form', 'Avatar') !!}
                    {!! Form::file('image') !!}

                    <br/>
                    {!! Form::submit('Submit') !!}

                    {!! Form::close() !!}

@endsection
