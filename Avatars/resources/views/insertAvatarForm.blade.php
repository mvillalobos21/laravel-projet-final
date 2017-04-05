@extends('insertAvatar')

@section('contentForm')


    {!! Form::open(['route' => 'addAvatarSubmit', 'method' => 'post', 'files' => true]) !!}
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                {!! Form::label('emailLabel_form', 'Email') !!}
                {!! Form::email('email_form', '') !!}

            </div>
        </div>

        <div class="col-xs12 col-sm-12 col-md-12">
            <div class="form-group">
                {!! Form::label('avatarLabel_form', 'Avatar') !!}
                {!! Form::file('image') !!}

            </div>
        </div>

        <div class="col-xs12 col-sm-12 col-md-12">
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Submit</button>

                {!! Form::close() !!}
            </div>

        </div>
    </div>


@endsection