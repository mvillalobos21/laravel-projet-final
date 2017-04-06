@extends('insertAvatar')

@section('contentForm')


    <div class="container">
        <h2>Striped Rows</h2>
        <p>The .table-striped class adds zebra-stripes to a table:</p>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Avatar</th>
                <th>Email</th>
                <th>Supprimer</th>
            </tr>
            </thead>
            <tbody>
                @each('listerAvatarsLoop', $avatars, 'avatar')
            </tbody>
        </table>
    </div>


@endsection