@extends('insertAvatar')

@section('contentForm')


    <div>
        <div class="row">
            <h2 class="text-center">Liste des avatars</h2>
        </div>
        <table class="table table-striped panel-body">
            <thead>
            <tr>
                <th class="text-center">Avatar</th>
                <th class="text-center">Courriel</th>
                <th class="text-center">Supprimer</th>
            </tr>
            </thead>
            <tbody>
                @each('listerAvatarsLoop', $avatars, 'avatar')
            </tbody>
        </table>
    </div>


@endsection